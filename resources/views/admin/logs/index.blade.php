@extends('admin.layouts.master')
@section('title','Login Logs')
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Log List</h3>
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
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Location</th>
                                <th>IP Address</th>
                                <th>Os</th>
                                <th>Browser</th>
                                <th>Device</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($logs as $cat)
                        <tr>

                               <td>{{$loop->iteration}}</td>
                               <td>{{$cat['user']}}</td> 
                               <td>{{$cat['email']}}</td>     
                               <td>{{$cat['mobile']}}</td>     
                               <td>{{$cat['location']}}</td>     
                               <td>{{$cat['ip_address']}}</td> 
                               <td>{{$cat['c_os']}}</td> 
                               <td>{{$cat['c_browser']}}</td>
                               <td>{{$cat['c_device']}}</td>  

                               <td>{{date('d/m/Y h:i:j',strtotime($cat['created_at']))}}</td>    
                     
  
                               <!-- <td class="text-right">
                                    <a href="{{url('admin/category/edit-category/'.$cat['id'])}}" class="btn btn-sm bg-success-light mr-2">	<i class="far fa-edit mr-1"></i> Edit</a>
                                    <a class="text-danger btn btn-sm bg-danger-light mr-2" href="{{url('admin/category/delete-category/'.$cat['id'])}}"onclick="return confirm('Are you sure you want to delete?');"> <i class="far fa-trash-alt mr-1"></i>Deleted</a></td>
                                </td> -->
                          
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