<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable=['product_id','image','create_at','update_at'];
    protected $table='product_image';

}
