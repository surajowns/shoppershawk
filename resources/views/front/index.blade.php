<!DOCTYPE html>
<html class="no-js" lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title> Online Shopping site in India: Shop Online for Laptops,Tablets, Desktops, Monitors ,Accessories and More - Shoppershawk.com </title>
    <meta name="description"
        content="Shoppershawk.com: Online Shopping India - Buy laptops,desktops,monitors,apparel,accessories,Free Shipping Available." />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords"
        content="Shoppershawk.com, Shoppers Hawk, Online Shopping, online shopping india, shoppershawk india, shoppershawk, buy online, buy laptops online, buy desktops online, buy tablets online,computers,laptop,watches,home,accessories,Led's,monitor,tft,tfts,hp,dell,lenovo,acer,asus,silicon power">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/front/img/favicon.png')}}" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('public/css/app.css')}}" />    

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('public/front/css/plugins.css')}}" />

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('public/front/css/style.css')}}" />

    <!-- Main Responsive CSS -->
    <link rel="stylesheet" href="{{asset('public/front/css/responsive.css')}}" />
    <link rel="stylesheet" href="{{asset('public/front/css/toastr.css')}}" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-P9S15Q3GME"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-P9S15Q3GME');

    </script>
    @laravelPWA
</head>

<body>
    {{-- this is mobile navigation --}}
    <?php /* $sociallinks = App\SocialLinksModel::where('status',1)->get(); */ ?>
    <div class="off_canvars_overlay"></div>
    <livewire:mobile-nav />
    <!--Offcanvas menu area end-->

    <!--header area start-->
    <header>
        <div class="main_header">
            <div class="container">
                {{-- <!--header top start-->
                     @include('front.common.topheader')
                    <!--header top end-->

                    <!--header middel start-->
                    @include('front.common.middleheader')

                    <!--header bottom satrt-->
                    @include('front.common.header')
                    <!--header bottom end--> --}}

                <livewire:header />
            </div>
        </div>
    </header>
    <!--header area end-->

    <!--slider area start-->

    <!--top and side banner-->
    {{-- @include('front.common.topslider') --}}
        <livewire:slider />
    <!--end top and side banner-->

    <!--slider area end-->

    <!--shipping area start-->
    {{-- <!-- @include('front.common.shippingdetails') --> --}}
    <!--shipping area end-->

    <!--home section bg area start-->
        <livewire:home-content />
    <!--home section bg area end-->

    <!--footer area start-->
    @include('front.common.footer')
    <!--footer area end-->

    <!-- modal area start-->

    <!-- modal area end-->

    <!--news letter popup start-->
    <!-- <div class="newletter-popup">
            <div id="boxes" class="newletter-container">
                <div id="dialog" class="window">
                    <div id="popup2">
                        <span class="b-close"><span>close</span></span>
                    </div>
                    <div class="box">
                        <div class="newletter-title">
                        </div>
                        <div class="box-content newleter-content">
                        <a href="https://shoppershawk.com/products?cat=laptops">
                           {{-- <img src="{{asset('public/newsletter/sale.jpg')}}" alt="" width="400"> --}}
                           </a>
                        </div>
                     </div>
                </div>
            </div> 
         </div>  -->
    <!--news letter popup start-->

    <!-- JS
============================================ -->

    <!-- Plugins JS -->
    <script src="{{asset('public/front/js/plugins.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('public/front/js/main.js')}}"></script>
    <script src="{{asset('public/front/js/toastr.min.js')}}"></script>

    @yield('javascript')

    <script>
        $(document).ready(function () {
            document.addEventListener("click", function () {
                $(".list_details").css("display", "none");
            });
            // Register service worker to control making site work offline

            if ('serviceWorker' in navigator) {
                navigator.serviceWorker
                    .register('{{asset("/serviceworker.js")}}')
                    .then(() => { //console.log('Service Worker Registered'); 
                    });
            }

            @if(Session::has('success'))
                toastr.success("{{Session::get('success')}}")
            @endif
            @if(Session::has('error'))
                toastr.error("{{Session::get('error')}}")
            @endif
            @if(Session::has('message'))
                toastr.error("{{Session::get('message')}}");
            @endif
        });

    </script>

    <script>
        $(document).ready(function () {

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

            $(document).on("click", ".addtowishlist", function () {

                var productid = $(this).data('productid');
                var className = $(this).children().attr('class');
                var id = $(this).children().attr('id');
                $(this).parent().remove();
                $(this).children().removeClass(className);
                $.ajax({
                    Type: "GET",
                    url: '{{url("user/wishlist/")}}',
                    dataType: 'json',
                    cache: false,
                    data: {
                        productid: productid
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.status == 'add') {


                            $('.wishlist_count').text(response.totalwishlist);
                            $('#' + id).addClass(response.adclass);
                            toastr.info(response.message);

                        } else if (response.status == 'remove') {



                            $('.wishlist_count').text(response.totalwishlist);
                            $('#' + id).addClass(response.remoclass);
                            toastr.info(response.message);
                        } else {
                            window.location.href = "{{url('/login')}}";
                        }
                    }
                })
            });

            $(document).on("click", ".cart", function () {

                var productid = $(this).data('productid');
                $.ajax({
                    Type: "GET",
                    url: '{{url("ajax/add_to_cart")}}',
                    dataType: 'json',
                    cache: false,
                    data: {
                        productid: productid
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.status == 'error') {

                        } else {
                            $(".cart_item").remove();
                            $(".cart_price").text('₹' + response.carttotal);
                            $(".cart_count").text(response.totalin_cart);
                            $(".price").text('₹' + response.carttotal);
                            $(".no_products").css('display', 'none');


                            $(".cart_close").after('<div class="cart_item"></div>');
                            var rows = '';
                            $.each(response.data, function (key, value) {

                                if ('{{!empty(Auth::check())}}') {

                                    var producturl =
                                        "{{url('/product_details/')}}" + '/' + value
                                        .products[0]['slug'];
                                    var image = "{{url('public/product_image/')}}" +
                                        '/' + value.products[0]['product_image'][0][
                                            'image'
                                        ];
                                    var product_id = value.products[0]['id'];
                                    var name = value.products[0]['name'];
                                    var quantity = value.quantity;
                                    var price = value.price;
                                } else {
                                    var producturl =
                                        "{{url('/product_details/')}}" + '/' + value
                                        .attributes.slug;
                                    var image = "{{url('public/product_image/')}}" +
                                        '/' + value.attributes.image;
                                    var product_id = value.id;
                                    var name = value.name;
                                    var quantity = value.quantity;
                                    var price = value.price;
                                }
                                rows +=
                                    '<div class="cart_item"><div class="cart_img"><a href="' +
                                    producturl + '"><img src="' + image +
                                    '" alt="" /></a></div><div class="cart_info"><a href="">' +
                                    name + '</a><p>Qty:' + quantity + ' X <span>' +
                                    price +
                                    '</span></p></div><div class="cart_remove"><a href="javascript:void(0)" class="removecart" data-productid="' +
                                    product_id +
                                    '"><i class="ion-android-close"></i></a></div></div>';


                            });
                            $(rows).insertAfter(".cart_item");
                            toastr.info('Added to cart');

                        }
                    }
                })
            });
            $(document).on("click", ".removecart", function () {

                var productid = $(this).data('productid');
                $(this).parent().prev().prev().parent().remove();
                $(this).parent().prev().css("display", "none");
                $(this).parent().css("display", "none");


                $.ajax({
                    Type: "GET",
                    url: '{{url("ajax/remove_cart")}}',
                    dataType: 'json',
                    cache: false,
                    data: {
                        productid: productid
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.totalin_cart == 0) {
                            location.reload();
                            //toastr.warning("error");
                        } else {
                            $(".cart_price").text('₹' + response.carttotal);
                            $(".cart_count").text(response.totalin_cart);
                            $(".price").text('₹' + response.carttotal);

                            toastr.info('Remove from cart');


                        }
                    }
                })
            });
        });

    </script>
    <script>
        $(function () {

            $(".sample_search").keyup(function (e) {
                if (e.which != 40 && e.which != 38) {
                    var cat = $('#categor').val();
                    var keywords = $(this).val();
                    // alert(cat);
                    if (keywords != '') {
                        $.ajax({
                            Type: "get",
                            url: '{{url("ajax/search")}}',
                            dataType: 'json',
                            cache: false,
                            data: {
                                cat: cat,
                                keywords: keywords
                            },
                            success: function (response) {
                                $('.list_details').css("display", "block");
                                var rows = '';
                                $.each(response, function (key, value) {
                                    // if(value.status===1){
                                    var newurl = "{{url('/products/'.'?cat=')}}" +
                                        value.slug;

                                    rows +=
                                        '<li class="menu_item_children"><a class="search_value" href="' +
                                        newurl + '">' + value.name + '</a></li>';
                                    // }
                                });
                                $('.list_details').html(rows)
                            }
                        })
                    } else {
                        $('.list_details').css("display", "none");
                    }
                }
            });
        });

    </script>
</body>
</html>