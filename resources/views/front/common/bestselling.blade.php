<?php
  $product=App\Product::with('productImage','wishlist','productRating')->where('type',3)->where('status',1)->orderBy('qty','DESC')->get()->toArray();
//   dd($product);
  $cate=array();
  foreach($product as $productdetails){
       $cate[]=$productdetails['supercategory_id'];
    
  }
  $categories=App\CategoryModel::whereIn('id',$cate)->get();
$avgrating=0;
?>
<div class="small_product_area mb-55">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="product_header">
                                <div class="section_title">
                                    <h2>Best Selling Products</h2>
                                </div>
                                <div class="product_tab_btn best_selling_product">
                                    <ul class="nav" role="tablist" id="nav-tab3">
                                    @foreach($categories as $category)
                                    <li>
                                        <a  data-toggle="tab" href="#best{{$category['slug']}}" role="tab" aria-controls="best{{$category['slug']}}" aria-selected="false">
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
                        <div class="tab-pane fade bestsellingproduct" id="best{{$category['slug']}}" role="tabpanel">
                            <div class="product_carousel small_p_container small_product_column3 owl-carousel">
                     @foreach($product as $productdetails)
                         @if($category['id']==$productdetails['supercategory_id'])
                            <div class="product_items {{$productdetails['qty'] <= 0?'not_in_stock':''}}">
                                    <figure class="single_product ">
                                        <div class="product_thumb">
                                        @if(!empty($productdetails['product_image']))
                                           <a class="primary_img" href="{{url('/product_details/'.$productdetails['slug'])}}"><img class="best-selling" src="{{url('public/product_image/'.$productdetails['product_image'][0]['image'])}}" alt="" /></a>
                                      @endif 
  
                                        </div>
                                        <div class="product_content">
                                            <h4 class="product_name"><a href="{{url('/product_details/'.$productdetails['slug'])}}">{{ucfirst($productdetails['name'])}}</a></h4>
                                            <div class="product_rating">
                                                <ul>
                                                @if(!empty($productdetails['product_rating']))
                                                      @foreach($productdetails['product_rating'] as $avg_rating) 
                                                           <?php  $avgrating= $avgrating + $avg_rating['rating']/count($productdetails['product_rating']) ?>
                                                      @endforeach
                                                    <li>
                                                        <a href="#">{{number_format($avgrating,1)}}<i class="ion-android-star-outline"></i></a>
                                                    </li>
                                                    
                                                @endif
                                                    
                                                </ul>
                                            </div>
                                            <div class="price_box">
                                                <span class="old_price">₹{{number_format($productdetails['price'],2)}}</span>
                                                <span class="current_price">₹{{number_format($productdetails['selling_price'],2)}}</span>
                                            </div>
                                            <div class="price_box">
                                        <span class="current_price">{{number_format((($productdetails['price']-$productdetails['selling_price'])/$productdetails['price'])*100,2)}}% off</span>
                                    </div>
                                            @if($productdetails['qty'] > 0)
                                            <div class="product_cart_button">
                                                <a href="javascript:void(0)" class="cart" title="Add to cart" data-productid="{{$productdetails['id']}}"><i class="fa fa-shopping-bag"></i></a>
                                            </div>
                                            @else
                                            @endif

                                        </div>
                                    </figure>
                                    @if($productdetails['qty'] <= 0)
                                      <div class="outofstock"><p class="sold-label">Sold Out</p></div>
                                  @endif
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