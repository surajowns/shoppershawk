@extends('front.master')
@section('title','Product Details')
@section('content')
<div class="product_page_bg">
        <div class="container">
            <div class="product_details_wrapper mb-55">
                <!--product details start-->
                <div class="product_details">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="product-details-tab">
                                <div id="img-1" class="zoomWrapper single-zoom">
                                    <a href="#">
                                    @foreach($product->productImage as $image)

                                        <img id="zoom1" src="{{url('public/product_image/'.$image->image)}}" data-zoom-image="{{url('public/product_image/'.$image->image)}}" alt="big-1">
                                     @break
                                    @endforeach
                                    </a>
                                </div>
                                <div class="single-zoom-thumb">
                                    <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                       @foreach($product->productImage as $image)
                                        <li>
                                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{url('public/product_image/'.$image->image)}}" data-zoom-image="{{url('public/product_image/'.$image->image)}}">
                                                <img src="{{url('public/product_image/'.$image->image)}}" alt="zo-th-1" />
                                            </a>

                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="product_d_right">
                                <form action="#">

                                    <h3><a href="javascript:void(0)">{{$product['name']}}</a></h3>
                                    <div class="product_nav">
                                        <ul>
                                            <li class="prev"><a href="product-details.html"><i class="fa fa-angle-left"></i></a></li>
                                            <li class="next"><a href="variable-product.html"><i class="fa fa-angle-right"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_rating">
                                        <ul>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li class="review"><a href="#">(1 customer review )</a></li>
                                        </ul>
                                    </div>
                                    <div class="price_box">
                                        <span class="old_price">₹{{number_format($product['price'],2)}}</span>
                                        <span class="current_price">₹{{number_format($product['selling_price'],2)}}</span>
                                    </div>
                                    <div class="product_desc">
                                        <p>{{ucfirst($product['description'])}} </p>
                                    </div>
                                    <div class="product_variant color">
                                        <h3>Available Options</h3>
                                        <label>color</label>
                                        <ul>
                                            <li class="color1"><a href="#"></a></li>
                                            <li class="color2"><a href="#"></a></li>
                                            <li class="color3"><a href="#"></a></li>
                                            <li class="color4"><a href="#"></a></li>
                                        </ul>
                                    </div>
                                    <div class="product_variant quantity">
                                        <label>quantity</label>
                                        <input min="1" max="100" value="1" type="number">
                                        <button class="button" type="submit">add to cart</button>

                                    </div>
                                    <div class=" product_d_action">
                                        <ul>
                                            <li><a href="#" title="Add to wishlist">+ Add to Wishlist</a></li>
                                            <li><a href="#" title="Add to wishlist">+ Compare</a></li>
                                        </ul>
                                    </div>
                                    <div class="product_meta">
                                        <span>Category: <a href="#">Clothing</a></span>
                                    </div>

                                </form>
                                <div class="priduct_social">
                                    <ul>
                                        <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>
                                        <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>
                                        <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>
                                        <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>
                                        <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!--product details end-->

                <!--product info start-->
                <div class="product_d_info">
                    <div class="row">
                        <div class="col-12">
                            <div class="product_d_inner">
                                <div class="product_info_button">
                                    <ul class="nav" role="tablist" id="nav-tab">
                                        <li>
                                            <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Specification</a>
                                        </li>
                                        <li>
                                            <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews (1)</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="info" role="tabpanel">
                                        <div class="product_info_content">
                                        {{ucfirst($product['description'])}}                                        
                                       </div>
                                    </div>
                                    <div class="tab-pane fade" id="sheet" role="tabpanel">
                                        <div class="product_d_table">
                                        {!! $product['specification']!!} 
                                        </div>
                                        <div class="product_info_content">
                                            <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                                        <div class="reviews_wrapper">
                                            <h2>1 review for Donec eu furniture</h2>
                                            <div class="reviews_comment_box">
                                                <div class="comment_thmb">
                                                    <img src="assets/img/blog/comment2.jpg" alt="">
                                                </div>
                                                <div class="comment_text">
                                                    <div class="reviews_meta">
                                                        <div class="product_rating">
                                                            <ul>
                                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <p><strong>admin </strong>- September 12, 2018</p>
                                                        <span>roadthemes</span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="comment_title">
                                                <h2>Add a review </h2>
                                                <p>Your email address will not be published. Required fields are marked </p>
                                            </div>
                                            <div class="product_rating mb-10">
                                                <h3>Your rating</h3>
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="product_review_form">
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="review_comment">Your review </label>
                                                            <textarea name="comment" id="review_comment"></textarea>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <label for="author">Name</label>
                                                            <input id="author" type="text">

                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <label for="email">Email </label>
                                                            <input id="email" type="text">
                                                        </div>
                                                    </div>
                                                    <button type="submit">Submit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--product info end-->
            </div>

            <!--related product area start-->
            <section class="product_area related_products">
                <div class="row">
                    <div class="col-12">
                        <div class="section_title">
                            <h2>Related Products </h2>
                        </div>
                    </div>
                </div>
                <div class="product_carousel product_style product_column5 owl-carousel">

                   @foreach($relatedproducts as $productdetails)
                    <article class="single_product">
                        <figure>

                            <div class="product_thumb">
                            @if(!empty($productdetails['product_image']))
                                <a class="primary_img" href="{{url('/product_details/'.$productdetails['slug'])}}"><img src="{{url('public/product_image/'.$productdetails['product_image'][0]['image'])}}" alt="" /></a>
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
                            <div class="product_content">
                                <div class="product_content_inner">
                                    <h4 class="product_name"><a href="{{url('/product_details/'.$productdetails['slug'])}}">{{$productdetails['name']}}</a></h4>
                                    <div class="price_box">
                                        <span class="old_price">₹{{number_format($productdetails['price'],2)}}</span>
                                        <span class="current_price">₹{{number_format($productdetails['price'],2)}}</span>
                                    </div>
                                </div>
                                <div class="add_to_cart">
                                    <a href="cart.html" title="Add to cart">Add to cart</a>
                                </div>

                            </div>
                        </figure>
                    </article>
                  @endforeach
                </div>
            </section>
            <!--related product area end-->
        </div>
    </div>
    @endsection