@extends('layouts.frontend.app')

@section('content')
<header>

    <div class="container">
          <a href="index.html">
                  <p class="home">Home /
          </a> <a href="account.html"> Account/</a> <a> <span class="profile"> Update Profile</span> </a>
    </div>
  </header>
  <!-- start of sidebar -->
  <br>
  <br>
   <div class="container">
     <h1 class="text-center" style="font-weight: bolder;">Orders</h1>
  <div class="row">
  <div class="col-md-4 col-sm-12 " style="padding-top: 20px;  ">
    <div class="_display">
      <div class="">
        <i class="far fa-user">&nbsp;&nbsp;</i>
      </div>
      <div>
        <a class="bd" href="#">My Profile</a>
        <p class="text-muted">Account Information</p>
      </div>
    </div>
    <div class="_display">
      <div class="">
  <img src="{{ asset('assets/password/images/wallet-outline.png')}}" alt="wallet">&nbsp;&nbsp;
      </div>
      <div>
        <a class="bd" href="#">My Wallet</a>
        <p class="text-muted">Wallet</p>
      </div>
    </div>
    <div class="_display">
      <div class="">
  <img src="{{ asset('assets/password/images/shopping bag.png')}}" alt="bag">
      </div>
      <div>
        <a class="bd" href="#">My Orders</a>
        <p class="text-muted">Orders</p>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-sm-12">
      <h3>My Orders</h3>
      <h4>Orders</h4>
      <hr>
      <img src="images/nothing to see here orders.svg" style=" height: 140px;" alt="" class="img-responsive img-fluid center-block">
      <h4 class="text-center">You haven't made any purchases yet</h4>
      <p class="text-center" style="color: #000333;">Nothing to see here.</p>

  </div>
</div>
</div>

<div class="top_star">
<img src="images/path 41.svg" alt="path star">
</div>

<div class="rotated" style="width: 244px;">
<i class="fab fa-facebook fa-rotate-360" style="color: #FF3C89;"></i>&nbsp;
<i class="fab fa-whatsapp fa-rotate-360" style="color: #FF3C89;"></i>&nbsp;
<i class="fab fa-twitter fa-rotate-360" style="color: #FF3C89;"></i> &nbsp;
<span class="text-muted cabin">
   Let us help from social media </span>
<span class="run-through"></span>
</div>

@stop
