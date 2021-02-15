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
                                 <a href="#">Lost your password?</a>
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
            </div>
         </div>
         <div class="checkout_form">
            <div class="row">
               <div class="col-lg-6 col-md-6">
                  <div class="checkout_form_left">
                     <form method action="#">
                        <h3>Billing Details</h3>
                        <div class="row">
                           <div class="col-lg-6 mb-20">
                              <label>Name <span>*</span></label>
                              <input type="text" name="name" value="{{isset($userdeta['name'])?$userdeta['name']:''}}" required>
                           </div>
                           <div class="col-lg-6 mb-20">
                              <label>Email<span>*</span></label>
                              <input type="text" name="email" value="{{isset($userdeta['email'])?$userdeta['email']:''}}" required>
                           </div>
                           <div class="col-6 mb-20">
                              <label for="country">Country <span>*</span></label>
                              <select class="niceselect_option" name="country" id="country" required>
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
                              <input type="text"  required>
                           </div>
                           <div class="col-12 mb-20">
                              <label>Address<span>*</span></label>
                              <input placeholder="" type="text" class="billing_address" name="address" required>
                           </div>
                           <div class="col-12 mb-20">
                              <label>Landmark</label>
                              <input type="text" name="landmark">
                           </div>
                           <div class="col-lg-6 mb-20">
                              <label>Phone<span>*</span></label>
                              <input type="text" name="mobile" value="{{isset($userdeta['mobile'])?$userdeta['mobile']:''}}" required>
                           </div>
                           <div class="col-lg-6 mb-20">
                              <label> Pincode <span>*</span></label>
                              <input type="text" name="pincode" value="" required>
                           </div>
                           <div class="col-12 mb-20">
                              <input id="address" type="checkbox" data-target="createp_account" />
                              <label class="righ_0" for="address" data-bs-toggle="collapse" data-bs-target="#collapsetwo" aria-controls="collapseOne">Ship to a different address?</label>
                              <div id="collapsetwo" class="collapse one" data-parent="#accordion">
                                 <div class="row">
                                    <div class="col-lg-6 mb-20">
                                       <label>Name <span>*</span></label>
                                       <input type="text" name="shipping_name"  required>
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                       <label>Email<span>*</span></label>
                                       <input type="text" name="shipping_email" value="" required>
                                    </div>
                                    <div class="col-6 mb-20">
                                       <label for="country">Country <span>*</span></label>
                                       <select class="niceselect_option" name="shipping_country" id="shipping_country" required>
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
                                       <input type="text" name="shipping_state"  required>
                                    </div>
                                    <div class="col-12 mb-20">
                                       <label>Address<span>*</span></label>
                                       <input placeholder="" type="text" id="shipping_address" required>
                                    </div>
                                    <div class="col-12 mb-20">
                                       <label>Landmark</label>
                                       <input type="text" name="shipping_landmark">
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                       <label>Phone<span>*</span></label>
                                       <input type="text" name="shipping_mobile" value="" required>
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                       <label> Pincode <span>*</span></label>
                                       <input type="text" name="shipping_pincode" value="" required>
                                    </div>
                                    <div class="col-12">
                                       <div class="order-notes">
                                          <label for="order_note">Order Notes</label>
                                          <textarea id="order_note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="payment_method">
                           <div class="panel-default">
                              <input id="payment_defult" name="check_method" type="radio" data-target="createp_account" />
                              <label for="payment_defult" data-bs-toggle="collapse" data-bs-target="#collapsedefult" aria-controls="collapsedefult">PayPal <img src="assets/img/icon/papyel.png" alt=""></label>
                              <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                 <div class="card-body1">
                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                 </div>
                              </div>
                           </div>
                           <div class="order_button">
                              <button type="submit">Proceed to PayPal</button>
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
                                    <th>Total</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach($details as $data)
                                 <tr>
                                    <td>{{number_format($data['quantity'])}} <strong>×{{$data['name']}}</strong></td>
                                    <td>₹ {{number_format($data['quantity']*$data['price'],2)}}</td>
                                 </tr>
                                 @endforeach
                              </tbody>
                              <tfoot>
                                 <tr>
                                    <th>Cart Subtotal</th>
                                    <td>₹{{number_format(Cart::getSubTotal(),2)}}</td>
                                 </tr>
                                 <tr>
                                    <th>Shipping</th>
                                    <td>
                                       <strong>
                                          <p class="cart_amount text-success">Free</p>
                                       </strong>
                                    </td>
                                 </tr>
                                 <tr class="order_total">
                                    <th>Order Total</th>
                                    <td><strong>₹{{number_format(Cart::getTotal(),2)}}</strong></td>
                                 </tr>
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