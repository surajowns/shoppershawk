<?php
  $user=Auth::user();
  $lastview=array();
  $lastview=Session::get('last');
  $product=App\Product::with(['productImage','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('status',1)->whereIn('id',isset($lastview)?$lastview:explode(',',$lastview))->get()->toArray();
?>
@if(!empty($product))
<div class="product_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_header">
                    <div class="section_title">
                        <h2>Recently Viewed</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">

                <div class="product_carousel product_style product_column5 owl-carousel">
             
                @foreach($product as $productdetails)
                
               
                <div class="product_items">

                        <article class="single_product {{$productdetails['qty']<=0?'not_in_stock':''}}">
                            <figure >
                                <div class="product_thumb">
                                @if(!empty($productdetails['product_image']))
                                <a class="primary_img" href="{{url('/product_details/'.$productdetails['slug'])}}"><img src="{{url('public/product_image/'.$productdetails['product_image'][0]['image'])}}" alt="" /></a>
                                <!-- <a class="secondary_img" href="#"><img src="{{url('public/product_image/'.$productdetails['product_image'][0]['image'])}}" alt="" /></a> -->
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
                                        <h4 class="product_name"><a href="{{url('/product_details/'.$productdetails['slug'])}}">{{ucfirst($productdetails['name'])}}</a></h4>
                                        <div class="price_box">
                                            <span class="old_price">₹{{number_format($productdetails['price'],2)}}</span>
                                            <span class="current_price">₹{{number_format($productdetails['selling_price'],2)}}</span>
                                        </div>
                                        <div class="price_box">
                                        <span class="current_price">{{number_format((($productdetails['price']-$productdetails['selling_price'])/$productdetails['price'])*100,2)}}% off</span>
                                    </div>
                                    </div>
                                    @if($productdetails['qty'] > 0)
                                    <div class="add_to_cart">
                                       <a href="javascript:void(0)" class="cart" title="Add to cart" data-productid="{{$productdetails['id']}}">Add to cart</a>
                                    </div>
                                    @else
                                   @endif
                                </div>
                            </figure>
                              @if($productdetails['qty'] <= 0)
                                      <div class="outofstock"><p class="sold-label">Sold Out</p></div>
                              @endif
                        </article>
                      
                    </div>
                  @endforeach
                </div>
        </div>
        
    </div>
</div>
@endif
<!--modal start-->

<!--end modal-->