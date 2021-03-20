@extends('admin.layouts.master')
@section('title','Admin Dashboard')
@section('content')
<div class="row">
<div class="col-xl-3 col-sm-6 col-12">
	<div class="card">
		<div class="card-body">
			<div class="dash-widget-header">
				<span class="dash-widget-icon bg-primary">
				<i class="fas fa-users"></i>				</span>
				<div class="dash-widget-info">
					<h3>{{$user}}</h3>
					<h6 class="text-muted">Users</h6>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-xl-3 col-sm-6 col-12">
	<div class="card">
		<div class="card-body">
			<div class="dash-widget-header">
				<span class="dash-widget-icon bg-primary">
				<i class="fas fa-layer-group"></i>
				</span>
				<div class="dash-widget-info">
					<h3>{{$categories}}</h3>
					<h6 class="text-muted">Categories</h6>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-xl-3 col-sm-6 col-12">
	<div class="card">
		<div class="card-body">
			<div class="dash-widget-header">
				<span class="dash-widget-icon bg-primary">
				<i class="fas fa-layer-group"></i>
				</span>
				<div class="dash-widget-info">
					<h3>{{$brand}}</h3>
					<h6 class="text-muted">Brands</h6>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-xl-3 col-sm-6 col-12">
	<div class="card">
		<div class="card-body">
			<div class="dash-widget-header">
				<span class="dash-widget-icon bg-primary">
					<i class="fas fa-user-shield"></i>
				</span>
				<div class="dash-widget-info">
					<h3>{{$products}}</h3>
					<h6 class="text-muted">Products</h6>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-xl-3 col-sm-6 col-12">
	<div class="card">
		<div class="card-body">
			<div class="dash-widget-header">
				<span class="dash-widget-icon bg-primary">
					<i class="far fa-credit-card"></i>
				</span>
				<div class="dash-widget-info">
					<h3>{{$totalorders}}</h3>
					<h6 class="text-muted">Orders</h6>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="col-xl-3 col-sm-6 col-12">
	<div class="card">
		<div class="card-body">
			<div class="dash-widget-header">
				<span class="dash-widget-icon bg-primary">
				<i class="fas fa-archive"></i>
				</span>
				<div class="dash-widget-info">
					<h3>₹124</h3>
					<h6 class="text-muted">Earning</h6>
				</div>
			</div>
		</div>
	</div>
</div>

</div>
<div class="row">
<div class="col-md-6 d-flex">

<!-- Recent Bookings -->
<div class="card card-table flex-fill">
	<div class="card-header">
		<h4 class="card-title">Recent Orders</h4>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-center">
				<thead>
					<tr>
						<th>Customer</th>
						<th>Date</th>
						
						<th>Status</th>
						<th>Order Amount</th>
					</tr>
				</thead>
				<tbody>
					@foreach($orders as $value)
					
					<tr>
						<td class="text-nowrap">
							<img class="avatar-xs rounded-circle" src="{{url('public/profile/'.$value->users[0]['profile_image'])}}" alt="User Image">{{$value->users[0]['name']}}
						</td>
						<td class="text-nowrap">{{date('d M Y h:i A',strtotime($value['created_at']))}}</td>
					
						<td> 
							@foreach($status as $row)
							<span class="badge {{$row['id']==1?'bg-danger':($row['id']==2?'btn-warning':($row['id']==3?'btn btn-info':($row['id']==4?'btn-info':($row['id']==5?'btn-info':($row['id']==5?'btn-info':'')))))}} inv-badge">{{$row['id']==$value->status?$row['name']:''}}</span>
							@endforeach
						</td>
						<td>
							<div class="font-weight-600">₹{{number_format($value['total_amount'],2)}}</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- /Recent Bookings -->

</div>
<div class="col-md-6 d-flex">

<!-- Payments -->
<div class="card card-table flex-fill">
	<div class="card-header">
		<h4 class="card-title">Payments</h4>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-center">
				<thead>
					<tr>
						<th>Date</th>
						<th>User</th>
						<th>Provider</th>
						<th>Service</th>
						<th>Amount</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>15 Sep 2020</td>
						<td>
							<span class="table-avatar">
								<a href="#" class="avatar avatar-xs mr-2">
									<img class="avatar-img rounded-circle" alt="" src="assets/img/customer/user-02.jpg">
								</a>
								<a href="javascript:void(0);">Nancy Olson</a>
							</span>
						</td>
						<td>
							<span class="table-avatar">
								<a href="#" class="avatar avatar-xs mr-2">
									<img class="avatar-img rounded-circle" alt="" src="assets/img/provider/provider-02.jpg">
								</a>
								<a href="javascript:void(0);">Matthew Garcia</a>
							</span>
						</td>
						<td>Hp core i5 generation</td>
						<td>₹21,000</td>
						<td>
							<span class="badge badge-dark">Pending</span>
						</td>
					</tr>
					<tr>
						<td>14 Sep 2020</td>
						<td>
							<span class="table-avatar">
								<a href="#" class="avatar avatar-xs mr-2">
									<img class="avatar-img rounded-circle" alt="" src="assets/img/customer/user-03.jpg">
								</a>
								<a href="javascript:void(0);">Ramona Kingsley</a>
							</span>
						</td>
						<td>
							<span class="table-avatar">
								<a href="#" class="avatar avatar-xs mr-2">
									<img class="avatar-img rounded-circle" alt="" src="assets/img/provider/provider-03.jpg">
								</a>
								<a href="javascript:void(0);">Yolanda Potter</a>
							</span>
						</td>
						<td>Hp core i5 generation</td>
						<td>₹21,000</td>
						<td>
							<span class="badge badge-dark">Pending</span>
						</td>
					</tr>
					<tr>
						<td>13 Sep 2020</td>
						<td>
							<span class="table-avatar">
								<a href="#" class="avatar avatar-xs mr-2">
									<img class="avatar-img rounded-circle" alt="" src="assets/img/customer/user-04.jpg">
								</a>
								<a href="javascript:void(0);">Ricardo Lung</a>
							</span>
						</td>
						<td>
							<span class="table-avatar">
								<a href="#" class="avatar avatar-xs mr-2">
									<img class="avatar-img rounded-circle" alt="" src="assets/img/provider/provider-04.jpg">
								</a>
								<a href="javascript:void(0);">Ricardo Flemings</a>
							</span>
						</td>
						<td>Hp core i5 generation</td>
						<td>₹21,000</td>
						<td>
							<span class="badge badge-dark">Pending</span>
						</td>
					</tr>
					<tr>
						<td>12 Sep 2020</td>
						<td>
							<span class="table-avatar">
								<a href="#" class="avatar avatar-xs mr-2">
									<img class="avatar-img rounded-circle" alt="" src="assets/img/customer/user-05.jpg">
								</a>
								<a href="javascript:void(0);">Annette Silva</a>
							</span>
						</td>
						<td>
							<span class="table-avatar">
								<a href="#" class="avatar avatar-xs mr-2">
									<img class="avatar-img rounded-circle" alt="" src="assets/img/provider/provider-05.jpg">
								</a>
								<a href="javascript:void(0);">Maritza Wasson</a>
							</span>
						</td>
						<td>Hp core i5 generation</td>
						<td>₹21,000</td>
						<td>
							<span class="badge badge-dark">Pending</span>
						</td>
					</tr>
					<tr>
						<td>11 Sep 2020</td>
						<td>
							<span class="table-avatar">
								<a href="#" class="avatar avatar-xs mr-2">
									<img class="avatar-img rounded-circle" alt="" src="assets/img/customer/user-06.jpg">
								</a>
								<a href="javascript:void(0);">Stephen Wilson</a>
							</span>
						</td>
						<td>
							<span class="table-avatar">
								<a href="#" class="avatar avatar-xs mr-2">
									<img class="avatar-img rounded-circle" alt="" src="assets/img/provider/provider-06.jpg">
								</a>
								<a href="javascript:void(0);">Marya Ruiz</a>
							</span>
						</td>
						<td>Hp core i5 generation</td>
						<td>₹21,000</td>
						<td>
							<span class="badge badge-info">Inprogress</span>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Payments -->

</div>
</div>
@endsection