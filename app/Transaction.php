<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable=['payment_id','order_id','payment_status','created_at','updated_at'];
    protected $table='transactions';
}
