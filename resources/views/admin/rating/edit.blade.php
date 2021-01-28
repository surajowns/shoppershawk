@extends('admin.layouts.master')
@section('title','Edit Rating')
@section('content')
<div class="row">
	<div class="col-xl-8 offset-xl-2">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Edit Rating</h3>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="card">
			<div class="card-body">
			
			<form action="" method="post" enctype="multipart/form-data">
{{csrf_field()}}
<div class="row">
	<div class="col-lg-12">
		<div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label text-right">Rating</label>
			<div class="col-sm-9">
				<input class="form-control" type="text" name="rating" value="{{$editData['rating']}}" id="rating" placeholder="Enter Name" required onkeyup = "convertToSlug()" autocomplete="off">
				<span class="text-danger">{{$errors->first('rating')}}</span>
			</div>
			
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label text-right">Review</label>
			<div class="col-sm-9">
				<input class="form-control" name="review" type="text" value="{{$editData['review']}}" id="review" placeholder="Enter Slug">
				<span class="text-danger">{{$errors->first('review')}}</span>
			</div>
		</div>
		<div class="form-group row">
        <label for="example-text-input" class="col-sm-3 col-form-label text-right">Comment</label>
        <div class="col-sm-9">
            <textarea class="form-control" type="text" name="comment" value="" id="comment" required placeholder="Product Description"  autocomplete="off">{{$editData['comment']}}</textarea>
            <span class="text-danger">{{$errors->first('comment')}}</span>
        </div> 
    </div>

		<div class="form-group row text-center">			
			<div class="col-sm-12">
			<button class="btn btn-primary " type="submit">Edit Rating</button>
										<a href="{{url('/admin/rating')}}" class="btn btn-link">Cancel</a>			</div>
		</div>                                    
	</div>
</div> 
</form>                       
			
			</div>
		</div>
	</div>
</div>

@endsection
<script>
function convertToSlug()
{ 
var slug = function(str) {
var $slug = '';
var trimmed = $.trim(str);
$slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
replace(/-+/g, '-').
replace(/^-|-$/g, '');
$('#slug').val($slug.toLowerCase());
return $slug.toLowerCase();

}
slug =  slug($('#cname').val());
}
</script>
