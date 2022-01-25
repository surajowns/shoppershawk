@extends('front.master')
@section('title','Cart')
@section('content')
<div class="cart_page_bg">
        <div class="container">
        @if(!empty($cartdetails)))
            <div class="shopping_cart_area">
               
             <div class="col-sm-3 p-3 mb-2 bg-gradient-warning text-dark"><h3>My Cart </h3></div>
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
                                        @if(Auth::check())
                                        @foreach($cartdetails as $details)
                                            <tr class="cart_table">
                                                <td class="product_remove"><a href="javascript:void(0)" class="removecart" data-productid="{{$details['product_id']}}"><i class="fa fa-trash-o"></i></a></td>
                                                <td class="product_thumb"><a href="{{url('/product_details/'.$details['products'][0]['slug'])}}"><img src="{{url('public/product_image/',$details['products']['0']['product_image'][0]['image'])}}" alt=""></a></td>
                                                <td class="product_name"><a href="{{url('/product_details/'.$details['products'][0]['slug'])}}">{{$details['products'][0]['name']}}</a></td>
                                                <td class="product-price">₹{{ number_format($details['price'],2)}}</td>
                                                <td class="product_quantity">
                                                <span class="input-number-decrement decrement" id="decrement" data-productid="{{$details['product_id']}}">–</span><input class="input-number" min="1" maxlength="3"  value="{{$details['quantity']}}" data-productid="{{$details['product_id']}}"  type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"><span class="input-number-increment increment" id="increment" data-productid="{{$details['product_id']}}">+</span>
                                                </td>
                                                <td class="product_total">₹ {{number_format($details['quantity']*$details['price'],2)}}</td>


                                            </tr>
                                            @endforeach
                                        @else
                                        @foreach($cartdetails as $details)
                                            <tr class="cart_table">
                                                <td class="product_remove"><a href="javascript:void(0)" class="removecart" data-productid="{{$details['id']}}"><i class="fa fa-trash-o"></i></a></td>
                                                <td class="product_thumb"><a href="{{url('/product_details/'.$details['attributes']['slug'])}}"><img src="{{url('public/product_image/',$details['attributes']['image'])}}" alt=""></a></td>
                                                <td class="product_name"><a href="{{url('/product_details/'.$details['attributes']['slug'])}}">{{$details['name']}}</a></td>
                                                <td class="product-price">₹{{ number_format($details['price'],2)}}</td>
                                                <td class="product_quantity">
                                                   <span class="input-number-decrement decrement" id="decrement" data-productid="{{$details['id']}}">–</span><input class="input-number" min="1" maxlength="3"  value="{{$details['quantity']}}" data-productid="{{$details['id']}}"  type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');"><span class="input-number-increment increment" id="increment" data-productid="{{$details['id']}}">+</span>
                                                </td>
                                                <td class="product_total">₹ {{number_format($details['quantity']*$details['price'],2)}}</td>


                                            </tr>
                                            @endforeach
                                        @endif  

                                        </tbody>
                                    </table>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                    <!--coupon code area start-->
                    <div class="coupon_area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                              
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon_code right">
                                    <h3>Cart Totals</h3>
                                   @if(Auth::check())
                                   <div class="coupon_inner">
                                        <div class="cart_subtotal">
                                            <p>Subtotal</p>
                                            <p class="cart_amount">₹{{number_format($subtotal,2)}}</p>
                                        </div>
                                        <div class="cart_subtotal">
                                            <p>Shipping</p>
                                            <p class="shipping_cart_amount text-success">Free</p>
                                        </div>
                                        <div class="cart_subtotal">
                                            <p>Discount</p>
                                            <p>₹{{number_format(Session::get('discount'),2)}}</p>
                                        </div>

                                        <div class="cart_subtotal">
                                            <p>Total</p>
                                            <p class="cart_amount">₹{{number_format($subtotal-Session::get('discount'),2)}}</p>
                                        </div>
                                   @else
                                    <div class="coupon_inner">
                                        <div class="cart_subtotal">
                                            <p>Subtotal</p>
                                            <p class="cart_amount">₹{{number_format(Cart::getSubTotal(),2)}}</p>
                                        </div>
                                        <div class="cart_subtotal">
                                            <p>Shipping</p>
                                            <p class="cart_amount text-success">Free</p>
                                        </div>
                                        <div class="cart_subtotal">
                                            <p>Discount</p>
                                            <p>₹{{number_format(Session::get('discount'),2)}}</p>
                                        </div>

                                        <div class="cart_subtotal">
                                            <p>Total</p>
                                            <p class="cart_amount">₹{{number_format(Cart::getTotal()-Session::get('discount'),2)}}</p>
                                        </div>
                                        @endif
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
                   <img src="{{url('/public/front/img/emptycart.png')}}" alt="">
                </div>
            </div>
            @endif
        </div>
    </div>
    @endsection
@section('javascript')
<script>
    $('.input-number').keyup(function(){
        var value=$(this).val();
        var productid= $(this).data('productid');
    $.ajax({
            Type:"POST",
            url : '{{url("/user/updatecart")}}',
            dataType:'json',
            cache: true,
            data: {value:value,productid:productid},
            success: function(response){
            if(response.status == 'error'){
            }
            else{
                location.reload();
            
            }
            }
        })
    })

</script>
@stop