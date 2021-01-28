<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialLinksModel extends Model
{
    protected $fillable=['title','links','status','created_at','updated_at'];
    protected $table="social_links";
}
