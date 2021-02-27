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
                                        <a href="{{url('/user/account')}}">my account</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="Offcanvas_footer">
                                <span>
                                    <a href="{{url('/')}}"><i class="fa fa-envelope-o"></i>info@Shoppershawk.com</a>
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
                       <div class="account_form register">
                            <h2>Register</h2>
                            <form action="" method="post" id="contact_form">
                            @include('message')
                            {{csrf_field()}}
                            <div class="row">
                            <div class="col-sm-6">
                            <p>
                                    <label>Name <span>*</span></label>
                                    <input type="text" name="name"   placeholder="Enter Name" required>
                                </p>
                                </div>
                                <div class="col-sm-6">

                                <p>
                                    <label>Mobile Number<span>*</span></label>
                                    <input type="text" name="mobile"  placeholder="Enter Mobile no." required>
                                    <span class="text-danger">{{$errors->first('mobile')}}</span>
                                </p>
                                </div>
                                </div>
                                <div class="row">

                                <div class="col-sm-12">

                                <p>
                                    <label>Email address <span>*</span></label>
                                    <input type="email" name="email"  placeholder="Enter Email" required>
                                    <span class="text-danger">{{$errors->first('email')}}</span>
                                </p>
                                </div>
                                </div>
                                <div class="row">

                                <div class="col-sm-6">

                                <p>
                                    <label>Enter Password <span>*</span></label>

                                    <input type="password" name="password" id="password-field" class="form-control" placeholder="Enter Password" required>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                                </p>
                                </div>
                                <div class="col-sm-6">
                                <p>
                                    <label>Confirm Password <span>*</span></label>
                                    <input id="password-field1" type="password" name="c_password"  class="form-control"  placeholder="Enter Confirm password" required>
                                    <span toggle="#password-field1" class="fa fa-fw fa-eye field-icon toggle-password"></span>

                                </p>

                                </div>
                                </div>
                                <div class="login_submit">
                                <a class="login_submit" href="{{url('/login')}}">Already Have an Account ? Log in</a>

                                    <button type="submit">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3"></div>
                    <!--login area start-->

                    <!--register area start-->
                    <!-- <div class="col-lg-6 col-md-6">
                        <div class="account_form register">
                            <h2>Register</h2>
                            <form action="#">
                                <p>
                                    <label>Email address <span>*</span></label>
                                    <input type="text">
                                </p>
                                <p>
                                    <label>Passwords <span>*</span></label>
                                    <input type="password">
                                </p>
                                <div class="login_submit">
                                    <button type="submit">Register</button>
                                </div>
                            </form>
                        </div>
                    </div> -->
                    <!--register area end-->
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
        <script src="{{url('public/front/js/jquery.validate.min.js')}}"></script>

        <script>
        $(document).ready(function(){

      
             if ($("#contact_form").length > 0) {
        $("#contact_form").validate({
 
            rules: {
                name: {
                    required: true,
                    maxlength: 50
                },
 
                email: {
                    required: true,
                    maxlength: 50,
                    email: true,
                },
 
                mobile: {
                    required: true,
                    minlength:10,
                    maxlength:10,
                    number:true,
                },
                password: {
                    required: true,
                    minlength:6,
                    
                },
                c_password: {
                    required: true,
                    equalTo : "#password-field",
                    
                },
            },
            messages: {
 
                name: {
                    required: "Please enter your name",
                },
               
                email: {
                    required: "Please enter valid email",
                    email: "Please enter valid email",
                    maxlength: "The email name should less than or equal to 50 characters",
                },
                mobile: {
                    required: "Please enter mobile no.",
                    maxlength:"The mobile number should not be greater than 10 digit"
                },
                c_password:{
                    equalTo : "Incorrect password",
                }
 
            },
        })
    }
});
        </script>
    </body>
</html>