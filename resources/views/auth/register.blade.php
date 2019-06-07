@extends('layouts.app')

@section('content')
{{-- <!-- Start of Nav-->
<header>
    <div class="navbar-fixed-top">
      <div class="info hidden-xs ">
  
        <div class="container" style="padding:0;">
            <div class="row  hidden-xs">
                <div class="col-md-6 col-sm-6 col-xs-6 text" style="padding-top: 15px;">
  
                    <div class="input-group">
                      <input type="email" class="form-control" id="search" placeholder="Search for anything you want">
                       <div class="input-group-addon purple"><i class="fa fa-search"></i></div>
                    </div>
  
                  </div>
  
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="check-list">
                      <button type="button" class="btn btn-none" name="button">BECOME A VENDOR</button>
                      <button type="button" class="btn btn-none" name="button">SIGN UP</button>
                      <button type="button" class="btn btn-none" name="button">LOG IN</button>
                      <button type="button" class="btn btn-none" name="button">MY CART</button>
                      <a href="#" id="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/face.jpg" style="height: 40px; border-radius: 100%; padding-right: 10px;" class="img-responsive img-fluid" alt="profile"></a>
                      <ul class="dropdown-menu pull-right text-center">
                        <li><a href="AccountInfo.html"><i class="far fa-user">&nbsp;&nbsp;</i> Profile</a></li>
                        <li><a href="order(empty).html"><img src="images/shopping bag.png" alt="bag">&nbsp;&nbsp;&nbsp;&nbsp;Orders</a></li>
                        <li><a href="#"><img src="images/wallet-outline.png" alt="wallet">&nbsp;&nbsp;&nbsp;&nbsp;Wallet</a></li>
                        <li><a href="saved items(empty).html"><i class="fa fa-heart">&nbsp;&nbsp;&nbsp;</i> Saved Items</a></li>
                        <li><a href="index.html"><i class="fas fa-sign-out-alt">&nbsp;&nbsp;&nbsp;</i>Logout</a></li>
                      </ul>
                      <a href="#"><i class="fa fa-shopping-bag" style="margin-top: 5px; font-size: 20px;"></i></a>
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
  
            <a class="navbar-brand svglogo hidden-xs" href="#">
              <img src="images/passward logo normal.svg" alt="logo" class="img-fluid img-responsive logo">
            </a>
  
            <button type="button" class="navbar-toggle collapsed hide-sm"  data-toggle="collapse" data-target="#collapsibleNavbar" aria-expanded="false" ><i class="fa fa-bars"></i></button>
  
  
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
               <ul class="nav navbar-nav navbar-right" style="display: flex;">
                   <a class="nav-item dropdown-toggle" id="dropdownMenu1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" style="padding-top: 15px;">CATEGORIES</a>
                <ul class="dropdown-menu categories row" aria-labelledby="dropdownMenu1">
                  <div class="col-md-12 drop">
                    <h3 style="color: #fff;">All Shopping Categories</h3>
                    <hr style="width: 10%;">
                    <div class="col-md-4 categories-margin-top">
                        <li><a href="#"><h1>Women's Clothing</h1></a></li>
                        <li><a href="#"><h1>Men's Clothing</h1></a></li>
                        <li><a href="#"><h1>Beauty and Hair</h1></a></li>
                        <!-- <li role="separator" class="divider"></li> -->
                        <li><a href="#"><h1>Jewelry</h1></a></li>
                        <li><a href="#"><h1>Baby and Kids</h1></a></li>
                      </div>
                      <div class="col-md-4 categories-margin-top">
                        <li><a href="#"><h1>Groceries</h1></a></li>
                        <li><a href="#"><h1>Home Appliances</h1></a></li>
                        <li><a href="#"><h1>Kitchen</h1></a></li>
                        <li><a href="#"><h1>Electronics</h1></a></li>
                        <li><a href="#"><h1>Phones and Computers</h1></a></li>
                      </div>
                      <div class="col-md-4 categories-margin-top">
                        <li><a href="#"><h1>Sport Gear</h1></a></li>
                        <li><a href="#"><h1>Security</h1></a></li>
                        <li><a href="#"><h1>Automobiles</h1></a></li>
                      </div>
                      <div class="row categories-margin-top">
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
                          <button  type="button" class="explore">EXPLORE &nbsp;<img src="images/Union 2 view all arrow.svg" style="height: 9px;" alt="explore button"></button>
                        </div>
                        </div>
                      </div>
                  </div>
                </ul>
  
                 <ul class="other-menu nav navbar-nav navbar-right">
                   <li class="nav-link top"><a class="nav-item" href="about.html">ABOUT</a></li>
                   <li class="nav-link top"><a class="nav-item" href="new stock.html">NEW STOCK</a></li>
                   <li class="nav-link top"><a class="nav-item" href="#">STORIES</a></li>
                   <li class="nav-link top"><a class="nav-item" href="TopSelling.html">TOP SELLING</a></li>
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
              <img src="images/passward logo normal.svg" alt="logo" class="img-fluid img-responsive logo">
            </a>
  
  
              <button type="button" onclick="openNav()" data-target="#mySidenav" name="button" class="btn btn-none" ><i class="fa fa-bars fa-2x"></i> </button>
  
            <div class=" sidenav" id="mySidenav">
               <ul class="navbar-nav list-inline straight">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <li class=" top"><a href="#">CATEGORIES</a></li>
                <li class=" top"><a href="#">NEW STOCK</a></li>
                <li class=" top"><a href="#">TOP SELLING</a></li>
                <li class=" top"><a href="#">STORIES</a></li>
                <li class=" top"><a href="#">ABOUT</a></li>
              </ul>
            </div>
          </div>
    </div>
    </header>
    <!-- end of Nav -->
  <div class="path">
    <img src="images/Path32.svg" alt="">
  </div>
      <div class="container-fluid">
          <!-- start first row -->
          <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="path">
              <!-- start second row -->
              <div class="row">
                  <div class="col-md-4 col-sm-12 col-xs-12">
                  </div>
                  <div class="col-md-3 col-sm-6 col-offset-sm-6 col-xs-12" style="margin-top: 50px;">
                      <h1 class="login">Sign Up</h1>
                      <div class="card card-edit-login">
                          <p class="you" style="margin-top: 40px;">
                              As soon as you are done creating your account, you can continue shopping
                          </p>
                          
                            <form method="POST" action="{{ route('register') }}" style="padding: 15px;">
                                @csrf
                            <div class="form-group">
                              <label for="name" class="text-muted">FIrst Name:</label>
                              <input type="text" class="form-control" id="InputName" name="first_name" placeholder="">
                            </div>
                            <div class="form-group">
                              <label for="name" class="text-muted">Last Name:</label>
                              <input type="text" class="form-control" id="InputName" placeholder="">
                            </div>
                            <div class="form-group">
                              <label for="email" class="text-muted">Email Address:</label>
                              <input type="text" class="form-control" id="InputEmail3" placeholder="">
                            </div>
                            <div class="form-group">
                              <label for="Phone Number" class="text-muted">Phone Number:</label>
                              <div class="input-group">
                                <span class="input-group-addon" style="color: #F5F5F5; background-color: #52CB9C;" id="basic-addon1">+234</span>
                                <input type="text" class="form-control" placeholder="" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="location" class="text-muted">Location:</label>
                                <div class="input-group" style="width: 100%;">
                                  <select class="mdb-select md-form form-control" searchable="Search here..">
                                    <option value="" disabled selected>Select your current location</option>
                                    <option value="1">Akwa Ibom, Nigeria</option>
                                    <option value="2">Abia, Nigeria</option>
                                    <option value="3">Anambra, Nigeria</option>
                                    <option value="4">Cross-Rivers, Nigeria</option>
                                    <option value="4">Delta, Nigeria</option>
                                    <option value="4">Edo, Nigeria</option>
                                </select>
                              </div>
                              </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1" class="text-muted">Password:</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="">
                            </div>
  
                          </form>
          <div class="" style="padding-bottom: 15px;">
  
              <button id="continuebutton">CONTINUE</button>
  
            </div>
  
              <div class="card edit-card-editing" id="grad">
                  <div>
                  <p class="are" style="padding-top: 10px;">
                Already have an account?
                  </p>
              </div>
              <button id="loginbutton">LOGIN</button>
                  </div>
                      </div>
                  </div>
  
  
                  <div class="star">
                      <img src="images/Path 41.svg" alt="">
                  </div>
  
                  <!-- start buyer section -->
                  <div class="col-md-3 col-sm-6 col-offset-sm-6 col-xs-12" style="padding-bottom: 50px;">
                      <div class="card edit-card-edit">
                          <div class="row notabuyer">
                                  <p class="you">Not a buyer?</p>
                                  <p class="instead" style="font-style: inherit;">
                                  <a href="#" style="color: #FF3C89;"> Login</a> <span class="color" style="margin-top:-10px"> or</span><a href="#" style="color: #FF3C89;"> Signup </a><span class="color"> instead as a</span>
                                  </p>
                          </div>
  
                          <hr class="run-through">
                          <div class="box">
  
                          <div class=" merchantbox">
                             <a href="#"><i class="fas fa-shopping-cart" style="color:  #000033;" ></i>  <p class="vendortext"> VENDOR</p> </a>
                          </div>
                          <div class=" vert-line">
                                </div>
                          <div class=" vendorbox">
                                 <a href="#"><i class="fas fa-credit-card" style="margin-left:2px;color:  #000033;"></i><p class="merchanttext"> MERCHANT</p></a>
                          </div>
                      </div>
                      </div>
                  </div>
  
                    <!-- end buyer section -->
                  <div class="col-md-3 col-sm-12 col-xs-12">
  
                  </div>
              </div>
              <!-- end second row -->
                  </div>
              </div>
          </div>
          <!-- end first row -->
  
  
  
  
  </div> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
