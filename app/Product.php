<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','brand','slug','model_no','price','selling_price','supercategory_id','sub_category','qty','type','specification','description','status','created_at'];
    protected $table='products';

    public function productImage()
    {
        return $this->hasMany('App\ProductImage','product_id','id');
 
    }
    public function productBrand()
    {
        return $this->hasOne('App\BrandModel','id','brand');
 
    }
    public function productRating(){
        return  $this->hasMany('App\RatingModel','product_id','id');
    }
    public function wishlist(){
        return  $this->hasMany('App\Wishlist','product_id','id');
    }
}
