@extends('front.master')
@section('title','Product List')
@section('content')
<!--breadcrumbs area start-->

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
                @foreach($category as $cat)
                    <li class="widget_sub_categories"> 
                        <a href="{{url('/'.$cat['slug'])}}">{{$cat['name']}}</a>
                        <ul class="widget_dropdown_categories">

                        @foreach($cat['subcat'] as $subcat)
                        <li><a href="{{url('/'.$subcat['slug'])}}">{{$subcat['name']}}</a></li>

                        @endforeach
                        </ul>
                    </li>
                  
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
                    <a href="#">blouse</a>
                    <a href="#">clothes</a>
                    <a href="#">fashion</a>
                    <a href="#">handbag</a>
                    <a href="#">laptop</a>
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
                        <img src="assets/img/bg/banner16.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!--shop banner area end-->
        <!--shop toolbar start-->
        <div class="shop_toolbar_wrapper">
            <div class="shop_toolbar_btn">
                <button data-role="grid_4" type="button" class=" active btn-grid-4" data-toggle="tooltip" title="4"></button>
                <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip" title="List"></button>
            </div>
            <div class=" niceselect_option">
                <form class="select_option" action="#">
                    <select name="orderby" id="short">

                        <option selected value="1">Sort by average rating</option>
                        <option value="2">Sort by popularity</option>
                        <option value="3">Sort by newness</option>
                        <option value="4">Sort by price: low to high</option>
                        <option value="5">Sort by price: high to low</option>
                        <option value="6">Product Name: Z</option>
                    </select>
                </form>
            </div>
            <div class="page_amount">
                <p>Showing 1–9 of 21 results</p>
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
                        @if(!empty($details['product_image']))
                                <a class="primary_img" href="#"><img src="{{url('public/product_image/'.$details['product_image'][0]['image'])}}" alt="" /></a>
                                <!-- <a class="secondary_img" href="#"><img src="{{url('public/product_image/'.$details['product_image'][0]['image'])}}" alt="" /></a> -->
                                  @endif                             
                            <div class="label_product">
                                <span class="label_sale">Sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-tippy="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="product_content grid_content">
                            <div class="product_content_inner">
                                <h4 class="product_name"><a href="product-details.html">{{ucfirst($details['name'])}}</a></h4>
                                <div class="product_rating">
                                    <ul>
                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                        <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                    </ul>
                                </div>
                                <div class="price_box">
                                    <span class="old_price">${{number_format($details['price'],2)}}</span>
                                    <span class="current_price">${{number_format($details['selling_price'],2)}}</span>
                                </div>
                            </div>
                            <div class="add_to_cart">
                                <a href="cart.html" title="Add to cart">Add to cart</a>
                            </div>
                        </div>
                        <div class="product_content list_content">
                            <h4 class="product_name"><a href="product-details.html">{{ucfirst($details['name'])}}</a></h4>
                            <div class="product_rating">
                                <ul>
                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                </ul>
                            </div>
                            <div class="price_box">
                                <span class="old_price">${{number_format($details['price'],2)}}</span>
                                <span class="current_price">${{number_format($details['selling_price'],2)}}</span>
                            </div>
                            <div class="product_desc">
                            {!! ucfirst($details['description']) !!}
                            </div>
                            <div class="add_to_cart">
                                <a href="cart.html" title="Add to cart">Add to cart</a>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i> Add to Wishlist</a></li>                                </ul>
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
                    <li class="current">1</li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li class="next"><a href="#">next</a></li>
                    <li><a href="#">>></a></li>
                </ul>
            </div>
        </div>
        <!--shop toolbar end-->
        <!--shop wrapper end-->
    </div>
</div>
</div>
</div>
<!--shop  area end-->
@endsection
