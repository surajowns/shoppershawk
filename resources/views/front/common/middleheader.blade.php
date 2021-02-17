<?php 
    $categories=App\CategoryModel::where('parent_id',0)->where('status',1)->limit(5)->get();
    $subcategories=App\CategoryModel::where('parent_id','!=',0)->where('status',1)->get();

    $cartdetails=Cart::getContent()->toArray(); 
    $user=Auth::user();
   
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
                <a href="{{url('/')}}"><img src="{{url('public/front/img/logo/logo.png')}}" alt="logo" /></a>
            </div>
        </div>
        <div class="col-lg-7 col-md-12">
             <div class="main_menu menu_position text-center">
            <nav>
                <ul>

                @foreach($categories as $cat)
                        <li>
                            <a class="active" href="{{url('/products/'.'?cat='.$cat['slug'])}}">{{$cat['name']}}</a>
                            <!-- <ul class="sub_menu">
                                @foreach($subcategories as $subcat)
                                @if($cat['id']==$subcat['parent_id']) 
                                <li class="menu_item_children">
                                    <a href="{{url('/products/'.'?cat='.$cat['slug'].'&subcat='.$subcat['slug'])}}">{{$subcat['name']}}</a>
                                </li>
                                @endif
                                @endforeach
                            </ul> -->
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
                <div class="mini_cart_wrapper">
                    <a href="javascript:void(0)">
                        <i class="fa fa-shopping-bag"></i>
                        <span class="cart_price">₹{{number_format(Cart::getSubTotal(),2)}} <i class="ion-ios-arrow-down"></i></span>
                        <span class="cart_count">{{Cart::getContent()->count()}}</span>
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
    @foreach($cartdetails as $cart)
    <div class="cart_item">
        <div class="cart_img">
            <a href="{{url('/product_details/'.$cart['attributes']['slug'])}}"><img src="{{url('public/product_image/',$cart['attributes']['image'])}}" alt="" /></a>
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
   
    <div class="mini_cart_table">
        <div class="cart_total">
            <span>Sub total:</span>
            <span class="price">₹{{number_format(Cart::getSubTotal(),2)}}</span>
        </div>
        <div class="cart_total mt-10">
            <span>total:</span>
            <span class="price">₹{{number_format(Cart::getTotal(),2)}}</span>
        </div>
    </div>
    <div class="mini_cart_footer">
        <div class="cart_button">
            <a href="{{url('user/cart_details')}}">View cart</a>
        </div>
        <!-- <div class="cart_button">
            <a class="active" href="{{url('/user/checkout')}}">Checkout</a>
        </div> -->
    </div>
</div>
<!--mini cart end-->