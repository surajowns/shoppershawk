<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
      protected $fillable=['user_id','order_id','product_id','price','quantity','total_amount','created_at','updated_at'];
      protected $table='orderdetails';

      public function products()
      {
         return $this->hasMany('App\Product','id','product_id');
      }
      public function productImage()
    {
        return $this->hasMany('App\ProductImage','product_id','product_id');
 
    }
      
    }
