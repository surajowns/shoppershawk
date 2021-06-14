@extends('admin.layouts.master')
@section('title','Payments')
@section('content')
<!-- Page Header -->

			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Payment List</h3>
						</div>
					
					</div>
				</div>
				<!-- /Page Header -->
				
				<!-- Search Filter -->
			
				<!-- /Search Filter -->
				
			
				
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-center mb-0 datatable">
										<thead>
											<tr>
												<th>#</th>
												<th>Order No</th>
                                                <th>User</th>
												<th>Date</th>
												<th>Payment Email</th>
                                                <th>Payment Contact</th>
												<th>Amount</th>
												<th>Payment Id</th>
                                                <th>Payment Order Id</th>
                                                <th>Payment Method</th>
												<th>Status</th>
                                                <th>Action</th>
											</tr>
										</thead>
										<tbody>
										@foreach($transaction as $value )
											<tr>
												<td>{{$loop->iteration}}</td>
												<td>SHOPPERSHAWK#{{$value['order_id']}}</td>
                                                <td></td>
												<td>{{date('d M Y h:i A',strtotime($value['created_at']))}}</td>
												<td>
													<span class="table-avatar">
														
														<a href="javascript:void(0);">{{$value['payment_email']}}</a>
													</span>
												</td>
                                                <td>{{$value['contact']}}</td>
												<td>₹{{number_format($value['amount'],2)}}</td>
												<td>{{$value['payment_id']}}</td>

												<td>{{$value['pay_order_id']}}</td>
												<td>{{$value['method']}}</td>
												<td>{{$value['payment_status']}}</td>
                                                <td><a href="{{url('admin/orders/viewdetails/'.$value['order_id'])}}" class="btn btn-sm bg-info-light">
														<i class="far fa-eye mr-1"></i> View</a></td>
											
											</tr>
											@endforeach
										</tbody>
									</table>
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