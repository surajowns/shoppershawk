<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponModel extends Model
{
    protected $fillable=['title','code','discount','minimum_amount','limit','coupon_limit','starting_at','end_at','notes','status','created_at','updated_at'];
    protected $table='coupons';
}
