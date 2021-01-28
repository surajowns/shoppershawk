@extends('admin.layouts.master')
@section('title','Add Role')
@section('content')
<div class="row">
	<div class="col-xl-8 offset-xl-2">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Add Role</h3>
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
			<label for="example-text-input" class="col-sm-3 col-form-label text-right">Role Name</label>
			<div class="col-sm-9">
				<input class="form-control" type="text" name="name" value="" id="cname" placeholder="Enter Role Name" required onkeyup = "convertToSlug()" autocomplete="off">
				<span class="text-danger">{{$errors->first('name')}}</span>
			</div>
			
		</div>	
		<div class="form-group row text-center">
			
			<div class="col-sm-12">
			<button class="btn btn-primary " type="submit">Add Role</button>
										<a href="{{url('/admin/role')}}" class="btn btn-link">Cancel</a>			</div>
		</div>                                    
	</div>
</div> 
</form>                       
				
			</div>
		</div>
	</div>
</div>

@endsection

