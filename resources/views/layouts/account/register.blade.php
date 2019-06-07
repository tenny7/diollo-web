<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Cabin|Ubuntu" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/password/css/sign up.css')}}">
</head>


<body>
  @yield('content')



<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script type="text/javascript">
function openNav() {
document.getElementById("mySidenav").style.width = "200px";
document.getElementById("mySidenav").style.paddingLeft = "50px";
document.getElementById("mySidenav").style.backgroundColor = "#F9D8D5";
document.body.style.backgroundColor = "rgba(0,0,0,0.1)";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
document.getElementById("mySidenav").style.width = "0";
document.getElementById("mySidenav").style.paddingLeft = "0";
document.body.style.backgroundColor = "white";
}
  </script>

  <script type="text/javascript">
  $(function(){
      $("#tog-btn").click(function(){
        console.log("hello world");
        $(".other-menu").toggle();
      });
  });
  </script>

</body>
</html>
