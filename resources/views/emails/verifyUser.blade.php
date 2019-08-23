{{-- @extends('layouts.app') --}}
<!DOCTYPE html>
<html>
  <head>
    <title>Welcome Email</title>
    
  </head>
  <body>
    <h4> Hi {{$user['fullname']}}</h4>
    <h2>Welcome to {{ config('app.name','Laravel')}} </h2>
    <br/>
    Your registered email-id is {{$user['email']}} , Please click on the below link to verify your email account
    <br/>
    <a href="{{url('user/verify', $user->verifyUser->token)}}">Verify Email</a>
  </body>
</html>
