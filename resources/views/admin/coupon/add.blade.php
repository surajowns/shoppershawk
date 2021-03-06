@extends('admin.layouts.master')
@section('title','Add Coupon')
@section('content')
<div class="row">
	<div class="col-xl-8 offset-xl-2">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Add Coupon</h3>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="card">
			<div class="card-body">
			
			<form action="" method="post" enctype="multipart/form-data" id="coupon_form">
{{csrf_field()}}
<div class="row">
	<div class="col-lg-12">
		<div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label">Title</label>
			<div class="col-sm-9">
				<input class="form-control" type="text" name="title" value="" id="title" placeholder="Enter Title" required autocomplete="off">
				<span class="text-danger">{{$errors->first('title')}}</span>
			</div>
			
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label">Code</label>
			<div class="col-sm-9">
				<input class="form-control" name="code" type="text" value="" id="code" required placeholder="Enter Code">
				<span class="text-danger">{{$errors->first('code')}}</span>
			</div>
		</div>
		
		<div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label">Discount</label>
			<div class="col-sm-9">
				<input class="form-control" name="discount" type="text" value="" id="discount" required placeholder="Enter Amount ">
				<span class="text-danger">{{$errors->first('discount')}}</span>
			</div>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label">Minimum Amount</label>
			<div class="col-sm-9">
				<input class="form-control" name="minimum_amount" type="text" value="" id="minimum_amount" required placeholder="Enter Minimum Amount ">
				<span class="text-danger">{{$errors->first('minimum_amount')}}</span>
			</div>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label">Start Date</label>
			<div class="col-sm-9">
				<input class="form-control" name="starting_at" type="Date" value="" id="starting_at" required placeholder=" ">
				<span class="text-danger">{{$errors->first('starting_at')}}</span>
			</div>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label">End Date</label>
			<div class="col-sm-9">
				<input class="form-control" name="end_at" type="Date" value="" id="end_at" required placeholder=" ">
				<span class="text-danger">{{$errors->first('end_at')}}</span>
			</div>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label">Notes</label>
			<div class="col-sm-9">
				<textarea class="form-control" name="notes" type="text" value="" id="notes" required placeholder=" "></textarea>
				<span class="text-danger">{{$errors->first('notes')}}</span>
			</div>
		</div>
		<div class="form-group row text-center">
			
			<div class="col-sm-12 text-center">
			<button class="btn btn-primary "type="submit">Add Coupon</button>
		   <a href="{{url('/admin/coupon')}}" class="btn btn-link">Back</a></div>
		</div>                                    
	</div>
</div> 
</form>                       
				
			</div>
		</div>
	</div>
</div>

@endsection
@section('javascript')
<script src="{{url('public/front/js/jquery.validate.min.js')}}"></script>

<script>
$(document).ready(function(){


	 if ($("#coupon_form").length > 0) {
$("#coupon_form").validate({

	rules: {
		title: {
			required: true,
			maxlength: 50
		},

		code: {
			required: true,
			minlength:6,
			maxlength:20,
		},

		discount: {
			required:true,
			number:true,
		},
		minimum_amount: {
			required: true,
			number:true,
			greaterThan:"#discount",
		},
		starting_at: {
			required: true,
		},
		end_at: {
			required: true,
			greaterThan:"#starting_at",
		},
	},
	messages: {

		title: {
			required: "Please enter coupon  title",
		},
	   
		code: {
			required: "Please enter valid Coupon code",
			email: "Please enter valid email",
			maxlength: "The email name should less than or equal to 50 characters",
		},
		discount: {
			required: "Please enter valid amount",
			number: "Please enter valid amount",
		},
		minimum_amount: {
			required: "Please enter valid email",
			number: "Please enter valid amount",
			greaterThan: "Minimum amount is always greater than Discount",
		},
		starting_at: {
			required: "Please enter valid date.",
		},
		end_at:{
			required: "Please enter valid date.",
			greaterThan:"End Date should be greater than starting date ",
		},

	},
})
}
});
</script>

@stop
