<h1>welcome {{$user->name}}</h1>
<p>please press this button for reset password</p>
<a href="{{route('password.reset',$token)}}">Reset Password</a>