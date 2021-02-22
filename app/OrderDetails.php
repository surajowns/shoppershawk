<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable=['user_id','order_id','product_id','price','quantity','total_amount','created_at','updated_at'];
}
