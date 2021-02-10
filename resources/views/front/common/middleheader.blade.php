<?php 
  
    $cartdetails=Cart::getContent()->toArray(); 
    // print_r($cartdetails);

?>
<div class="header_middle sticky-header">
    <div class="row align-items-center">
        <div class="col-lg-2 col-md-3 col-4">
            <div class="logo">
                <a href="{{url('/')}}"><img src="{{url('public/front/img/logo/logo.png')}}" alt="logo" /></a>
            </div>
        </div>
        <div class="col-lg-7 col-md-12">
        @include('message')
            <!-- <div class="main_menu menu_position text-center">
            <nav>
                <ul>
                    <li><a class="active" href="#">Computers<i class="fa fa-angle-down"></i></a>
                        <ul class="sub_menu">
                            <li><a href="#">Tab 1</a></li>
                            <li><a href="#">Tab 2</a></li>
                            <li><a href="#">Tab 3</a></li>
                            <li><a href="#">Tab 4</a></li>
                            <li><a href="#">Tab 5</a></li>
                            <li><a href="#">Tab 6</a></li>
                            <li><a href="#">Tab 7</a></li>
                        </ul>
                    </li>
                    <li class="mega_items"><a href="#">Health & Personal Care<i class="fa fa-angle-down"></i></a>
                        <div class="mega_menu">
                            <ul class="mega_menu_inner">
                                <li><a href="#">Shop Layouts</a>
                                    <ul>
                                        <li><a href="#">Full Width</a></li>
                                        <li><a href="#">Full Width list</a></li>
                                        <li><a href="#">Right Sidebar </a></li>
                                        <li><a href="#"> Right Sidebar list</a></li>
                                        <li><a href="#">List View</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">other Pages</a>
                                    <ul>
                                        <li><a href="#">cart</a></li>
                                        <li><a href="#">Wishlist</a></li>
                                        <li><a href="#">Checkout</a></li>
                                        <li><a href="#">my account</a></li>
                                        <li><a href="#">Error 404</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Product Types</a>
                                    <ul>
                                        <li><a href="#">product details</a></li>
                                        <li><a href="#">product sidebar</a></li>
                                        <li><a href="#">product grouped</a></li>
                                        <li><a href="#">product variable</a></li>
                                        <li><a href="#">product countdown</a></li>
                                    </ul>
                                </li>
                            </ul>
                                <li><a href="#">Electronics & Appliances</a></li>
                                <li><a href="#">Telecom & Mobility</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
        </div> -->
        </div>
        <div class="col-lg-3 col-md-7 col-6">
            <div class="header_configure_area">
                <div class="header_wishlist">
                    <a href="wishlist.html">
                        <i class="ion-android-favorite-outline"></i>
                        <span class="wishlist_count">3</span>
                    </a>
                </div>
                <div class="mini_cart_wrapper">
                    <a href="javascript:void(0)">
                        <i class="fa fa-shopping-bag"></i>
                        <span class="cart_price">₹{{number_format(Cart::getSubTotal(),2)}} <i class="ion-ios-arrow-down"></i></span>
                        <span class="cart_count">{{Cart::getTotalQuantity()}}</span>
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
    @foreach($cartdetails as $cart)
    <div class="cart_item">
        <div class="cart_img">
            <a href="#"><img src="{{url('public/product_image/',$cart['attributes'])}}" alt="" /></a>
        </div>
        <div class="cart_info">
            <a href="#">{{$cart['name']}}</a>
            <p>Qty: {{$cart['quantity']}} X <span> ₹{{number_format($cart['price'],2)}} </span></p>
        </div>
        <div class="cart_remove">
            <a href="javascript:void(0)" class="removecart" data-productid="{{$cart['id']}}"><i class="ion-android-close"></i></a>
        </div>
    </div>
    @endforeach
   
    <div class="mini_cart_table">
        <div class="cart_total">
            <span>Sub total:</span>
            <span class="price">₹{{number_format(Cart::getSubTotal(),2)}}</span>
        </div>
        <div class="cart_total mt-10">
            <span>total:</span>
            <span class="price">₹{{number_format(Cart::getTotal(),2)}}</span>
        </div>
    </div>
    <div class="mini_cart_footer">
        <div class="cart_button">
            <a href="cart.html">View cart</a>
        </div>
        <div class="cart_button">
            <a class="active" href="checkout.html">Checkout</a>
        </div>
    </div>
</div>
<!--mini cart end-->