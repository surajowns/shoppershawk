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
        <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>

        <!-- Main Responsive CSS -->
        <!-- <link rel="stylesheet" href="{{url('public/front/css/responsive.css')}}" /> -->
    </head>
    <?php 
  $categories=App\CategoryModel::where('parent_id',0)->where('status',1)->get();
  $subcategories=App\CategoryModel::where('parent_id','!=',0)->where('status',1)->get();

?>
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
                    <div class="header_bottom">
                    <div class="row align-items-center">
                        <div class="column1 col-lg-3 col-md-6">
                            <div class="categories_menu categories_three">
                                <div class="categories_title">
                                    <h2 class="categori_toggle">ALL CATEGORIES</h2>
                                </div>
                                <div class="categories_menu_toggle">
                                <ul>
                    @foreach($categories as $cat)
                        <li class="menu_item_children">
                            <a href="{{url('/products/'.'?cat='.$cat['slug'])}}">{{$cat['name']}} <i class="fa fa-angle-right"></i></a>
                            <ul class="categories_mega_menu">
                                @foreach($subcategories as $subcat)
                                @if($cat['id']==$subcat['parent_id']) 
                                <li class="menu_item_children">
                                    <a href="{{url('/products/'.'?cat='.$cat['slug'].'&subcat='.$subcat['slug'])}}">{{$subcat['name']}}</a>
                                    <!-- <ul class="categorie_sub_menu">
                                        <li><a href="#">Sweater</a></li>
                                        <li><a href="#">Evening</a></li>
                                        <li><a href="#">Day</a></li>
                                        <li><a href="#">Sports</a></li>
                                    </ul> -->
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </li>
                       @endforeach           
                        <!-- <li class="hidden"><a href="#">New Sofas</a></li>
                        <li class="hidden"><a href="#">Sleight Sofas</a></li>
                        <li>
                            <a href="#" id="more-btn"><i class="fa fa-plus" aria-hidden="true"></i> More Categories</a>
                        </li> -->
                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="column2 col-lg-6 ">
                            <div class="search_container">
                                    <form action="#">
                            <div class="hover_category">
                                <select class="select_option" name="select" id="categori2" required>
                                    <option selected value="">All Categories</option>
                                    @foreach($categories as $catonly)
                                    <option value="{{$catonly['slug']}}">{{$catonly['name']}}</option>
                                    @endforeach 
                                </select>
                            </div>
                            <div class="search_box">
                                <input placeholder="Search product..." type="text" />
                                <button type="submit">Search</button>
                            </div>
                        </form>
                            </div>

                        </div>
                        <div class="column3 col-lg-3 col-md-6">
                            <div class="header_bigsale">
                            <div class="btn-my">
                    Flash Sale Deal !!!
                    <div class="btn2-my"></div>
                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!--header bottom satrt-->
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
                    <!--header bottom end-->
                </div>
            </div>
        </header>
      
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
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


        @yield('javascript')
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPOxoqGdov5Z9xJw1SMVa_behLLSPacVM&libraries=places"></script>
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

google.maps.event.addDomListener(window, 'load', function () {
     var options = {
          componentRestrictions: {country: "IND"}
        };
        var places = new google.maps.places.Autocomplete(document.getElementById('billing_address','latitude','longitude'),'');
        google.maps.event.addListener(places, 'place_changed', function () {
          var place = places.getPlace();
          var address = place.formatted_address;
          var latitude = place.geometry.location.lat();
          var longitude = place.geometry.location.lng();
          // var mesg = address;
        
          // var suburb = address.split(',');
          $('#latitude').val(latitude);
          $('#latitude').val(latitude);


          $('#longitude').val(longitude);
          // alert(mesg+' latitude:- '+latitude+' longitude:-'+longitude);
        });
      });
 </script>
        <script>
        $(document).ready(function(){
            $('.cart').click(function(){
        
        var productid= $(this).data('productid');
        var producturl= $(this).data('url');

        
            $.ajax({
                    Type:"GET",
                    url : '{{url("ajax/add_to_cart")}}',
                    dataType:'json',
                    cache: false,
                    data: {productid:productid,producturl:producturl},
                    success: function(response){
                        console.log(response);
                    if(response.status == 'error'){
                    
                       toastr.warning("error");
                    
                    }
                    if(response.redirect === 'product_details'){
                        $url="{{url('user/cart_details')}}";
                        window.location=$url;
                     }
                    else{
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
                       toastr.warning("error");
                    }
                    else{
                        location.reload();
                    
                    }
                    }
                })
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