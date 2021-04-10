<h3>Hello {{$user['name']}}</h3>

 <p>You are receiving this email because we received a password reset request for your account.</p>

 <a href="{{url('/user/resetpassword/'.$token)}}">Reset Password</a>

 <p>If you did not request a password reset, no further action is required.</p>

<b>Regards,</b>
 <p>Shoppershawk</p> 
 <hr>
 <p>
If you’re having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:{{url('/user/resetpassword/'.$token)}} </p>

