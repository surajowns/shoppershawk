<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['order_no','user_id','order_type','price','quantity','discount','total_amount','gst_no','bussiness_name','coupon','billing_name','billing_email','billing_country','billing_state','billing_address','billing_landmark','billing_mobile','billing_pincode','shipping_name','shipping_email','shipping_country','shipping_state','shipping_address','shipping_landmark','shipping_mobile','shipping_pincode','status','order_note','created_at','update_at'];
     protected $table="orders";

     public function users()
     {
         return $this->hasMany('App\User','id','user_id');
     }
     public function status()
     {
         return $this->hasMany('App\Status','id','status');
     }
     public function orderdetails()
     {
        return $this->hasMany('App\OrderDetails','order_id','id');
 
     }
}
