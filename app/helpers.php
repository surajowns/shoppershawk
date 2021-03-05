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
        $message->from('care@shoppershawk.com','Shoppershawk');
        });
    }
}

?>