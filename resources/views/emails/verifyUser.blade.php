{{-- @extends('layouts.app') --}}
<!DOCTYPE html>
<html>
  <head>
    <title>Welcome Email</title>
  </head>
  <body>
    <h2>Welcome to the Passward {{$user['name']}}</h2>
    <br/>
    Your registered email-id is {{$user['email']}} , Please click on the below link to verify your email account
    <br/>
    <a href="{{url('user/verify', $user->verifyUser->token)}}">Verify Email</a>
  </body>
</html>

{{-- @section('content')
    <div class="row">
        <div class="panel-default">
            <div class="panel-heading"><h2>Welcome to Password {{$user['name']}}</h2></div>
            <div class="panel-body">
                
            <br/>
            Your registered email-id is {{$user['email']}} , Please click on the below link to verify your email account
            <br/>
            <a href="{{url('/user/verify', $user->verifyUser->token)}}">Verify Email</a>
            </div>
        </div>
    </div>
@stop --}}