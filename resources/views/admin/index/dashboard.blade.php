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
<div class="col-md-12 d-flex">

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
						<th>Order Id</th>
						<th>Customer</th>
						<th>Date</th>
						
						<th>Status</th>
						<th>Order Amount</th>
					</tr>
				</thead>
				<tbody>
					@foreach($orders as $value)
					<tr>
					
                        <td> <a href="{{url('admin/orders/viewdetails/'.$value['id'])}}">SHOPPERSHAWK#{{$value['id']}} </a></td>
                    
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

</div>
@endsection