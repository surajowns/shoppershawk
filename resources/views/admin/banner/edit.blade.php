@extends('admin.layouts.master')
@section('title','Edit Banner')
@section('content')
<div class="row">
<div class="col-xl-8 offset-xl-2">

<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Edit Banner</h3>
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
        <input class="form-control" type="text" name="title" value="{{$page['title']}}" id="title" placeholder="Enter Title" onkeyup = "convertToSlug()" autocomplete="off">
        <span class="text-danger">{{$errors->first('title')}}</span>
    </div>
    
</div>
<div class="form-group row">
    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Link</label>
    <div class="col-sm-9">
        <input class="form-control" type="text" name="link" value="{{$page['link']}}" id="link" placeholder="Enter Url"  autocomplete="off">
        <span class="text-danger">{{$errors->first('link')}}</span>
    </div>
    
</div>
<div class="form-group row">
			<label class="col-sm-3 col-form-label text-right">Select Type</label>
			<div class="col-sm-9">
				<select class="form-control" name="type" required>
					<option value="Top Banner">Top Banner</option>
                    <option value="Single ADs">Single ADs</option>
					<option value="Double ADs">Double ADs</option>
					<option value="Triple ADs">Triple ADs</option>
				</select>
			</div>
		</div>

<!-- <div class="form-group row">
    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Slug</label>
    <div class="col-sm-9">
        <input class="form-control" name="slug" type="text" value="" id="slug" placeholder="Enter Slug">
        <span class="text-danger">{{$errors->first('slug')}}</span>
    </div>
</div> -->
<!-- -->
<div class="form-group row">
    <label for="example-text-input" class="col-sm-3 col-form-label text-right">Image</label>
    <div class="col-sm-9">
        <input class="form-control" name="banner_image" type="file" value="{{$page['banner_image']}}" id="image" placeholder="Enter ">
        <span class="text-danger">{{$errors->first('banner_image')}}</span>
    </div>
</div>
<div class="form-group row">
    
    <div class="col-sm-12 text-center">
    <button class="btn btn-primary" type="submit">Edit Banner</button>
                                <a href="{{url('/admin/banner')}}" class="btn btn-link">Cancel</a>			</div>
</div>                                    
</div>
</div> 
</form>                       
        
    </div>
</div>
</div>
</div>

@endsection
<!-- <script>
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
} -->
</script>
