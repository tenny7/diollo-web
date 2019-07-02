@extends('layouts.frontend.app')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.css') }}">
@endpush

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
          @php
          $images = \App\Models\ProductImage::where('product_id', $product->id)->get();
          $image_var = json_decode($images);
          @endphp

          @if(is_array($image_var))
          @foreach(array_slice($image_var, 0, 1) as $image)
              <img src="{{ asset("storage/$image->path")}}" alt="phone" class="img-responsive img-fluid" >
          @endforeach
          @endif
          {{-- <img src="{{ asset('assets/password/images/hitcase-pro-for-iphone-x-case-13904579.jpg')}}" class="img-responsive img-fluid" alt="iphone Xs Pro"> --}}
          <div class="edit">
            <a href="#" data-id="{{ $product->id }}" style="padding: 10px;" id="productId" class="productId"><img src="{{ asset('assets/password/images/fav appearance selected.svg')}}" style="height: 25px;" alt="favorited"></a>
          </div>
      </div>
    </div>

    
    <div class="col-xs-12 col-md-6">
      {{-- @include('partials.admin.success')
      @include('partials.admin.error') --}}
      <div class="row">
          <div class="col-md-6">
            <p><span class="text-light">Apple Product (ID:</span>112A66668)</p>
          </div>
          <div class="col-md-6"></div>
      </div>
      @include('partials.admin.success')
      @include('partials.admin.error')
      <div class="row">
          <div class="col-md-12">
          <h4 class="text-bold" style="font-size: 23px;">{{ $product->name }}</h4>
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><span style="font-weight: bold; font-family:Ubuntu;">(Reviews from 223 Users)</span>
          </div>
      </div>
      <div class="row">
          <div class="col md-12" style="margin-left: 20px;">
          <form action="{{ route('cart.add',$product->id)}}" method="post" >
            @csrf
            <span class="price">&#8358;{{ $product->discount_price }}</span>
            <input id="price" type="hidden" name="price" class="price" value="{{ $product->discount_price }}">
            
            <span class="product_newprice" style="font-size:14px;"><del>&#8358;</del> {{ $product->original_price }}</span>
            
            <input type="number" id="qty" name="qty" style="width:50px; border:solid 1px #333; border-radius:7px;" min="0" placeholder="0">
            <input type="hidden" id="productId" value="{{ $product->id }}">
                <button type="button" class="product_cart">ADD TO CART <i class="fas fa-plus"></i></button>
            </form>
          </div>
      </div>
      <div class="row">
          <div class="col-md-6">
            <br>
            <p class="text-light">QUICK DESCRIPTION</p>
          <p class="text-light">{{ $product->quick_description }}</p>
          </div>
          <div class="col-md-6"></div>

      </div>
      <br>
      <div class="row">
          <div class="col-md-12"><p class="text-light">If you cannot pay for this item immediately you can also <span style="color: #FF3C89;"><a href="#">Reserve Item for 24 hours</a></span></p></div>
      </div>
      <div class="row">

          {{-- {{ route('save.item',$product->id)}} --}}
      <button type="button" id="productId" class="purple productId" data-id="{{ $product->id }}" style="border:none; border-radius:25px; color:#fff;">
            <svg height="14" viewBox="0 0 16 14" width="16" class="" 
            name="love">
            <path d="M14.3 1.3A4.22 4.22 0 0 0 11.254.01c-1.15 0-2.232.46-3.047 1.293l-.425.436-.432-.443A4.242 4.242 0 0 0 4.3 0C3.152 0 2.07.46 1.26 1.29A4.418 4.418 0 0 0 0 4.409a4.43 4.43 0 0 0 1.266 3.116l6.194 6.34a.443.443 0 0 0 .313.135.44.44 0 0 0 .313-.132l6.206-6.33a4.435 4.435 0 0 0 1.264-3.119 4.415 4.415 0 0 0-1.257-3.12z" 
              fill="#d8d8d8" 
              fill-rule="nonzero">
            </path>
            </svg>
          Save for later
        </button>
          <div class="col-md-4">
            <div class="slot-border">
              <p class="text-center text-light">SOLD BY:</p>
              <a href="{{ route('customer.storePage',$product->store)}}">
                {{-- @foreach($product->pivot as $store)
{{ dd( asset("storage/$store->logo"))}}
                @endforeach --}}
                
              <img src="" class="img-responsive img-fluid center-block" style="height: 30px;" alt="Slot logo">
              <p class="text-center text-light">Nwaniba Rd.</p>
              </a>
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

      <br>
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
          <img src="{{ asset('assets/password/images/star_full.svg')}}" style="height: 30px;" alt="rating star">
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
        <i class="fa fa-star reviewbutton1" data-id="{{ $product->id }}"></i>
          <i class="fa fa-star reviewbutton1" data-id="{{ $product->id }}"></i>
          <i class="fa fa-star reviewbutton1" data-id="{{ $product->id }}"></i>
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

    @push('scripts')
      <script src="{{ asset('assets/admin/js/custom.js')}}"></script>
      <script src="{{ asset('assets/admin/js/toastr.js')}}"></script>
    @endpush

  