<?php
  $user=Auth::user();
  $product=App\Product::with(['productImage','wishlist'=>function($query) use ($user){$query->select('*')->where('user_id',isset($user)?$user->id:'');}])->where('type',2)->where('status',1)->where('qty','!=',0)->orderBy('qty','DESC')->get()->toArray();
  $cate=array();
  foreach($product as $productdetails){
       $cate[]=$productdetails['supercategory_id'];
    
  }
  $categories=App\CategoryModel::whereIn('id',$cate)->get();

?>
<div class="product_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_header">
                    <div class="section_title">
                        <h2>Featured Products</h2>
                    </div>
                    <div class="product_tab_btn  featured_product">
                        <ul class="nav" role="tablist" id="nav-tab2">
                           
                        @foreach($categories as $category)
                            <li>
                                <a  data-toggle="tab" href="#feature{{$category['slug']}}" role="tab" aria-controls="feature{{$category['slug']}}" aria-selected="false">
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
            <div class="tab-pane fade featuredproduct" id="feature{{$category['slug']}}" role="tabpanel">
                <div class="product_carousel product_style product_column5 owl-carousel">
             
                @foreach($product as $productdetails)
                
                @if($category['id']==$productdetails['supercategory_id'])
               
                <div class="product_items">

                        <article class="single_product {{$productdetails['qty']<=0?'not_in_stock':''}}" >
                            <figure >
                                <div class="product_thumb">
                                @if(!empty($productdetails['product_image']))
                                <img class="primary_img" src="{{url('public/product_image/'.$productdetails['product_image'][0]['image'])}}" title="{{$productdetails['name']}}" alt="{{$productdetails['name']}}" />
                                @if(array_key_exists(1,$productdetails['product_image']))
                                     <a class="secondary_img" href="{{url('/product_details/'.$productdetails['slug'])}}" target="_blank"><img src="{{url('public/product_image/'.$productdetails['product_image'][1]['image'])}}" title="{{$productdetails['name']}}" alt="{{$productdetails['name']}}" /></a>
                                   @endif
                                  @endif                                   
                                  
                                    <div class="action_links">
                                    <ul>
                                        <li class="compare">
                                        </li>
                                        <li class="quick_button">
                                          
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="product_content">
                                    <div class="product_content_inner">
                                        <h4 class="product_name">{{ucfirst($productdetails['name'])}}</h4>
                                        <div class="price_box">
                                            <span class="old_price">???{{number_format($productdetails['price'],2)}}</span>
                                            <span class="current_price">???{{number_format($productdetails['selling_price'],2)}}</span>
                                        </div>
                                        <div class="price_box">
                                        <span class="current_price">{{number_format((($productdetails['price']-$productdetails['selling_price'])/$productdetails['price'])*100,2)}}% off</span>
                                    </div>
                                    </div>
                                    @if($productdetails['qty'] > 0)
                                     <div class="add_to_cart">
                                        <a href="javascript:void(0)" class="cart" title="Add to cart" data-productid="{{$productdetails['id']}}" >Add to cart</a>
                                     </div>
                                @endif
                                </div>
                            </figure>
                            @if($productdetails['qty'] <= 0)
                                 <div class="outofstock"><p class="sold-label">Sold Out</p></div>
                        @endif
                        </article>
                      
                      
                    </div>
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