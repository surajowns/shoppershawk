<div class="home_section_bg">
    <!--Categories product area start-->
    <div class="categories_product_area mb-55">
        <div class="container">
            <div class="categories_product_inner">
                @foreach($categories as $cat)
                    <div class="single_categories_product">
                        <div class="categories_product_content">
                            <h4>
                                <a href="{{url('/products/'.'?cat='.$cat['slug'])}}">{{$cat['name']}}</a>
                            </h4>
                            <p>
                                <?php  $products=App\Product::where('supercategory_id', $cat['id'])->get()->count(); echo $products;?>
                                &nbsp;&nbsp;Deals
                            </p>
                        </div>
                        <div class="categories_product_thumb">
                            <a href="{{url('/products/'.'?cat='.$cat['slug'])}}">
                                <img src="{{url('public/category/'.$cat['image'])}}" alt="{{$cat['name']}}" />
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--Categories product area end-->

    <!-- deals of the month product area start-->
    <div class="product_area deals_product">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_header">
                        <div class="section_title">
                            <h2>Deals Of The Month</h2>
                        </div>
                        <div class="product_tab_btn deals_of_the_month">
                            <ul class="nav" role="tablist" id="nav-tab">
                              @foreach($dealsOfTheMonth as $category)
                                <li>
                                    <a  data-toggle="tab" href="#deals{{$category['slug']}}" role="tab" aria-controls="deals{{$category['slug']}}" aria-selected="false">
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
            @foreach($dealsOfTheMonth as $category)
                <div class="tab-pane fade dealsofthemonth" id="deals{{$category['slug']}}" role="tabpanel">
                    <div class="product_carousel product_style product_column5 owl-carousel">
                    @foreach($product as $productdetails)
                        @if($category['id']==$productdetails['supercategory_id'])
                        <article class="single_product {{$productdetails['qty']<=0?'not_in_stock':''}}"  >
                            <figure>
                                <div class="product_thumb">

                                    @if($productdetails['productImage'])
                                        <img class="primary_img" src="{{url('public/product_image/'.$productdetails['productImage'][0]['image'])}}" title="{{$productdetails['name']}}" alt="{{$productdetails['name']}}" />
                                        @if($productdetails['productImage'][0])
                                            <a class="secondary_img" href="{{url('/product_details/'.$productdetails['slug'])}}" target="_blank">
                                                <img src="{{url('public/product_image/'.$productdetails['productImage'][1]['image'])}}" title="{{$productdetails['name']}}" alt="{{$productdetails['name']}}" />
                                            </a>
                                        @endif
                                    @endif

                                    <div class="action_links">
                                        <ul>
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
                                        <h4 class="product_name">{{ucfirst($productdetails['name'])}}</h4>
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
                                        <a href="javascript:void(0)" class="cart" title="Add to cart" data-productid="{{$productdetails['id']}}" >Add to cart</a>
                                    </div>
                                    @endif
                                </div>
                            </figure>
                            @if($productdetails['qty'] < 1)
                                <div class="outofstock"><p class="sold-label">Sold Out</p></div>
                            @endif
                        </article>
                        @endif
                        @endforeach 
                      </div>
                  </div>
              @endforeach
            </div>
        </div>
    </div>
    <!--deals of the month product area end-->

    <!--banner area start-->
    <!--double ads start-->
    <div class="banner_area mb-55">
        <div class="container">
            <div class="row">
                @foreach($doublebanner as $banner)
                <div class="col-lg-6 col-md-6">
                    <figure class="single_banner">
                        <div class="banner_thumb">
                            <a href="{{$banner['link']}}"><img class="flip-box-img"
                                src="{{asset('public/banner/'.$banner->banner_image)}}" alt="{{$banner['title']}}" />
                            </a>
                        </div>
                    </figure>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--end double ads start-->
    <!--banner area end-->

    <!--featured product start-->
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
                                @foreach($feathureProductCat as $category)
                                    <li>
                                        <a data-toggle="tab" href="#feature{{$category['slug']}}" role="tab"
                                            aria-controls="feature{{$category['slug']}}" aria-selected="false">
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
                @foreach($feathureProductCat as $category)
                <div class="tab-pane fade featuredproduct" id="feature{{$category['slug']}}" role="tabpanel">
                    <div class="product_carousel product_style product_column5 owl-carousel">
    
                        @foreach($feathureProduct as $productdetails)
                            @if($category['id']==$productdetails['supercategory_id'])
                                <div class="product_items">
    
                                    <article class="single_product {{$productdetails['qty']<=0?'not_in_stock':''}}">
                                        <figure>
                                            <div class="product_thumb">
                                                @if($productdetails['productImage'])
                                                    <img class="primary_img"
                                                        src="{{asset('public/product_image/'.$productdetails['productImage'][0]['image'])}}"
                                                        title="{{$productdetails['name']}}" alt="{{$productdetails['name']}}" />
                                                    @if($productdetails['productImage'][0])
                                                        <a class="secondary_img" href="{{url('/product_details/'.$productdetails['slug'])}}" target="_blank">
                                                            <img src="{{asset('public/product_image/'.$productdetails['productImage'][1]['image'])}}"
                                                                title="{{$productdetails['name']}}" alt="{{$productdetails['name']}}" />
                                                        </a>
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
                                                        <span
                                                            class="old_price">₹{{number_format($productdetails['price'],2)}}</span>
                                                        <span
                                                            class="current_price">₹{{number_format($productdetails['selling_price'],2)}}</span>
                                                    </div>
                                                    <div class="price_box">
                                                        <span
                                                            class="current_price">{{number_format((($productdetails['price']-$productdetails['selling_price'])/$productdetails['price'])*100,2)}}%
                                                            off
                                                        </span>
                                                    </div>
                                                </div>
    
                                                @if($productdetails['qty'] > 0)
                                                    <div class="add_to_cart">
                                                        <a href="javascript:void(0)" class="cart" title="Add to cart" data-productid="{{$productdetails['id']}}">
                                                            Add to cart
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </figure>
    
                                        @if($productdetails['qty'] <= 0) 
                                            <div class="outofstock">
                                                <p class="sold-label">Sold Out</p>
                                            </div>
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
    <!--end featured product-->


    <!-- best sellingproduct area start-->
    @include('front.common.bestselling')

    <!--best selling product area end-->

    <!-- new arrival product area start-->
    @include('front.common.newarrival')

    <!--new arrival  product area end-->

    <!--triple ads banner area start-->
    @include('front.common.tripleads')

    <!--triple ads banner area end-->

    <!-- categories  product area start-->
    {{-- <!-- @include('front.common.single_banner') --> --}}

    <!-- categories product area end-->

    <!-- <button class="add-button">Add Shoppers Hawk to Home screen</button> -->
</div>
