<!DOCTYPE html>
<html class="no-js" lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Shoppershawk</title>
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{url('public/front/img/favicon.ico')}}" />

        <!-- CSS -->

        <!-- Plugins CSS -->
        <link rel="stylesheet" href="{{url('public/front/css/plugins.css')}}" />

        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{url('public/front/css/style.css')}}" />
        <!-- Main Responsive CSS -->
        <link rel="stylesheet" href="{{url('public/front/css/responsive.css')}}" />
    </head>
    <body>
        <!--Offcanvas menu area start-->
        <div class="off_canvars_overlay"></div>
        <div class="Offcanvas_menu">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="canvas_open">
                            <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                        </div>
                        <div class="Offcanvas_menu_wrapper">
                            <div class="canvas_close">
                                <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                            </div>
                            <div class="Besthawk_message">
                                <p>Get free shipping – In All over in India</p>
                            </div>
                            <div class="header_top_settings text-right">
                                <ul>
                                    <li><a href="#">Track Your Order</a></li>
                                    <li>Hotline: <a href="tel:+0120-2512786">+0120-2512786</a></li>
                                </ul>
                                <div class="order_button mt-20">
                                    <button class="btn btn-primary">Login</button>
                                    <button class="btn btn-primary">Register</button>
                                </div>
                            </div>
                            <div id="menu" class="text-left">
                                <ul class="offcanvas_main_menu">
                                    <li class="menu-item-has-children active">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Category</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">blog</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="my-account.html">my account</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="contact.html"> Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="Offcanvas_footer">
                                <span>
                                    <a href="#"><i class="fa fa-envelope-o"></i> info@besthawk.com</a>
                                </span>
                                <ul>
                                    <li class="facebook">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li class="twitter">
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li class="pinterest">
                                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
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
        <!--Offcanvas menu area end-->

        <!--header area start-->
        <header>
            <div class="main_header">
                <div class="container">
                    <!--header top start-->
                     @include('front.common.topheader')
                    <!--header top end-->

                    <!--header middel start-->
               
                    @include('front.common.middleheader')

                    <!--header bottom satrt-->
                    @include('front.common.header')

                    <!--header bottom end-->
                </div>
            </div>
        </header>
        <!--header area end-->

        <!--slider area start-->
        <!--top and side banner-->
        @include('front.common.topbanner')
        <!--end top and side banner-->
       
        <!--slider area end-->

        <!--shipping area start-->
       <!-- @include('front.common.shippingdetails') -->
        <!--shipping area end-->

        <!--home section bg area start-->
        <div class="home_section_bg">
            <!--Categories product area start-->
            @include('front.common.categories')

            <!--Categories product area end-->

            <!-- deals of the month product area start-->
              @include('front.common.dealsofmonth')
            <!--deals of the month product area end-->

            <!--banner area start-->
            <!--double ads start-->
             @include('front.common.doubleads')

            <!--end double ads start-->
            <!--banner area end-->

            <!--featured product start-->
            @include('front.common.featureproduct')
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
                  <!-- @include('front.common.categoriesproducts') -->
            <!-- categories product area end-->
        </div>
        <!--home section bg area end-->

        <!--footer area start-->
          @include('front.common.footer')
        <!--footer area end-->

        <!-- modal area start-->
      
        <!-- modal area end-->

        <!--news letter popup start-->
        <div class="newletter-popup">
            <div id="boxes" class="newletter-container">
                <div id="dialog" class="window">
                    <div id="popup2">
                        <span class="b-close"><span>close</span></span>
                    </div>
                    <div class="box">
                        <div class="newletter-title">
                            <h2>Newsletter</h2>
                        </div>
                        <div class="box-content newleter-content">
                            <label class="newletter-label">Enter your email address to subscribe our notification of our new post &amp; features by email.</label>
                            <div id="frm_subscribe">
                                <form name="subscribe" id="subscribe_popup">
                                    <!-- <span class="required">*</span><span>Enter you email address here...</span>-->
                                    <input type="text" value="" name="subscribe_pemail" id="subscribe_pemail" placeholder="Enter you email address here..." />
                                    <input type="hidden" value="" name="subscribe_pname" id="subscribe_pname" />
                                    <div id="notification"></div>
                                    <a class="theme-btn-outlined" onclick="email_subscribepopup()"><span>Subscribe</span></a>
                                </form>
                                <div class="subscribe-bottom">
                                    <input type="checkbox" id="newsletter_popup_dont_show_again" />
                                    <label for="newsletter_popup_dont_show_again">Don't show this popup again</label>
                                </div>
                            </div>
                            <!-- /#frm_subscribe -->
                        </div>
                        <!-- /.box-content -->
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!--news letter popup start-->

        <!-- JS
============================================ -->

        <!-- Plugins JS -->
        <script src="{{url('public/front/js/plugins.js')}}"></script>

        <!-- Main JS -->
        <script src="{{url('public/front/js/main.js')}}"></script>
        @yield('javascript')
        <script>
        $(document).ready(function(){
        
        $(".deals_of_the_month li:first a").addClass("active");
        $('.deals_of_the_month li:first a').attr('aria-selected', true);
        $('.dealsofthemonth').first().addClass('active show');

        $(".new_arrival_product li:first a").addClass("active");
        $('.new_arrival_product li:first a').attr('aria-selected', true);
        $('.newarrivalproduct').first().addClass('active show');

        $(".featured_product li:first a").addClass("active");
        $('.featured_product li:first a').attr('aria-selected', true);
        $('.featuredproduct').first().addClass('active show');


        $(".best_selling_product li:first a").addClass("active");
        $('.best_selling_product li:first a').attr('aria-selected', true);
        $('.bestsellingproduct').first().addClass('active show');

 });
        
        </script>
    </body>
</html>