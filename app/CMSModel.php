<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CMSModel extends Model
{
    protected $fillable=['title','slug','description','page_image','created_at'];
    protected $table='cms';
}
