@extends('admin.layouts.master')
@section('title','Category')
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
            <a href="{{url('admin/category/add-category')}}" class="btn btn-primary add-button ml-3">
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
                                <th>Image</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($categories as $cat)
                        <tr>

                               <td>{{$loop->iteration}}</td>
                               <td>{{$cat['name']}}</td>
                               <td><img class="rounded service-img mr-1" src="{{url('public/category/'.$cat['image'])}}" alt="Category Image"></td>
                               <td>{{$cat['parent_id']==0?'Category':'Sub Category'}}</td>
                               <td><a class="text-primary" href="{{url('/admin/update-status/category/'.$cat['id'].'/'.$cat['status'])}}">{{$cat['status']==1?'Active':'Inactive'}}</a></td>
                               <td class="text-right">
                                    <a href="{{url('admin/category/edit-category/'.$cat['id'])}}" class="btn btn-sm bg-success-light mr-2">	<i class="far fa-edit mr-1"></i> Edit</a>
                                    <a class="text-danger btn btn-sm bg-danger-light mr-2" href="{{url('admin/category/delete-category/'.$cat['id'])}}"onclick="return confirm('Are you sure you want to delete?');"> <i class="far fa-trash-alt mr-1"></i>Deleted</a></td>
                            
                          
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