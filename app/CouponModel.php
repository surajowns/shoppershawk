<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CouponModel extends Model
{
    protected $fillable=['title','code','discount','minimum_amount','starting_at','end_at','notes','status','created_at','updated_at'];
    protected $table='coupons';
}
