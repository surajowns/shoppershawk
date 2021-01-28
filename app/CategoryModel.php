<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
     //use SoftDeletes;
     protected $fillable=['parent_id','name','slug','status','image','created_at'];
     protected $table='category';
     protected $primaryKey = 'id';
     protected $dates = ['deleted_at'];
}
