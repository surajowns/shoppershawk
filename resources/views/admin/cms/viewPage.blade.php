@extends('admin.layouts.master')
@section('title','Create Page')
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Categories</h3>
        </div>
        <div class="col-auto text-right">
            <!-- <a class="btn btn-white filter-btn" href="javascript:void(0);" id="filter_search">
                <i class="fas fa-filter"></i>
            </a> -->
            <a href="{{url('admin/add-page')}}" class="btn btn-primary add-button ml-3">
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
                        <th scope="col">#</th>
                        <th scope="col">Page Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @forelse($data as $row)

                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$row['title']}}</td>
                            <td>{!!$row['description']!!}</td>
                            <td>@if($row['page_image']!='')<img src="{{asset('public/admin/pages/images/'.$row['page_image'])}}" width="100px" height="50">@endif</td>
                            <td><a class="text-primary" href="{{url('admin/update-status/cms/'.$row['id'].'/'.$row['status'])}}">{{$row['status']==1?'Active':'Inactive'}}</a></td>
                            <td><a class="text-primary" href="{{url('/admin/edit-page/'.$row['id'])}}">Edit</a> | 
                            <a class="text-danger" href="{{url('admin/delete-page/'.$row['id'])}}"onclick="return confirm('Are you sure you want to delete?');">Deleted</a></td>
                        </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
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