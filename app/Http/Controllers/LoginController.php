<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Session;
use Cart;
use App\CartModel;
use App\User;
use DB;
use App\Refferal;
use Str;

class LoginController extends Controller
{
    public function validateUser(Request $request)
    {
        
        $url=explode('/',url()->previous());
        $redirectto=end($url);
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                    'email' => 'required',
                    'password'	=> 'required',
            ]);

            if ($validator->fails()) {
                    return redirect('/login')
                            ->withInput()
                            ->withErrors($validator);
            }  
            
            try{
                if(is_numeric($request->get('email'))){
                    $credentials  =['mobile'=>$request->email,'password'=>$request->password];
                  }else{
                    $credentials = $request->only('email', 'password');
                  }
            
            if (Auth::attempt($credentials, $request->has('remember')) ){
               
                if (Auth::User()['role']==2)
                { 
                    $user=Auth::User();
                    $cartdetails=Cart::getContent()->toArray();
                   
                   
                    if(!empty($cartdetails)){
                        foreach($cartdetails as $details){
                            $check=CartModel::where('user_id',Auth::User()['id'])->where('product_id',$details['id'])->first();
                           
                            if(empty($check)){
                            $carts= new CartModel;
                            $carts->user_id=Auth::User()['id'];
                            $carts->product_id=$details['id'];
                            $carts->price=$details['price'];
                            $carts->quantity=$details['quantity'] ;
                            $carts->save(); 
                          
                          }
                                                   
                        }
                    }


                    Session::put('logid',Auth::User()['id']) ; 
                    if($redirectto==="checkout"){
                        return redirect('user/checkout')->with('success', 'Login Successfully');
                     }else{
                        return redirect('/')->with('success', 'Login Successfully');
                    }

                    // return back()->with('success', 'Login Successfully');
                    
                }
                else{
                    Auth::logout();
                    return back()->with('failed', 'Invalid Credential.');
                }
               
                
            }else{
                Auth::logout();
                return back()->with('failed', 'Invalid Credential.');
            }
           }catch(\Exception $e){
            return back()->with('failed', $e->getMessage());

         }

        }
    }
    public function logout()
    {
        
        Auth::logout();
        Session::forget('logRole'); 
        Session::forget('logid');  
        Session::forget('discount');
        Session::flush();
        return redirect('/');
    }
     
    
    public function ForgetPassword(Request $request)
    {
        if ($request->isMethod('post')) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
         ]);
         $data=User::where('email',$request->email)->first();
         if($data==null){
            return back()->with('error','invalid email');
         }
         
         try{
             $token=str_random(30);
             User::where('email',$request->email)->update(['token'=>$token]);
            
             $user=User::where('email',$request->email)->first();

             $emailsent= ForgetPasswordEmail($user,$token);
             if($emailsent){
                return back()->with('success','Password Reset Link sent to your email');
             }
             return back()->with('success','Password Reset Link sent to your email');

            
         }catch(\Exception $e){
            //  dd($e->getMessage());
            return back()->with('error',$e->getMessage());
        }
      }
      return view('front.pages.forgetpassword');
    }


    public function ResetPassword(Request $request,$token=null)
    {
        if ($request->isMethod('post')) {
                    $validator = Validator::make($request->all(), [
                        'email' => 'required|email',
                        'password'=>'required|same:c_password'

                     ]);
                     
                     try{
                        
                        if($request->filled('password')){
                            $data=  request()->only(['password']);
                            $data['password']=bcrypt($request->password);
                           
                        }
                        else{
                           
                            $data=  request()->except(['_token','password']);
                        }
                      
                      $check= User::where('email',$request->email)->where('token',$token)->update($data);
                        
                      if($check){
                        return back()->with('success','Password updated Successfull');

                      }else{
                        return back()->with('error','invalid email');
  
                      }
                        
                     }catch(\Exception $e){
                        return back()->with('error',$e->getMessage());
                    }
                  }
            $user=User::where('token',$token)->first();
            if($token==null){

                return redirect('/user/forgetpassword')->with('error','invalid token');
            }else{
                return view('front.pages.resetpassword',compact('user'));
            }
    }
    public function referalRegister(Request $request)
    {
      $url=explode('=',url()->full());
      $referrer_id=end($url);
      if($request->isMethod('post')){
        $validatedData = $request->validate([
          'name' => 'required',
          'email' => 'required|unique:users',
          'mobile' => 'required|unique:users',
          'password'=>'required',
          ]);
           DB::beginTransaction();
          try{
            $data=$request->except('_token');
            $password=bcrypt($request->password);
            $data['password']=$password;
            $data['referrer_id']= $referrer_id;
            $data['role']=2;
            
            User::create($data); 
            $refferal_code=Str::random(10);
            $refferal_link=url("/register/reff=$refferal_code");
             $user=User::orderBy('id','DESC')->first();
             $refferals = new Refferal;
             $refferals->user_id= $user['id'];
             $refferals->referrer_id=$refferal_code;
             $refferals->link= $refferal_link;
             $refferals->save();
         
             DB::commit();
            return redirect('/')->with('success','You are registered successfully');

          }catch(\Exception $e){
             DB::rollback(); 
            return back()->with('error',$e->getMessage());

          }

        }
        return view('front.pages.register');
    }




}
