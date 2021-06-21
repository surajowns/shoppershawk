<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable=['id','name','status','created_at','updated_at'];
    protected $table='colors';
}
