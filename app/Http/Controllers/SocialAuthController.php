<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite, Auth, Session;
use App\User;
use App\Refferal;
use Str;
use DB;
use Cart;
use App\CartModel;

class SocialAuthController extends Controller
{
    public function google()
    {
        
        return Socialite::driver('google')->redirect();
    }


    public function callback_google()
    {

        DB::beginTransaction();
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


                
                $cartdetails=Cart::getContent()->toArray();
                if(!empty($cartdetails)){
                    foreach($cartdetails as $details){
                        $check=CartModel::where('user_id',$user->id)->where('product_id',$details['id'])->first();
                       
                        if(empty($check)){
                        $carts= new CartModel;
                        $carts->user_id=$user->id;
                        $carts->product_id=$details['id'];
                        $carts->price=$details['price'];
                        $carts->quantity=$details['quantity'] ;
                        $carts->save(); 
                      
                      }
                                               
                    }
                }
                 
                $refferal_code=Str::random(10);
                $refferal_link=url("/regiuserster/reff=$refferal_code");
                $user=User::orderBy('id','DESC')->first();
                $refferals = new Refferal;
                $refferals->user_id= $['id'];
                $refferals->referrer_id=$refferal_code;
                $refferals->link= $refferal_link;
                $refferals->save();


                auth()->login($user);
            }
            DB::commit();
            UserRegisterEmail($user,$refferal_code);
            return redirect('/')->with('success', 'Login Successfully');

        }
        catch(\Exception $e){
            DB::rollback(); 
            return redirect('/')->with('success', $e->getMessage().$e->getLine());


         }
    }
    public function facebook(){
        return Socialite::driver('facebook')->redirect();      
    }
    public function callback_fb(Request $request){
       
        $fb_user = Socialite::driver('facebook');
        $user = $this->findOrCreateFbUser($fb_user);

        $detail = User::where('id',$user->id)->first();
        if(!empty($detail)){
            if($detail->status != 1){
               
                return redirect('/')->with('error','Your account is not active. Please contact to admin for more information.');
                Auth::logout();
                Session::flush();
            } else{
                
                Session::put('logid',$detail['id']);
                Session::put('logRole',2);
                auth()->login($detail);
             
                    return redirect('/')->with('success','Login Successfully');
   
            }
        }else{
            Session::put('social_login',$detail);
            return redirect('/');
        }
    }

    public function findOrCreateFbUser($user){
        DB::beginTransaction();
        try {
        $fb_user = $user->stateless()->user();
     
        $fb_user = json_decode(json_encode($fb_user),true);
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


                $cartdetails=Cart::getContent()->toArray();
                if(!empty($cartdetails)){
                    foreach($cartdetails as $details){
                        $check=CartModel::where('user_id',$new_user['id'])->where('product_id',$details['id'])->first();
                       
                        if(empty($check)){
                        $carts= new CartModel;
                        $carts->user_id=$new_user['id'];
                        $carts->product_id=$details['id'];
                        $carts->price=$details['price'];
                        $carts->quantity=$details['quantity'] ;
                        $carts->save(); 
                      
                      }
                                               
                    }
                }


                $refferal_code=Str::random(10);
                $refferal_link=url("/register/reff=$refferal_code");
                $user=User::orderBy('id','DESC')->first();
                $refferals = new Refferal;
                $refferals->user_id= $user['id'];
                $refferals->referrer_id=$refferal_code;
                $refferals->link= $refferal_link;
                $refferals->save();
                DB::commit();
                UserRegisterEmail($user,$refferal_code);
                return $new_user;
            }
            // }

        } else{
            return redirect('/');
        }
    } catch(\Exception $e){
        DB::rollback(); 
        return redirect('/')->with('success', $e->getMessage().$e->getLine());


     }
    }
}