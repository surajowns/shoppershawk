<?php

if (! function_exists('getuser')) {
  function getuser($id = null) {
    $data = \DB::table('users')
        ->select('*')
        ->where('id', $id)
        ->first();
    return $data;
  }
}
if (! function_exists('OrderEmail')) {
    function OrderEmail($user,$order_no,$orders) {
             
        $to_name =$user['name'];
        $to_email =$user['email'];
        $data = array('user'=>$user,'order_no'=>$order_no,'orders'=>$orders);
      
        Mail::send('front.pages.orderemail', $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)->subject('Order Confirmation ');
        $message->cc(['pramodbit254@gmail.com']);
        $message->from('care@shoppershawk.com','Shoppers Hawk');
        });
    }
}

if (! function_exists('ForgetPasswordEmail')) {
  function ForgetPasswordEmail($user,$token) {
           
      $to_name =$user['name'];
      $to_email =$user['email'];
      $data = array('user'=>$user,'token'=>$token);
    
      Mail::send('front.pages.passwordresetemail', $data, function($message) use ($to_name, $to_email) {
      $message->to($to_email, $to_name)->subject('Reset Password Link');
      $message->from('care@shoppershawk.com','Shoppers Hawk');
      });
  }
}

if (! function_exists('UserRegisterEmail')) {
  function UserRegisterEmail($user,$refferal_code) {
           
      $to_name =$user['name'];
      $to_email =$user['email'];
      $data = array('user'=>$user,'refferal_code'=>$refferal_code);
    
      Mail::send('front.pages.welcomemail', $data, function($message) use ($to_name, $to_email) {
      $message->to($to_email, $to_name)->subject('Welcome mail');
      $message->from('care@shoppershawk.com','Shoppers Hawk');
      });
  }
}

if(! function_exists('LoginLogs')){

    function LoginLogs($user)
    {

      $c_ip= App\LoginLogModel::get_ip();
      $c_browser= App\LoginLogModel::get_browser();
      $c_os= App\LoginLogModel::get_os();
      $c_device= App\LoginLogModel::get_device(); 

      $loginlog= new App\LoginLogModel;
      $loginlog->user=$user['name'];
      $loginlog->mobile=$user['mobile'];
      $loginlog->location=$user['location'];
      $loginlog->email=$user['email'];
      $loginlog->ip_address= $c_ip;
      $loginlog->c_browser= $c_browser;
      $loginlog->c_os= $c_os;
      $loginlog->c_device= $c_device;
      $loginlog->save();
    }
}

?>