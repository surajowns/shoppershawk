@extends('admin.layouts.master')
@section('title','Coupon')
@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Coupon List</h3>
        </div>
        <div class="col-auto text-right">
            <!-- <a class="btn btn-white filter-btn" href="javascript:void(0);" id="filter_search">
                <i class="fas fa-filter"></i>
            </a> -->
            <a href="{{url('admin/coupon/add-coupon')}}" class="btn btn-primary add-button ml-3">
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
                                <th>Title</th>
                                <th>Code</th>
                                <th>Discount</th>
                                <th>Minimum Amount</th>
                                <th>Used/Limit</th>
                                <th>Notes</th>
                                <th>Starting Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                         @foreach($data as $cat)
                        <tr>

                               <td>{{$loop->iteration}}</td>
                               <td>{{$cat['title']}}</td>
                               <td>{{$cat['code']}}</td>
                               <td>{{$cat['discount']}}</td>
                               <td>{{$cat['minimum_amount']}}</td>
                               <th>{{$cat['used']}}/{{$cat['coupon_limit']}}</th>
                               <td>{{$cat['notes']}}</td>

                               <td> {{date('d/M/Y', strtotime($cat['starting_at']))}}</td>
                               <td>{{date('d/M/Y', strtotime($cat['end_at']))}}</td>
                               <td><a class="text-primary" href="{{url('/admin/update-status/coupons/'.$cat['id'].'/'.$cat['status'])}}">{{$cat['status']==1?'Active':'Inactive'}}</a></td>
                               <td class="text-right">
                                    <a href="{{url('admin/coupon/edit-coupon/'.$cat['id'])}}" class="btn btn-sm bg-success-light mr-2">	<i class="far fa-edit mr-1"></i> Edit</a>
                                    <a class="text-danger btn btn-sm bg-danger-light mr-2" href="{{url('admin/coupon/delete-coupon/'.$cat['id'])}}"onclick="return confirm('Are you sure you want to delete?');"> <i class="far fa-trash-alt mr-1"></i>Deleted</a></td>
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