<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['user_id','price','quantity','discount','total_amount','coupon','billing_name','billing_email','billing_country','billing_state','billing_address','billing_landmark','billing_mobile','billing_pincode','shipping_name','shipping_email','shipping_country','shipping_state','shipping_address','shipping_landmark','shipping_mobile','shipping_pincode','status','created_at','update_at'];
     protected $table="orders";
}
