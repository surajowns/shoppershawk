@extends('front.master')
@section('title','Product Details')
@section('content')
<?php $user=Auth::user();?>
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
                        <div class="product_rating">
                           <ul>
                              <?php  $avgrating = 0; ?>
                              @if(count($product->productRating)>0)
                              @foreach($product->productRating as $avg_rating) 
                              <?php  $avgrating= $avgrating + $avg_rating['rating']/count($product->productRating) ?>
                              @endforeach
                              <li>
                                 <a href="#">{{number_format($avgrating,1)}}<i class="ion-android-star-outline"></i></a>
                              </li>
                              <li class="review"><a href="javascript:void(0)">({{count($product->productRating)}} customer review )</a></li>
                              @endif
                           </ul>
                        </div>
                        <div class="price_box">
                           <span class="old_price">₹{{number_format($product['price'],2)}}</span>
                           <span class="current_price">₹{{number_format($product['selling_price'],2)}}</span>&nbsp;&nbsp;<span class="perc_discount">({{number_format((($product['price']-$product['selling_price'])/$product['price'])*100,2)}}% off)</span>
                        </div>
                       
                       
                        <div class="product_desc">
                           <p>{!!ucfirst($product['description']) !!}   </p>
                        </div>
                        @if($product['qty'] != 0)
                        <div class="product_variant quantity">
                           <!-- <label>quantity</label> -->
                           <!-- <input min="1" max="100" value="1" type="number"> -->
                           <a href="{{url('ajax/addtocart/'.$product['id'])}}" class="button cart btn-lg" role="button">Buy Now</a>
                           <a href="javascript:void(0)" class="cart" title="Add to cart" data-productid="{{$product['id']}}">Add to cart</a>
                           <!-- <a href="javascriptvoid(0)" class="cart" title="Add to cart" data-productid="{{$product['id']}}" data-url="product_details"> <button class="button" type="submit">add to cart</button></a> -->
                        </div>
                        <div class=" product_d_action">
                           <ul>
                              <li><a class="addtowishlist" href="javascript:void(0)" data-productid="{{$product['id']}}"  title="Add to wishlist">+ Add to Wishlist</a></li>
                           </ul>
                        </div>
                        @else
                        
                        <div class="price_box">
                           <span class="current_price">SOLD OUT</span><br><span> This item is currently out of stock</span>
                        </div>
                     
                        @endif
                        
                     </form>
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
                              <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews ({{count($product->productRating)}})</a>
                           </li>
                        </ul>
                     </div>
                     <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                           <div class="product_info_content">
                              {!!ucfirst($product['description']) !!}                                        
                           </div>
                        </div>
                        <div class="tab-pane fade" id="sheet" role="tabpanel">
                           <div class="product_d_table">
                              {!! $product['specification']!!} 
                           </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                           <div class="reviews_wrapper">
                              <!-- {{$product}} -->
                              @foreach($product->productRating  as  $value)
                              <!-- <h2>1 review for Donec eu furniture</h2> -->
                              <div class="reviews_comment_box">
                                 <div class="comment_thmb">
                                    @if($value->users->profile_image)
                                    <img src="{{url('public/profile/'.$value->users->profile_image)}}" alt="" width="100",height="100">
                                    @else
                                    <img src="{{url('public/front/img/comment2.jpg')}}" alt="">
                                    @endif
                                 </div>
                                 <div class="comment_text">
                                    <div class="reviews_meta">
                                       <div class="product_rating">
                                          <ul>
                                             <?php for ($i=1; $i <= 5; $i++) { 
                                                if($value->rating>=$i){
                                                ?>
                                             <li><a href="#"><i class="ion-android-star-outline text-warning"></i></a></li>
                                             <?php }else{ ?>
                                             <li><a href="#"><i class="ion-android-star-outline text-secondary"></i></a></li>
                                             <?php }}?>
                                          </ul>
                                       </div>
                                       <p><strong>{{$value->users->name}}  </strong>-&nbsp;{{date('M d,Y',strtotime($value->created_at))}}</p>
                                       <span>{{$value->review}}</span>
                                       <br><br>
                                       @if($value->comment)
                                       <p><strong>Shoppershawk </strong>-&nbsp;{{date('M d,Y',strtotime($value->updated_at))}}</p>
                                       {!! $value->comment !!}
                                       @endif
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                              <div class="comment_title">
                                 <h2>Add a review </h2>
                              </div>
                              <div class="product_rating mb-10">
                                 <h3>Your rating</h3>
                                 <!-- <ul>
                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                    </ul> -->
                              </div>
                              <div class="product_review_form">
                                 <form action="{{url('/user/createreview')}}" method="post">
                                    @csrf
                                    <div class="row">
                                       <div  class="col-12">
                                          <div class="stars">
                                             <input class="star star-5" id="star-5" type="radio" value="5" name="rating"/>
                                             <label class="star star-5" for="star-5"></label>
                                             <input class="star star-4" id="star-4" type="radio" value="4" name="rating" />
                                             <label class="star star-4" for="star-4"></label>
                                             <input class="star star-3" id="star-3" type="radio" value="3" name="rating" />
                                             <label class="star star-3" for="star-3"></label>
                                             <input class="star star-2" id="star-2" type="radio" value="2" name="rating" />
                                             <label class="star star-2" for="star-2"></label>
                                             <input class="star star-1" id="star-1" type="radio" value="1" name="rating" checked />
                                             <label class="star star-1" for="star-1"></label>
                                             <span class="text-danger">{{$errors->first('rating')}}</span>
                                          </div>
                                          <input type="hidden" name="product_id" value="{{$product['id']}}">
                                       </div>
                                       <div class="col-12">
                                          <label for="review_comment">Your review</label>
                                          <textarea name="review" id="review_comment" required></textarea>
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
                     <!-- <div class="label_product">
                        <span class="label_sale">Sale</span>
                     </div> -->
                     <div class="action_links">
                        <ul>
                           @if(isset($user))
                           @if(!empty($productdetails['wishlist']))
                           @foreach($productdetails['wishlist']  as $val)
                           <li class="wishlist">
                              @if($val['user_id'] == $user->id )
                              <a href="javascript:void(0)" class="addtowishlist" data-tippy-placement="top" data-productid="{{$productdetails['id']}}" data-tippy-arrow="true" data-tippy-inertia="true" ><i id="{{'productid_'.$productdetails['id']}}" class="ion-android-favorite"></i></a>
                              @else
                              <a href="javascript:void(0)" class="addtowishlist" data-tippy-placement="top" data-productid="{{$productdetails['id']}}" data-tippy-arrow="true" data-tippy-inertia="true" ><i id="{{'productid_'.$productdetails['id']}}" class="ion-android-favorite-outline"></i></a>
                              @endif
                           </li>
                           @endforeach
                           @else
                           <li class="wishlist">
                              <a href="javascript:void(0)" class="addtowishlist" data-tippy-placement="top" data-productid="{{$productdetails['id']}}" data-tippy-arrow="true" data-tippy-inertia="true" ><i id="{{'productid_'.$productdetails['id']}}" class="ion-android-favorite-outline"></i></a>
                           </li>
                           @endif
                           @else
                           <li class="wishlist">
                              <a href="javascript:void(0)" class="addtowishlist" data-tippy-placement="top" data-productid="{{$productdetails['id']}}" data-tippy-arrow="true" data-tippy-inertia="true" data-tippy="Add to Wishlist"><i id="{{'productid_'.$productdetails['id']}}" class="ion-android-favorite-outline"></i></a>
                           </li>
                           @endif
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
                        <h4 class="product_name"><a href="{{url('/product_details/'.$productdetails['slug'])}}">{{$productdetails['name']}}</a></h4>
                        <div class="price_box">
                           <span class="old_price">₹{{number_format($productdetails['price'],2)}}</span>
                           <span class="current_price">₹{{number_format($productdetails['selling_price'],2)}}</span>
                        </div>
                        <div class="price_box">
                            <span class="current_price">{{number_format((($productdetails['price']-$productdetails['selling_price'])/$productdetails['price'])*100,2)}}% off</span>
                        </div>
                     </div>
                     <div class="add_to_cart">
                        <a href="javascript:void(0)" class="cart" title="Add to cart" data-productid="{{$productdetails['id']}}">Add to cart</a>
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