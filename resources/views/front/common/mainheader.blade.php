<header>
        <div class="main_header">
            <div class="container">
                <!--header top start-->
                @include('front.common.topheader')
                <!--header top start-->
                @include('front.common.middleheader')
                <!--header middel start-->
                <div class="header_middle sticky-header sticky">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-3 col-4">
                            <div class="logo">
                                <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12">
                            <div class="main_menu menu_position text-center">
                                <nav>
                                    <ul>
                                        <li><a class="active" href="index.html">home<i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu">
                                                <li><a href="index.html">Home shop 1</a></li>
                                                <li><a href="index-2.html">Home shop 2</a></li>
                                                <li><a href="index-3.html">Home shop 3</a></li>
                                                <li><a href="index-4.html">Home shop 4</a></li>
                                                <li><a href="index-5.html">Home shop 5</a></li>
                                                <li><a href="index-6.html">Home shop 6</a></li>
                                                <li><a href="index-7.html">Home shop 7</a></li>
                                            </ul>
                                        </li>
                                        <li class="mega_items"><a href="shop.html">shop<i class="fa fa-angle-down"></i></a>
                                            <div class="mega_menu">
                                                <ul class="mega_menu_inner">
                                                    <li><a href="#">Shop Layouts</a>
                                                        <ul>
                                                            <li><a href="shop-fullwidth.html">Full Width</a></li>
                                                            <li><a href="shop-fullwidth-list.html">Full Width list</a></li>
                                                            <li><a href="shop-right-sidebar.html">Right Sidebar </a></li>
                                                            <li><a href="shop-right-sidebar-list.html"> Right Sidebar list</a></li>
                                                            <li><a href="shop-list.html">List View</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">other Pages</a>
                                                        <ul>
                                                            <li><a href="cart.html">cart</a></li>
                                                            <li><a href="wishlist.html">Wishlist</a></li>
                                                            <li><a href="checkout.html">Checkout</a></li>
                                                            <li><a href="my-account.html">my account</a></li>
                                                            <li><a href="404.html">Error 404</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">Product Types</a>
                                                        <ul>
                                                            <li><a href="product-details.html">product details</a></li>
                                                            <li><a href="product-sidebar.html">product sidebar</a></li>
                                                            <li><a href="product-grouped.html">product grouped</a></li>
                                                            <li><a href="variable-product.html">product variable</a></li>
                                                            <li><a href="product-countdown.html">product countdown</a></li>

                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li><a href="blog.html">blog<i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <li><a href="blog-details.html">blog details</a></li>
                                                <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                                <li><a href="blog-sidebar.html">blog sidebar</a></li>
                                                <li><a href="blog-no-sidebar.html">blog no sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">pages <i class="fa fa-angle-down"></i></a>
                                            <ul class="sub_menu pages">
                                                <li><a href="about.html">About Us</a></li>
                                                <li><a href="faq.html">Frequently Questions</a></li>
                                                <li><a href="privacy-policy.html">privacy policy</a></li>
                                                <li><a href="contact.html">contact</a></li>
                                                <li><a href="login.html">login</a></li>
                                                <li><a href="404.html">Error 404</a></li>
                                                <li><a href="compare.html">compare</a></li>
                                                <li><a href="coming-soon.html">coming soon</a></li>
                                            </ul>
                                        </li>

                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="contact.html"> Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-7 col-6">
                            <div class="header_configure_area">
                                <div class="header_wishlist">
                                    <a href="wishlist.html"><i class="ion-android-favorite-outline"></i>
                                        <span class="wishlist_count">3</span>
                                    </a>
                                </div>
                                <div class="mini_cart_wrapper">
                                    <a href="javascript:void(0)">
                                        <i class="fa fa-shopping-bag"></i>
                                        <span class="cart_price">$152.00 <i class="ion-ios-arrow-down"></i></span>
                                        <span class="cart_count">2</span>

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
                    <div class="cart_item">
                        <div class="cart_img">
                            <a href="#"><img src="assets/img/s-product/product.jpg" alt=""></a>
                        </div>
                        <div class="cart_info">
                            <a href="#">Primis In Faucibus</a>
                            <p>Qty: 1 X <span> $60.00 </span></p>
                        </div>
                        <div class="cart_remove">
                            <a href="#"><i class="ion-android-close"></i></a>
                        </div>
                    </div>
                    <div class="cart_item">
                        <div class="cart_img">
                            <a href="#"><img src="assets/img/s-product/product2.jpg" alt=""></a>
                        </div>
                        <div class="cart_info">
                            <a href="#">Letraset Sheets</a>
                            <p>Qty: 1 X <span> $60.00 </span></p>
                        </div>
                        <div class="cart_remove">
                            <a href="#"><i class="ion-android-close"></i></a>
                        </div>
                    </div>
                    <div class="mini_cart_table">
                        <div class="cart_total">
                            <span>Sub total:</span>
                            <span class="price">$138.00</span>
                        </div>
                        <div class="cart_total mt-10">
                            <span>total:</span>
                            <span class="price">$138.00</span>
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

                <!--header bottom satrt-->
                @include('front.common.header')
                <!--header bottom end-->
            </div>
        </div>
    </header>
