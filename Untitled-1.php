<?php
  $featureproduct=App\Product::with('productImage')->where('type',2)->where('status',1)->get()->toArray();
  $featurecate=array();
  foreach($featureproduct as $featproductdetails){
       $featurecate[]=$featproductdetails['supercategory_id'];
    
  }
  $featurecatecategories=App\CategoryModel::whereIn('id',$featurecate)->get();
  //die;
?>
<div class="product_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_header">
                    <div class="section_title">
                        <h2>Featured Products</h2>
                    </div>
                    <div class="product_tab_btn" id="feature_product">
                        <ul class="nav" role="tablist" id="nav-tab2">
                           @foreach($featurecatecategories as $value)
                            <li class="features">
                                <a  data-toggle="tab" href="#{{$value['slug']}}" role="tab" aria-controls="{{$value['slug']}}" aria-selected="false">
                                   {{$value['name']}}
                                </a>
                            </li>
                         
                            @endforeach
                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            @foreach($featurecatecategories as $value)
            <div class="featureproducts fade" id="{{$value['slug']}}" role="tabpanel">
                <div class="product_carousel product_style product_column5 owl-carousel">
                    <div class="product_items">
                    @foreach($featureproduct as $productdetails)
                      @if($value['id']==$productdetails['supercategory_id'])
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="product-details.html"><img src="{{url('public/product_image/'.$productdetails['product_image'][0]['image'])}}" alt="" /></a>
                                    <a class="secondary_img" href="product-details.html"><img src="{{url('public/product_image/'.$productdetails['product_image'][0]['image'])}}" alt="" /></a>
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
                                                <!-- <a href="#" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-bs-toggle="modal" data-bs-target="#modal_box" data-tippy="quick view">
                                                    <i class="ion-ios-search-strong"></i>
                                                </a> -->
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_content_inner">
                                        <h4 class="product_name"><a href="product-details.html">{{$productdetails['name']}}</a></h4>
                                        <div class="price_box">
                                            <span class="old_price">₹{{$productdetails['price']}}</span>
                                            <span class="current_price">₹{{$productdetails['selling_price']}}</span>
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
            </div>
           @endforeach
        </div>
    </div>
 </div>   
<!--modal start-->

<!--end modal-->
@section('javascript')
<script>
 $(document).ready(function(){
    $("#feature_product features:first a").addClass("active");
    $("#feature_product features:first a").attr('aria-selected', true);
    $(".featureproducts").first().addClass('active show');
 })
</script>
@stop