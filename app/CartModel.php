<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    protected $fillable=['user_id','product_id','quantity','created_at','updated_at'];
    protected $table='carts';
}
