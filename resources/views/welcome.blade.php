
@extends('layouts.frontend.app')

@section('content')

      <div class="rotated" style="width: 233px;">
        <i class="fab fa-facebook fa-rotate-360" style="color: #FF3C89;"></i>&nbsp;
        <i class="fab fa-whatsapp fa-rotate-360" style="color: #FF3C89;"></i>&nbsp;
        <i class="fab fa-twitter fa-rotate-360" style="color: #FF3C89;"></i> &nbsp;
        <span class="text-muted cabin">
           Follow us on social media </span>
        <span class="run-through"></span>
      </div>
      <div class="top_star">
        <img src="{{ asset('assets/password/images/path 41.svg')}}" alt="path star">
      </div>
      <div class="container">
        {{-- homepage banner --}}
        <div class="banner">
        @foreach($homeSliders as $key => $homeSlider)
         <a href="#">
                  @php
                  $images = \App\Models\Image::where('promotion_id', $homeSlider->id)->get();
                  // dd($images);
                  $image_var = json_decode($images);
                  @endphp
        
                  @if(is_array($image_var)) 
                  @foreach(array_slice($image_var, 0, 1) as $image)
                  
                    <div class="">
                        <img src="{{ asset("storage/$image->path")}}" alt="banner" class="img-fluid img-responsive banner">
                      
                    </div>
                  @endforeach
                  @endif
              </a>
          
          @endforeach
        </div>
        {{-- <div class="banner">
          <div class="">
            <a href="#">
              <img src="{{ asset('assets/password/images/Banner-for-passward.jpg')}}" alt="banner" class="img-fluid img-responsive banner">
            </a>
          </div>
          <div class="">
            <a href="#">
              <img src="{{ asset('assets/password/images/Banner-for-passward.jpg')}}" alt="banner" class="img-fluid img-responsive banner">
            </a>
          </div>
          <div>
            <a href="#">
            <img src="{{ asset('assets/password/images/Banner-for-passward.jpg')}}" alt="banner" class="img-fluid img-responsive banner">
            </a>
          </div>
        </div> --}}
        {{-- @foreach($promotion->photos as $photo)
                <img src="{{ asset('storage/'.$photo->path)}}" alt="banner" class="img-fluid img-responsive banner">
              @endforeach --}}


      </div>

    <img src="{{ asset('assets/password/images/Path 32.svg')}}" alt="path" class="path">

  <div class="header-form">

  <form class="form-inline row" action="{{ route('search.query')}}" method="get"> -
   @csrf
      <div class="form-group col-md-5">
        <label class="text-muted" for="search">What are you looking for?</label> <br>

        <div class="input-group">
          <input type="text" class="form-control" name="search" id="search" placeholder="Find the best Electronics, clothes and more...">
           {{-- <div class="input-group-addon purple"><i class="fa fa-search"></i></div> --}}
        </div>

      </div>

      <div class="form-group col-md-5">
        <label class="text-muted" for="location">Tell us your current location</label>  <br>

          <div class="select">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-paper-plane"></i>
              </div>
              <select name="region_id" class="mdb-select md-form form-control loc_select_box" searchable="Search here..">
                @foreach($regions as $region)
                @php 
                  $country = \Gerardojbaez\GeoData\Models\Country::where('code', $region->country_code)->first();
                @endphp
              <option value="{{ $region->id }}">{{ $region->name }} , {{ $country->name }}</option>
                @endforeach
              </select>
          </div>
          </div>
        </div>
        <div class="form-group col-md-2">
          {{-- <label class="text-muted" for="Shop"><small>Shop Now!</small></label> --}}
          <div class="form-group col-md-4">
         <div class="center_cart-box">
            <button type="submit" class="purple" style="border-radius:50%; border:none; margin-top:6px;">
              <span class="cart-box">
                  <i class="fa fa-shopping-cart fa-2x" style="color: #fff;"></i>
                </span>
            </button>
         </div>
          </div>
        </div>



      </div>
  </form>

  </div>

  <div class="filter"></div>

  {{-- <div class="alert alert-success">
    hello world
  </div> --}}
  @if(count($featuredProducts) > 0)
  <section id="products" style="position: relative; margin-top: 145px; mmargin-bottom:70px; padding-bottom: 50px;">

      <h1 class="text-center clearance" >Featured Products </h1>
      <p class="text-center">THE BEST CLOTHING ITEMS CLOSEST TO YOU, FIND YOUR ALL YOUR SHOPPING NEEDS</p>



      <div class="wrapper">
        
        <div class="carousel" style="display:flexbox. align-items:inline-flex">
            {{-- style="display: flex; align-items: center;" --}}
          @foreach($featuredProducts as $key => $featuredProduct)
          
          <div class="slider col-md-3 col-sm-6 col-xs-6">
            <div class="zoom">
              <a href="{{ route('customer.productPage', $featuredProduct->id )}}">
                    @php
                  $images = \App\Models\ProductImage::where('product_id', $featuredProduct->id)->get();
                  // dd($images);
                  $image_var = json_decode($images);
                  @endphp
        
                  @if(is_array($image_var)) 
                  @foreach(array_slice($image_var, 0, 1) as $image)
                      <img src="{{ asset("storage/$image->path")}}" alt="phone" class="img-responsive img-fluid" >
                  @endforeach
                  @endif
                <div class="overlay- {{ $key }}">
                <h6>{{$featuredProduct->name}}</h6> <p>Beauty and Hair</p>
                </div>
              </a>
            </div>
          </div>
          @endforeach
        
        </div>

      </div>

</section>
@endif

@if(count($stores) > 0)
<section class="Shops">
  <div class="container">

  <div class="row">
    <div class="col-md-3 col-xs-12">
      <div class="shop-it col-md-12 col-xs-6 ">
        <img src="{{ asset('assets/password/images/shop icon.svg')}}" class="img-responsive img-fluid shop-icon" alt="Shop icon">
      </div>
      <div class="">
        <h1>Find Shops</h1>
      </div>
      <div class="shop-text col-md-12 col-xs-6">
        <p>Find well stocked shops <span class="fill">in your location</span> selling just what you need, with the <span class="fill">best discounts.</span> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et et dolore.</p>
      </div>

      <button type="button" class="btn btn-none hidden-sm" name="button"> FIND MORE &ensp; <i class="fa fa-angle-right"></i> </button>
    </div>

    <div class="col-md-9 col-xs-12">
      {{-- @php 
          $width = ['159','159','331','159','159','159'];
          $height = ['163.34','159','163.34','159','159','159'];
      @endphp --}}
      {{-- class="first" --}}
     <div class="grid-container">
       {{-- @foreach($stores as $store)
        <div>
          <a href="{{ route('customer.storePage',$store->id)}}">
            <img src="{{ asset('storage/'.$store->logo)}}" style="width:331px !important; height:163px !important; object-fit:contain;" class="img-responsive img-fluid curve" alt="Hanger">
          </a>
        
        
        </div> --}}
        

        {{-- @endforeach --}}

        @foreach($allDis as $dis)

        @foreach($dis as $key => $value)
        <div>
          @php 
            $store = \App\Models\Store::where('name',$key)->first();
            // dd($store);
          @endphp
            <a href="{{ route('customer.storePage',$store->id)}}">
              <img src="{{ asset('storage/'.$store->logo)}}" style="width:331px !important; height:163px !important; object-fit:contain;" class="img-responsive img-fluid curve" alt="Hanger">
            </a>
          <p>{{ $key }} , {{ $value }} away</p>
          
          
          </div> 
          @endforeach
        @endforeach
        

    </div>

    <button type="button" class="btn btn-none hide-md" name="button"> FIND MORE &ensp; <i class="fa fa-angle-right"></i> </button>

  </div>

</div>

</section>
@endif


    <div class="main">
        @if(count($clearanceProducts) > 0)
        {{-- {{dd($clearanceProducts)}} --}}
        <div>
            <h1 class="clearance">Clearance Sales</h1>
        </div>
        <div>
            <p class="hotsell">HOT HOT HOT TOP SELL AFFORDABLE PRODUCTS</p>
        </div>
        <div>
            <p class="show text-center">Show all flash sales</p>
        </div>
        @endif
        <div class="container">
            <div class="row" style="padding-top: 40px; margin: auto; ">
              {{-- @if(isset($clearanceProducts)) --}}
              @foreach($clearanceProducts as $clearanceProduct)
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <div class="img-block">
                    <a href="{{ route('customer.productPage', $clearanceProduct->id )}}"> 
                        
                          @foreach($clearanceProduct->images as $image)
                              <img src="{{ asset("storage/$image->path")}}" alt="phone" class="img-responsive img-fluid " style="height:160px">
                          @endforeach
                       
                      {{-- <img src="{{ asset('assets/password/images/clock.png')}}" alt="clock" class="img-responsive img-fluid" style="height:160px"> --}}
                    </a>
                    <div class="edit">
                      <a style="display: flex; justify-content: flex-end;" href="#"><img src="{{ asset('assets/password/images/fav appearance selected.svg')}}" style="height: 25px;" alt=""></a>
                    </div>
                  </div>
                    <div class="content">
                    <p class="items"> {{ $clearanceProduct->name }}</p>
                        <p class="price">&#8358;{{ number_format($clearanceProduct->original_price,2) }}<span class="newprice">&#8358;{{ $clearanceProduct->discount_price }}</span></p>
                    </div>
                </div>
                
                @endforeach
               


            </div>
        </div>
        
        <div class="background">
            <div class="rectangle">
            </div>
            @if(count($topSellingProducts) > 0)
            <div class="grad">
                <div class="container">
                    <div class="row box ">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="row" style="margin-left: -6px;
                    margin-top: 31px;">
                                @foreach($topSellingProducts as $topSellingProduct)
                                {{-- {{ dd($topSellingProduct)}} --}}
                                <div class="col-md-3 col-sm-6 col-xs-6 flash">
                                  <a href="{{ route('top.selling') }}">
                                    @php
                                    $images = \App\Models\ProductImage::where('product_id', $topSellingProduct->product_id)->get();
                                    // dd($images);
                                    $image_var = json_decode($images);
                                    @endphp
                          
                                    @if(is_array($image_var)) 
                                    @foreach(array_slice($image_var, 0, 1) as $image)
                                        <img src="{{ asset("storage/$image->path")}}" alt="phone" class="img-responsive img-fluid images" >
                                    @endforeach
                                    @endif
                                    {{-- <img src="{{ asset('assets/password/images/19496273.jpg')}}" alt="194" class="img-responsive img-fluid images"> --}}
                                    <div class="ease-up_overlay" style=" background: linear-gradient(to right, #00D8FF,#FF5599); height: 150px; border: 1px solid white; border-radius: 8%; padding: 10px;">
                                        <button id="buybutton">BUY NOW</button>
                                        <p class="description">
                                          @php 
                                            $product = \App\Models\Product::find($topSellingProduct->product_id);
                                            // dd($product);
                                          @endphp
                                            @if(isset($product->quick_description)) 
                                                {{ $product->quick_description }} 
                                            @endif
                                            @if(isset($product->discount_price)) 
                                               
                                        <span id="spanprice"> &#8358;{{ number_format($product->discount_price)}}</span>
                                        
                                        @endif
                                        </p>
                                    </div>
                                  </a>
                                </div>
                                @endforeach

                                
                                <br>
                            </div>


                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 textcol">
                            <p class="experience">
                                <span id="ease"> Ease Up</span></p>
                            <p class="shopping"> Your Shopping Experience</p>
                            <p class="check"> Check out these iteam recommended for you.</p>
                        </div>
                        <!-- <a href="#" class="findmore"> FIND MORE ></a> -->
                    </div>
                </div>
            </div>
            @endif
        </div>
        
        @if(count($newStocks) > 0)
        <div class="container">
            <div class="shopping_space">
                <h2 class="affordable">New and Affordable</h2>
                <p class="shouldbuy">YOU SHOULD BUY THESE</p>
                <p class="show">Show all new and Affordable</p>

            <div class="row " style=" align-items: center; justify-content: center;">
                <div class="wrapper">
                  <div class="carousel gimme-space" style="display: flexbox;">
                    @foreach($newStocks as $newStock)
                      <div class="col-md-3 col-sm-6 col-xs-6 neon">
                        <a href="{{ route('new.stock')}}"> 
                            @php
                            $images = \App\Models\ProductImage::where('product_id', $newStock->id)->get();
                            // dd($images);
                            $image_var = json_decode($images);
                            @endphp
                  
                            @if(is_array($image_var)) 
                            @foreach(array_slice($image_var, 0, 1) as $image)
                                <img src="{{ asset("storage/$image->path")}}" alt="phone" class="img-responsive img-fluid" >
                            @endforeach
                            @endif
                           
                              {{-- @foreach($newStock->images as $image)
                                  <img src="{{ asset("storage/$image->path")}}" alt="phone" class="img-responsive img-fluid " style="height: 250px; width:300px;">
                              @endforeach --}}
                         
                          {{-- <img src="{{ asset('assets/password/images/19496273.jpg')}}" alt="194" class="img-responsive img-fluid" style="height: 250px; object-fit: contain;"> --}}
                        </a>
                        <div class="content">
                        <p class="items"> {{ $newStock->name}}</p>
                            <p class="price">&#8358;{{ number_format($newStock->discount_price,2)}}
                                <span class="star"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></span></p>
                        </div>
                    </div>
                    @endforeach
                   
                  </div>
                </div>
             </div>
           </div>
        </div>

        @endif

        {{-- <div id="mapholder"></div> --}}
     {{-- <form>
        <input type="button" onclick="getLocation();" value="Your Location"/>
     </form> --}}
       @stop

       @push('scripts')

       
  {{-- </head> --}}
  {{-- <body> --}}
     
  {{-- </body> --}}

       {{-- https://www.googleapis.com/geolocation/v1/geolocate?key=YOUR_API_KEY --}}
        {{-- <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyC9EOguEuOmLUDK_QbG01n2FLMFxEQH4pc&sensor=true"></script> --}}

        {{-- <script>
          (function() {

    if(!!navigator.geolocation) {

        var map;

        var mapOptions = {
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById('google_canvas'), mapOptions);

        navigator.geolocation.getCurrentPosition(function(position) {

            var geolocate = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

            var infowindow = new google.maps.InfoWindow({
                map: map,
                position: geolocate,
                content:
                    '<h1>Location pinned from HTML5 Geolocation!</h1>' +
                    '<h2>Latitude: ' + position.coords.latitude + '</h2>' +
                    '<h2>Longitude: ' + position.coords.longitude + '</h2>'
            });

            map.setCenter(geolocate);

        });

    } else {
        document.getElementById('google_canvas').innerHTML = 'No Geolocation Support.';
    }
    

})();
        </script> --}}
       @endpush