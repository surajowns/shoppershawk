<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Shoppershawk | Forgot Password</title>

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
	
		<div class="login-page">
			<div class="login-body container">
				<div class="loginbox">
					<div class="login-right-wrap">
						<div class="account-header">
							<div class="account-logo text-center mb-4">
								<a href="{{url('/admin/login')}}">
									<img src="{{url('public/admin/assets/img/logo-icon.png')}}" alt="" class="img-fluid">
								</a>
							</div>
						</div>
						<div class="login-header">
							<h3>Forgot Password? <span>Best Hawk</span></h3>
							<p class="text-muted">Enter your email to get a password reset link</p>
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
						<form action="" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
 
							<div class="form-group mb-4">
								<label class="control-label">Email</label>
								<input class="form-control" type="text"  name="email" required placeholder="Enter your registered email id">
							</div>
							<span class="text-danger">{{$errors->first('email')}}</span>

							<div class="text-center">
								<button class="btn btn-primary btn-block account-btn" type="submit">Reset Password</button>
							</div>
						</form>
						 
								
								<div class="text-center dont-have">Remember your password? <a href="{{url('/admin/login')}}">Login</a></div>
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

</body>
</html>