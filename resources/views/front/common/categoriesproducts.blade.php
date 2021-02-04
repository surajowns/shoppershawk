<?php
  $category =App\CategoryModel::where('status',1)->where('parent_id',0)->get();
  $i=0;foreach($category as $cat){
  $category[$i]['subcat']=App\CategoryModel::where('status',1)->where('parent_id',$cat['id'])->get();
  $i++;
  }
?>
<div class="small_product_area small_product_style2">
    <div class="container">
        <div class="row">
            @foreach($category as $cat)
            <?php //print_r($cat);?>
            <div class="col-lg-4">
                <div class="small_product_list">
                        <div class="section_title">

                            <h2>{{$cat['name']}}</h2>

                        </div>
                    <div class="product_carousel small_p_container product_column1 owl-carousel">
                   @foreach($cat as $subcat)
                    {{$subcat}}
                       <div class="product_items">
                            <figure class="single_product">
                                <div class="product_thumb">
                                <a class="primary_img" href="#"><img class="best-selling" src="{{url('public/category/'.$cat['image'])}}" alt="" /></a>
                                </div>
                                <div class="product_content">
                                    <h4 class="product_name"><a href="product-details.html"></a></h4>
                                    <div class="product_rating">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="ion-android-star-outline"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-android-star-outline"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-android-star-outline"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-android-star-outline"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-android-star-outline"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="price_box">
                                        <span class="old_price">₹86.00</span>
                                        <span class="current_price">₹79.00</span>
                                    </div>
                                    <div class="product_cart_button">
                                        <a href="cart.html" title="Add to cart"><i class="fa fa-shopping-bag"></i></a>
                                    </div>
                                </div>
                            </figure>
                       </div>
                   @endforeach
                </div>
            </div>
         </div>
            @endforeach
          
        </div>
    </div>
</div>