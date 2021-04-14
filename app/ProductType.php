<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $fillable=['name','status','create_at','update_at'];
    protected $table='product_type';
}
