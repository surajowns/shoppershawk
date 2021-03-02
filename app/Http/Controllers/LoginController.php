<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Session;
use Cart;
use App\CartModel;

class LoginController extends Controller
{
    public function validateUser(Request $request)
    {
        

        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                    'email' => 'required',
                    'password'	=> 'required',
            ]);

            if ($validator->fails()) {
                    return redirect('admin/login')
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
                    return redirect('/home')->with('success', 'Login Successfully');

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
        Session::forget('logid') ;  
        Session::forget('discount');
        return redirect('/home');
    }
}
