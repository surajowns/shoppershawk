<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable=['payment_id','order_id','payment_status','created_at','updated_at'];
    protected $table='transactions';

    public function orders()
    {
        return $this->hasMany('App\Order','id','order_id');
    }
    public function users()
    {
        return $this->hasMany('App\User','id','user_id');
    }
}
