@extends('admin.layouts.master')
@section('title','Admin Users')
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Users List</h3>
        </div>
        <div class="col-auto text-right">
            <!-- <a class="btn btn-white filter-btn" href="javascript:void(0);" id="filter_search">
                <i class="fas fa-filter"></i>
            </a> -->
            <a href="{{url('/admin/admin_users/add-user')}}" class="btn btn-primary add-button ml-3">
                <i class="fas fa-plus"></i>
            </a>
        </div>
    </div>
</div>
<!-- /Page Header -->


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-hover table-center mb-0 datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Role</th>
                                <th>Referral</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td title="{{ $user['name'] }}">{{ substr($user['name'], 0, 20) }}</td>
                                <td>{{$user['mobile']}}</td>
                                <td>{{$user['email']}}</td>
                                <td title="{{ $user['location'] }}">{{ substr($user['location'], 0, 25) }}</td>
                                <td>{{$user['roles']['name']}}</td>
                                <td>
                                    @if(is_array($user['referrals']))
                                        @if($user['referrer_id'] === $user['referrals']['referrer_id'])
                                            <?php 
                                                $name=App\User::where('id',$user['referrals']['user_id'])->first();
                                                echo  $name['name'];
                                            ?>
                                        @endif
                                    @endif
                                </td>
                                <td><a class="text-primary" href="{{url('/admin/update-status/users/'.$user['id'].'/'.$user['status'])}}">{{$user['status']==1?'Active':'Inactive'}}</a></td>
                                <td class="text-right">
                                    <a href="{{url('admin/admin_users/edit-user/'.$user['id'])}}" class="btn btn-sm bg-success-light mr-2">	<i class="far fa-edit mr-1"></i> Edit</a>
                                    <a class="text-danger btn btn-sm bg-danger-light mr-2" href="{{url('admin/admin_users/delete-user/'.$user['id'])}}"onclick="return confirm('Are you sure you want to delete?');"> <i class="far fa-trash-alt mr-1"></i>Deleted</a></td>
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
<script src="{{asset('public/admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/moment.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('public/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/bootstrapValidator.min.html')}}"></script>
<script src="{{asset('public/admin/assets/plugins/datatables/datatables.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/select2.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/admin.js')}}"></script>
@stop