<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    protected $fillable=['name','image','status','created_at','update_at'];
    protected $table="brands";
}
