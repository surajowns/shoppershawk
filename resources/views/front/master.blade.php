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
        <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
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
                     @include('front.common.topheader')
                    <!--header top end-->

                    <!--header middel start-->
               
                    @include('front.common.middleheader')

                    <!--header bottom satrt-->
                    @include('front.common.header')

                    <!--header bottom end-->
                    <div class="breadcrumbs_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{url('/')}}">home</a></li>
                           @if(isset($_GET['cat']))
                            <li>{{$_GET['cat']}}</li>
                            @endif
                            @if(isset($_GET['subcat']))
                            <li>{{$_GET['subcat']}}</li>
                            @else
                            <li>@yield('title')</li>

                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
                </div>
            </div>
        </header>
        <!--header area end-->
        <div class="home_section_bg">
            <!--Categories product area start-->

            @yield('content')

            <!-- categories  product area start-->
               @if(!Request::segment(2) == 'wishlist_details' || !Request::segment(2) == 'cart_details' )
                  @include('front.common.recentlyview')
               @endif  
            <!-- categories product area end-->
        </div>
        <!--home section bg area end-->

        <!--footer area start-->
          @include('front.common.footer')
        <!-- JS
============================================ -->

        <!-- Plugins JS -->
        <script src="{{url('public/front/js/plugins.js')}}"></script>

        <!-- Main JS -->
        <script src="{{url('public/front/js/main.js')}}"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

        @yield('javascript')
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

         

$('.cart').click(function(){
        
var productid= $(this).data('productid');

$.ajax({
        Type:"GET",
        url : '{{url("ajax/add_to_cart")}}',
        dataType:'json',
        cache: false,
        data: {productid:productid},
        success: function(response){
        //  console.log(response);
         if(response.status == 'error'){
           
         }
        else{
            //toastr.info('Added to cart');
            location.reload();
           
         }
        }
     })
    });
    $('.removecart').click(function(){
        
        var productid= $(this).data('productid');
        // alert()
        $(this).parent().prev().prev().parent().css("display","none");
        // $(this).parent().prev().css("display","none");
        // $(this).parent().css("display","none");


        $.ajax({
                Type:"GET",
                url : '{{url("ajax/remove_cart")}}',
                dataType:'json',
                cache: false,
                data: {productid:productid},
                success: function(response){
                 if(response.status == 'error'){
                    //toastr.warning("error");
                 }
                else{
                    //toastr.success('Remove from cart');
                    location.reload();
                   
                 }
                }
             })
            });

 });
        
        </script>
        <script>
    $(function () {

    $(".sample_search").keyup(function () {
        var  cat = $('#categor').val();
        var   keywords  = $(this).val();
        // alert(cat);
        if(keywords!=''){
        $.ajax({
        Type:"POST",
        url : '{{url("ajax/search")}}',
        dataType:'json',
        cache: false,
        data: {cat:cat,keywords:keywords},
        success: function(response){
         var check=jQuery.isEmptyObject(response);
         console.log(response)
            var rows='';
                    $.each(response,function(key,value){
                        var newurl = "{{url('/product_details')}}"+'/'+value.slug;
                       
                        rows+='<li class="menu_item_children"><a href="'+newurl+'">'+value.name+'</a></li>';
                    });
            $('.list_details').html(rows)
        }
     })
    }
    });
    });
</script>

    </body>
</html>