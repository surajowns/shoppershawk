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
                                <a href="{{url('/user/account')}}">Hi {{Auth::user()->name}}</a></li>
                                 <a class="btn btn-danger" href="{{url('/user/logout')}}">Logout</a></li>
                                @endif
                                </div>
                            </div>
                            <div id="menu" class="text-left">
                                <ul class="offcanvas_main_menu">
                                    <li class="menu-item-has-children active">
                                        <a href="{{url('/home')}}">Home</a>
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
                                    <a href="#"><i class="fa fa-envelope-o"></i>care@Shoppershawk.com</a>
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
        @include('front.common.topslider')
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

        $(document).on("click",".addtowishlist",function(){
                
        var productid= $(this).data('productid');
        var className=$(this).children().attr('class');
        var id=$(this).children().attr('id');
        $(this).parent().remove();
        $(this).children().removeClass(className);
        $.ajax({
                Type:"GET",
                url :'{{url("user/wishlist/")}}',
                dataType:'json',
                cache: false,
                data: {productid:productid},
                success: function(response){
                 console.log(response);
                 if(response.status == 'add'){
                   

                    $('.wishlist_count').text(response.totalwishlist);
                    $('#'+id).addClass(response.adclass);
                    toastr.info(response.message);
                   
                 }else if(response.status == 'remove'){
                   
                   

                     $('.wishlist_count').text(response.totalwishlist);
                     $('#'+id).addClass(response.remoclass);
                    toastr.info(response.message);
                 }else{
                    window.location.href = "{{url('/login')}}";
                 }
                }
             })
            });   

$(document).on("click",".cart",function(){
        
var productid= $(this).data('productid');
$.ajax({
        Type:"GET",
        url : '{{url("ajax/add_to_cart")}}',
        dataType:'json',
        cache: false,
        data: {productid:productid},
        success: function(response){
         console.log(response);
         if(response.status == 'error'){
           
         }
        else{
            $( ".cart_item" ).remove();
            $( ".cart_price" ).text('₹'+response.carttotal);
            $( ".cart_count" ).text(response.totalin_cart);
            $( ".price" ).text('₹'+response.carttotal);

           
            $( ".cart_close" ).after('<div class="cart_item"></div>');
            var rows='';
            $.each(response.data,function(key,value){
                      
                     if('{{!empty(Auth::check())}}'){
                       
                        var producturl="{{url('/product_details/')}}"+'/'+value.products[0]['slug'];
                        var image="{{url('public/product_image/')}}"+'/'+value.products[0]['product_image'][0]['image'];
                        var product_id=value.products[0]['id'];
                        var name=value.products[0]['name'];
                        var quantity=value.quantity;
                        var price =value.price;
                      }else{
                        var producturl="{{url('/product_details/')}}"+'/'+value.attributes.slug;
                        var image="{{url('public/product_image/')}}"+'/'+value.attributes.image;
                        var product_id=value.id;
                        var name=value.name;
                        var quantity=value.quantity;
                        var price =value.price;
                      }
                         rows+='<div class="cart_item"><div class="cart_img"><a href="'+producturl+'"><img src="'+image+'" alt="" /></a></div><div class="cart_info"><a href="">'+name+'</a><p>Qty:'+quantity+' X <span>'+price+'</span></p></div><div class="cart_remove"><a href="javascript:void(0)" class="removecart" data-productid="'+product_id+'"><i class="ion-android-close"></i></a></div></div>';

                   
                    });
            $(rows).insertAfter(".cart_item");
            toastr.info('Added to cart');
           
         }
        }
     })
    });
    $(document).on("click",".removecart",function() {
        
        var productid= $(this).data('productid');
        $(this).parent().prev().prev().parent().remove();
        $(this).parent().prev().css("display","none");
        $(this).parent().css("display","none");


        $.ajax({
                Type:"GET",
                url : '{{url("ajax/remove_cart")}}',
                dataType:'json',
                cache: false,
                data: {productid:productid},
                success: function(response){
                    console.log(response);
                    if(response.totalin_cart == 0){
                        location.reload();
                    //toastr.warning("error");
                 }
                else{
                    $( ".cart_price" ).text('₹'+response.carttotal);
                    $( ".cart_count" ).text(response.totalin_cart);
                    $( ".price" ).text('₹'+response.carttotal);

                    toastr.info('Remove from cart');
                   
                   
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
        Type:"get",
        url : '{{url("ajax/search")}}',
        dataType:'json',
        cache: false,
        data: {cat:cat,keywords:keywords},
        success: function(response){
            $('.list_details').css("display", "block");
            var rows='';
                    $.each(response,function(key,value){
                        var newurl = "{{url('/products/'.'?cat=')}}"+value.slug;
                       
                        rows+='<li class="menu_item_children"><a href="'+newurl+'">'+value.name+'</a></li>';
                    });
            $('.list_details').html(rows)
        }
     })
    }else{
        $('.list_details').css("display", "none");
    }
    });
    });
</script>

    </body>
</html>