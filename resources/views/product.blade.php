@extends('layouts.frontend.app2')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.css') }}">
<link rel="stylesheet" href="{{ asset('diollo/assets/css/custom.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/admin/css/jquery.rateyo.css') }}">

@endpush

@section('content')


<div class="container">
  <div class="row push-margin-top-product">
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
         
          {{-- <div class="edit">
            <a href="#" data-id="{{ $product->id }}" style="padding: 10px;" id="productId" class="productId">
              <img src="{{ asset('assets/password/images/fav appearance selected.svg')}}" style="height: 25px;" alt="favorited">
            </a>
          </div> --}}
      </div>
    </div>

    
    <div class="col-xs-12 col-md-6">
      <div class="row">
          <div class="col-md-12">
            <h5 class="h5-product">Apple Product (ID:</span>PRD_{{ $product->id}})</h5>
          </div>
         
      </div>
      @include('partials.admin.success')
      @include('partials.admin.error')
      <div class="row">
          <div class="col-md-12">
          <h4 class="text-bold" style="font-size: 23px;">{{ $product->name }}</h4>
          
          @php $averagerate= number_format($productRating->averageRating); @endphp
         
          @for($i=1; $i<=$averagerate; $i++)
          <i class="fa fa-star"></i>
          @endfor
            

            <span style="font-weight: bold; font-family:Ubuntu;">(Reviews from {{ count($ratingCount) }} Users)</span>
          </div>
      </div>
      <div class="row">
          <div class="col-md-12" style="margin-left: 20px;">
          
            <span class="price">{{ $product->discount_price }}</span> 
            <input id="price" type="hidden" name="price" class="price" value="{{ $product->discount_price }}"> |
            <span class="product_newprice" style="font-size:14px;"><del>&#8358;</del> {{ $product->original_price }}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="">Quantity</label>
            <button class="span-round btn btn-primary btn-sm" style="border-radius:25px;">
              <span class="span1" id="btn1"><i class="fas fa-minus"></i></span>
                  &nbsp;&nbsp;<span id="number">1</span>&nbsp;&nbsp;
              <span class="span2" id="btn2"><i class="fas fa-plus"></i></span>
              &nbsp;
            </button>
            </div>
            
            <span style="display:none" id="spanValue"></span>
            

            <input type="hidden" id="productId" value="{{ $product->id }}">
            <div class="form-group">
              <button type="button"  style="margin-bottom:10px; margin-top:3px;  border-radius:25px;"  data-id="{{ $product->id }}" class="add_product_to_cart btn btn-primary btn-sm">ADD TO CART <i class="fas fa-plus"></i></button>

            </div>
              </div>
        </div>

              <div class="col-md-12 col-xs-12">
                <button type="button" id="reserveId" class="btn btn-primary reserveId" data-id="{{ $product->id }}" style="border:none; border-radius:25px; color:#fff;">
              <svg height="14" viewBox="0 0 16 14" width="16" class="" 
              name="love">
              <path d="M14.3 1.3A4.22 4.22 0 0 0 11.254.01c-1.15 0-2.232.46-3.047 1.293l-.425.436-.432-.443A4.242 4.242 0 0 0 4.3 0C3.152 0 2.07.46 1.26 1.29A4.418 4.418 0 0 0 0 4.409a4.43 4.43 0 0 0 1.266 3.116l6.194 6.34a.443.443 0 0 0 .313.135.44.44 0 0 0 .313-.132l6.206-6.33a4.435 4.435 0 0 0 1.264-3.119 4.415 4.415 0 0 0-1.257-3.12z" 
                fill="#d8d8d8" 
                fill-rule="nonzero">
              </path>
              </svg>
            Reserve for a day
          </button>
              </div>
            </div>
            
            
               
          </div>
      
      <br>
      <div class="row">
          <div class="col-md-12">
            <p class="text-light" style="margin-top: 33px; padding:10px;">If you cannot pay for this item immediately you can also <span style="color: #FF3C89;">Reserve Item for 24 hours</span> by selecting a quantity and clicking "reserve for a day"
            </p><hr>
                <button type="button" id="productId" class="btn btn-primary productId" data-id="{{ $product->id }}" style="border:none; border-radius:25px; color:#fff; margin-left:6px;">
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
          <div class="col-md-12">
            <br>
            <h4 class="text-light" style="margin-top: 37px;">QUICK DESCRIPTION</h4>
           <p class="text-light" style="padding:10px;">{{ $product->quick_description }}</p>
            {{-- <button type="button" id="example" class="btn btn-secondary" data-toggle="tooltip" data-placement="left" title="Tooltip on left">
  Tooltip on left
</button> --}}
          {{-- <a title="show on load" data-toggle="tooltip" data-placement="bottom">Hello world</a> --}}
          </div>
          

      </div>
      <br>
      
      
    {{-- </div> --}}
    </div>
  </div>
</div>
<hr>
{{-- <div class="container"> --}}

  <div class="row ">
    <div class="col-md-6"></div>
    <div class="col-xs-12 col-md-6">
<ul class="nav nav-tabs">
        
        
        {{-- <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#warranty-content">Warranty</a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#description-content">Description</a>
          </li>
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#reviews-content">Reviews</a>
          </li>
      </ul>
      </div>

    </div>

{{-- </div> --}}

<!-- content for ABumatech Shop -->
{{-- <div class="container"> --}}
<div class="tab-content container">
<div id="reviews-content" class="row tab-pane fade">
  <div class="row">
<div class="col-xs-12 col-md-12 ">

    <div class="row" style="margin-top:35px;">
      <div class="col-md-6">
            <div class="pink-side">
              @php 
                $countProductOrderTimes = \DB::table('order_product')->where('product_id', $product->id)->count();
              @endphp
              <h4 class="text-bold" style="text-align: center;"><span class="badge badge-primary">{{ $countProductOrderTimes }}</span>  Successful Sale(s)</h4>
              </div>
      </div>
      <div class="col-md-6 col-offset-md-2">
        <div class="row">
          <div class="col-md-6 ">
          <div class="circle-star">
          <img src="{{ asset('assets/password/images/star_full.svg')}}" style="height: 30px;" alt=" star">
            <p style="flex-direction: column; align-self: center; justify-content: center;">{{ number_format($productRating->averageRating) }} star</p>
          </div>
        </div>
        <div class="col-md-6">
          {{-- <p>Good Rating</p> --}}
          <h5 class="h5-css">Based on {{ count($ratingCount) }} Ratings</h5>
        </div>
        </div>
        <div class="row">
          <div class="col-12">
               <h5>Did you like this store? Help rate it immediately</h5>
                <p style="padding:0px;">Select a star to rate his product"</p>
                
                <div style="width:600px; margin:30px auto;">
                    <div id="rateYo"></div>
              </div>
                <input type="hidden" id="productID" name="productID" value="{{ $product->id }}">
                
                </div>
          </div>
        </div>
      </div>

    </div>
    @foreach($product->ratings as $rating)
    <div class="row bordered" style="margin-top: 15px; padding:15px;">
      <div class="col-md-2">
        <p>{{ $rating->user->fullname }}</p>
        @for($i=1; $i<=$rating->rating; $i++)
        <i class="fa fa-star"></i>
        @endfor
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
      

    
      <div id="description-content" class="row tab-pane fade " style="margin-bottom:100px;">
        <div class="row">
          
          <div class="col-md-12">
            <div class="card" style="margin:14px; padding:14px;"><p>{{ $product->description }}</p></div>
             
          
          </div>
        </div>
        
      </div>

</div>
    



    {{-- </div> --}}
    </div>
  </div>
    <div style="margin-top:100px;"></div>
    @include('partials.diollo.footer')
    @stop 

    @push('js')
<script src="{{ asset('assets/admin/js/jquery.rateyo.js')}}"></script>
    <script>
    $('#rateYo').rateYo({
        rating: 0,
        starWidth:'40px',
        numStars:5,
        minValue:1,
        maxValue:5,
        precision : 1,
        fullStar  : true,
        normalFill: 'gray',
        ratedFill: 'orange'
    });

    $('#rateYo').click(function () {
        var rating = $("#rateYo").rateYo("option", "rating");
        var id = $('#productID').val();
        window.location.href = '/review/' + id + '/' + rating;
    });
    
    
    
    </script>
    
    
    <script src="{{ asset('assets/admin/js/custom.js')}}"></script>
   
    <script src="{{ asset('assets/admin/js/toastr.js')}}"></script>
    
      
    @endpush

  