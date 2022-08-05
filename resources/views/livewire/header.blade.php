<div>
    <div class="header_top">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-5">
                <div class="Besthawk_message">
                    <p>Get free shipping – In All Over in India</p>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="header_top_settings text-right">
                    <ul>
                        <li><a href="{{url('/user/account')}}">Track Your Order</a></li>
                        <li>Hotline: <a href="tel:+919711600187">+91-971-160-0187</a></li>
                        <li><a href="mailto:care@shoppershawk.com;">care@shoppershawk.com</a></li>
                        @if(!Auth::check())
                            <li><a href="{{url('/login')}}">Login|Register</a></li>
                            {{-- <!-- <li><a href="{{url('/register')}}">Register</a></li> --> --}}
                        @else
                        <li><a href="{{url('user/account')}}">Hi {{Auth::user()->name}}</a></li>
                        <li><a href="{{url('/user/logout')}}">Logout</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header_middle sticky-header">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-3 col-4">
                <div class="logo">
                    <a href="{{url('/')}}" title="shoppers hawk">
                        <img id="logoid" src="{{url('public/front/img/logo/logo.png')}}" alt="shoppers hawk" />
                    </a>
                </div>
            </div>
            <div class="col-lg-7 col-md-12">
                 <div class="main_menu menu_position text-center">
                <nav>
                    <ul>
                    @foreach($categories as $cat)
                            <li>
                                <a class="active" href="{{url('/products/'.'?cat='.$cat['slug'])}}">
                                <img src="{{url('public/category/'.$cat['image'])}}" alt="{{$cat['name']}}" width='50'>
                                <br>
                                {{$cat['name']}}</a>
                            </li>
                           @endforeach 
                    </ul>
                </nav>
            </div> 
            </div>
            <div class="col-lg-3 col-md-7 col-6">
                <div class="header_configure_area">
                    <div class="header_wishlist">
                        <a href="{{url('/user/wishlist_details')}}">
                            <i class="ion-android-favorite-outline"></i>
                            <span class="wishlist_count">{{$wishlist}}</span>
                        </a>
                    </div>
                    <!-- class="{{Request::segment(2)=='cart_details'?'cartmodaldisplay':''}}" -->
                    <div class="mini_cart_wrapper">
                        <a href="javascript:void(0)">
                            <i class="fa fa-shopping-bag carttdetails"></i>
                            <span class="cart_price">@if(Auth::check())₹{{number_format($subtotal,2)}} @else ₹{{number_format(Cart::getSubTotal(),2)}} @endif<i class="ion-ios-arrow-down"></i></span>
                            <span class="cart_count">@if(Auth::check()){{$totalincart}}@else{{Cart::getContent()->count()}}@endif</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header middel end-->
    
    <!--mini cart-->
    <div class="mini_cart">
        <div class="cart_close">
            <div class="cart_text">
                <h3>cart</h3>
            </div>
            <div class="mini_cart_close">
                <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
            </div>
        </div>
         
        @if(Auth::check())
        
        @foreach($cartdetails as $details)
        <div class="cart_item">
            <div class="cart_img">
                <a href="{{url('/product_details/'.$details['products'][0]['slug'])}}"><img src="{{url('public/product_image/',$details['products']['0']['product_image'][0]['image'])}}" alt="{{$details['products'][0]['slug']}}" /></a>
            </div>
            <div class="cart_info">
                <a href="{{url('/product_details/'.$details['products'][0]['slug'])}}">{{$details['products'][0]['name']}}</a>
                <p>Qty: {{$details['quantity']}} X <span> ₹{{number_format($details['price'],2)}} </span></p>
            </div>
            <div class="cart_remove">
                <a href="javascript:void(0)" class="removecart" data-productid="{{$details['product_id']}}"><i class="ion-android-close"></i></a>
            </div>
        </div>
        @endforeach
        @else
        @foreach($cartdetails as $cart)
        <div class="cart_item">
            <div class="cart_img">
                <a href="{{url('/product_details/'.$cart['attributes']['slug'])}}"><img src="{{url('public/product_image/',$cart['attributes']['image'])}}" alt="{{$cart['attributes']['slug']}}" /></a>
            </div>
            <div class="cart_info">
                <a href="{{url('/product_details/'.$cart['attributes']['slug'])}}">{{$cart['name']}}</a>
                <p>Qty: {{$cart['quantity']}} X <span> ₹{{number_format($cart['price'],2)}} </span></p>
            </div>
            <div class="cart_remove">
                <a href="javascript:void(0)" class="removecart" data-productid="{{$cart['id']}}"><i class="ion-android-close"></i></a>
            </div>
        </div>
        @endforeach
       @endif
       @if(!empty($cartdetails))
        <div class="mini_cart_table">
            <div class="cart_total">
                <span>Sub total:</span>
                <span class="price">@if(Auth::check())₹{{number_format($subtotal,2)}}@else₹{{number_format(Cart::getSubTotal(),2)}}@endif</span>
            </div>
            <div class="cart_total mt-10">
                <span>total:</span>
                <span class="price">@if(Auth::check())₹{{number_format($subtotal,2)}} @else ₹{{number_format(Cart::getTotal(),2)}} @endif</span>
            </div>
        </div>
        <div class="mini_cart_footer">
            <div class="cart_button">
                <a href="{{url('user/cart_details')}}">View cart</a>
            </div>
           
        </div>
        @else
          <p class="no_products text-center">No products in the cart</p>
        @endif
    </div>
    <!--mini cart end-->
    <div class="header_bottom">
        <div class="row align-items-center">
            <div class="column1 col-lg-3 col-md-6">
                <div class="categories_menu categories_three">
                    <div class="categories_title">
                        <h2 class="categori_toggle">ALL CATEGORIES</h2>
                    </div>
                    <div class="categories_menu_toggle" style="display: none;">
                        <ul>
                            @foreach($categories as $cat)
                            <li class="menu_item_children">
                                <a href="{{url('/products/'.'?cat='.$cat['slug'])}}">{{$cat['name']}} <i
                                        class="fa fa-angle-right"></i></a>
                                <ul class="categories_mega_menu">
                                    @foreach($subcategories as $subcat)
                                    @if($cat['id']==$subcat['parent_id'])
                                    <li class="menu_item_children">
                                        <a
                                            href="{{url('/products/'.'?cat='.$cat['slug'].'&subcat='.$subcat['slug'])}}">{{$subcat['name']}}</a>
    
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
    
                        </ul>
                    </div>
                </div>
            </div>
            <div class="column2 col-lg-6">
                <!-- desktop search -->
                <div class="search_container">
                    <form action="{{url('/products/'.'?cat=')}}" method="get" autocomplete="off">
                        <div class="hover_category ">
                            <select class="selectoption" name="cat" id="categor">
                                <option selected value="">All Categories</option>
                                @foreach($categories as $catonly)
                                <option value="{{$catonly['slug']}}">{{$catonly['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="search_box">
                            <input placeholder="Search product..." name="keywords"
                                value="{{isset($_GET['keywords'])?$_GET['keywords']:(isset($_GET['cat'])?(is_numeric($_GET['cat'])?'':$_GET['cat']):'')}}"
                                type="text" class="sample_search" required />
                            <button type="submit">Search</button>
                        </div>
    
                    </form>
                    <ul class="list_details" id="list"></ul>
                </div>
            </div>
            <div class="column3 col-lg-3 col-md-6">
                <a href="https://shoppershawk.com/products?cat=laptop">
                    <div class="header_bigsale">
                        <div class="btn-my">
                            New Arrivals !!!
                            <div class="btn2-my"></div>
                        </div>
                    </div>
                </a>
            </div>
    
        </div>
        <!-- mobile serch -->
        <div class="row">
            <div class="col-md-12">
                <div class="search_container-1">
                    <form action="{{url('/products/'.'?cat=')}}" method="get" autocomplete="off">
                        @csrf
                        <div class="hover_category ">
                            <select class="selectoption" name="cat" id="categor">
                                <option selected value="">All Categories</option>
                                @foreach($categories as $catonly)
                                <option value="{{$catonly['id']}}">{{$catonly['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="search_box">
                            <input placeholder="Search product..." name="keywords" type="text"
                                value="{{isset($_GET['keywords'])?$_GET['keywords']:(isset($_GET['cat'])?(is_numeric($_GET['cat'])?'':$_GET['cat']):'')}}"
                                class="sample_search" required />
                            <button type="submit">Search</button>
                        </div>
    
                    </form>
                    <ul class="list_details"></ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /mobile bottom nav -->
    <div class="bottom-nav1">
        <nav class="nav-mob1">
            <a class="nav-item1" href="{{url('/')}}">
                <div class="{{Request::segment(2)==''?'myclass':''}}">
                    <i class="fa fa-home " aria-hidden="true"></i><span
                        class="{{Request::segment(2)==''?'myclassspan':'myclassshide'}}">Home</span>
                </div>
            </a>
    
            <a class="nav-item1" href="{{url('/product/category')}}">
                <div class="{{Request::segment(2)=='category'?'myclass':''}}">
                    <i class="fa fa-archive " aria-hidden="true"></i><span
                        class="{{Request::segment(2)=='category'?'myclassspan':'myclassshide'}}">Category</span>
                </div>
            </a>
    
            <a class="nav-item1" href="{{url('user/cart_details')}}">
                <div class="{{Request::segment(2)=='cart_details'?'myclass':''}}">
                    <i class="fa fa-shopping-cart  " aria-hidden="true"></i><span
                        class="{{Request::segment(2)=='cart_details'?'myclassspan':'myclassshide'}}">Cart</span>
                </div>
            </a>
    
            <a class="nav-item1" href="{{url('user/account')}}">
                <div class="{{Request::segment(2)=='account'?'myclass':''}}">
                    <i class="fa fa-user " aria-hidden="true"></i><span
                        class="{{Request::segment(2)=='account'?'myclassspan':'myclassshide'}}">Profile</span>
                </div>
            </a>
        </nav>
    </div>
</div>
