@extends('admin.layouts.master')
@section('title','Edit Brand')
@section('content')
<div class="row">
	<div class="col-xl-8 offset-xl-2">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Edit Brand</h3>
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
			<label for="example-text-input" class="col-sm-3 col-form-label text-right">Brand Name</label>
			<div class="col-sm-9">
				<input class="form-control" type="text" name="name" value="{{$editData['name']}}" id="cname" placeholder="Enter Name" required onkeyup = "convertToSlug()" autocomplete="off">
				<span class="text-danger">{{$errors->first('name')}}</span>
			</div>
			
		</div>
		<!-- <div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label text-right">Slug</label>
			<div class="col-sm-9">
				<input class="form-control" name="slug" type="text" value="" id="slug" placeholder="Enter Slug">
				<span class="text-danger">{{$errors->first('slug')}}</span>
			</div>
		</div> -->
		
		<div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label text-right">Image</label>
			<div class="col-sm-9">
				<input class="form-control" name="image" type="file" value="" id="image"  placeholder="Enter ">
				<span class="text-danger">{{$errors->first('images')}}</span>
			</div>
		</div>
		<div class="form-group row text-center">
			
			<div class="col-sm-12">
			<button class="btn btn-primary text-center" type="submit">Edit Brand</button>
										<a href="{{url('/admin/brand')}}" class="btn btn-link">Cancel</a>			</div>
		</div>                                    
	</div>
</div> 
</form>                       
<img src="{{url('/category/'.$editData['image'])}}" id="brand_image" alt="category_image" width=200 height=200>
			
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
