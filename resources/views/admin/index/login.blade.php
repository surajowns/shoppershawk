<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Shoppershawk | Login</title>

	<!-- Favicons -->
	<link rel="shortcut icon" href="{{url('public/admin/assets/img/favicon.png')}}">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{url('public/admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="{{url('public/admin/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
	<link rel="stylesheet" href="{{url('public/admin/assets/plugins/fontawesome/css/all.min.css')}}">
	 
	<!-- Animate CSS -->
	<link rel="stylesheet" href="{{url('public/admin/assets/css/animate.min.css')}}">

	<!-- Main CSS -->
	<link rel="stylesheet" href="{{url('public/admin/assets/css/admin.css')}}">

</head>

<body>
<div class="main-wrapper">
<p id="demo" style=""></p>

<script>
// var x = document.getElementById("demo");
// var lat = document.getElementById("latitude");
// var lng  = document.getElementById("longitude");


function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    console.log("Geolocation is not supported by this browser.");
  }
}
    
function showPosition(position) {
    var lat=position.coords.latitude ;
   var lng = position.coords.longitude;
   $("#latitude").val(lat);
   $("#longitude").val(lng);


}
</script>
		<div class="login-page">
			<div class="login-body container">
				<div class="loginbox">
					<div class="login-right-wrap">
						<div class="account-header">
							<div class="account-logo text-center mb-4">
								<a href="{{url('public/admin/login')}}">
									<img src="{{url('public/admin/assets/img/logo-icon.png')}}" alt="" class="img-fluid">
								</a>
							</div>
						</div>
						<div class="login-header">
							<h3>Login <span>Best Hawk</span></h3>
							<p class="text-muted">Access to our dashboard</p>
						</div>
						@if(session('failed'))
                                    <p class="text-center text-danger">{{session('failed')}}</p>
                        @endif
						@if(session('error'))
                                    <p class="text-center text-danger">{{session('error')}}</p>
                        @endif
                        @if(session('success'))
                                    <p class="text-center text-success">{{session('success')}}</p>
                        @endif
						<form action="{{url('/admin/validate')}}" method="post">
						@csrf
							<div class="form-group">
								<label class="control-label">Username</label>
								<input class="form-control" type="text" name="email" placeholder="Enter your username" required>
							</div>
							<span class="text-danger">{{$errors->first('email')}}</span>
							<div class="form-group">
								<input class="form-control" type="hidden" name="latitude" id="latitude" placeholder="Enter your username" required>
							</div>
							<div class="form-group">
								<input class="form-control" type="hidden" name="longitude" id="longitude" placeholder="Enter your username" required>
							</div>
							<div class="form-group mb-4">
								<label class="control-label">Password</label>
								<input class="form-control" type="password" name="password" placeholder="Enter your password" required>
							</div>
							<span class="text-danger">{{$errors->first('password')}}</span>

							<div class="form-group">
                                                <div class="custom-control custom-switch switch-success">
                                                    <input type="checkbox" name="remember" class="custom-control-input" id="customSwitchSuccess"  {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="custom-control-label text-muted" for="customSwitchSuccess">Remember me</label>
                                                </div>
                                            </div>
							<div class="text-center">
								<button class="btn btn-primary btn-block account-btn" type="submit">Login</button>
							</div>
						</form>
						
								<div class="text-center forgotpass mt-4"><a href="{{url('/admin/forget_passord')}}">Forgot Password?</a></div>
							
								  
							
								
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<!-- jQuery -->
	<script src="{{url('public/admin/assets/js/jquery-3.5.0.min.js')}}"></script>

	<!-- Bootstrap Core JS -->
	<script src="{{url('public/admin/assets/js/popper.min.js')}}"></script>
	<script src="{{url('public/admin/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

	<!-- Slimscroll JS -->
	<script src="{{url('public/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

	<!-- Custom JS -->
	<script src="{{url('public/admin/assets/js/admin.js')}}"></script>
	<script>
	   $(document).ready(function(){
		getLocation();

	   });
	</script>

</body>
</html>