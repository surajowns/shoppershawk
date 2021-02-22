@extends('front.master')
@section('title','Cart')
@section('content')
<div class="cart_page_bg">
        <div class="container">
        @if(!empty(Cart::getContent()->toArray()))
            <div class="shopping_cart_area">
               
             <div class="col-sm-3 p-3 mb-2 bg-gradient-warning text-dark"><h3>My Cart ({{Cart::getContent()->count()}})</h3></div>
                <!-- <form action="#"> -->
                    <div class="row">
                        <div class="col-12">
                            <div class="table_desc">
                                <div class="cart_page table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product_remove">Remove</th>
                                                <th class="product_thumb">Product Image</th>
                                                <th class="product_name">Product Name</th>
                                                <th class="product-price">Price</th>
                                                <th class="product_quantity">Quantity</th>
                                                <th class="product_total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cartdetails as $details)
                                            <tr>
                                                <td class="product_remove"><a href="javascript:void(0)" class="removecart" data-productid="{{$details['id']}}"><i class="fa fa-trash-o"></i></a></td>
                                                <td class="product_thumb"><a href="{{url('/product_details/'.$details['attributes']['slug'])}}"><img src="{{url('public/product_image/',$details['attributes']['image'])}}" alt=""></a></td>
                                                <td class="product_name"><a href="{{url('/product_details/'.$details['attributes']['slug'])}}">{{$details['name']}}</a></td>
                                                <td class="product-price">₹{{ number_format($details['price'],2)}}</td>
                                                <td class="product_quantity">
                                                <span class="input-number-decrement decrement" id="decrement" data-productid="{{$details['id']}}">–</span><input class="input-number" min="1" max="100"  value="{{$details['quantity']}}"  type="text" readonly><span class="input-number-increment increment" id="increment" data-productid="{{$details['id']}}">+</span>
                                                 <!-- <input min="1" max="100" value="{{$details['quantity']}}" type="number"> -->
                                                </td>
                                                <td class="product_total">₹ {{number_format($details['quantity']*$details['price'],2)}}</td>


                                            </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                <!-- <div class="cart_submit">
                                    <button type="submit">update cart</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!--coupon code area start-->
                    <div class="coupon_area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon_code left">
                                    <h3>Coupon</h3>
                                    <div class="coupon_inner">
                                     <form action="{{url('/user/coupon/')}}" method="post" >
                                    @csrf
                                        <input placeholder="Coupon code" type="text" name="code">
                                        <button type="submit">Apply coupon</button>
                                        <span class="text-danger">{{$errors->first('code')}}</span>
                                    </form>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon_code right">
                                    <h3>Cart Totals</h3>
                                    <div class="coupon_inner">
                                        <div class="cart_subtotal">
                                            <p>Subtotal</p>
                                            <p class="cart_amount">₹{{number_format(Cart::getSubTotal(),2)}}</p>
                                        </div>
                                        <div class="cart_subtotal ">
                                            <p>Shipping</p>
                                            <p class="cart_amount text-success">Free</p>
                                        </div>
                                        <!-- <a href="#">Calculate shipping</a> -->

                                        <div class="cart_subtotal">
                                            <p>Total</p>
                                            <p class="cart_amount">₹{{number_format(Cart::getTotal(),2)}}</p>
                                        </div>
                                        <div class="checkout_btn">
                                            <a href="{{url('/user/checkout')}}">Proceed to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--coupon code area end-->
                <!-- </form> -->
           
      
            </div>
            @else
            <div class="row">
                <div class="col-sm-12 text-center">
                   <img src="{{url('/public/front/img/emptycart.jpg')}}" alt="">
                </div>
            </div>
            @endif
        </div>
    </div>
    @endsection