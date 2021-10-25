<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\ResetPassword;
use Notification;
use Hash;
use Validator;
use App\User;
use Auth;
use Session;
use App\CategoryModel;
use App\BrandModel;
use App\Product;
use App\LoginLogModel;
use Mail;
use App\Order;
use App\Status;

class LoginController extends Controller
{
    public function __construct()
    {
       $this->middleware('adminauth');

    }
    /**
     * admin login
     * @method adminlogin
     * @para null
     */
    public function adminLogin(Request $request)
    {

        return view('admin.index.login');
    }
     
  /**
     * Validate user
     * @method validateUser
     * @param null
     */
    public function validateUser(Request $request)
    {
        
        // dd($request->all());
        
        // echo $c_ip ;
        // echo $c_browser;
        // echo $c_os;
        // echo $c_device;
        // die;

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
                
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials, $request->has('remember')) ){
               
                if (Auth::User()->hasRole('admin') && Auth::User()['role']==1)
                { 
                    $user=Auth::User();
                    Session::put('logRole',Auth::User()['role']); 
                    Session::put('logid',Auth::User()['id']) ; 
                    // $c_ip=LoginLogModel::get_ip();
                    // $c_browser=LoginLogModel::get_browser();
                    // $c_os=LoginLogModel::get_os();
                    // $c_device=LoginLogModel::get_device(); 
                    // $email=$request->email;
                    LoginLogs($user);
                    // $loginlog= new LoginLogModel;
                    // $loginlog->user=$user['name'];
                    // $loginlog->mobile=$user['mobile'];
                    // $loginlog->location=$user['location'];
                    // $loginlog->email=$request->email;
                    // $loginlog->ip_address= $c_ip;
                    // $loginlog->c_browser= $c_browser;
                    // $loginlog->c_os= $c_os;
                    // $loginlog->c_device= $c_device;
                    // $loginlog->save();
                    return redirect('admin/dashboard')
                            ->with('success', 'Welcome to admin dashboard.');
                    
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
    public function dashboard(Request $request)
    {
        $user=User::where('role',2)->get()->count();
        $categories=CategoryModel::get()->count();
        $brand=BrandModel::get()->count();
        $products=Product::get()->count();
        $totalorders=Order::get()->count();
        $totalearning=Order::get()->sum('total_amount');
        $orders=Order::with('users')->orderBy('id','DESC')->get()->take(5);
         $status=Status::get();
        return view('admin.index.dashboard',compact('user','categories','brand','products','totalorders','orders','status','totalearning'));
    }
    
    public function logout()
    {
        
        Auth::logout();
        Session::forget('logRole'); 
        Session::forget('logid') ;  
        return redirect('/admin/login');
    }
    public function Profile(Request $request)
    {
        $data = User::where('id',Auth::user()->id)->first();
        return view('admin.index.profile',compact('data'));
    }

    public function UpdatePassword(Request $request)
    {

        $data=$request->all();
        if ($request->isMethod('post')) {
       
         if($request->has('current') )
        {
           $user=Auth::User();
            if(!Hash::check($request->current, $user->password)){
                return redirect('admin/profile')->with('error','Current password does not match');

            }
        }
        if($request->password != $request->c_password){
            return redirect('admin/profile')->with('error','Confirm password does not match');

        }
            $validator = Validator::make($request->all(), [
                    'password' => 'required|same:c_password',
            ]);

            try{
                if($request->filled('password')){
                    $data=  request()->only(['password']);
                    $data['password']=bcrypt($request->password);
                }
                else{
                    $data=  request()->except(['_token','password']);
                }
              
               
                User::where('id',Session::get('logid'))->update($data);
                return redirect('admin/profile')->with('success','Password updated');
            }catch(\Exception $e){
                return redirect('admin/profile')->with('error',$e->getMessage());
            }
           
            } 
        $user=User::where('id',Session::get('logid'))->first();
        return view('admin.index.profile',compact('user'));
    }

    public function UpdateProfile(Request $request)
    {
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                    'email' => 'required',
                    'name'	=> 'required',
            ]);

            try{
                $data=  request()->except('_token');

                if($request->hasFile('profile_image')){
                    $image = $request->file('profile_image');
                    $name = time().'.'.$image->getClientOriginalExtension();
                    $destinationPath = public_path('/admin/images');
                    $image->move($destinationPath, $name);
                    $data['profile_image']=$name;
                }
               
                User::where('id',Session::get('logid'))->update($data);
                return redirect('admin/profile')->with('success','Profile updated');
            }catch(\Exception $e){
                return redirect('admin/profile')->with('error',$e->getMessage());
            }
           
            } 
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
             User::where('id',1)->update(['token'=>$token]);
            
             $user=User::first();

             $user->notify(new ResetPassword($token,$user));
             return back()->with('success','Password Reset Link sent to your email');

            
         }catch(\Exception $e){
            //  dd($e->getMessage());
            return back()->with('error',$e->getMessage());
        }
      }
      return view('admin.index.forgetpassword');
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
                      
                       User::where('token',$token)->update($data);
                        return back()->with('success','Password updated Successfull');
                        
                     }catch(\Exception $e){
                        return back()->with('error',$e->getMessage());
                    }
                  }
            $user=User::where('token',$token)->first();
            if($token==null){

                return back()->with('error','invalid token');
            }
          return view('admin.index.resetpassword',compact('user'));
    }
    
}
