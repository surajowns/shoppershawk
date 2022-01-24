@extends('front.master')
@section('title',is_numeric($_GET['cat'])?'Online Shopping site in India: Shop Online for Laptops,Tablets, Desktops, Monitors ,Accessories and More - Shoppershawk.com':(!empty(Session::get('keywords'))?'Shoppershawk.com :'.' '.Session::get('keywords'):ucfirst($_GET['cat']).': Buy New '.ucfirst($_GET['cat']).' Online at Best Prices in India | Buy '.ucfirst($_GET['cat']).' Online - Shoppershawk.com'))
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
        <aside class="sidebar_widget mob-none">
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
            <!-- <div class="widget_list widget_filter">
                <h3>Filter by price</h3> -->
                <?php $subcat=isset($_GET['subcat'])?'&subcat='.$_GET['subcat']:"";  ?>
             
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
        @if($singleaddbanner)
        <div class="shop_banner_area mb-30">
            <div class="row">
                <div class="col-12">
                    <div class="shop_banner_thumb">
                   <a href="{{$singleaddbanner['link']}}"><img id="singleadd" src="{{url('public/banner/'.$singleaddbanner['banner_image'])}}" alt=""></a>                    </div>
                </div>
            </div>
        </div>
        @endif
        <!--shop banner area end-->
        <!--shop toolbar start-->
        @if((count($product)))
        <div class="shop_toolbar_wrapper">
            <div class="shop_toolbar_btn">
                <button data-role="grid_4" type="button" class=" active btn-grid-4" data-toggle="tooltip" title="4"></button>
                <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip" title="List"></button>
            </div>

            <div class="niceselectoption">
                <?php $subcat=isset($_GET['subcat'])?'&subcat='.$_GET['subcat']:"";
                   if(Session::get('keywords')){
                      $subcat='&keywords='.Session::get('keywords'); 
                   }
                ?>
            {{ Form::open(array('url' => '/products/'.'?cat='.$_GET['cat'].$subcat)) }}

            <select name = "filterby" class="form-control w-auto selectpicker" data-style="btn-primary" onchange = "this.form.submit()"> 
                
                 <option value="">All</option>
                <option   value = "ASC">Low to High</option>
                <option   value = "DESC">High to Low</option>

            </select>
            
            {{ Form::close() }}
                </form>
            </div>
        </div>
        <!--shop toolbar end-->

        <!--shop wrapper start-->
        <div class="row no-gutters shop_wrapper">
        
           @foreach($product as $details)
            @if($details->status==1)
             <div class="col-lg-3 col-md-4 col-12 pl-2">
                <article class="single_product {{$details['qty']<=0?'not_in_stock':''}}">
                    <figure>
                        <div class="product_thumb">
                        @foreach($details->productImage as $key=>$image)
                              @if($key==0)
 
                                <a class="primary_img" href="{{url('/product_details/'.$details['slug'])}}" title="{{$details['name']}}" target="_blank"><img src="{{url('public/product_image/'.$image->image)}}" alt="{{$details['name']}}" title="{{$details['name']}}" /></a>
                               
                              @elseif($key==1)
                                    <a class="secondary_img" href="{{url('/product_details/'.$details['slug'])}}" title="{{$details['name']}}" target="_blank"><img src="{{url('public/product_image/'.$image->image)}}" alt="{{$details['name']}}" title="{{$details['name']}}"></a>
                            @endif
                         @endforeach                             
                          
                            <div class="action_links">
                            <ul>
                                    @if(isset($user))
                                        @if(count($details->wishlist)>0)
                                           @foreach($details->wishlist as $val)
                                           
                                                    <li class="wishlist">
                                                    @if($val['user_id'] == $user->id )
                                                        <a class="addtowishlist" href="javascript:void(0)"   data-productid="{{$details['id']}}" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" ><i id="{{'productid_'.$details['id']}}" class="ion-android-favorite"></i></a>
                                                        @else
                                                          <a class="addtowishlist" href="javascript:void(0)"   data-productid="{{$details['id']}}" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"><i id="{{'productid_'.$details['id']}}" class="ion-android-favorite-outline"></i></a>
                                                     @endif
                                                    </li>
                                            @endforeach
                                        @else
                                         <li class="wishlist">
                                            <a class="addtowishlist" href="javascript:void(0)"    data-productid="{{$details['id']}}" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" ><i id="{{'productid_'.$details['id']}}" class="ion-android-favorite-outline"></i></a>
                                         </li>
                                       @endif
                                    @else
                                       <li class="wishlist">
                                            <a class="addtowishlist" href="javascript:void(0)"   data-productid="{{$details['id']}}" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"><i id="{{'productid_'.$details['id']}}" class="ion-android-favorite-outline"></i></a>
                                         </li>
                                    @endif
                                        <li class="compare">
                                        </li>
                                        <li class="quick_button">
                                          
                                        </li>
                                    </ul>
                            </div>
                        </div>

                        <div class="product_content grid_content">
                            <div class="product_content_inner">
                                <h4 class="product_name"><a href="{{url('/product_details/'.$details['slug'])}}" title="{{$details['name']}}" target="_blank">{{ucfirst($details['name'])}}</a></h4>
                                <div class="product_rating">
                                    <ul>
                                    
                                    <?php  $avgrating = 0; ?>
                                             @if(count($details->productRating)>0)
                                                      @foreach($details->productRating as $avg_rating) 
                                                           <?php  $avgrating= $avgrating + $avg_rating['rating']/count($details->productRating) ?>
                                                      @endforeach
                                                    <li>
                                                        <a href="#">{{number_format($avgrating,1)}}<i class="ion-android-star"></i></a>
                                                    </li>
                                                    
                                                @endif
                                    </ul>
                                </div>
                                <div class="price_box">
                                    <span class="old_price">₹{{number_format($details['price'],2)}}</span>
                                    <span class="current_price">₹{{number_format($details['selling_price'],2)}}</span>
                                </div>
                                <div class="price_box">
                                        <span class="current_price">{{number_format((($details['price']-$details['selling_price'])/$details['price'])*100,2)}}% off</span>
                                    </div>
                            </div>
                            @if($details['qty'] > 0)
                            <div class="add_to_cart">
                              <a href="javascript:void(0)" class="cart" title="Add to cart" data-productid="{{$details['id']}}">Add to cart</a>
                            </div>
                            @endif
                        </div>
                        <div class="product_content list_content">
                            <h4 class="product_name"><a href="{{url('/product_details/'.$details['slug'])}}" title="{{$details['name']}}" target="_blank">{{ucfirst($details['name'])}}</a></h4>
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
                            @if($details['qty']>0)
                            <div class="add_to_cart">
                            <a href="javascript:void(0)" class="cart" title="Add to cart" data-productid="{{$details['id']}}">Add to cart</a>
                            </div>
                            @endif
                            <div class="action_links">
                            <ul>
                                    @if(isset($user))
                                        @if(count($details->wishlist)>0)
                                           @foreach($details->wishlist as $val)
                                           
                                                    <li class="wishlist">
                                                    @if($val['user_id'] == $user->id )
                                                        <a class="addtowishlist" href="javascript:void(0)"   data-productid="{{$details['id']}}" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" ><i id="{{'productid_'.$details['id']}}" class="ion-android-favorite"></i></a>
                                                        @else
                                                          <a class="addtowishlist" href="javascript:void(0)"   data-productid="{{$details['id']}}" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"><i id="{{'productid_'.$details['id']}}" class="ion-android-favorite-outline"></i></a>
                                                     @endif
                                                    </li>
                                            @endforeach
                                        @else
                                         <li class="wishlist">
                                            <a class="addtowishlist" href="javascript:void(0)"    data-productid="{{$details['id']}}" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" ><i id="{{'productid_'.$details['id']}}" class="ion-android-favorite-outline"></i></a>
                                         </li>
                                       @endif
                                    @else
                                       <li class="wishlist">
                                            <a class="addtowishlist" href="javascript:void(0)"   data-productid="{{$details['id']}}" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true"><i id="{{'productid_'.$details['id']}}" class="ion-android-favorite-outline"></i></a>
                                         </li>
                                    @endif
                                        <li class="compare">
                                        </li>
                                        <li class="quick_button">
                                           
                                        </li>
                                    </ul>
                            </div>
                        </div>
                    </figure>
                    @if($details['qty'] <= 0)
                                 <div class="outofstock"><p class="sold-label">Sold Out</p></div>
                        @endif
                </article>
             </div>
             @endif
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
