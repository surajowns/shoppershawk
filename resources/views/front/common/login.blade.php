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
        <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-P9S15Q3GME');
</script>
<style>
    .field-icon {
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        position: relative;
        z-index: 2;
        right: 10px;
        top: 0px;
        cursor: pointer;
        color: #fff ;
    }
.form input.btn:hover{
    background-color: #fff;
    color: #c40316;
}    
.loginBtn {
  box-sizing: border-box;
  position: relative;
  /* width: 13em;  - apply for fixed size */
  margin: 0.2em;
  padding: 0 15px 0 46px;
  border: none;
  text-align: left;
  line-height: 34px;
  white-space: nowrap;
  border-radius: 0.2em;
  font-size: 16px;
  color: #FFF;
  width: 100%;
  text-align: center;
}
.loginBtn:before {
  content: "";
  box-sizing: border-box;
  position: absolute;
  top: 0;
  left: 0;
  width: 34px;
  height: 100%;
}
.loginBtn:focus {
  outline: none;
}
.loginBtn:active {
  box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
}


/* Facebook */
.loginBtn--facebook {
  background-color: #4C69BA;
  background-image: linear-gradient(#4C69BA, #3B55A0);
  /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
  text-shadow: 0 -1px 0 #354C8C;
}
.loginBtn--facebook:before {
  border-right: #364e92 1px solid;
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
}
.loginBtn--facebook:hover,
.loginBtn--facebook:focus {
  background-color: #5B7BD5;
  background-image: linear-gradient(#5B7BD5, #4864B1);
}


/* Google */
.loginBtn--google {
  /*font-family: "Roboto", Roboto, arial, sans-serif;*/
  background: #c40316;
}
.loginBtn--google:before {
  border-right: #BB3F30 1px solid;
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
}
.loginBtn--google:hover,
.loginBtn--google:focus {
  background: #E74B37;
}
.tabs,
.form {
  width: 390px;
  opacity: 0.8;
  border-radius: 5px;
}
.tabs {
  background: #c40316;
  height: 60px;
  margin: 5px auto 0px;
  color: #000;
}
.form {
      height: auto;
    margin: 5px auto;
    background: #000;
    padding-bottom: 10px;
}
.li-form {
  display: block;
  width: 40%;
  height: 30px;
  vertical-align: middle;
  float: left;
  margin: 15px;
  padding: 0;
  border-right: 1px solid #fff;
}
.li-form:last-child {
  border: none;
}
.li-form a {
  text-decoration: none;
  padding: 10px 20px;
  color: #fff;
  font-size: 18px;
}
.li-form a:hover {
  color: #fff;
  text-decoration: none;
}
.li-form a:active {
  color: #fff;
  text-decoration: none;
}
.li-form a:link {
  color: #fff;
  text-decoration: none;
}
.input {
  margin: 20px 0;
}
input.main-form {
  border: 1px solid #a0b3b0;
  display: block;
  width: 100%;
  height: 40px;
  color: #fff;
  background: #000;
  font-size: 16px;
}
input[type="checkbox"] {
  margin-right: 5px;
  margin-top: 5px;
  vertical-align: top;
}
.input a {
  color: #fff;
}
.form input.btn {
  background: #c40316;
  border: none;
}

</style>
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
                                    <li>Hotline: <a href="tel:+0120-2512786">+91 120-2514786</a></li>
                                </ul>
                                <div class="order_button mt-20">
                                @if(!Auth::check())
                                <a class="btn btn-danger" href="{{url('/login')}}">Login|Register</a>
                                @else
                                <a href="">Hi {{Auth::user()->name}}</a></li>
                                 <a class="btn btn-danger" href="{{url('/user/logout')}}">Logout</a></li>
                                @endif
                                </div>
                            </div>
                            <div id="menu" class="text-left">
                                <ul class="offcanvas_main_menu">
                                    <li class="menu-item-has-children active">
                                        <a href="{{url('/')}}">Home</a>
                                    </li>
                                    <!-- <li class="menu-item-has-children">
                                        <a href="#">Category</a>
                                    </li> -->
                                    
                                    <li class="menu-item-has-children">
                                        <a href="{{url('/user/account')}}">my account</a>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="{{url('user/contactus')}}">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="Offcanvas_footer">
                                <span>
                                    <a href="{{url('/')}}"><i class="fa fa-envelope-o"></i>care@Shoppershawk.com</a>
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
                    <div class="row text-center">
                     <div class="col-xs-12 col-sm-12 col-md-12  col-lg-12">
                       <a href="{{url('/')}}"><img src="{{url('public/front/img/logo/logo.png')}}" alt=""></a>
                     </div>
                    </div>

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

    <!-- customer login start -->
    <div class="login_page_bg tab-login" style="padding:0;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <img src="{{url('public/front/img/logo/loginbanner.jpg')}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="customer_login">
                <div class="row">
      <div class="col-sm-12">
          <ul class="tabs">
            <li class="li-form text-center"><a href="javascript:void(0)" id="1">Login</a></li>
            <li class="li-form text-center"><a href="javascript:void(0)" id="2">Register</a></li>
          </ul>
      </div>
      <div class="col-sm-12">
        <div class="form row" id="login">
                  @if(session('failed'))
                                    <p class="text-center text-danger">{{session('failed')}}</p>
                             @endif
						     @if(session('error'))
                                     <p class="text-center text-danger">{{session('error')}}</p>
                             @endif
                             @if(session('success'))
                                    <p class="text-center text-success">{{session('success')}}</p>
                            @endif
        <form id="login_form" action="{{url('/user/verifyuser')}}" method='post'>
            @csrf
          <div class="col-sm-12 pt-2">
             <div class="input">
               <input class="main-form animated bounceInDown" type="text" name="email"  placeholder=" Email or Mobile Number"/>
             </div>
            <div class="input">
            <input class="main-form animated bounceInDown" id="password-field2" type="password" name="password"  placeholder=" Password"/>
            <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password animated bounceInDown"></span>
            <div class="input">
              <label class="pull-left text-light">
                <input name="remember" type="checkbox" checked>Remember me
              </label>
              <label class="pull-right">
                <a href="#" id="3" class="forget-password">Forgot password ?</a>
              </label>
            </div>
             </div><br>
              <div class="input">
              <!-- <button class="main-form btn animated bounceInDown" type="submit">login</button> -->
               <input class="main-form btn animated bounceInDown" type="submit"  value = "LOGIN"/>
             </div>
            </form> 
             <div class="input">
                 <button class="loginBtn loginBtn--facebook">
                 <a href="{{url('redirect/facebook')}}"> Login with Facebook</a>
                </button>

                <button class="loginBtn loginBtn--google">
                   <a href="{{url('redirect/google')}}">Login with Google</a>
                </button>
             </div>
            
          </div>
        </div>
        <form action="{{url('/register')}}" method="post" id="contact_form">
                            @include('message')
                            {{csrf_field()}}
        <div class="form row" id="register" style="display: none;">
          <div class="col-sm-12 pt-2">
            <div class="input">
            <input class="main-form animated bounceInDown" type="text" name="name" placeholder=" Name"/>
             </div>
             <div class="input">
            <input class="main-form animated bounceInDown" type="text" name="mobile" placeholder=" Mobile Number"/>
            <span class="text-danger">{{$errors->first('mobile')}}</span>

             </div>
             <div class="input">
            <input class="main-form animated bounceInDown" type="email" name="email" placeholder=" Email Address"/>
            <span class="text-danger">{{$errors->first('email')}}</span>

             </div>
            <div class="input">
            <input class="main-form animated bounceInDown" id="password-field" type="password" name="password" placeholder=" Enter Password"/>
            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password animated bounceInDown"></span>
             </div>
             <div class="input">
            <input class="main-form animated bounceInDown" id="password-field1" type="password" name="c_password" placeholder=" Enter Confirm Password"/>
            <span toggle="#password-field1" class="fa fa-fw fa-eye field-icon toggle-password animated bounceInDown"></span>
             </div>
            <div class="input">
             <input class="main-form btn animated bounceInDown" type="submit" value = "Register"/>
             </div>
            
          </div>
        </div>
        </form>
        
          <div class="form row" id="forgetP" style="display: none;">
          <form action="{{url('user/forgetpassword')}}" method="post" id="forget_form">
              {{csrf_field()}}
            <div class="col-sm-12 pt-2">
             <div class="input text-light">
                <p>To reset your password enter your email we'll send you a link to reset your password.</p>
             </div>
             <div class="input">
                <input class="main-form animated bounceInDown" type="email" name="email" placeholder=" Email Address"/>
             </div>
             <div class="input">
                <input class="main-form btn  animated bounceInDown" type="submit"  value="Reset Password"/>
             </div>
            </div>
            </form>
         </div>
       
      </div>
      
    </div>
            </div>
                </div>
            </div>
        </div>
    </div>

    <!-- customer login end -->
    <!-- customer login end -->

        </div>
        <!--home section bg area end-->

        <!--footer area start-->
        <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright_area">
                        <p>Copyright &copy; 2021 <a href="https://www.besthawk.com/" target="_blank">Best Hawk Infosystem Pvt. Ltd.</a> All Right Reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer_payment" style="text-align: right;">
                        <img src="{{url('public/front/img/icon/payment.png')}}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!--footer area end-->


        <!-- JS
============================================ -->

        <!-- Plugins JS -->
        <script src="{{url('public/front/js/plugins.js')}}"></script>

        <!-- Main JS -->
        <script src="{{url('public/front/js/main.js')}}"></script>
        <script src="{{url('public/front/js/jquery.validate.min.js')}}"></script>
        <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


        <script>
            $(document).ready(function() {
                @if(Session::has('success'))
                    toastr.success("{{Session::get('success')}}")
                @endif
                @if(Session::has('error'))
                    toastr.error("{{Session::get('error')}}")
                @endif

            });
        </script>
        <script>
        $(document).ready(function(){
                if ($("#login_form").length > 0) {
                $("#login_form").validate({

                rules: {
                email: {
                    required: true,
                },
                password: {
                    required: true,
                },
                },
                messages: {
                email: {
                    required: "Enter your email or mobile phone number",
                },
                password: {
                            required: "please enter password",
                        },
                    },
                })
                }
                });
       </script>

        <script>
        $(".toggle-password").click(function() {
          $(this).toggleClass("fa-eye fa-eye-slash");
          var input = $($(this).attr("toggle"));
          if (input.attr("type") == "password") {
            input.attr("type", "text");
          } else {
            input.attr("type", "password");
          }
        });
    </script>
    <script>
        $(".tabs a").on("click", function(){
  var id = $(this).attr("id");
  if(id == 2){
    $("#register").css("display","block");
    $("#login").css("display","none");
  }
  else{
    $("#register").css("display","none");
    $("#forgetP").css("display","none");
    $("#login").css("display","block");
  }
});
$(".reset").on("click", function(){
  $("#login").css("display","block");
  $("#forgetP").css("display","none");
});
$(".forget-password").on("click", function(){
    $("#register").css("display","none");
    $("#login").css("display","none");
    $("#forgetP").css("display","block");
})
function animationHover(element, animation){
  element = $(element);
  element.hover(
    function() {
      element.addClass('animated ' + animation);
      //wait for animation to finish before removing classes
      window.setTimeout( function(){
          element.removeClass('animated ' + animation);
      }, 2000);
    }
  );
};
animationHover("input[type=button]", "shake");
    </script>

<script>
$(document).ready(function(){

    $.validator.addMethod("regex", function(value, element, regexpr) {          
                return regexpr.test(value);
         }, "Please enter a valid email address.");
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
            regex: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i

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
            regex: "Please enter valid email",

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
<script>
  function padStart(str) {
        return ('0' + str).slice(-2)
    }

    $(document).on('submit','#contact_form',function (e) {
        
        $.ajax({
            method: 'post',
            url:this.action,
            dataType:'json',
            data: $(this).serialize(),
            complete: function (response) {
               //console.log(response.responseJSON);
               if(response.statusText==='Bad Request'){
                  toastr.error(response.responseJSON.error);

                  }
                  else{
                    toastr.success(response.responseJSON.success);
                    window.location.href = "{{url('/')}}";
  
                  }
            }
        })
        return false;
    })

    $(document).ready(function(){
        $.validator.addMethod("regex", function(value, element, regexpr) {          
                return regexpr.test(value);
         }, "Please enter a valid email address.");
                if ($("#forget_form").length > 0) {
                $("#forget_form").validate({

                rules: {
                email: {
                    required: true,
                    email: true,
                    regex: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
                },
                },
                messages: {
                email: {
                    required: "Please enter  email",
                    regex: "Please enter valid email",
                },
               
                    },
                })
                }
                });

    $(document).on('submit','#forget_form',function (e) {
        
        $.ajax({
            method: 'post',
            url:this.action,
            dataType:'json',
            data: $(this).serialize(),
            complete: function (response) {
               console.log(response);
               if(response.statusText==='Bad Request'){
                  toastr.error(response.responseJSON.error);
                  }if(response.responseJSON.status == 'error'){
                    toastr.error(response.responseJSON.msg);  
                  }
                  else{
                    toastr.success(response.responseJSON.msg);
  
                  }
            }
        })
        return false;
    })
</script>
    </body>
</html>