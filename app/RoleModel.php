<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
     protected $fillable=['name','created_at','updated_at'];
     protected $table='roles';
}
