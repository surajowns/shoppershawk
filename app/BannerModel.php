<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerModel extends Model
{
    
    protected $fillable=['title','banner_image','type','link','status','created_at'];
    protected $table='banner';
    
    public function bannertype()
    {
        return $this->hasMany('App\BannerType','id','type');
    }
}
