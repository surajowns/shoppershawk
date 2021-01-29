@extends('admin.layouts.master')
@section('title','Edit User')
@section('content')
<div class="row">
<div class="col-xl-8 offset-xl-2">

<!-- Page Header -->
<div class="page-header">
    <div class="row">
        <div class="col">
            <h3 class="page-title">Edit User</h3>
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
    <label for="example-text-input" class="col-sm-3 col-form-label ">Name</label>
    <div class="col-sm-9">
        <input class="form-control" type="text" name="name" value="{{$page['name']}}" required id="title" placeholder="Enter Name" autocomplete="off">
        <span class="text-danger">{{$errors->first('name')}}</span>
    </div>
</div>
<div class="form-group row">
			<label class="col-sm-3 col-form-label ">Select Role</label>
			<div class="col-sm-9">
				<select class="form-control" name="role" required>
                <option value="">--Select Role--</option>
                @foreach($role as $val)
					<option value="{{$val['id']}}" {{$val['id']==$page['role']?"selected":""}}>{{$val['name']}}</option>
                @endforeach
				</select>
			</div>
		</div>
<div class="form-group row">
    <label for="example-text-input" class="col-sm-3 col-form-label ">Email</label>
    <div class="col-sm-9">
        <input class="form-control" type="text" name="email" value="{{$page['email']}}" id="title" placeholder="Enter Email" required autocomplete="off">
        <span class="text-danger">{{$errors->first('email')}}</span>
    </div>
</div>
<!-- <div class="form-group row">
    <label for="example-text-input" class="col-sm-3 col-form-label ">Password</label>
    <div class="col-sm-9">
        <input class="form-control" type="password" name="password" value="" id="title" placeholder="Enter Password" required autocomplete="off">
        <span class="text-danger">{{$errors->first('password')}}</span>
    </div>
</div> -->
<div class="form-group row">
    <label for="example-text-input" class="col-sm-3 col-form-label ">Mobile</label>
    <div class="col-sm-9">
        <input class="form-control" type="text" name="mobile" value="{{$page['mobile']}}" id="title" placeholder="Enter Mobile" required autocomplete="off">
        <span class="text-danger">{{$errors->first('mobile')}}</span>
    </div>
</div>
<div class="form-group row">
    <label for="example-text-input" class="col-sm-3 col-form-label ">Location</label>
    <div class="col-sm-9">
        <input class="form-control" type="text" name="location" value="{{$page['location']}}" id="address" placeholder="Enter Location" required  autocomplete="off">
        <span class="text-danger">{{$errors->first('location')}}</span>
    </div>
    
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-sm-3 col-form-label ">Image</label>
    <div class="col-sm-9">
        <input class="form-control" name="profile_image" type="file" value="" id="image" placeholder="Enter ">
        <span class="text-danger">{{$errors->first('profile_image')}}</span>
    </div>
</div>
<div class="form-group row">
    
    <div class="col-sm-12 text-center">
    <button class="btn btn-primary" type="submit">Edit User</button>
                                <a href="{{url('/admin/admin_users')}}" class="btn btn-link">Cancel</a>			</div>
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
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPOxoqGdov5Z9xJw1SMVa_behLLSPacVM&libraries=places"></script>

<script>

google.maps.event.addDomListener(window, 'load', function () {
     var options = {
          componentRestrictions: {country: "IND"}
        };
        var places = new google.maps.places.Autocomplete(document.getElementById('address','latitude','longitude'),'');
        google.maps.event.addListener(places, 'place_changed', function () {
          var place = places.getPlace();
          var address = place.formatted_address;
          var latitude = place.geometry.location.lat();
          var longitude = place.geometry.location.lng();
          // var mesg = address;
        
          // var suburb = address.split(',');
          $('#latitude').val(latitude);
          $('#latitude').val(latitude);


          $('#longitude').val(longitude);
          // alert(mesg+' latitude:- '+latitude+' longitude:-'+longitude);
        });
      });
 </script>
 

 @stop
