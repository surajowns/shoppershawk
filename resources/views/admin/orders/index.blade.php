@extends('admin.layouts.master')
@section('title','Orders')
@section('content')
<!-- Page Header -->

			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Order List</h3>
						</div>
					
					</div>
				</div>
				<!-- /Page Header -->
				
				<!-- Search Filter -->
			
				<!-- /Search Filter -->
				
				<ul class="nav nav-tabs menu-tabs">
					<li class="nav-item {{Request::segment(2)=='orders'?'active':''}}">
						<a class="nav-link" href="{{url('admin/orders')}}">All Orders <span class="badge badge-primary">{{count(App\Order::get())}}</span></a>
					</li>
					@foreach($status as $value)
					<li class="nav-item">
						<a class="nav-link" href="{{url('admin/orders/'.$value['id'])}}">{{$value['name']}}<span class="badge badge-primary">{{count(App\Order::where('status',$value['id'])->get())}}</span></a>
					</li>
					@endforeach
			
				</ul>
				
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-hover table-center mb-0 datatable">
										<thead>
											<tr>
												<th>#</th>
												<th>Date</th>
												<th>User</th>
												<th>Price</th>
												<th>Qauntity</th>
												<th>Total Amount</th>
												<th>Status</th>
												<th>Updated</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										@foreach($orders as $value )
											<tr>
												<td>{{$loop->iteration}}</td>
												<td>{{date('d M Y h:i A',strtotime($value['created_at']))}}</td>
												<td>
													<span class="table-avatar">
														
														<a href="javascript:void(0);">{{$value['users'][0]['name']}}</a>
													</span>
												</td>
												<td>₹{{number_format($value['price'])}}</td>
												<td>{{$value['quantity']}}</td>

												<td>₹{{number_format($value['total_amount'])}}</td>
												<td>
														{{ Form::open(array('url' => 'admin/orders/updatestatus')) }}
														<input type = "hidden" name = "order_id" value = "{{$value['id']}}" >
														<select name = "status_change" class="form-control w-auto selectpicker" data-style="btn-primary" onchange = "this.form.submit()"> 
														@foreach($status as $name) 
														<option  value = "{{$name->id}}" @if($name->id == $value['status'][0]['id']){{'selected'}} @endif>{{$name->name}}</option>
														@endforeach
														</select>{{ Form::close() }}
												</td>
												<td>{{date('l h:i A',strtotime($value['updated_at']?$value['updated_at']:$value['created_at']))}}</td>
												<td><a href="{{url('admin/orders/viewdetails/'.$value['id'])}}" class="btn btn-sm bg-info-light">
														<i class="far fa-eye mr-1"></i> View</a>
														<a href="{{url('admin/orders/orderInvoice/'.$value['id'])}}" class="btn btn-sm bg-info-light">
														<i class="fa fa-download" aria-hidden="true"></i>Invoice</a>
													
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