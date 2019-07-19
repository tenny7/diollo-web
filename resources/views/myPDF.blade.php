<!DOCTYPE html>
<html>
<head>
    <title>Passward report</title>
    {{-- <link rel="stylesheet" href="{{ asset('assets/password/css/bootstrap.min.css')}}"> --}}
</head>
<body>

    <div class="row">
        <div class="col-8">
                <h1>{{ $title }}</h1>
                <p><strong> Date: {{ \Carbon\Carbon::now() }}</strong>  </p>
                <p>Passward has total of {{ $users }} users.</p>
                <p>Agents: {{ $agents }} </p>
                <p>Vendors: {{ $vendors }} </p>
                <p>Orders: {{ $orders }} </p>
                <p>Completed Promotions: {{ $completedPromotion }} </p>
                <p>Active Promotions: {{ $activePromotion }} </p> 
        </div>
    </div>
    

    <script src="{{ asset('assets/password/js/jquery.js') }}"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  --}}
</body>


</html>