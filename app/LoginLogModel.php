<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginLogModel extends Model
{
    protected $fillable=['name','email','mobile','location','status','created_at','updated_at'];
    protected $table='login_logs';
}
