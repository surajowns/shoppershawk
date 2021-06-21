@extends('admin.layouts.master')
@section('title','Add Color')
@section('content')
<div class="row">
	<div class="col-xl-8 offset-xl-2">
	
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Add Color</h3>
				</div>
			</div>
		</div>
		<!-- /Page Header -->
		
		<div class="card">
			<div class="card-body">
			
			<form action="" method="post" enctype="multipart/form-data" id="color_form">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3 col-form-label">Title</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" name="name" value="" id="name" placeholder="Enter Color Name" required autocomplete="off">
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            </div>
                        </div>
                    </div>
                 </div>
                <div class="row ">
			             <div class="col-sm-12">
                         <div class="form-group row">
                         <div class="col-sm-3"></div>
                         <div class="col-sm-9">
                                <button class="btn btn-primary "type="submit">Add Color</button>
                                <a href="{{url('/admin/color')}}" class="btn btn-link">Back</a>
                            </div>
                            </div>
                            </div>
	            	 </div> 
                </div> 
                </form>                       
			</div>
		</div>
	</div>
</div>

@endsection

