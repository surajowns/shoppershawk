@extends('admin.layouts.master')
@section('title','Notification')
@section('content')

				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col">
							<h3 class="page-title">All Notifications</h3>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
              
				 @foreach($notification as $value)
                 <a href="{{url('admin/orders/viewdetails/'.substr($value['type'], strpos($value['type'], '#') + 1))}}">
				 <div class="admin-noti-wrapper">
					<div class="noti-list">
						<div class="noti-avatar">
                        @if($value->users[0]['name'])
												<img class="avatar-img rounded-circle" alt="" src="{{url('public/profile/'.$value->users[0]['profile_image'])}}">

												@else
												<img class="avatar-img rounded-circle" alt="" src="{{url('public/admin/images/'.Auth::User()->profile_image)}}">
											    @endif
						</div>
						<div class="noti-contents">
							<h3>{{$value['content']}}</h3>
							<span>{{date('d M Y h:i A',strtotime($value['created_at']))}}</span>
						</div>
					</div>
				</div>
                </a>
                @endforeach
		
@endsection
