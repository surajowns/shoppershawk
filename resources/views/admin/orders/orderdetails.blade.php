@extends('admin.layouts.master')
@section('title','Order Details')
@section('content')
<!-- Page Header -->
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Order Details</h3>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
                <div class="row">
					<div class="col-md-6">
						<div class="card">
							<div class="card-body">
                            <h3 class="page-title">Billing Details</h3>
                              <p>Name:{{$orders['billing_name']}}</p> 
                              <p>Email:{{$orders['billing_email']}}</p> 
                              <p>Address:{{$orders['billing_address']}}</p> 
                              <p>Mobile:{{$orders['billing_mobile']}}</p> 
                              <p>Landmark:{{$orders['billing_landmark']}}</p> 
                              <p>Country:{{$orders['billing_country']}}</p>  
                              <p>State:{{$orders['billing_state']}}</p>  
                              <p>Pincode:{{$orders['billing_pincode']}}</p>  

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
						<div class="card">
							<div class="card-body">
                            <h3 class="page-title">Shipping Details</h3>
                            @if($orders['shipping_name'])
                            <p>Name:{{$orders['shipping_name']}}</p> 
                              <p>Email:{{$orders['shipping_email']}}</p> 
                              <p>Address:{{$orders['shipping_address']}}</p> 
                              <p>Mobile:{{$orders['shipping_mobile']}}</p> 
                              <p>Landmark:{{$orders['shipping_landmark']}}</p> 
                              <p>Country:{{$orders['shipping_country']}}</p>  
                              <p>State:{{$orders['shipping_state']}}</p>  
                              <p>Pincode:{{$orders['shipping_pincode']}}</p> 
                              @else
                              <p>Name:{{$orders['billing_name']}}</p> 
                              <p>Email:{{$orders['billing_email']}}</p> 
                              <p>Address:{{$orders['billing_address']}}</p> 
                              <p>Mobile:{{$orders['billing_mobile']}}</p> 
                              <p>Landmark:{{$orders['billing_landmark']}}</p> 
                              <p>Country:{{$orders['billing_country']}}</p>  
                              <p>State:{{$orders['billing_state']}}</p>  
                              <p>Pincode:{{$orders['billing_pincode']}}</p> 
                              @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
                              <span class="float-left">GST:&nbsp;{{$orders['gst_no']}}</span>  <span class="float-right">Bussines Name:&nbsp;{{$orders['bussiness_name']}}</span> 
                            </div>
                         </div>
                     </div>
                </div>            

				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-center mb-0 datatable">
										<thead>
											<tr>
												<th>#</th>
												<th>Product Image</th>
												<th>Product Name</th>
												<th>Price</th>
												<th>Qauntity</th>
												<th>Total Amount</th>
                                                <th>Status</th>
											</tr>
										</thead>
										<tbody>
                                            
										@foreach($orderdetails as $value )
											<tr>
												<td>{{$loop->iteration}}</td>
												<td><img src="{{url('public/product_image/'.$value['products'][0]['productImage'][0]['image'])}}" alt="" width="100",height="100"></td>
												<td>{{$value['products'][0]['name']}}</td>
												<td>₹{{number_format($value['price'])}}</td>
												<td>{{$value['quantity']}}</td>

												<td>₹{{number_format($value['total_amount'])}}</td>
											
                                                <td>
														{{ Form::open(array('url' => 'admin/orders/item_status')) }}
														<input type = "hidden" name = "id" value = "{{$value['id']}}" >
                                                        <input type = "hidden" name = "order_id" value = "{{$orders['id']}}" >

														<select name = "status_change" class="form-control w-auto selectpicker" data-style="btn-primary" onchange = "this.form.submit()"> 
														@foreach($status as $name) 
														<option   value = "{{$name->id}}" @if($name->id == $value['status']){{'selected'}} @endif>{{$name->name}}</option>
														@endforeach
														</select>{{ Form::close() }}
												</td>

												
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
                <div class="row">
                <div class="col-md-6">
                </div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-body">
                            <div class="coupon_code right">
                                    <h3>Billing Amount</h3>
                                    <div class="coupon_inner">
                                        <div class="cart_subtotal">
                                            <p>Subtotal</p>
                                            <p class="cart_amount">₹{{number_format($orders['price'],2)}}</p>
                                        </div>
                                        <div class="cart_subtotal">
                                            <p>Shipping</p>
                                            <p class="cart_amount text-success">Free</p>
                                        </div>
                                        <div class="cart_subtotal">
                                            <p>Discount</p>
                                            <p>₹{{number_format($orders['discount'],2)}}</p>
                                        </div>
                                        <!-- <a href="#">Calculate shipping</a> -->

                                        <div class="cart_subtotal">
                                            <p>Total</p>
                                            <p class="cart_amount">₹{{number_format($orders['total_amount'],2)}}</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>
		
@endsection
@section('javascript')
<script src="{{url('public/admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{url('public/admin/assets/js/moment.min.js')}}"></script>
<script src="{{url('public/admin/assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{url('public/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{url('public/admin/assets/js/bootstrapValidator.min.html')}}"></script>
<script src="{{url('public/admin/assets/plugins/datatables/datatables.min.js')}}"></script>
<script src="{{url('public/admin/assets/js/select2.min.js')}}"></script>
<script src="{{url('public/admin/assets/js/admin.js')}}"></script>
@stop