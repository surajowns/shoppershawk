<!DOCTYPE html>
<html class="no-js" lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
         <?php 
            
             $product=App\Product::where('slug',Request::segment(2))->first();
            if(!empty($product)){
             $Productimg=App\ProductImage::where('product_id',$product['id'])->first();
             }
            
             $categories=App\CategoryModel::where('parent_id',0)->where('status',1)->get();
             $subcategories=App\CategoryModel::where('parent_id','!=',0)->where('status',1)->get();
           

         ?>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Shoppershawk</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="title" content="{{Request::segment(2)}}">
        <meta name="description" content="{{isset($product)?$product['description']:''}}">
        <meta name="keywords" content="">
        <meta property="og:title" content="{{Request::segment(2)}}">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{Request::url()}}">
        <meta property="og:image" content="{{url('public/product_image/'. (isset($Productimg)?$Productimg['image']:''))}}">
        <meta property="og:image:width" content="600">
        <meta property="og:image:height" content="600">
        <meta property="og:description" content="{{isset($product)?$product['description']:''}}">
        <meta property="og:site_name" content="https://shoppershawk.com/">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{Request::segment(2)}}">
        <meta name="twitter:description" content="{{isset($product)?$product['description']:''}}">
        <meta name="twitter:image" content="{{url('public/product_image/'. (isset($Productimg)?$Productimg['image']:''))}}">
            
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{url('public/front/img/favicon.png')}}" />

        <!-- CSS -->

        <!-- Plugins CSS -->
        <link rel="stylesheet" href="{{url('public/front/css/plugins.css')}}" />
        <link rel="stylesheet" href="{{url('public/admin/assets/plugins/fontawesome/css/fontawesome.min.css')}}">

        <!-- Main Style CSS -->
        <link rel="stylesheet" href="{{url('public/front/css/style.css')}}" />
        <!-- Main Responsive CSS -->
        <link rel="stylesheet" href="{{url('public/front/css/responsive.css')}}" />
        <script src="{{url('public/front/js/checkout.js')}}"></script>

        <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-P9S15Q3GME"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-P9S15Q3GME');
</script>
    </head>
    <body>
    <div id="dvLoading"></div>
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
                                    <li>Hotline: <a href="tel:+91 120-2514786">+91 120-2514786</a></li>
                                </ul>
                                <div class="order_button mt-20">
                                @if(!Auth::check())
                                <a class="btn btn-danger" href="{{url('/login')}}">Login|Register</a>
                                @else
                                <a href="{{url('/user/account')}}">Hi {{Auth::user()->name}}</a></li>
                                 <a class="btn btn-danger" href="{{url('/user/logout')}}">Logout</a></li>
                                @endif
                                </div>
                            </div>
                            <div id="menu" class="text-left">
                                <ul class="offcanvas_main_menu">
                                    <li class="menu-item-has-children active">
                                        <a href="{{url('/')}}">Home</a>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"><i class="fa fa-angle-down"></i></span>
                                    <a href="javascript:void(0)">Category</a>
                                    <ul class="sub-menu" style="display: none;">
                                    @foreach($categories as $cat)
                                        <li class="menu-item-has-children"><span class="menu-expand"><i class="fa fa-angle-down"></i></span>
                                            <a href="{{url('/products/'.'?cat='.$cat['slug'])}}">{{$cat['name']}}</a>
                                            <ul class="sub-menu" style="display: none;">
                                            @foreach($subcategories as $subcat)
                                                 @if($cat['id']==$subcat['parent_id']) 
                                                <li><a href="{{url('/products/'.'?cat='.$cat['slug'].'&subcat='.$subcat['slug'])}}">{{$subcat['name']}}</a></li>
                                                @endif
                                            @endforeach    
                                             
                                            </ul>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                  
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
                    <div class="breadcrumbs_area">
        <!-- <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="{{url('/')}}">home</a></li>
                           @if(isset($_GET['cat']))
                           <?php $brandname=App\BrandModel::where('id',$_GET['cat'])->first('name')?>
                            <li>{{is_numeric($_GET['cat'])?$brandname['name']:$_GET['cat']}}</li>
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
        </div> -->
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
                    toastr.success("{{Session::get('success')}}");
                @endif
                @if(Session::has('error'))
                    toastr.error("{{Session::get('error')}}");
                @endif

            });
        </script>
        <script>
            $(document).ready(function(){
                $(document).on("click",".addtowishlist",function(){
                
                var productid= $(this).data('productid');
                var className=$(this).children().attr('class');
                var id=$(this).children().attr('id');
                $(this).children().removeClass(className);
                $(this).closest("tr").remove();

                $.ajax({
                        Type:"GET",
                        url :'{{url("user/wishlist/")}}',
                        dataType:'json',
                        cache: false,
                        data: {productid:productid},
                        success: function(response){
                         console.log(response);
                         if(response.totalwishlist == 0){
                             location.reload();
                           }
                         if(response.status == 'add'){
                           
        
                            $('.wishlist_count').text(response.totalwishlist);
                            // data('tippy').text("Remove from Wishlist");
                            $('#'+id).addClass(response.adclass);
                            toastr.info(response.message);
                           
                         }else if(response.status == 'remove'){
                           
                            // $(this).children().removeClass(className);
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
            $(this).closest("tr").remove();
            $.ajax({
            Type:"GET",
            url : '{{url("ajax/add_to_cart")}}',
            dataType:'json',
            cache: false,
            data: {productid:productid},
            success: function(response){
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
            $(document).on("click",".removecart",function(){

            var productid= $(this).data('productid');
            // alert()

            // $(this).parent().prev().prev().parent().css("display","none");
            // $(this).parent().prev().css("display","none");
            // $(this).parent().css("display","none");
            $(this).closest("tr").remove();
            $(this).parent().parent().remove();

            $.ajax({
                    Type:"GET",
                    url : '{{url("ajax/remove_cart")}}',
                    dataType:'json',
                    cache: false,
                    data: {productid:productid},
                    success: function(response){
                        console.log(response);
                        if(response.totalin_cart == 0){
                            window.location.href = "{{url('user/cart_details')}}";
                        }
                    else{
                        $( ".cart_price" ).text('₹'+response.carttotal);
                        $( ".cart_count" ).text(response.totalin_cart);
                        $( ".price" ).text('₹'+response.carttotal);
                        $( ".cart_amount" ).text('₹'+response.carttotal);


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
            }
            else{
            $('.list_details').css("display", "none");
            }
            });
            });
            $(document).ready(function(){

            $( ".increment" ).click(function() {
            var value=$(this).prev().val()
            var productid= $(this).data('productid');
            value++;
            $.ajax({
                Type:"POST",
                url : '{{url("/user/updatecart")}}',
                dataType:'json',
                cache: true,
                data: {value:value,productid:productid},
                success: function(response){
                if(response.status == 'error'){
                toastr.warning("error");
                }
                else{
                    location.reload();
                
                }
                }
            })       
            });

            $( ".decrement" ).click(function() {
            var value=$(this).next().val();

            var productid= $(this).data('productid');
            value--;
            $.ajax({
                Type:"POST",
                url : '{{url("/user/updatecart")}}',
                dataType:'json',
                cache: true,
                data: {value:value,productid:productid},
                success: function(response){
                if(response.status == 'error'){
                        toastr.warning("error");
                }
                else{
                    location.reload();
                
                }
                }
            })       
            });
            });

            </script>

            </body>
            </html>