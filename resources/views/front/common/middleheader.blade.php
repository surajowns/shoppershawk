<?php 
    $categories=App\CategoryModel::where('parent_id',0)->where('status',1)->limit(6)->get();
    $subcategories=App\CategoryModel::where('parent_id','!=',0)->where('status',1)->get();
 
    $cartdetails=Cart::getContent()->toArray(); 
    $user=Auth::user();
     
   
    $subtotal=0;
    if(!empty($user)){
           
        $cartdetails=App\CartModel::with('products','products.productImage')->where('user_id',$user['id'])->get()->toArray();
        $totalincart=count($cartdetails);
        foreach($cartdetails as $data){
            $subtotal=$subtotal+$data['quantity']*$data['price'];
        }

    
    }

    if(!empty($user)){
        $wishlist=App\Wishlist::where('user_id',$user->id)->get()->count();

    }else{
        $wishlist=0;
    }
    

?>
<div class="header_middle sticky-header">
    <div class="row align-items-center">
        <div class="col-lg-2 col-md-3 col-4">
            <div class="logo">
                <a href="{{url('/')}}" title="shoppers hawk"><img id="logoid" src="{{url('public/front/img/logo/logo.png')}}" alt="shoppers hawk" /></a>
            </div>
        </div>
        <div class="col-lg-7 col-md-12">
             <div class="main_menu menu_position text-center">
            <nav>
                <ul>
                @foreach($categories as $cat)
                        <li>
                            <a class="active" href="{{url('/products/'.'?cat='.$cat['slug'])}}">
                            <img src="{{url('public/category/'.$cat['image'])}}" alt="{{$cat['name']}}" width='50'>
                            <br>
                            {{$cat['name']}}</a>
                        </li>
                       @endforeach 
                </ul>
            </nav>
        </div> 
        </div>
        <div class="col-lg-3 col-md-7 col-6">
            <div class="header_configure_area">
                <div class="header_wishlist">
                    <a href="{{url('/user/wishlist_details')}}">
                        <i class="ion-android-favorite-outline"></i>
                        <span class="wishlist_count">{{$wishlist}}</span>
                    </a>
                </div>
                <!-- class="{{Request::segment(2)=='cart_details'?'cartmodaldisplay':''}}" -->
                <div class="mini_cart_wrapper">
                    <a href="javascript:void(0)">
                        <i class="fa fa-shopping-bag carttdetails"></i>
                        <span class="cart_price">@if(Auth::check())₹{{number_format($subtotal,2)}} @else ₹{{number_format(Cart::getSubTotal(),2)}} @endif<i class="ion-ios-arrow-down"></i></span>
                        <span class="cart_count">@if(Auth::check()){{$totalincart}}@else{{Cart::getContent()->count()}}@endif</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--header middel end-->

<!--mini cart-->
<div class="mini_cart">
    <div class="cart_close">
        <div class="cart_text">
            <h3>cart</h3>
        </div>
        <div class="mini_cart_close">
            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
        </div>
    </div>
     
    @if(Auth::check())
    
    @foreach($cartdetails as $details)
    <div class="cart_item">
        <div class="cart_img">
            <a href="{{url('/product_details/'.$details['products'][0]['slug'])}}"><img src="{{url('public/product_image/',$details['products']['0']['product_image'][0]['image'])}}" alt="{{$details['products'][0]['slug']}}" /></a>
        </div>
        <div class="cart_info">
            <a href="{{url('/product_details/'.$details['products'][0]['slug'])}}">{{$details['products'][0]['name']}}</a>
            <p>Qty: {{$details['quantity']}} X <span> ₹{{number_format($details['price'],2)}} </span></p>
        </div>
        <div class="cart_remove">
            <a href="javascript:void(0)" class="removecart" data-productid="{{$details['product_id']}}"><i class="ion-android-close"></i></a>
        </div>
    </div>
    @endforeach
    @else
    @foreach($cartdetails as $cart)
    <div class="cart_item">
        <div class="cart_img">
            <a href="{{url('/product_details/'.$cart['attributes']['slug'])}}"><img src="{{url('public/product_image/',$cart['attributes']['image'])}}" alt="{{$cart['attributes']['slug']}}" /></a>
        </div>
        <div class="cart_info">
            <a href="{{url('/product_details/'.$cart['attributes']['slug'])}}">{{$cart['name']}}</a>
            <p>Qty: {{$cart['quantity']}} X <span> ₹{{number_format($cart['price'],2)}} </span></p>
        </div>
        <div class="cart_remove">
            <a href="javascript:void(0)" class="removecart" data-productid="{{$cart['id']}}"><i class="ion-android-close"></i></a>
        </div>
    </div>
    @endforeach
   @endif
   @if(!empty($cartdetails))
    <div class="mini_cart_table">
        <div class="cart_total">
            <span>Sub total:</span>
            <span class="price">@if(Auth::check())₹{{number_format($subtotal,2)}}@else₹{{number_format(Cart::getSubTotal(),2)}}@endif</span>
        </div>
        <div class="cart_total mt-10">
            <span>total:</span>
            <span class="price">@if(Auth::check())₹{{number_format($subtotal,2)}} @else ₹{{number_format(Cart::getTotal(),2)}} @endif</span>
        </div>
    </div>
    <div class="mini_cart_footer">
        <div class="cart_button">
            <a href="{{url('user/cart_details')}}">View cart</a>
        </div>
       
    </div>
    @else
      <p class="no_products text-center">No products in the cart</p>
    @endif
</div>
<!--mini cart end-->