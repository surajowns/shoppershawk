<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerType extends Model
{
    protected $fillable=['name','created_at','updated_at'];
    protected $table='banner_type';
}
