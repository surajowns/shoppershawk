@extends('front.master')
@section('title','Product List')
@section('content')
<!--breadcrumbs area start-->
<?php
   $brand=App\BrandModel::where('status',1)->get();
  $user=Auth::user();

?>
<!--shop  area start-->
<div class="shop_area shop_reverse">
<div class="container">
<div class="row">
    <div class="col-lg-3 col-md-12">
        <!--sidebar widget start-->
        <aside class="sidebar_widget">
            <div class="widget_list widget_categories">
                <h3>Product categories</h3>
              
                <ul>
                   <?php //echo $_GET['cat'] ?>
                @foreach($category as $cat)
                    @if($cat['name'] == ucfirst($_GET['cat']))
                    <li class="widget_sub_categories"> 
                        <a href="{{url('/products/'.'?cat='.$cat['slug'])}}">{{$cat['name']}}</a>
                        <ul class="widget_dropdown_categories">

                        @foreach($cat['subcat'] as $subcat)
                        <li><a href="{{url('/products/'.'?cat='.$cat['slug'].'&subcat='.$subcat['slug'])}}">{{$subcat['name']}}</a></li>

                        @endforeach
                        </ul>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <div class="widget_list widget_filter">
                <h3>Filter by price</h3>
                <form action="#">
                    <div id="slider-range"></div>
                    <button type="submit">Filter</button>
                    <input type="text" name="text" id="amount" />

                </form>
            </div>
            <div class="widget_list tags_widget">
                <h3>Product tags</h3>
                <div class="tag_cloud">
                    @foreach($brand as $value)
                    <a href="{{url('/products/'.'?cat='.strtolower($value['id']))}}">{{$value['name']}}</a>
                    @endforeach
                </div>
            </div>
        </aside>
        <!--sidebar widget end-->
    </div>
    <div class="col-lg-9 col-md-12">

        <!--shop banner area start-->
        <div class="shop_banner_area mb-30">
            <div class="row">
                <div class="col-12">
                    <div class="shop_banner_thumb">
                        <img src="{{url('public/front/img/banner16.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!--shop banner area end-->
        <!--shop toolbar start-->
        @if((count($product)))
        <div class="shop_toolbar_wrapper">
            <div class="shop_toolbar_btn">
                <button data-role="grid_4" type="button" class=" active btn-grid-4" data-toggle="tooltip" title="4"></button>
                <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip" title="List"></button>
            </div>
            <div class=" niceselect_option">
                <form class="select_option" action="#">
                    <select name="orderby" id="short">
                        <option selected value="1">Sort by category & sub category</option>
                        <!-- <option value="2">Sort by popularity</option> -->
                        <!-- <option value="3">Sort by newness</option> -->
                        <option value="4">Sort by price: low to high</option>
                        <option value="5">Sort by price: high to low</option>
                        
                        <!-- <option value="6">Product Name: Z</option> -->
                    </select>
                </form>
            </div>
        </div>
        <!--shop toolbar end-->

        <!--shop wrapper start-->
        <div class="row no-gutters shop_wrapper">
        
           @foreach($product as $details)
             <div class="col-lg-3 col-md-4 col-12 ">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                        @foreach($details->productImage as $image)
       
                                <a class="primary_img" href="{{url('/product_details/'.$details['slug'])}}"><img src="{{url('public/product_image/'.$image->image)}}" alt="" /></a>
                                @break
                         @endforeach                             
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                            <ul>
                                    @if(isset($user))
                                        @if(count($details->wishlist)>0)
                                           @foreach($details->wishlist as $val)
                                           
                                                    <li class="wishlist">
                                                    @if($val['user_id'] == $user->id )
                                                        <a href="{{url('user/wishlist/'.$details['id'])}}" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-tippy="Remove from Wishlist"><i class="ion-android-favorite"></i></a>
                                                        @else
                                                          <a href="{{url('user/wishlist/'.$details['id'])}}" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-tippy="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                                     @endif
                                                    </li>
                                            @endforeach
                                        @else
                                         <li class="wishlist">
                                            <a href="{{url('user/wishlist/'.$details['id'])}}" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-tippy="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                         </li>
                                       @endif
                                    @else
                                       <li class="wishlist">
                                            <a href="{{url('user/wishlist/'.$details['id'])}}" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-tippy="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                         </li>
                                    @endif
                                        <li class="compare">
                                            <!-- <a href="#" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-tippy="Add to Compare"><i class="ion-ios-settings-strong"></i></a> -->
                                        </li>
                                        <li class="quick_button">
                                            <!-- <a href="#" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-bs-toggle="modal" data-bs-target="{{$details['slug']}}" data-tippy="quick view">
                                                <i class="ion-ios-search-strong"></i>
                                            </a> -->
                                        </li>
                                    </ul>
                            </div>
                        </div>

                        <div class="product_content grid_content">
                            <div class="product_content_inner">
                                <h4 class="product_name"><a href="{{url('/product_details/'.$details['slug'])}}">{{ucfirst($details['name'])}}</a></h4>
                                <div class="product_rating">
                                    <ul>
                                    
                                    <?php  $avgrating = 0; ?>
                                             @if(count($details->productRating)>0)
                                                      @foreach($details->productRating as $avg_rating) 
                                                           <?php  $avgrating= $avgrating + $avg_rating['rating']/count($details->productRating) ?>
                                                      @endforeach
                                                    <li>
                                                        <a href="#">{{number_format($avgrating,1)}}<i class="ion-android-star-outline"></i></a>
                                                    </li>
                                                    
                                                @endif
                                    </ul>
                                </div>
                                <div class="price_box">
                                    <span class="old_price">₹{{number_format($details['price'],2)}}</span>
                                    <span class="current_price">₹{{number_format($details['selling_price'],2)}}</span>
                                </div>
                            </div>
                            <div class="add_to_cart">
                              <a href="javascript:void(0)" class="cart" title="Add to cart" data-productid="{{$details['id']}}">Add to cart</a>
                            </div>
                        </div>
                        <div class="product_content list_content">
                            <h4 class="product_name"><a href="{{url('/product_details/'.$details['slug'])}}">{{ucfirst($details['name'])}}</a></h4>
                            <div class="product_rating">
                                <ul>
                                <?php  $avgrating = 0; ?>
                                @if(!empty($details['product_rating']))
                                                      @foreach($details['product_rating'] as $avg_rating) 
                                                           <?php  $avgrating= $avgrating + $avg_rating['rating']/count($details['product_rating']) ?>
                                                      @endforeach
                                                    <li>
                                                        <a href="#">{{number_format($avgrating,1)}}<i class="ion-android-star-outline"></i></a>
                                                    </li>
                                                    
                                                @endif
                                </ul>
                            </div>
                            <div class="price_box">
                                <span class="old_price">₹{{number_format($details['price'],2)}}</span>
                                <span class="current_price">₹{{number_format($details['selling_price'],2)}}</span>
                            </div>
                            <div class="product_desc">
                            {!! ucfirst($details['description']) !!}
                            </div>
                            <div class="add_to_cart">
                            <a href="javascript:void(0)" class="cart" title="Add to cart" data-productid="{{$details['id']}}">Add to cart</a>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist">
                                       <a href="{{url('user/wishlist/'.$details['id'])}}" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i> Add to Wishlist</a>
                                       </li>  
                                 </ul>
                            </div>
                        </div>
                    </figure>
                </article>
             </div>
            @endforeach
        </div>

        <div class="shop_toolbar t_bottom">
            <div class="pagination">
                <ul>
                {!! $product->links() !!}
                </ul>
            </div>
        </div>
        @else
          <div class="row">
              <div class="col-sm-12 text-center">
              <img src="{{url('/public/front/img/productlist.png')}}" alt="">
              </div>
          </div>
        @endif
        
        <!--shop toolbar end-->
        <!--shop wrapper end-->
    </div>
</div>
</div>
</div>
<!--shop  area end-->
@endsection
