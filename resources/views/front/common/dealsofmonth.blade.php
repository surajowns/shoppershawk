<?php
  $product=App\Product::with('productImage')->where('type',1)->where('status',1)->get()->toArray();
  $cate=array();
  foreach($product as $productdetails){
       $cate[]=$productdetails['supercategory_id'];
    
  }
  $categories=App\CategoryModel::whereIn('id',$cate)->get();
  //die;
?>
<div class="product_area deals_product">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_header">
                    <div class="section_title">
                        <h2>Deals Of The Month</h2>
                    </div>
                    <div class="product_tab_btn">
                        <ul class="nav" role="tablist" id="nav-tab">
                          @foreach($categories as $category)
                            <li>
                                <a  data-toggle="tab" href="#{{$category['slug']}}" role="tab" aria-controls="{{$category['slug']}}" aria-selected="false">
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
            <div class="tab-pane fade" id="{{$category['slug']}}" role="tabpanel">
                <div class="product_carousel product_style product_column5 owl-carousel">
                @foreach($product as $productdetails)
                   @if($category['id']==$productdetails['supercategory_id'])
                    <article class="single_product">
                        <figure>
                            <div class="product_thumb">
                                <a class="primary_img" href="#"><img src="{{url('public/product_image/'.$productdetails['product_image'][0]['image'])}}" alt="" /></a>
                                <a class="secondary_img" href="#"><img src="{{url('public/product_image/'.$productdetails['product_image'][0]['image'])}}" alt="" /></a>
                                <div class="label_product">
                                    <span class="label_sale">Sale</span>
                                </div>
                                <div class="action_links">
                                    <ul>
                                        <li class="wishlist">
                                            <a href="wishlist.html" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-tippy="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                        </li>
                                        <li class="compare">
                                            <a href="#" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-tippy="Add to Compare"><i class="ion-ios-settings-strong"></i></a>
                                        </li>
                                        <li class="quick_button">
                                            <a href="#" data-tippy-placement="top" data-tippy-arrow="true" data-tippy-inertia="true" data-bs-toggle="modal" data-bs-target="#modal_box" data-tippy="quick view">
                                                <i class="ion-ios-search-strong"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_content">
                                <div class="product_content_inner">
                                    <h4 class="product_name"><a href="product-countdown.html">{{$productdetails['name']}}</a></h4>
                                    <div class="price_box">
                                        <span class="old_price">₹{{$productdetails['price']}}</span>
                                        <span class="current_price">₹{{$productdetails['selling_price']}}</span>
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
<div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal_body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12">
                            <div class="modal_tab">
                                <div class="tab-content product-details-large">
                                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="front/img/product/productbig2.jpg" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab2" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="front/img/product/productbig3.jpg" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab3" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="front/img/product/productbig4.jpg" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab4" role="tabpanel">
                                        <div class="modal_tab_img">
                                            <a href="#"><img src="front/img/product/productbig5.jpg" alt="" /></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal_tab_button">
                                    <ul class="nav product_navactive owl-carousel" role="tablist">
                                        <li>
                                            <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="front/img/product/product1.jpg" alt="" /></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false"><img src="front/img/product/product6.jpg" alt="" /></a>
                                        </li>
                                        <li>
                                            <a class="nav-link button_three" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false"><img src="front/img/product/product9.jpg" alt="" /></a>
                                        </li>
                                        <li>
                                            <a class="nav-link" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false"><img src="front/img/product/product14.jpg" alt="" /></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12">
                            <div class="modal_right">
                                <div class="modal_title mb-10">
                                    <h2>Sit voluptatem rhoncus sem lectus</h2>
                                </div>
                                <div class="modal_price mb-10">
                                    <span class="new_price">₹64.99</span>
                                    <span class="old_price">₹78.99</span>
                                </div>
                                <div class="modal_description mb-15">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam, reiciendis
                                        maiores quidem aperiam, rerum vel recusandae
                                    </p>
                                </div>
                                <div class="variants_selects">
                                    <div class="variants_size">
                                        <h2>size</h2>
                                        <select class="select_option">
                                            <option selected value="1">s</option>
                                            <option value="1">m</option>
                                            <option value="1">l</option>
                                            <option value="1">xl</option>
                                            <option value="1">xxl</option>
                                        </select>
                                    </div>
                                    <div class="variants_color">
                                        <h2>color</h2>
                                        <select class="select_option">
                                            <option selected value="1">purple</option>
                                            <option value="1">violet</option>
                                            <option value="1">black</option>
                                            <option value="1">pink</option>
                                            <option value="1">orange</option>
                                        </select>
                                    </div>
                                    <div class="modal_add_to_cart">
                                        <form action="#">
                                            <input min="1" max="100" step="2" value="1" type="number" />
                                            <button type="submit">add to cart</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal_social">
                                    <h2>Share this product</h2>
                                    <ul>
                                        <li class="facebook">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li class="twitter">
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li class="pinterest">
                                            <a href="#"><i class="fa fa-pinterest"></i></a>
                                        </li>
                                        <li class="google-plus">
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                        </li>
                                        <li class="linkedin">
                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--end modal-->
@section('javascript')
<script>
 $(document).ready(function(){
    $(".product_tab_btn li:first a").addClass("active");
    $('.product_tab_btn li:first a').attr('aria-selected', true);
    $('.tab-pane').first().addClass('active show');
 })
</script>
@stop