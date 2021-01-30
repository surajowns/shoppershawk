<?php 
  $categories=App\CategoryModel::where('parent_id',0)->where('status',1)->get();

?>
<div class="categories_product_area mb-55">
    <div class="container">
        <div class="categories_product_inner">
        @foreach($categories as $cat)
            <div class="single_categories_product">
                <div class="categories_product_content">
                    <h4><a href="shop.html">{{$cat['name']}}</a></h4>
                    <p>12 Products</p>
                </div>
                <div class="categories_product_thumb">
                    <a href="shop.html"><img src="{{url('public/category/'.$cat['image'])}}" alt="" /></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>