@extends('admin.layouts.master')
@section('title','Edit Coupon')
@section('content')
<div class="row">
	<div class="col-xl-8 offset-xl-2">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Edit Coupon</h3>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="card">
			<div class="card-body">
			
			<form id="coupon_form" action="" method="post" enctype="multipart/form-data">
{{csrf_field()}}
<div class="row">
	<div class="col-lg-12">
		<div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label">Title</label>
			<div class="col-sm-9">
				<input class="form-control" type="text" name="title" value="{{$page['title']}}" id="cname" placeholder="Enter Title" required onkeyup = "convertToSlug()" autocomplete="off">
				<span class="text-danger">{{$errors->first('title')}}</span>
			</div>
			
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label">Code</label>
			<div class="col-sm-9">
				<input class="form-control" name="code" type="text" value="{{$page['code']}}" id="code" placeholder="Enter Code">
				<span class="text-danger">{{$errors->first('code')}}</span>
			</div>
		</div>
		
		<div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label">Discount</label>
			<div class="col-sm-9">
				<input class="form-control" name="discount" type="text" value="{{$page['discount']}}" id="discount" required placeholder="Enter Amount ">
				<span class="text-danger">{{$errors->first('discount')}}</span>
			</div>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label">Minimum Amount</label>
			<div class="col-sm-9">
				<input class="form-control" name="minimum_amount" type="text" value="{{$page['minimum_amount']}}" id="minimum_amount" required placeholder="Enter Minimum Amount ">
				<span class="text-danger">{{$errors->first('minimum_amount')}}</span>
			</div>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label">Limit</label>
			<div class="col-sm-9">
			<div>
			<input type="checkbox" name="limit" id="limit" value="{{$page['limit']?1:0}}" {{$page['limit']?'checked':''}} >Select If Apply limit<br/>

            </div>
			<div id="nameField">
				<input class="form-control" Type="number" name="coupon_limit" type="text" value="{{$page['coupon_limit']}}" id="coupon_limit" min="0" required  placeholder="Enter Coupon Limit ">
				<span class="text-danger">{{$errors->first('coupon_limit')}}</span>
			</div>
			</div>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label">Start Date</label>
			<div class="col-sm-9">
				<input class="form-control" name="starting_at" type="Date" value="{{date('Y-m-d',strtotime($page['starting_at']))}}" id="starting_at" required placeholder=" ">
				<span class="text-danger">{{$errors->first('starting_at')}}</span>
			</div>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label">End Date</label>
			<div class="col-sm-9">
				<input class="form-control" name="end_at" type="Date" value="{{date('Y-m-d',strtotime($page['end_at']))}}" id="end_at" required placeholder=" ">
				<span class="text-danger">{{$errors->first('end_at')}}</span>
			</div>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label">Notes</label>
			<div class="col-sm-9">
				<textarea class="form-control" name="notes" type="text" value="{{$page['notes']}}" id="notes" required placeholder=" ">{{$page['notes']}}</textarea>
				<span class="text-danger">{{$errors->first('notes')}}</span>
			</div>
		</div>
		<div class="form-group row text-center">
			
			<div class="col-sm-12 text-center">
			<button class="btn btn-primary "type="submit">Edit Coupon</button>
		   <a href="{{url('/admin/coupon')}}" class="btn btn-link">Back</a>			</div>
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
$('#nameField').css('display',"{{$page['limit']?'block':'none'}}"); // Hide the text input box in default
  $("#limit").click(function(){
   if($('#limit').prop('checked')) {
	      $('#limit').val(1);
         $('#nameField').css('display','block');
       } else {
		$('#limit').val(0);
         $('#nameField').css('display','none');
       }
	});
</script>
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
		coupon_limit: {
			required: true,
			number:true,
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
			required: "Please enter valid amount",
			number: "Please enter valid amount",
		},
		coupon_limit: {
			required: "Please enter valid number",
			number: "Please enter valid amount",
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


