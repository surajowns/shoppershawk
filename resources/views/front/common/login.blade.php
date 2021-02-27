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
        <link rel="shortcut icon" type="image/x-icon" href="{{url('public/front/img/favicon.png')}}" />

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
                                @if(!Auth::check())
                                <a class="btn btn-danger" href="{{url('/login')}}">Login</a>
                                <a class="btn btn-danger" href="{{url('/register')}}">Register</a>
                                @else
                                <a href="">Hi {{Auth::user()->name}}</a></li>
                                 <a class="btn btn-danger" href="{{url('/user/logout')}}">Logout</a></li>
                                @endif
                                </div>
                            </div>
                            <div id="menu" class="text-left">
                                <ul class="offcanvas_main_menu">
                                    <li class="menu-item-has-children active">
                                        <a href="{{url('/home')}}">Home</a>
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
                                        <a href="contact.html">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="Offcanvas_footer">
                                <span>
                                    <a href="#"><i class="fa fa-envelope-o"></i>info@Shoppershawk.com</a>
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
                    <!--header top end-->

                    <!--header middel start-->
               
                    @include('front.common.middleheader')

                    <!--header bottom satrt-->

                    <!--header bottom end-->
                </div>
            </div>
        </header>
        <!--header area end-->

        <!--slider area start-->
      

        <!--home section bg area start-->
        <div class="home_section_bg">
         <!-- customer login start -->
    <div class="login_page_bg">
        <div class="container">
            <div class="customer_login">
                <div class="row">
                    <!--login area start-->
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 col-md-6">
                        <div class="account_form login">
                            <h2>login</h2>
                            @if(session('failed'))
                                    <p class="text-center text-danger">{{session('failed')}}</p>
                             @endif
						     @if(session('error'))
                                     <p class="text-center text-danger">{{session('error')}}</p>
                             @endif
                             @if(session('success'))
                                    <p class="text-center text-success">{{session('success')}}</p>
                            @endif
                            <form action="{{url('/user/verifyuser')}}" method='post'>
                            @csrf
                                <p>
                                    <label>Phone Number or Email Address <span>*</span></label>
                                    <input type="text" name="email" required>
                                </p>
                                <p>
                                    <label>Password <span>*</span></label >
                                    <input type="password" name="password" required>
                                </p>
                                <div class="login_submit">
                                    <a href="#">Lost your password?</a>
                                    <label for="remember" >
                                        <input  name="remember" id="remember" type="checkbox" checked>
                                        Remember me
                                    </label>
                                    <button type="submit">login</button>

                                </div>
                                <div class="login_submit mb-4">
                                    <a href="{{url('register')}}">New to Shoppershawk? Create an account</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                    <!--login area start-->
                </div>
            </div>
        </div>
    </div>

    <!-- customer login end -->

        </div>
        <!--home section bg area end-->

        <!--footer area start-->
          @include('front.common.footer')
        <!--footer area end-->


        <!-- JS
============================================ -->

        <!-- Plugins JS -->
        <script src="{{url('public/front/js/plugins.js')}}"></script>

        <!-- Main JS -->
        <script src="{{url('public/front/js/main.js')}}"></script>
    </body>
</html>