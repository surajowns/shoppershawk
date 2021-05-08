<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refferal extends Model
{
    protected $fillable=['user_id','referrer_id','link','created_at','updated_at'];
    protected $table='refferals';
}
