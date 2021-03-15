<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationModel extends Model
{
    protected $fillable=['user_id','content','is_seen','type','trash','status','created_at','updated_at'];
    protected $table='notifications';

    public function  users()
    {
        return $this->hasMany('App\User','id','user_id');
    }
    public function  order()
    {
        return $this->hasMany('App\Order','order_no','type');
    }

}
