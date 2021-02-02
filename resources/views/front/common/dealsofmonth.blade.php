<?php
  $product=App\Product::with('productImage')->where('type',1)->where('status',1)->get()->toArray();
  $cate=array();
  foreach($product as $productdetails){
       $cate[]=$productdetails['supercategory_id'];
    
  }
  $categories=App\CategoryModel::whereIn('id',$cate)->get();

?>
<div class="product_area deals_product">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_header">
                    <div class="section_title">
                        <h2>Deals Of The Month</h2>
                    </div>
                    <div class="product_tab_btn deals_of_the_month">
                        <ul class="nav" role="tablist" id="nav-tab">
                          @foreach($categories as $category)
                            <li>
                                <a  data-toggle="tab" href="#deals{{$category['slug']}}" role="tab" aria-controls="deals{{$category['slug']}}" aria-selected="false">
                                   {{$category['name']}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content">
        @foreach($categories as $category)
            <div class="tab-pane fade dealsofthemonth" id="deals{{$category['slug']}}" role="tabpanel">
                <div class="product_carousel product_style product_column5 owl-carousel">
                @foreach($product as $productdetails)
                   @if($category['id']==$productdetails['supercategory_id'])
                    <article class="single_product">
                        <figure>
                            <div class="product_thumb">
                            @if(!empty($productdetails['product_image']))
                                <a class="primary_img" href="#"><img src="{{url('public/product_image/'.$productdetails['product_image'][0]['image'])}}" alt="" /></a>
                                <a class="secondary_img" href="#"><img src="{{url('public/product_image/'.$productdetails['product_image'][0]['image'])}}" alt="" /></a>
                             @endif
                                <div class="label_product">
                                    <span class="label_sale">Sale</span>
                                </div>
                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist">
                                            <a href="wishlist.html" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-tippy="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                        </li>
                                        <li class="compare">
                                            <!-- <a href="#" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-tippy="Add to Compare"><i class="ion-ios-settings-strong"></i></a> -->
                                        </li>
                                        <li class="quick_button">
                                            <!-- <a href="#" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-bs-toggle="modal" data-bs-target="{{$productdetails['slug']}}" data-tippy="quick view">
                                                <i class="ion-ios-search-strong"></i>
                                            </a> -->
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_content_inner">
                                    <h4 class="product_name"><a href="product-countdown.html">{{$productdetails['name']}}</a></h4>
                                    <div class="price_box">
                                        <span class="old_price">₹{{number_format($productdetails['price'],2)}}</span>
                                        <span class="current_price">₹{{number_format($productdetails['selling_price'],2)}}</span>
                                    </div>
                                    <div class="countdown_text">
                                        <p><span>Hurry Up!</span> Offers ends in:</p>
                                    </div>
                                    <div class="product_timing">
                                        <div data-countdown="{{$productdetails['created_at']}}"></div>
                                    </div>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="Add to cart">Add to cart</a>
                                </div>
                            </div>
                        </figure>
                    </article>
                    @endif
                    @endforeach 
                  </div>
              </div>
          @endforeach
        </div>
    </div>
</div>
<!--modal start-->

<!--end modal-->
<!-- @section('javascript')
<script>
 $(document).ready(function(){
    $(".deals_of_the_month li:first a").addClass("active");
    $('.deals_of_the_month li:first a').attr('aria-selected', true);
    $('.dealsofthemonth').first().addClass('active show');
 })
</script>
@stop -->