@extends('layouts.frontend.app')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
<style>
  .star {
    font-size: 41px !important;
  
  }
  .caption {
    display:none !important;
  }
</style>
@endpush

@section('content')
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="top_star">
    <img src="{{ asset('assets/passward/images/path 41.svg')}}" alt="path star">
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
          // dd($images);
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
            <p><span class="text-light">Apple Product (ID:</span>PRD_{{ $product->id}})</p>
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
          {{-- <form action="{{ route('cart.add',$product->id)}}" method="post" > --}}
            {{-- @csrf --}}
            <span class="price">&#8358;{{ $product->discount_price }}</span>
            <input id="price" type="hidden" name="price" class="price" value="{{ $product->discount_price }}">
            
            <span class="product_newprice" style="font-size:14px;"><del>&#8358;</del> {{ $product->original_price }}</span>
            <label for="">Quantity</label>
            <button class="span-round"><span class="span1" id="btn1"><i class="fas fa-minus"></i></span>&nbsp;&nbsp;<span
              id="number">1</span>&nbsp;&nbsp;<span class="span2" id="btn2"><i class="fas fa-plus"></i></span>&nbsp;</button>
              <span style="display:none" id="spanValue"></span>
            {{-- <input type="number" id="qty" name="qty" style="width:50px; border:solid 1px #333; border-radius:7px;" min="0" placeholder="0"> --}}
            <input type="hidden" id="productId" value="{{ $product->id }}">
                <button type="button"  data-id="{{ $product->id }}" class="product_cart">ADD TO CART <i class="fas fa-plus"></i></button>
                <button type="button" id="reserveId" class="purple reserveId" data-id="{{ $product->id }}" style="border:none; border-radius:25px; color:#fff;">
                    <svg height="14" viewBox="0 0 16 14" width="16" class="" 
                    name="love">
                    <path d="M14.3 1.3A4.22 4.22 0 0 0 11.254.01c-1.15 0-2.232.46-3.047 1.293l-.425.436-.432-.443A4.242 4.242 0 0 0 4.3 0C3.152 0 2.07.46 1.26 1.29A4.418 4.418 0 0 0 0 4.409a4.43 4.43 0 0 0 1.266 3.116l6.194 6.34a.443.443 0 0 0 .313.135.44.44 0 0 0 .313-.132l6.206-6.33a4.435 4.435 0 0 0 1.264-3.119 4.415 4.415 0 0 0-1.257-3.12z" 
                      fill="#d8d8d8" 
                      fill-rule="nonzero">
                    </path>
                    </svg>
                  Reserve for a day
                </button>
                {{-- <button type="button" style="border:none; color:#fff;" class="product_cart_single purple" data-price="{{ $product->discount_price }}" data-id="{{ $product->id }}">ADD TO CART <i class="fas fa-plus"></i></button> --}}
            {{-- </form> --}}
          </div>
      </div>
      <br>
      <div class="row">
          <div class="col-md-12">
            <p class="text-light">If you cannot pay for this item immediately you can also <span style="color: #FF3C89;">Reserve Item for 24 hours</span> by selecting a quantity and clicking "reserve for a day"
            </p>
            {{-- <form action=""></form> --}}
            {{-- <form action="{{ route('customer.reserve',$product->id)}}" method="post" > --}}
              @csrf
              {{-- <span class="price">&#8358;{{ $product->discount_price }}</span> --}}
              {{-- <input id="price" type="hidden" name="price" class="price" value="{{ $product->discount_price }}"> --}}
              
              {{-- <span class="product_newprice" style="font-size:14px;"><del>&#8358;</del> {{ $product->original_price }}</span> --}}
              
              {{-- <label for="">Quantity</label>
              <button class="span-round"><span class="span1" id="btn1"><i class="fas fa-minus"></i></span>&nbsp;&nbsp;<span
                id="number">1</span>&nbsp;&nbsp;<span class="span2" id="btn2"><i class="fas fa-plus"></i></span>&nbsp;</button>
                <span style="display:none" id="spanValue"></span> --}}
              {{-- <input type="number" id="qty" name="qty" style="width:50px; border:solid 1px #333; border-radius:7px;" min="0" placeholder="0"> --}}
              {{-- <input type="hidden" id="productId" value="{{ $product->id }}"> --}}
                  {{-- <button type="button"  data-id="{{ $product->id }}" class="product_cart">ADD TO CART <i class="fas fa-plus"></i></button> --}}
                  {{-- <button type="button" style="border:none; color:#fff;" class="product_cart_single purple" data-price="{{ $product->discount_price }}" data-id="{{ $product->id }}">ADD TO CART <i class="fas fa-plus"></i></button> --}}
                  {{-- <button type="button" id="reserveId" class="purple reserveId" data-id="{{ $product->id }}" style="border:none; border-radius:25px; color:#fff;">
                    <svg height="14" viewBox="0 0 16 14" width="16" class="" 
                    name="love">
                    <path d="M14.3 1.3A4.22 4.22 0 0 0 11.254.01c-1.15 0-2.232.46-3.047 1.293l-.425.436-.432-.443A4.242 4.242 0 0 0 4.3 0C3.152 0 2.07.46 1.26 1.29A4.418 4.418 0 0 0 0 4.409a4.43 4.43 0 0 0 1.266 3.116l6.194 6.34a.443.443 0 0 0 .313.135.44.44 0 0 0 .313-.132l6.206-6.33a4.435 4.435 0 0 0 1.264-3.119 4.415 4.415 0 0 0-1.257-3.12z" 
                      fill="#d8d8d8" 
                      fill-rule="nonzero">
                    </path>
                    </svg>
                  Reserve for a day
                </button> --}}
                <hr>
                <button type="button" id="productId" class="purple productId" data-id="{{ $product->id }}" style="border:none; border-radius:25px; color:#fff;">
                  <svg height="14" viewBox="0 0 16 14" width="16" class="" 
                  name="love">
                  <path d="M14.3 1.3A4.22 4.22 0 0 0 11.254.01c-1.15 0-2.232.46-3.047 1.293l-.425.436-.432-.443A4.242 4.242 0 0 0 4.3 0C3.152 0 2.07.46 1.26 1.29A4.418 4.418 0 0 0 0 4.409a4.43 4.43 0 0 0 1.266 3.116l6.194 6.34a.443.443 0 0 0 .313.135.44.44 0 0 0 .313-.132l6.206-6.33a4.435 4.435 0 0 0 1.264-3.119 4.415 4.415 0 0 0-1.257-3.12z" 
                    fill="#d8d8d8" 
                    fill-rule="nonzero">
                  </path>
                  </svg>
                Add to wishlist
              </button>
                {{-- </form> --}}
            
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
      
      <div class="row" style="margin-top:30px;">

          {{-- {{ route('save.item',$product->id)}} --}}
      
          <div class="col-md-4">
            <div class="slot-border">
              <p class="text-center text-light">SOLD BY:</p>
              <a href="{{ route('customer.storePage',$product->store)}}">
                @php 
                  $store = \App\Models\Store::find($product->store);
                @endphp
                  {{-- <img src="{{ asset("storage/$store->logo")}}" alt="phone" class="img-responsive img-fluid" style="height:50px; width:50px; object-fit:contain;"> --}}
                
              <img src="{{ asset("storage/$store->logo")}}" class="img-responsive img-fluid center-block" style="height: 30px; object-fit:contain;" alt="Slot logo">
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

      <ul class="nav">
        
        
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#warranty-content">Warranty</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#description-content">Description</a>
          </li>
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#reviews-content">Reviews</a>
          </li>
        {{-- <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li> --}}
      </ul>


      {{-- <ul class="nav nav-tabs">
        <li><a href="#reviews-content" class="active" data-toggle="tab" >Reviews</a></li>
        <li ><a href="#description-content" data-toggle="tab" >Description</a></li>
        <li ><a href="#warranty-content" data-toggle="tab" >Warranty</a></li>
      </ul> --}}
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
              @php 
                $countProductOrderTimes = \DB::table('order_product')->where('product_id', $product->id)->count();
              @endphp
            <h1 class="text-bold">{{ $countProductOrderTimes }}</h1>
                <h2 style="padding-left: 4px;">Successful Sales</h2>
            </div>
      </div>
      <div class="col-md-7 col-offset-md-2">
        <div class="col-md-3 rating">
          <div class="circle-star">
          <img src="{{ asset('assets/password/images/star_full.svg')}}" style="height: 30px;" alt="rating star">
            <p style="flex-direction: column; align-self: center; justify-content: center;">{{ number_format($productRating->averageRating) }} star</p>
          </div>
        </div>
        <div class="col-md-3">
          <p>Good Rating</p>
          <p style="font-weight: bold; font-size: 12px;">Based on {{ count($ratingCount) }} Ratings</p>
        </div>
        {{-- <div class="col-md-6">
          <div  class="col-md-12">
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
        </div> --}}
        <div class="col-md-12" style="padding-top: 20px;">Did you like this store? Help rate it immediately</div>
        <div class="col-md-12" style="padding-top: 20px; color:#FF0066;">Select a star, then click "add comment to rate"</div>
        <div class="col-md-12">
          <input id="input-1" data-id="{{ $product->id }}" height="14" name="input-1" class="rating rating-loading reviewbutton1" data-min="0" data-max="5" data-step="1" value="0">
          
              <a href="javascript:void(0);" class="reviewbutton1" data-id="{{ $product->id }}"> <span style="color: #FF0066;">Add a Comment</span></a>
          </div>
      </div>

     

      </div>

    </div>
    @foreach($product->ratings as $rating)
    <div class="row bordered" style="margin-top: 15px;">
      <div class="col-md-2">
        <p>{{ $rating->user->fullname }}</p>
        {{-- {{ $rating->rating}} --}}
        @for($i=0; $i<=$rating->rating; $i++)
        <i class="fa fa-star"></i>
        @endfor
        {{-- <i class="fa fa-star"></i>
        <i class="fa fa-star"></i> --}}
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-9">
        @php 
          $review = \App\Models\Review::where('rating_id', $rating->id)->first();
          // dd($review);
        @endphp
      <p class="blue">{{ $review->title }}</p>
        <p class="text-light">
            {{ $review->review_text }}
        </p>

      </div>
    </div>
    @endforeach
   
    
    
   
</div>
      

    
      <div id="description-content" class="row tab-pane fade">
        <div class="col-md-6">
            @php
            $images = \App\Models\ProductImage::where('product_id', $product->id)->get();
            // dd($images);
            $image_var = json_decode($images);
            @endphp
  
            @if(is_array($image_var))
            @foreach(array_slice($image_var, 0, 1) as $image)
                <img src="{{ asset("storage/$image->path")}}" alt="phone" class="img-responsive img-fluid" >
            @endforeach
            @endif
          {{-- <img src="{{ asset('assets/password/images/GameSir-G4s-2-4Ghz-Wireless-Bluetooth-Gamepad-Controller-for-PS3-Android-TV-BOX-Smartphone-Tablet-PC.jpg')}}" --}}
            class="img-responsive img-fluid" alt="gamepad_controller"></div>
        <div class="col-md-6"> {{ $product->description }}</div>
      </div>

</div>
    

    <div class="row" style="margin-top:35px;">
            {{-- <div class="col-xs-6 col-md-3">
                    <p class="pages"> 1-20 <span class="page-ext"> of 233,456 results</span></p>
            </div> --}}

        <div class="col-xs-12 col-md-3"> </div>

    <div class="col-xs-12 col-md-3"> </div>

    {{-- <div class="col-xs-6 col-md-3" style="margin-top:35px;">
        <a href="#" style="text-decoration:none;"> <p> <i class="fas fa-angle-left" style="margin-right: 15px;"></i> PREV <span class="next"> NEXT</span> <i class="fas fa-angle-right" style="margin-left:15px;"></i></p> </a>
    </div> --}}

    </div>


    </div>
    @stop 

    @push('scripts')
      <script src="{{ asset('assets/admin/js/custom.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
      <script>
          $("#input-id").rating();
          ("#input-id").rating({'size':'lg'});
          </script>
      <script src="{{ asset('assets/admin/js/toastr.js')}}"></script>
    @endpush

  