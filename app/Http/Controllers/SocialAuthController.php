<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite, Auth, Session;
use App\User;

class SocialAuthController extends Controller
{
    public function google()
    {
        
        return Socialite::driver('google')->redirect();
    }


    public function callback_google()
    {
        try {
           
       
            $googleUser = Socialite::driver('google')->user();
            $existUser = User::where('email',$googleUser->email)->first();
           
           // echo "<pre>";print_r($existUser);exit;
            if($existUser) {
                Session::put('logid',$existUser['id']);
                Session::put('logRole',$existUser['role']);
                Auth::loginUsingId($existUser->id);
            }
            else {
               
                $user = new User;
                $user->name = $googleUser->name;
                $user->email = $googleUser->email;
                $user->role = 2;
                $user->status=1;
                $user->password =bcrypt(rand(1,10000));
                $user->save();
                Session::put('logid',$user->id);
                Session::put('logRole',2);
                auth()->login($user);
            }
            return redirect('/')->with('success', 'Login Successfully');

        }
        catch(\Exception $e){
           
            return redirect('/')->with('success', $e->getMessage());


         }
    }
    public function facebook(){
        return Socialite::driver('facebook')->redirect();      
    }
    public function callback_fb(Request $request){
       
        // if (!$request->has('code') || $request->has('denied')) {
        //     return redirect('/login');
        // }
        // print_r($request->all());
         
        $fb_user = Socialite::driver('facebook');
        // dd($fb_user);
        $user = $this->findOrCreateFbUser($fb_user);

        $detail = User::where('id',$user->id)->first();
                      dd($detail);
        if(!empty($detail)){
            if($detail->status != 1){
                return redirect('/')->with('error','Your account is not active. Please contact to admin for more information.');
                Auth::logout();
                Session::flush();
            } else{
                auth()->login($detail);
             
                    return redirect('/')->with('success','Login Successfully'.' '.ucfirst($detail['name']));
   
            }
        }else{
            Session::put('social_login',$detail);
            return redirect('/');
        }
    }

    public function findOrCreateFbUser($user){
        try {
        $fb_user = $user->stateless()->user();
     
        $fb_user = json_decode(json_encode($fb_user),true);
        // dd($fb_user);
        if(!empty($fb_user)){
            $fb_name    = $fb_user['name'];
            $unique_id  = $fb_user['id'];
            $email      = $fb_user['email'];
            $fb_img     = '';

            $check_user = User::where('email',$email)->first();
            if(!empty($check_user)){
               
                $check_user->name   = $fb_name;
                $check_user->save();
                return $check_user;
               
            } else{

                $new_user           = new User;
                $new_user->name     = $fb_name;
                $new_user->password = bcrypt(rand(1,10000));
                $new_user->email    = $email?$email:'';
                $new_user->profile_image = $fb_img;
                $new_user->role     = 2;
                $new_user->status   =1;
                $new_user->save();
                return $new_user;
            }
            // }

        } else{
            return redirect('/');
        }
    } catch(\Exception $e){
           
        return redirect('/')->with('success', $e->getMessage());


     }
    }
}