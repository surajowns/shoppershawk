@extends('front.master')
@section('title','Checkout Details')
@section('content')
<div class="checkout_page_bg">
   <div class="container">
      <div class="Checkout_section">
         <div class="row">
            <div class="col-12">
               @if(!Auth::check())
               <div class="user-actions">
                  <h3> 
                     <i class="fa fa-file-o" aria-hidden="true"></i>
                     Returning customer?
                     <a class="Returning" href="#checkout_login" data-bs-toggle="collapse" aria-expanded="true">Click here to login</a>     
                  </h3>
                  <div id="checkout_login" class="collapse" data-parent="#accordion">
                     <div class="checkout_info">
                        <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section.</p>
                        <div class="account_form login">
                           <h2>login</h2>
                           @if(session('failed'))
                           <p class="text-center text-danger">{{session('failed')}}</p>
                           @endif
                           @if(session('error'))
                           <p class="text-center text-danger">{{session('error')}}</p>
                           @endif
                           @if(session('success'))
                           <p class="text-center text-success">{{session('success')}}</p>
                           @endif
                           <form action="{{url('/user/verifyuser')}}" method='post'>
                              @csrf
                              <p class="form_group col-sm-6">
                                 <label>Phone Number or Email<span>*</span></label>
                                 <input type="text" name="email" required>
                              </p>
                              <p class="form_group col-sm-6">
                                 <label>Password <span>*</span></label >
                                 <input type="password" name="password" required>
                              </p>
                              <div class="login_submit">
                                  <a href="{{url('register')}}">New to Shoppershawk ? Registe</a>
                                 <label for="remember" >
                                 <input  name="remember" id="remember" type="checkbox" checked>
                                 Remember me
                                 </label>
                                 <button type="submit">login</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               @endif
               <div class="user-actions">
                            <h3> 
                                <i class="fa fa-file-o" aria-hidden="true"></i>
                                Apply Coupon Code?
                                <a class="Returning" href="#checkout_coupon" data-bs-toggle="collapse"  aria-expanded="true">Click here to Apply your coupon code</a>     
    
                            </h3>
                             <div id="checkout_coupon" class="collapse" data-parent="#accordion">
                                <div class="checkout_info coupon_info">
                                    <form action="{{url('/user/coupon/')}}" method="post" >
                                    @csrf
                                        <input placeholder="Coupon code" type="text" name="code" required>
                                        <button type="submit">Apply coupon</button>
                                        <span class="text-danger">{{$errors->first('code')}}</span>
                                    </form>
                                </div>
                            </div>    
                  </div>
               </div>
         </div>
         <div class="checkout_form">
            <div class="row">
               <div class="col-lg-6 col-md-6">
                  <div class="checkout_form_left">
                     <form method="post"  id="checkout_form">
                     @csrf
                        <h3>Billing Details</h3>
                        <div class="row">
                           <div class="col-lg-6 mb-20">
                              <label>Name <span>*</span></label>
                              <input type="text" name="billing_name" value="{{isset($userdeta['name'])?$userdeta['name']:''}}" required>
                           </div>
                           <div class="col-lg-6 mb-20">
                              <label>Email<span>*</span></label>
                              <input type="text" name="billing_email" value="{{isset($userdeta['email'])?$userdeta['email']:''}}" required>
                           </div>
                           <div class="col-6 mb-20">
                              <label for="country">Country <span>*</span></label>
                              <select class="niceselect_option" name="billing_country" id="country" required>
                                 <option value="india">India</option>
                                 <!-- <option value="3">Algeria</option>
                                    <option value="4">Afghanistan</option>
                                    <option value="5">Ghana</option>
                                    <option value="6">Albania</option>
                                    <option value="7">Bahrain</option>
                                    <option value="8">Colombia</option>
                                    <option value="9">Dominican Republic</option> -->
                              </select>
                           </div>
                           <div class="col-6 mb-20">
                              <label>State<span>*</span></label>
                                 <select name="billing_state" id="billing_state" class="form-control" required>
                                 <option value="">Select State</option>
                                 <option value="Andhra Pradesh">Andhra Pradesh</option>
                                 <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                 <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                 <option value="Assam">Assam</option>
                                 <option value="Bihar">Bihar</option>
                                 <option value="Chandigarh">Chandigarh</option>
                                 <option value="Chhattisgarh">Chhattisgarh</option>
                                 <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                 <option value="Daman and Diu">Daman and Diu</option>
                                 <option value="Delhi">Delhi</option>
                                 <option value="Lakshadweep">Lakshadweep</option>
                                 <option value="Puducherry">Puducherry</option>
                                 <option value="Goa">Goa</option>
                                 <option value="Gujarat">Gujarat</option>
                                 <option value="Haryana">Haryana</option>
                                 <option value="Himachal Pradesh">Himachal Pradesh</option>
                                 <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                 <option value="Jharkhand">Jharkhand</option>
                                 <option value="Karnataka">Karnataka</option>
                                 <option value="Kerala">Kerala</option>
                                 <option value="Madhya Pradesh">Madhya Pradesh</option>
                                 <option value="Maharashtra">Maharashtra</option>
                                 <option value="Manipur">Manipur</option>
                                 <option value="Meghalaya">Meghalaya</option>
                                 <option value="Mizoram">Mizoram</option>
                                 <option value="Nagaland">Nagaland</option>
                                 <option value="Odisha">Odisha</option>
                                 <option value="Punjab">Punjab</option>
                                 <option value="Rajasthan">Rajasthan</option>
                                 <option value="Sikkim">Sikkim</option>
                                 <option value="Tamil Nadu">Tamil Nadu</option>
                                 <option value="Telangana">Telangana</option>
                                 <option value="Tripura">Tripura</option>
                                 <option value="Uttar Pradesh">Uttar Pradesh</option>
                                 <option value="Uttarakhand">Uttarakhand</option>
                                 <option value="West Bengal">West Bengal</option>
                                 </select>
                                 @if($errors->first('billing_state'))
                                   <span class="text-danger">please Select State</span>
                                 @endif
                           </div>
                           <div class="col-12 mb-20">
                              <label>Address<span>*</span></label>
                              <input placeholder="" type="text" class="billing_address" name="billing_address" id="billing_address" value="{{isset($userdeta['location'])?$userdeta['location']:''}}" required>
                           </div>
                           <div class="col-12 mb-20">
                              <label>Landmark</label>
                              <input type="text" name="billing_landmark">
                           </div>
                           <div class="col-lg-6 mb-20">
                              <label>Phone<span>*</span></label>
                              <input type="text" name="billing_mobile" value="{{isset($userdeta['mobile'])?$userdeta['mobile']:''}}" required>
                           </div>
                           <div class="col-lg-6 mb-20">
                              <label>Pincode <span>*</span></label>
                              <input type="text" name="billing_pincode" value="" required>
                           </div>
                           <div class="col-12 mb-20">
                              <!-- <input id="address" type="checkbox" data-target="createp_account" /> -->
                              <label class="righ_0" for="address" data-bs-toggle="collapse" data-bs-target="#useinvoice" aria-controls="collapseOne">Use GST Invoice</label>
                              <span class="text-danger">{{$errors->first('gst_no')}}</span>
                              <br>
                              <span class="text-danger">{{$errors->first('bussiness_name')}}</span>


                              <div id="useinvoice" class="collapse one" data-parent="#accordion">
                                 <div class="row">
                                    <div class="col-lg-6 mb-20">
                                       <label>GST Number<span>*</span></label>
                                       <input  type="text" name="gst_no">
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                       <label>Bussines Name<span>*</span></label>
                                       <input  type="text" name="bussiness_name" value="" >
                                    </div>
                                    <span>Incorrect GSTIN details will lead to order cancellation</span>
                                 </div>
                              </div>
                           </div>
                           <div class="col-12 mb-20">
                              <!-- <input id="address" type="checkbox" data-target="createp_account" /> -->
                              <label class="righ_0" for="address" data-bs-toggle="collapse" data-bs-target="#collapsetwo" aria-controls="collapseOne">Ship to a different address?</label>
                              <div id="collapsetwo" class="collapse one" data-parent="#accordion">
                                 <div class="row">
                                    <div class="col-lg-6 mb-20">
                                       <label>Name <span>*</span></label>
                                       <input  type="text" name="shipping_name">
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                       <label>Email<span>*</span></label>
                                       <input  type="text" name="shipping_email" value="" >
                                    </div>
                                    <div class="col-6 mb-20">
                                       <label for="country">Country <span>*</span></label>
                                       <select  class="niceselect_option addrequired" name="shipping_country" id="shipping_country">
                                          <option value="india">India</option>
                                          <!-- <option value="3">Algeria</option>
                                             <option value="4">Afghanistan</option>
                                             <option value="5">Ghana</option>
                                             <option value="6">Albania</option>
                                             <option value="7">Bahrain</option>
                                             <option value="8">Colombia</option>
                                             <option value="9">Dominican Republic</option> -->
                                       </select>
                                    </div>
                                    <div class="col-6 mb-20">
                                    <label>State<span>*</span></label>
                                 <select name="shipping_state" id="shipping_state" class="form-control">
                                 <option value="">Select State</option>
                                 <option value="Andhra Pradesh">Andhra Pradesh</option>
                                 <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                 <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                 <option value="Assam">Assam</option>
                                 <option value="Bihar">Bihar</option>
                                 <option value="Chandigarh">Chandigarh</option>
                                 <option value="Chhattisgarh">Chhattisgarh</option>
                                 <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                 <option value="Daman and Diu">Daman and Diu</option>
                                 <option value="Delhi">Delhi</option>
                                 <option value="Lakshadweep">Lakshadweep</option>
                                 <option value="Puducherry">Puducherry</option>
                                 <option value="Goa">Goa</option>
                                 <option value="Gujarat">Gujarat</option>
                                 <option value="Haryana">Haryana</option>
                                 <option value="Himachal Pradesh">Himachal Pradesh</option>
                                 <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                 <option value="Jharkhand">Jharkhand</option>
                                 <option value="Karnataka">Karnataka</option>
                                 <option value="Kerala">Kerala</option>
                                 <option value="Madhya Pradesh">Madhya Pradesh</option>
                                 <option value="Maharashtra">Maharashtra</option>
                                 <option value="Manipur">Manipur</option>
                                 <option value="Meghalaya">Meghalaya</option>
                                 <option value="Mizoram">Mizoram</option>
                                 <option value="Nagaland">Nagaland</option>
                                 <option value="Odisha">Odisha</option>
                                 <option value="Punjab">Punjab</option>
                                 <option value="Rajasthan">Rajasthan</option>
                                 <option value="Sikkim">Sikkim</option>
                                 <option value="Tamil Nadu">Tamil Nadu</option>
                                 <option value="Telangana">Telangana</option>
                                 <option value="Tripura">Tripura</option>
                                 <option value="Uttar Pradesh">Uttar Pradesh</option>
                                 <option value="Uttarakhand">Uttarakhand</option>
                                 <option value="West Bengal">West Bengal</option>
                                 </select>
                                 
                                    </div>
                                    <div class="col-12 mb-20">
                                       <label>Address<span>*</span></label>
                                       <input  placeholder="" type="text"  name="shipping_address" value="{{isset($userdeta['location'])?$userdeta['location']:''}}" id="shipping_address">
                                    </div>
                                    <div class="col-12 mb-20">
                                       <label>Landmark</label>
                                       <input  type="text" name="shipping_landmark">
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                       <label>Phone<span>*</span></label>
                                       <input type="text" name="shipping_mobile" value="">
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                       <label> Pincode <span>*</span></label>
                                       <input  type="text" name="shipping_pincode" value="">
                                    </div>
                                    <div class="col-12">
                                       <div class="order-notes">
                                          <label for="order_note">Order Notes</label>
                                          <textarea  id="order_note" name="order_note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="payment_method">
                           <div class="panel-default">

                              <!-- <input id="payment_defult" name="order_type" value="cod" type="radio" data-target="createp_account" /> -->
                              <!-- <label for="payment_defult" data-bs-toggle="collapse" data-bs-target="#collapsedefult" aria-controls="collapsedefult">COD</label> -->
                              
                              <!-- <input id="payment_defult" name="order_type" value="online" type="radio" data-target="createp_account" /> -->
                              <!-- <label for="payment_defult" data-bs-toggle="collapse" data-bs-target="#collapsedefult" aria-controls="collapsedefult">Online</label> -->
                             <br>
                              @if($errors->first('order_type'))
                              <span class="text-danger">Please Select Payment Method</span>
                              @endif
                              <!-- <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                 <div class="card-body1">
                                    <p>account.</p>
                                 </div>
                              </div> -->
                           </div>
                           <div class="order_button">
                              <button  type="submit">Proceed to Pay</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="col-lg-6 col-md-6">
                  <div class="checkout_form_right">
                        <h3>Your order</h3>
                        <div class="order_table table-responsive">
                           <table>
                              <thead>
                                 <tr>
                                    <th>Product</th>
                                    <th>Price/Quantity</th>
                                    <th>Total</th>
                                 </tr>
                              </thead>
                              <tbody>
                                @if(Auth::check())
                                 @foreach($details as $data)
                                 <tr class="cart_table">
                                    <td class="text-left">
                                       <strong>{{$data['products'][0]['name']}}</strong>
                                    </td>
                                    <td class="product_quantity">
                                        <p><a href="javascript:void(0)" class="removecart" data-productid="{{$data['product_id']}}"><i class="fa fa-trash-o"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a>₹ {{number_format($data['price'],2)}}</p>
                                       <span class="input-number-decrement decrement" id="decrement" data-productid="{{$data['product_id']}}">–</span><input class="input-number" min="1" max="100"  value="{{$data['quantity']}}" data-productid="{{$data['product_id']}}"  type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" style="width:80px"><span class="input-number-increment increment" id="increment" data-productid="{{$data['product_id']}}">+</span>
                                    </td>
                                    <td>₹ {{number_format($data['quantity']*$data['price'],2)}}</td>
                                 </tr>
                                 @endforeach
                                 @else
                                 @foreach($details as $data)
                                 <tr>
                                    <td class="text-left">
                                       <strong>{{$data['name']}}</strong>
                                    </td>
                                    <td class="product_quantity">
                                        <p> <a href="javascript:void(0)" class="removecart" data-productid="{{$data['id']}}"><i class="fa fa-trash-o"></i></a>&nbsp;&nbsp;₹ {{number_format($data['price'],2)}}</p>
                                       <span class="input-number-decrement decrement" id="decrement" data-productid="{{$data['id']}}">–</span><input class="input-number" min="1" max="100"  value="{{$data['quantity']}}" data-productid="{{$data['id']}}"  type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" style="width:80px"><span class="input-number-increment increment" id="increment" data-productid="{{$data['id']}}">+</span>
                                    </td>
                                    <td>₹ {{number_format($data['quantity']*$data['price'],2)}}</td>
                                 </tr>
                                 @endforeach
                                 @endif
                              </tbody>
                              <tfoot>
                                @if(Auth::check())
                                <tr>
                                    <th colspan="2" class="text-right">Subtotal</th>
                                    <td class="cart_amount">₹{{number_format($subtotal,2)}}</td>
                                 </tr>
                                 <tr>
                                    <th colspan="2">Shipping</th>
                                   
                                    <td>
                                       <strong>
                                          <p class="shipping_cart_amount text-success">Free</p>
                                       </strong>
                                    </td>
                                 </tr>
                                 <tr>
                                   <th colspan="2">Discount</th>
                                   <td>₹{{number_format(Session::get('discount'),2)}}</td>
                                 </tr>
                                 <tr class="order_total">
                                   @if(session()->has('discount')  && session()->has('coupon'))
                                     {{Session::put('discount_amount',Session::get('discount'))}}
                                     {{Session::put('code',Session::get('coupon'))}}
                                   @endif
                                  
                                    <th colspan="2">Order Total</th>
                                    <td><strong class="cart_amount">₹{{number_format($subtotal-Session::get('discount'),2)}}</strong></td>
                                 </tr>
                                @else
                                 <tr>
                                    <th colspan="2">Subtotal</th>
                                    <td class="cart_amount">₹{{number_format(Cart::getSubTotal(),2)}}</td>
                                 </tr>
                                 <tr>
                                    <th colspan="2">Shipping</th>
                                   
                                    <td>
                                       <strong>
                                          <p class="shipping_cart_amount text-success">Free</p>
                                       </strong>
                                    </td>
                                 </tr>
                                 <tr>
                                   <th colspan="2">Discount</th>
                                   <td>₹{{number_format(Session::get('discount'),2)}}</td>
                                 </tr>
                                 <tr class="order_total">
                                   @if(session()->has('discount')  && session()->has('coupon'))
                                     {{Session::put('discount_amount',Session::get('discount'))}}
                                     {{Session::put('code',Session::get('coupon'))}}
                                   @endif
                                  
                                    <th colspan="2">Order Total</th>
                                    <td><strong class="cart_amount">₹{{number_format(Cart::getTotal()-Session::get('discount'),2)}}</strong></td>
                                 </tr>
                                 @endif
                              </tfoot>
                           </table>
                        </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection
@section('javascript')
<script src="{{url('public/front/js/jquery.validate.min.js')}}"></script>

<script>
$(document).ready(function(){
   $.validator.addMethod("regex", function(value, element, regexpr) {          
     return regexpr.test(value);
   }, "Please enter a valid GST no.");

     if ($("#checkout_form").length > 0) {
$("#checkout_form").validate({

    rules: {
        billing_name: {
            required: true,
            maxlength: 50
        },

        billing_email: {
            required: true,
            maxlength: 50,
            email: true,
        },

        billing_country: {
            required: true,
        },
        billing_state: {
            required: true,
        },
        billing_address: {
            required: true,
        },
        billing_landmark: {
            required: true,
        },
        billing_mobile: {
            required: true,
            minlength:10,
            maxlength:10,
            number:true,
        },
        billing_pincode: {
            required: true,
            minlength:6,
            maxlength:6,
            number:true,
        },
        gst_no:{
            required:true,
            minlength:15,
            maxlength:15,
            regex :/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/,
           
        },
        bussiness_name:{
           required:true,
        },
        shipping_name: {
            required: true,
            maxlength: 50
        },

        shipping_email: {
            required: true,
            maxlength: 50,
            email: true,
        },

        shipping_country: {
            required: true,
        },
        shipping_state: {
            required: true,
        },
        shipping_address: {
            required: true,
        },
        shipping_landmark: {
            required: true,
        },
        shipping_mobile: {
            required: true,
            minlength:10,
            maxlength:10,
            number:true,
        },
        shipping_pincode: {
            required: true,
            minlength:6,
            maxlength:6,
            number:true,
        },  
    },
    messages: {
      gst_no:{
         required:"Please fill out this field.",
         minlength:"GSTIN must be 15 characters",
         maxlength:"GSTIN must be 15 characters",
         regex :"GST state code should match the delivery address…",


      },
      bussiness_name:{
         required:"Please fill out this field.",
      },
      billing_state: {
            required: "Please select state ",
        },
      shipping_name: {
            required:"Please fill out this field.",
        },
       
        shipping_email: {
            required: "Please enter valid email",
            email: "Please enter valid email",
            maxlength: "The email name should less than or equal to 50 characters",
        },
        shipping_country: {
            required:"Please select country",
            maxlength:"The mobile number should not be greater than 10 digit"
        },
        shipping_state:{
            require :"Please select state" ,
        }

    },
})
}else{

}
});
</script>



<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPOxoqGdov5Z9xJw1SMVa_behLLSPacVM&libraries=places"></script>

<script>

google.maps.event.addDomListener(window, 'load', function () {
     var options = {
          componentRestrictions: {country: "IND"}
        };
        var places = new google.maps.places.Autocomplete(document.getElementById('billing_address','shipping_address','latitude','longitude'),options);
        google.maps.event.addListener(places, 'place_changed', function () {
          var place = places.getPlace();
          var billing_address = place.formatted_address;
          var shipping_address = place.formatted_address;

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
    $('.input-number').keyup(function(){
        var value=$(this).val();
        var productid= $(this).data('productid');
    // value++;
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
    })

</script>
<script>
    function padStart(str) {
        return ('0' + str).slice(-2)
    }

    function demoSuccessHandler(transaction) {
        // You can write success code here. If you want to store some data in database.
        $("#paymentDetail").removeAttr('style');
        $('#paymentID').text(transaction.razorpay_payment_id);
        var paymentDate = new Date();
        $('#paymentDate').text(
                padStart(paymentDate.getDate()) + '.' + padStart(paymentDate.getMonth() + 1) + '.' + paymentDate.getFullYear() + ' ' + padStart(paymentDate.getHours()) + ':' + padStart(paymentDate.getMinutes())
                );

        $.ajax({
            method: 'post',
            url: "{!!route('dopayment')!!}",
            data: {
                "_token": "{{ csrf_token() }}",
                "razorpay_payment_id": transaction.razorpay_payment_id
            },
            complete: function (r) {
                console.log('complete');
                console.log(r);
            }
        })
    }
</script>
<script>
    var options = {
        key: "{{ env('RAZORPAY_KEY') }}",
        amount: '247500',
        name: 'Shoppershawk',
        description: 'Order Id:',
        image: '{{url("public/front/img/logo/logo.png")}}',
        handler: demoSuccessHandler
    }
</script>
<script>
    $('#checkout_form').submit(function (e) {
        var button = $(this).find('button');
        var parent = $(this);
        //alert($(this).serialize())
        // button.attr('disabled', 'true').html('Please Wait...');
        $.ajax({
            method: 'post',
            url:'{{url("/user/dopayment")}}',
            data: $(this).serialize(),
            complete: function (r) {
               if(r.statusText==='Bad Request'){
                  toastr.error(r.responseJSON.error);
               }else if(r.responseJSON.error){
                  toastr.error(r.responseJSON.error);
                
               }else{
                  console.log('dfdf');
                  console.log('complete');
                  console.log(r);
                   window.r = new Razorpay(options);
                    r.open();
               }
               
            }
        })
        return false;
    })
</script>


<script>
   // window.r = new Razorpay(options);
   //  document.getElementById('paybtn').onclick = function () {
   //      r.open()
   //  }
</script>
@stop