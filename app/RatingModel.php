<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingModel extends Model
{
    protected $fillable=['user_id','product_id','rating','review','comment','status','created_at','updated_at'];
    protected $table='ratings';

    public function users()
    {
        return $this->hasOne('App\User','id','user_id');
    }
    public function products()
    {
        return $this->hasOne('App\Product','id','product_id');
    }
}
