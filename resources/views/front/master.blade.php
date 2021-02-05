<!DOCTYPE html>
<html class="no-js" lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>@yield('title')</title>
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
        <!-- <link rel="stylesheet" href="{{url('public/front/css/responsive.css')}}" /> -->
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
                    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.html">home</a></li>
                            <li>shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
                    <!--header bottom end-->
                </div>
            </div>
        </header>
      
        <div class="home_section_bg">
            <!--Categories product area start-->

            @yield('content')

            <!-- categories  product area start-->
                  @include('front.common.recentlyview')
            <!-- categories product area end-->
        </div>
        <!--home section bg area end-->

        <!--footer area start-->
          @include('front.common.footer')
        <!--footer area end-->

        <!-- modal area start-->
      
        <!-- modal area end-->

        <!--news letter popup start-->
     
        <!--news letter popup start-->

        <!-- JS
============================================ -->

        <!-- Plugins JS -->
        <script src="{{url('public/front/js/plugins.js')}}"></script>

        <!-- Main JS -->
        <script src="{{url('public/front/js/main.js')}}"></script>
        <script src="{{url('public/front/js/jscroll.js')}}"></script>

        @yield('javascript')
     </body>
</html>