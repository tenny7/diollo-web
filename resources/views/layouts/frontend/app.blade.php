<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Passward</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('assets/password/css/bootstrap.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Cabin|Ubuntu:300,400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/password/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">

@stack('css')
</head>

<body>

  <!-- this is where my navigation starts -->

  <!-- Start of Nav-->
<div class="navbar-fixed-top">
    <div class="info hidden-xs ">

      <div class="container" style="padding:0;">
          <div class="row  hidden-xs">
              <div class="col-md-6 col-sm-6 col-xs-6 text" style="padding-top: 15px;">

                <br>
                  <div class="input-group">
                    <input type="email" class="form-control" id="search" placeholder="Search for anything you want">
                     <div class="input-group-addon purple"><i class="fa fa-search"></i></div>
                  </div>

                </div>

              <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="check-list">
                   
                  
                  @guest
                  <a href="{{ route('vendor.signup')}}" type="button" class="btn btn-none" name="button">BECOME A VENDOR</a>
                  <a href="{{ route('affiliate.signup')}}" type="button" class="btn btn-none" name="button">BECOME AN AFFILIATE</a>
                    <a href="{{ route('signup')}}" type="button" class="btn btn-none" name="button">SIGN UP</a>
                    <a href="{{ route('signin')}}" type="button" class="btn btn-none" name="button">LOG IN</a>
                    <a href="{{ route('orders.orderPage') }}" type="button" class="btn btn-none" name="button">MY CART</a><a href="#"><i class="fa fa-shopping-bag" style="margin-top: 5px; font-size: 20px;"></i></a>
                   @else
                   {{-- <a href="{{ route('orders.orderPage') }}" type="button" class="btn btn-none" name="button">MY CART <i class="fa fa-shopping-bag" style="margin-top: 5px; font-size: 10px;"></i></a>  --}}
                    @if (!Auth::user()->isVendor())
                    {{-- <a href="{{ route('orders.orderPage') }}" type="button" class="btn btn-none" name="button">MY CART</a><a href="#"><i class="fa fa-shopping-bag" style="margin-top: 5px; font-size: 20px;"></i></a> --}}
                    {{-- <a href="{{ route('vendor.signup')}}" type="button" class="btn btn-none" name="button">BECOME A VENDOR</a> --}}
                    @endif
                    @if (!Auth::user()->isAffiliate())
                    {{-- <a href="{{ route('orders.orderPage') }}" type="button" class="btn btn-none" name="button">MY CART</a><a href="#"><i class="fa fa-shopping-bag" style="margin-top: 5px; font-size: 20px;"></i></a> --}}
                    {{-- <a href="{{ route('affiliate.signup')}}" type="button" class="btn btn-none" name="button">BECOME AN AFFILIATE</a> --}}
                    @endif

                    @if (Auth::user()->isAdmin())
                    <a href="{{ route('orders.orderPage') }}" type="button" class="btn btn-none" name="button">MY CART <i class="fa fa-shopping-bag" style="margin-top: 5px; font-size: 10px;"></i></a>
                    <a href="{{ route('admin.dashboard')}}" type="button" class="btn btn-none" name="button">DASHBOARD</a>
                    @endif
                    @if (Auth::user()->isAgent())
                    <a href="{{ route('orders.orderPage') }}" type="button" class="btn btn-none" name="button">MY CART <i class="fa fa-shopping-bag" style="margin-top: 5px; font-size: 10px;"></i></a>
                    <a href="{{ route('agent.dashboard')}}" type="button" class="btn btn-none" name="button">DASHBOARD</a>
                    @endif
                    @if (Auth::user()->isVendor())
                    <a href="{{ route('orders.orderPage') }}" type="button" class="btn btn-none" name="button">MY CART <i class="fa fa-shopping-bag" style="margin-top: 5px; font-size: 10px;"></i></a>
                    <a href="{{ route('vendor.dashboard')}}" type="button" class="btn btn-none" name="button">DASHBOARD</a>
                    @endif



                  @if (Auth::user()->isAffiliate())
                    <a href="{{ url('affiliate/dashboard')}}" type="button" class="btn btn-none" name="button">DASHBOARD</a>
                  @endif

                  <a  href="{{ route('customer.accountInfo')}}" id="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('assets/password/images/face.jpg')}}" style="height: 40px; border-radius: 100%; padding-right: 10px;" class="img-responsive img-fluid" alt="profile"></a>
                        <ul class="dropdown-menu pull-right text-center">
                        <li><a href="{{ route('customer.accountInfo') }}"><i class="far fa-user">&nbsp;&nbsp;</i> Profile</a></li>
                        <li><a href="{{ route('orders.viewOrders') }}"><img src="{{ asset('assets/password/images/shopping bag.png') }}" alt="bag">&nbsp;&nbsp;&nbsp;&nbsp;Orders</a></li>
                        <li><a href="#" @if(isset(auth()->wallet_balance)) {{ auth()->wallet_balance}} @endif><img src="{{ asset('assets/password/images/wallet-outline.png')}}" alt="wallet">&nbsp;&nbsp;&nbsp;&nbsp;Wallet</a></li>
                        <li><a href="{{ route('saved.item')}}"><i class="fa fa-heart">&nbsp;&nbsp;&nbsp;</i> Saved Items</a></li>
                        <li><a href="{{ route('customer.logout')}}"><i class="fas fa-sign-out-alt">&nbsp;&nbsp;&nbsp;</i>Logout</a></li>
                        </ul>
                  @endguest

                    
                    
                  </div>
              </div>
          </div>
      </div>
    </div>
<div id="desktop-nav" style="background-color: #fff; -webkit-box-shadow: 0px 4px 10px -2px rgba(0,0,0,0.75);
  -moz-box-shadow: 0px 4px 10px -1px rgba(0,0,0,0.75);
  box-shadow: 0px 4px 10px -6px rgba(0,0,0,0.75);">
      <div class="container">


        <nav class="navbar-nav" style="width: 100%">

        <a class="navbar-brand svglogo hidden-xs" href="{{ url('/') }}">
            <img src="{{ asset('assets/password/images/passward logo normal.svg')}}" alt="logo" class="img-fluid img-responsive logo">
          </a>

          <button type="button" class="navbar-toggle collapsed hide-sm"  data-toggle="collapse" data-target="#collapsibleNavbar" aria-expanded="false" ><i class="fa fa-bars"></i></button>


          <div class="collapse navbar-collapse" id="collapsibleNavbar">
             <ul class="nav navbar-nav navbar-right" style="display: flex;">
                 <a class="nav-item dropdown-toggle" id="dropdownMenu1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" style="padding-top: 15px;">CATEGORIES</a>
              <ul class="dropdown-menu categories row" aria-labelledby="dropdownMenu1">
                <div class="col-md-12 drop" >
                  <h3 style="color: #fff;">All Shopping Categories</h3>
                  <hr style="width: 10%;">
                  @php 
                      $categories = \App\Models\Category::all();
                      
                    @endphp
                    <br>
                    <br>
                    @foreach($categories as $category)
                  <div class="col-md-4">
                    <li>
                    <a href="{{ route('category.search',$category->id )}}"><h1>{{ $category->name }}</h1></a>
                     </li>
                    </div>
                    @endforeach
                    <div class="row categories-margin-top" >
                        <div class="col-md-4 col-md-offset-4">
                          <div class="input-group">
                            <input type="email" class="form-control" id="dropdown-search" placeholder="Search for anything you want" style="background-color: transparent;">
                             <div class="input-group-addon purple"><i class="fa fa-search"></i></div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="col-md-6" style="padding-top: 7px;">
                            <span class="simply">OR SIMPLY</span>
                        </div>
                        <div class="col-md-6">
                        <button  type="button" class="explore">EXPLORE &nbsp;<img src="{{ asset('assets/password/images/Union 2 view all arrow.svg')}}" style="height: 9px;" alt="explore button"></button>
                        </div>
                        </div>
                      </div>
                   
                    
                </div>
              </ul>

               <ul class="other-menu nav navbar-nav navbar-right">
               <li class="nav-link top"><a class="nav-item" href="{{ route('about.us')}}">ABOUT</a></li>
                 <li class="nav-link top"><a class="nav-item" href="{{ route('new.stock')}}">NEW STOCK</a></li>
               <li class="nav-link top"><a class="nav-item" href="{{ route('customer.stores')}}">STORES</a></li>
                <li class="nav-link top"><a  class="nav-item" href="{{ route('top.selling') }}">TOP SELLING</a></li>
               </ul>
               <ul class="nav navbar-nav">
                 <li class="nav-link top"><a href="#"><i class="fa fa-bars fa-2x" id="tog-btn" style="font-size: 21px;"></i> </a></li>
               </ul>

            </ul>
          </div>

      </nav>
    </div>
  </div>

        <div id="navbar-large" style="background-color: #fff; -webkit-box-shadow: 0px 4px 10px -2px rgba(0,0,0,0.75);
          -moz-box-shadow: 0px 4px 10px -1px rgba(0,0,0,0.75);
          box-shadow: 0px 4px 10px -6px rgba(0,0,0,0.75);">
          <a href="#" style="align-self: center; padding-right: 20px;">
            <i class="fa fa-shopping-bag" style=" font-size: 20px;"></i>
          </a>



          <a class="navbar-brand svglogo" href="#" >
            <img src="{{ asset('assets/password/images/passward logo normal.svg')}}" alt="logo" class="img-fluid img-responsive logo">
          </a>


            <button type="button" onclick="openNav()" data-target="#mySidenav" name="button" class="btn btn-none" ><i class="fa fa-bars fa-2x"></i> </button>

          <div class=" sidenav" id="mySidenav">
             <ul class="navbar-nav list-inline straight">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <li class=" top"><a href="#">CATEGORIES</a></li>
              <li class=" top"><a href="{{ route('new.stock')}}">NEW STOCK</a></li>
             <li class=" top"><a href="{{ route('top.selling') }}">TOP SELLING</a></li>
              <li class=" top"><a href="#">STORIES</a></li>
              <li class=" top"><a href="#">ABOUT</a></li>
            </ul>
          </div>
        </div>
</div>
  <!-- end of Nav -->


      
      
     

    

  
@yield('content')
  

 

  
       <!-- Start of Footer -->
       <div class="row merchant" style="margin:0px; margin-top: 100px;">
        <div class="container">
                <div class="col-md-4 col-sm-12 col-xs-12 col-md-push-8">
                        <div class="video">
                            <iframe width="310" height="200" src="https://www.youtube.com/embed/kHLHSlExFis" frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture, fullscreen"
                                ></iframe>
                        </div>

                        <div style="position:relative; top:132px; right: 24px;">
                            <p id="inspire">Inspired ?</p>
                            <p id="share"><a href="#"> WATCH AND SHARE THESE STORIES</a></p>
                        </div>
                    </div>
            <div class="col-md-3 col-sm-12 col-xs-12 col-md-pull-4 part1" style="margin-top:40px; justify-content: center;">
                <p class="become a">
                    Become a <span class="becoming a">Merchant</span>
                </p>
                <p class="abc">
                    Easy as A, B, C _
                </p>
                <p class="lorem i">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex nulla vel fuga aspernatur harum
                    earum amet praesentium ipsam.</p>
                <a href="{{ route('agent.signup.one')}}">
                       
                    <p class="find">FIND OUT MORE</p>
                </a>
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12 col-md-pull-4 part2" style="justify-content:center;">
                <p class="become">
                    Find the perfect Merchant <span class="becoming">For your Business</span>
                </p>
                <p class="abc">
                    Easy as A, B, C _
                </p>
                <p class="lorem">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex nulla vel fuga aspernatur harum
                    earum amet praesentium perspiciatis inventore ipsam. Ipsum iusto in cupiditate architecto rem
                    corporis iure quibusdam hic.
                </p>
                <a href="#">
                    <p class="find">FIND OUT MORE</p>
                </a>
            </div>

        </div>
    </div>
    <div class="row rated" style="margin:0px; top:-30px">
        <div class="container accessory">
            <div class="col-md-3 col-sm-12 col-xs-12">
                  <p class="category">RATED CATEGORIES</p>
                   <div class="list">
                   <ul><a href="#">Women Clothing </a></ul>
                   <ul><a href="#">Jewellery </a></ul>
                   <ul><a href="#">Automobile </a></ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 col-xs-12">
                    <p class="category">TOP SEARCHES</p>
                    <div class="list">
                    <ul><a href="#">Bags </a></ul>
                    <ul><a href="#">Gucci </a></ul>
                    <ul><a href="#">Palm slippers </a></ul>
                    <ul><a href="#">Gas cooker </a></ul>
                </div>
                </div>
                <div class="col-md-3 col-sm-12 col-xs-12">
  <p class="categorya">REGISTERED MERCHANTS</p>
  <p class="platform">Merchants on pasward platform are registered and trained. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus iure cumque odio laborum mollitia inventore quod nostrum magni, tempora cupiditate nisi consectetur! Quasi, repudiandae dolor minus non sit sed dignissimos!
  
</p>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <p class="categorya">VENDORS</p>
                        <p class="platform">Each vendor is registered under a selected merchant. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum minima nisi vitae id suscipit odit delectus, voluptate repellendus fuga earum velit nihil iusto et commodi, quos blanditiis facilis voluptas culpa?</p>
                        </div>
  </div>
  <div class="line"><hr>
  <div class=" container list" style="margin-top:20px;">
    <div class="col-xs-12 col-md-3">
    <ul><a href="{{ route('help')}}">Help </a></ul>
      <ul><a href="#">Privacy Policy </a></ul>
      <ul><a href="{{ route('faq')}}">Frequently Asked Questions
         </a></ul>
  </div>
  <div class="col-xs-12 col-md-3">
    <ul><a href="#">Newsletter </a></ul>
    <ul><a href="#">Email Address </a></ul>
         <div class="line1">
          <input type="text">
         </div>
  </div>
  <div class="col-xs-12 col-md-3" style="display: flex; flex-direction: column;">
  <br>
  <button id="subscribebutton">SUBSCRIBE</button>
</div>
<div class="col-xs-12 col-md-3"></div>
  </div>

  </div>
  <div class="line"><hr></div>
  <div class="container">
  <div class="col-md-3 col-sm-12 col-xs-12">
  <p class="copyright">
  Copyright 2018
  </p>
  </div>
  <div class="col-md-3 col-sm-12 col-xs-12">
  <img src="{{ asset('assets/password/images/passward logo white.svg')}}" alt="logo" class="img-responsive img-fluid pasward">
  </div>
  <div class="col-md-3 col-sm-12 col-xs-12">

  </div>
  <div class="col-md-3 col-sm-12 col-xs-12" style="display: flex; justify-content: flex-end;">
   <a href="about.html">
     <span class="circle">
       <i class="fas fa-caret-up up"></i></a>
     </span>

    </div>
  </div>

  </div>
    <!-- End of Footer -->
<!-- hello -->





</div>
<script src="{{ asset('assets/password/js/jquery.js') }}"></script>
@stack('scripts')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- <script src="js/bootstrap.min.js" type="text/javascript"></script> -->

<script src="{{ asset('assets/password/slick/slick.js') }}"></script>


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
<script src="{{ asset('assets/password/js/script.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
    });
</script>

<script type="text/javascript">
console.log(typeof(jQuery));
$(document).ready(function(){
  $('.carousel').slick({
    slidesToShow: 3,
    dots: false,
    autoplay: true,
    centerMode: true,
    autoplaySpeed: 2000,
    arrows: true,
    responsive: [
{
 breakpoint: 999,
 settings: {
   slidesToShow: 2,
   slidesToScroll: 2,
 }
},
{
 breakpoint: 420,
 settings: {
   slidesToShow: 1,
   slidesToScroll: 1,
 }
}
]
  });
});

</script>

<script type="text/javascript">
$(document).ready(function(){
  $('.banner').slick({
    slidesToShow: 1,
    dots:true,
    autoplay: true,
    centerMode: true,
    autoplaySpeed: 2000,
    arrows: false,
    dots: false,
  });
});
</script>




</body>

</html>
