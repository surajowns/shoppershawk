@extends('admin.layouts.master')
@section('title','Add Category')
@section('content')
<div class="row">
	<div class="col-xl-8 offset-xl-2">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Add Category</h3>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="card">
			<div class="card-body">
			
			<form action="" method="post" enctype="multipart/form-data">
{{csrf_field()}}
<div class="row">
	<div class="col-lg-8">
		<div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label text-right">Title</label>
			<div class="col-sm-9">
				<input class="form-control" type="text" name="name" value="" id="cname" placeholder="Enter Name" onkeyup = "convertToSlug()" autocomplete="off">
				<span class="text-danger">{{$errors->first('name')}}</span>
			</div>
			
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label text-right">Slug</label>
			<div class="col-sm-9">
				<input class="form-control" name="slug" type="text" value="" id="slug" placeholder="Enter Slug">
				<span class="text-danger">{{$errors->first('slug')}}</span>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-3 col-form-label text-right">Select Category</label>
			<div class="col-sm-9">
				<select class="form-control" name="parent_id">
					<option value="0">Select Parent Category</option>
					@foreach($categories as $cat)
					<option value="{{$cat['id']}}">{{$cat['name']}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="example-text-input" class="col-sm-3 col-form-label text-right">Image</label>
			<div class="col-sm-9">
				<input class="form-control" name="images" type="file" value="" id="image" placeholder="Enter ">
				<span class="text-danger">{{$errors->first('images')}}</span>
			</div>
		</div>
		<div class="form-group row">
			
			<div class="col-sm-12 text-center">
			<button class="btn btn-primary " type="submit">Add Category</button>
										<a href="{{url('/admin/category')}}" class="btn btn-link">Back</a>			</div>
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
