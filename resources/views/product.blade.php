@extends('layouts.frontend.app')

@section('content')
<br>
<br>
<br>
<br>
<div class="top_star">
    <img src="images/path 41.svg" alt="path star">
  </div>
  <div class="rotated" style="width: 233px;">
    <i class="fab fa-facebook fa-rotate-360" style="color: #FF3C89;"></i>&nbsp;
    <i class="fab fa-whatsapp fa-rotate-360" style="color: #FF3C89;"></i>&nbsp;
    <i class="fab fa-twitter fa-rotate-360" style="color: #FF3C89;"></i> &nbsp;
    <span class="text-muted cabin">
       Follow us on social media </span>
    <span class="run-through"></span>
  </div>

<div class="container">
    <div class="row">
      <a href="index.html" style="text-decoration:none; color: #d1d2d3;">
              <p class="home"><a href="index.html">Home</a> / <span class="top"><a href="PhonesComputers.html">Phones & Computers </a>/ </span> <span class="storename">  <a href="product.html">Mobile Phones / Apple / iPhone Xs Pro</a></p>
      </a> <a href="PhonesComputers.html">  </a>
    </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-xs-12 col-md-6">
      <div class="img-loved">
          <img src="{{ asset('assets/password/images/hitcase-pro-for-iphone-x-case-13904579.jpg')}}" class="img-responsive img-fluid" alt="iphone Xs Pro">
          <div class="edit">
            <a href="#" style="padding: 10px;"><img src="{{ asset('assets/password/images/fav appearance selected.svg')}}" style="height: 25px;" alt="favorited"></a>
          </div>
      </div>
    </div>
    <div class="col-xs-12 col-md-6">
      <div class="row">
          <div class="col-md-6">
            <p><span class="text-light">Apple Product (ID:</span>112A66668)</p>
          </div>
          <div class="col-md-6"></div>
      </div>
      <div class="row">
          <div class="col-md-12">
            <h4 class="text-bold" style="font-size: 23px;">iPhone Xs pro with Air shield technology 5-Inch QHD (1.5GB, 8GB ROM) 8MP + 5MP Dual SIM 4G Smartphone</h4>
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><span style="font-weight: bold; font-family:Ubuntu;">(Reviews from 223 Users)</span>
          </div>
      </div>
      <div class="row">
          <div class="col md-12" style="margin-left: 20px;">
            <span class="price">&#8358;99,999</span>
            <span class="product_newprice"><del>&#8358;100,000</del></span>
            <button class="span-round"><span class="span1" id="btn1"><i class="fas fa-minus"></i></span>&nbsp;&nbsp;<span
                id="number">1</span>&nbsp;&nbsp;<span class="span2" id="btn2"><i class="fas fa-plus"></i></span>&nbsp;</button>
            <button type="button" class="product_cart">ADD TO CART <i class="fas fa-plus"></i></button>
          </div>
      </div>
      <div class="row">
          <div class="col-md-6">
            <p class="text-light">QUICK DESCRIPTION</p>
          <p class="text-light">{{ $product->quick_description }}</p>
          </div>
          <div class="col-md-6"></div>

      </div>
      <div class="row">
          <div class="col-md-12"><p class="text-light">If you cannot pick up this item immediately you can also <span style="color: #FF3C89;">Reserve Item for 24 hours</span></p></div>
      </div>
      <div class="row">
          <div class="col-md-4">
            <div class="slot-border">
              <p class="text-center text-light">SOLD BY:</p>
              <img src="{{ asset('assets/password/images/Slot_Logo_latest.PNG')}}" class="img-responsive img-fluid center-block" style="height: 30px;" alt="Slot logo">
              <p class="text-center text-light">Nwaniba Rd.</p>
            </div>
          </div>
          <div class="col-md-8"></div>
      </div>
    </div>
    </div>
  </div>
</div>
<div class="container">

  <div class="row rowstore">
    <div class="col-md-6"></div>
    <div class="col-xs-12 col-md-6">

      <ul class="nav nav-tabs">
        <li class="active "><a href="#reviews-content" data-toggle="tab" >Reviews</a></li>
        <li ><a href="#description-content" data-toggle="tab" >Description</a></li>
        <li ><a href="#warranty-content" data-toggle="tab" >Warranty</a></li>
      </ul>
      </div>

    </div>

</div>

<!-- content for ABumatech Shop -->
<div class="container">
<div class="tab-content">
<div id="reviews-content" class="row tab-pane fade">
<div class="col-xs-12 col-md-9 col-md-offset-3">

    <div class="row" style="margin-top:35px;">
      <div class="col-md-3">
            <div class="pink-side">
                <h1 class="text-bold">989</h1>
                <h2 style="padding-left: 4px;">Successful Sales</h2>
            </div>
      </div>
      <div class="col-md-7 col-offset-md-2">
        <div class="col-md-3 rating">
          <div class="circle-star">
            <img src="images/star full.svg" style="height: 30px;" alt="rating star">
            <p style="flex-direction: column; align-self: center; justify-content: center;">2 star</p>
          </div>
        </div>
        <div class="col-md-3">
          <p>Good Rating</p>
          <p style="font-weight: bold; font-size: 12px;">Based on 400 Ratings</p>
        </div>
        <div class="col-md-6">
          <div class="col-md-12">
            3 stars
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            (223)
          </div>
          <div class="col-md-12">
            2 stars
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star empty-star"></i>
            (0)
          </div>
          <div class="col-md-12">
            1 star
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            (0)
          </div>
        </div>
        <div class="col-md-12" style="padding-top: 20px;">Did you like this store? Help rate it immediately</div>
        <div class="col-md-12">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
         <a href="product_review.html"> <span style="color: #FF0066;">Add a Comment</span></a>
          </div>
      </div>

      </div>

    </div>
    <div class="row bordered" style="margin-top: 15px;">
      <div class="col-md-2">
        <p>David Ofiare</p>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-9">
        <p class="blue">Nice Nice…</p>
        <p class="text-light">
          Really enjoyed using this product blah blah blah lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et et dolore magnam aliquam quaerat voluptatem.
        </p>
      </div>
    </div>
    <div class="row bordered" style="margin-top: 15px;">
      <div class="col-md-2">
        <p>Carrie Nsikak</p>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-9">
        <p class="blue">Awesome Store</p>
        <p class="text-light">
          Really enjoyed using this product blah blah blah lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et et dolore magnam aliquam quaerat voluptatem.
        </p>
      </div>
    </div>
    <div class="row bordered" style="margin-top: 15px;">
      <div class="col-md-2">
        <p>Iboro Brown</p>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-9">
        <p class="blue">Thank you guys for having this on your platform</p>
        <p class="text-light">
          Really enjoyed using this product blah blah blah lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et et dolore magnam aliquam quaerat voluptatem.
        </p>
      </div>
    </div>
    <div class="row bordered" style="margin-top: 15px;">
      <div class="col-md-2">
        <p>Adebola Udom</p>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-9">
        <p class="blue">My new pepper them item…</p>
        <p class="text-light">
          Really enjoyed using this product blah blah blah lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et et dolore magnam aliquam quaerat voluptatem.
        </p>
      </div>
    </div>
    <div class="row bordered" style="margin-top: 15px;">
      <div class="col-md-2">
        <p>Bright Echefu</p>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-9">
        <p class="blue">Low sound but I like it still</p>
        <p class="text-light">
          Really enjoyed using this product blah blah blah lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et et dolore magnam aliquam quaerat voluptatem.
        </p>
      </div>
    </div>
    <div class="row bordered" style="margin-top: 15px;">
      <div class="col-md-2">
        <p>Carrie Nsikak</p>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-9">
        <p class="blue">Awesome product</p>
        <p class="text-light">
          Really enjoyed using this product blah blah blah lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et et dolore magnam aliquam quaerat voluptatem.
        </p>
      </div>
    </div>
    <div class="row bordered" style="margin-top: 15px;">
      <div class="col-md-2">
        <p>Bright Echefu</p>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-9 reviews">
        <p class="blue">Apple kills it</p>
        <p class="text-light">
          Really enjoyed using this product blah blah blah lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et et dolore magnam aliquam quaerat voluptatem.
        </p>
      </div>
    </div>
</div>
      

    
      <div id="description-content" class="row tab-pane fade">
        <div class="col-md-6"><img
            src="{{ asset('assets/password/images/GameSir-G4s-2-4Ghz-Wireless-Bluetooth-Gamepad-Controller-for-PS3-Android-TV-BOX-Smartphone-Tablet-PC.jpg')}}"
            class="img-responsive img-fluid" alt="gamepad_controller"></div>
        <div class="col-md-6"> {{ $product->description }}</div>
      </div>

</div>
    

    <div class="row" style="margin-top:35px;">
            <div class="col-xs-6 col-md-3">
                    <p class="pages"> 1-20 <span class="page-ext"> of 233,456 results</span></p>
            </div>

        <div class="col-xs-12 col-md-3"> </div>

    <div class="col-xs-12 col-md-3"> </div>

    <div class="col-xs-6 col-md-3" style="margin-top:35px;">
        <a href="#" style="text-decoration:none;"> <p> <i class="fas fa-angle-left" style="margin-right: 15px;"></i> PREV <span class="next"> NEXT</span> <i class="fas fa-angle-right" style="margin-left:15px;"></i></p> </a>
    </div>

    </div>


    </div>
    @stop 

  