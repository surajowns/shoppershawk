@extends('admin.layouts.master')
@section('title','Inquiry list')
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Inquiry List</h3>
        </div>
        <div class="col-auto text-right">
            <!-- <a class="btn btn-white filter-btn" href="javascript:void(0);" id="filter_search">
                <i class="fas fa-filter"></i>
            </a> -->
            <!-- <a href="{{url('admin/category/add-category')}}" class="btn btn-primary add-button ml-3"> -->
                <!-- <i class="fas fa-plus"></i> -->
           <!-- </a> -->
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
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Received On</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                   
                         @foreach($data as $value)
                        <tr>
                               <td>{{$loop->iteration}}</td>
                               <td>{{$value->name}}</td>
                               <td>{{$value->email}}</td>
                               <td>{{$value->subject}}</td>
                               <td>{{$value->message}}</td>
                               <td>{{date('d M Y h:i A',strtotime($value->created_at))}}</td>
                               <td><a class="text-danger btn btn-sm bg-danger-light mr-2" href="{{url('admin/contactus/delete/'.$value->id)}}"onclick="return confirm('Are you sure you want to delete?');"> <i class="far fa-trash-alt mr-1"></i>Deleted</a></td>
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