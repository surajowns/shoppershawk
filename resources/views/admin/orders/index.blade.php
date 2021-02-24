@extends('admin.layouts.master')
@section('title','Orders')
@section('content')
<!-- Page Header -->

			
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">Booking List</h3>
						</div>
						<div class="col-auto text-right">
							<a class="btn btn-white filter-btn" href="javascript:void(0);" id="filter_search">
								<i class="fas fa-filter"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				<!-- Search Filter -->
				<div class="card filter-card" id="filter_inputs">
					<div class="card-body pb-0">
						<form>
							<div class="row filter-row">
								 <div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label class="col-form-label">From Date</label>
										<div class="cal-icon">
											<input class="form-control datetimepicker" type="text">
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<label class="col-form-label">To Date</label>
										<div class="cal-icon">
											<input class="form-control datetimepicker" type="text">
										</div>
									</div>
								</div>
								<div class="col-sm-6 col-md-3">
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit">Submit</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- /Search Filter -->
				
				<ul class="nav nav-tabs menu-tabs">
					<li class="nav-item active">
						<a class="nav-link" href="total-report.html">All Booking <span class="badge badge-primary">550</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="pending-report.html">Pending <span class="badge badge-primary">125</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="inprogress-report.html">InProgress <span class="badge badge-primary">86</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="complete-report.html">Completed <span class="badge badge-primary">89</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="reject-report.html">Rejected <span class="badge badge-primary">101</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="cancel-report.html">Canceled <span class="badge badge-primary">121</span></a>
					</li>
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
												<td>{{date('d M Y',strtotime($value['created_at']))}}</td>
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
														<select name = "status_change" class="selectpicker" data-style="btn-primary" onchange = "this.form.submit()"> 
														@foreach($status as $name) 
														<option  data-content="<span class='badge badge-success'>Relish</span>" value = "{{$name->id}}" @if($name->id == $value['status'][0]['id']){{'selected'}} @endif>{{$name->name}}</option>
														@endforeach
														</select>{{ Form::close() }}
												</td>
												<td>{{date('l h:i A',strtotime($value['updated_at']))}}</td>
												<td><a href="#" class="btn btn-sm bg-info-light">
														<i class="far fa-eye mr-1"></i> View
													</a></td>
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