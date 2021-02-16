<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $fillable=['user_id','product_id','created_at','upated_at'];
    protected $table='wishlists';

    // public function product_image()
    // {
    //     return $this->hasMany('App\Product','id','product_id');
    // }
}
