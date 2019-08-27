
@extends('layouts.frontend.app2')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.css') }}">

<link rel="stylesheet" href="{{ asset('diollo/assets/css/custom.css') }}">
<style>
  .font-weight-bold {
   background-color:transparent !important;
   border:none;
 }
 .mb-5-h, .mb-5-t {
   color:#fff !important;
 }
 </style>
@endpush
@section('content')


   <section class="hero-home">
      <div class="swiper-container hero-slider">
        <div class="swiper-wrapper bk-grad">
          @foreach($homeSliders as $key => $value)
              @foreach($value->photos->take(1) as $image)
                <div  class="swiper-slide "></div>
                {{-- <div style="background-image:url({{ asset('diollo/resources/img/lauren.jpg')}})" class="swiper-slide"></div> --}}
              @endforeach
          @endforeach
        </div>
      </div>
      <div class="container py-6 py-md-7 text-white z-index-20">
        <div class="row">
          <div class="col-xl-10">
            <div class="text-center text-lg-left">
              <p class="subtitle letter-spacing-4 mb-2 text-secondary text-shadow">PREMIUM</p>
              <h1 class="display-3 font-weight-bold text-shadow">COLLECTION FOR MEN,WOMEN & KIDS</h1>
            </div>
            <div class="search-bar mt-5 p-3 p-lg-1 pl-lg-4">
              <form action="{{ route('search.query')}}" method="get">
                <div class="row">
                  <div class="col-lg-10 d-flex align-items-center form-group">
                    <input type="text" name="search" placeholder="What are you searching for?" class="form-control border-0 shadow-0">
                  </div>
                  
                  <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary btn-block rounded-xl h-100">Search </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="py-6 bg-gray-100">
      <div class="container">
        <div class="text-center pb-lg-4">
          {{-- <p class="subtitle text-secondary">One-of-a-kind services we offer </p> --}}
          <h2 class="mb-5">Our Services</h2>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-3 mb-lg-0 text-center">
            <div class="px-0 px-lg-3">
              <div class="icon-rounded bg-primary-light mb-3">
                {{-- <i class="fa fa-tshirt fa-3x"></i> --}}
                <i class="fas fa-tshirt fa-2x fa-margin-edit"></i>
                {{-- <svg class="svg-icon text-primary w-2rem h-2rem">
                  <use xlink:href="#destination-map-1"> </use>
                </svg> --}}
              </div>
              <h3 class="h5">Find the perfect redy-to-wear dresses</h3>
              <p class="text-muted">We make goergeous ready-to-wear dresses</p>
            </div>
          </div>
          <div class="col-lg-4 mb-3 mb-lg-0 text-center">
            <div class="px-0 px-lg-3">
              <div class="icon-rounded bg-primary-light mb-3">
                <i class="fas fa-cut fa-2x fa-margin-edit"></i>
              </div>
              <h3 class="h5">Custom made dresses</h3>
              <p class="text-muted">Want a custom made dress?, drop us your measurement </p>
            </div>
          </div>
          <div class="col-lg-4 mb-3 mb-lg-0 text-center">
            <div class="px-0 px-lg-3">
              <div class="icon-rounded bg-primary-light mb-3">
                <i class="fas fa-brush fa-2x fa-margin-edit"></i>
              </div>
              <h3 class="h5">Training</h3>
              <p class="text-muted">Looking to learn how to make quality dresses, then enroll in our fashion academy!</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    {{-- <section class="py-6 bg-white">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-8">
            <p class="subtitle text-primary">Pay us a visit</p>
            <h2>Workspace</h2>
          </div>
          <div class="col-md-4 d-lg-flex align-items-center justify-content-end"><a href="category.html" class="text-muted text-sm">
               
              See all guides<i class="fas fa-angle-double-right ml-2"></i></a></div>
        </div>
        <div class="row">
          <div class="swiper-container guides-slider">
            <!-- Additional required wrapper-->
            <div class="swiper-wrapper pb-5">
              <!-- Slides-->
              <div class="swiper-slide h-auto px-2">
                <div class="card card-poster gradient-overlay mb-4 mb-lg-0"><a href="category.html" class="tile-link"></a><img src="{{ asset('diollo/resources/d19m59y37dris4.cloudfront.net/directory/1-1/img/photo/new-york.jpg') }}" alt="Card image" class="bg-image">
                  <div class="card-body overlay-content">
                    <h6 class="card-title text-shadow text-uppercase">New York</h6>
                    <p class="card-text text-sm">The big apple</p>
                  </div>
                </div>
              </div>
              <div class="swiper-slide h-auto px-2">
                <div class="card card-poster gradient-overlay mb-4 mb-lg-0"><a href="category.html" class="tile-link"></a><img src="{{ asset('diollo/resources/d19m59y37dris4.cloudfront.net/directory/1-1/img/photo/paris.jpg') }}" alt="Card image" class="bg-image">
                  <div class="card-body overlay-content">
                    <h6 class="card-title text-shadow text-uppercase">Paris</h6>
                    <p class="card-text text-sm">Artist capital of Europe</p>
                  </div>
                </div>
              </div>
              <div class="swiper-slide h-auto px-2">
                <div class="card card-poster gradient-overlay mb-4 mb-lg-0"><a href="category.html" class="tile-link"></a><img src="{{ asset('diollo/resources/d19m59y37dris4.cloudfront.net/directory/1-1/img/photo/barcelona.jpg ') }}" alt="Card image" class="bg-image">
                  <div class="card-body overlay-content">
                    <h6 class="card-title text-shadow text-uppercase">Barcelona</h6>
                    <p class="card-text text-sm">Dalí, Gaudí, Barrio Gotico</p>
                  </div>
                </div>
              </div>
              <div class="swiper-slide h-auto px-2">
                <div class="card card-poster gradient-overlay mb-4 mb-lg-0"><a href="category.html" class="tile-link"></a><img src="{{ asset('diollo/resources/d19m59y37dris4.cloudfront.net/directory/1-1/img/photo/prague.jpg') }}" alt="Card image" class="bg-image">
                  <div class="card-body overlay-content">
                    <h6 class="card-title text-shadow text-uppercase">Prague</h6>
                    <p class="card-text text-sm">City of hundred towers</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-pagination d-md-none"> </div>
          </div>
        </div>
      </div>
    </section> --}}
    @if(count($products) > 0)
    <section class="py-6 bg-gray-100"> 
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-8">
            <p class="subtitle text-secondary">Place your orders now! </p>
            <h2>Latest Products</h2>
          </div>
          <div class="col-md-4 d-lg-flex align-items-center justify-content-end"><a href="category.html" class="text-muted text-sm">
               
              See all deals<i class="fas fa-angle-double-right ml-2"></i></a></div>
        </div>
        
        <!-- Slider main container-->
        <div data-swiper="{&quot;slidesPerView&quot;:4,&quot;spaceBetween&quot;:20,&quot;loop&quot;:true,&quot;roundLengths&quot;:true,&quot;breakpoints&quot;:{&quot;1200&quot;:{&quot;slidesPerView&quot;:3},&quot;991&quot;:{&quot;slidesPerView&quot;:2},&quot;565&quot;:{&quot;slidesPerView&quot;:1}},&quot;pagination&quot;:{&quot;el&quot;:&quot;.swiper-pagination&quot;,&quot;clickable&quot;:true,&quot;dynamicBullets&quot;:true}}" class="swiper-container swiper-container-mx-negative swiper-init">
          <!-- Additional required wrapper-->
         
          <div class="swiper-wrapper pb-5">
             @foreach($products as $key => $product)
            <!-- Slides-->
            <div class="swiper-slide h-auto px-2">
             
             
            <div data-marker-id="59c0c8e33b1527bfe2abaf92-{{ $key}}" class="w-100 h-100  ">
                
                <div class="card h-100 border-0 shadow">
                  <div class="card-img-top overflow-hidden ">
                     @foreach($product->images as $image)
                        <img src="{{ asset("storage/$image->path")}}" alt="phone" class="img-responsive img-fluid " style="height:160px; width:100%; object-fit:contain;">
                  <a href="{{ route('customer.productPage', $product->id )}}" class="tile-link"></a>
                    @endforeach
                    
                    <div class="card-img-overlay-bottom z-index-20">
                     
                    </div>
                    <div class="card-img-overlay-top text-right">
                  </div>
                  <div class="card-body d-flex align-items-center">
                    <div class="w-100">
                    <h6 class="card-title"><a href="{{ route('customer.productPage', $product->id )}}" class="text-decoration-none text-dark">{{ $product->name }}</a></h6>
                      <div class="d-flex card-subtitle mb-3">
                        <p class="flex-shrink-1 mb-0 card-stars text-xs text-right">
                          @php $averagerate= number_format($product->averageRating); @endphp
                          @for($i=1; $i<=$averagerate; $i++)
                          <i class="fa fa-star text-warning"></i>
                          @endfor
                          
                        </p>
                      </div>
                      <p class="card-text text-muted"><span class="h4 text-primary">₦ {{ $product->discount_price }}</span> </p>
                    </div>
                  </div>
                </div>
              </div>
               
            </div>
            
            
            
            
            
          </div>
          <!-- If we need pagination-->
          <div class="swiper-pagination"></div>
           @endforeach
        </div>
        
      </div>
     
           
    </section>
    @endif
    <!-- Divider Section-->
    
    <section class="py-7 position-relative ">
      {{-- <img src="{{ asset('diollo/assets/images/feedback.jpg') }}" alt="" class="bg-image"> --}}
      <div class="container">
        {{-- <div class="overlay-content text-white py-lg-5">
          
        </div> --}}
        <div class="card h-100 border-0 shadow">
          <div class="card-body d-flex align-items-center">
        <div class="row">
          
          <div class="col-md-6">
            <h3 class="display-3 font-weight-bold text-serif text-shadow text-secondary ">Ready for your next awesome dress design?</h3>
          </div>
          <div class="col-md-6">
            @include('partials.admin.success')
            @include('partials.admin.error')
          <form>
            {{-- action="{{ route('contact.us') }}" method="post" --}}
            {{-- @csrf --}}
             <div class="form-group">
                <label for="loginUsername" class="form-label mb-5-t"> Name </label>
                <input  id="username" name="name" type="text" placeholder="Enter name" autocomplete="off" required data-msg="Please enter your name" class="form-control">
                {{-- <a href="category-rooms.html" class="btn btn-light">Submit</a> --}}
             </div>
             <div class="form-group">
                <label for="loginUsername" class="form-label mb-5-t"> Email </label>
                <input  id="email" name="email" type="text" placeholder="Enter email" autocomplete="off" required data-msg="Please enter your email address" class="form-control">
                {{-- <a href="category-rooms.html" class="btn btn-light">Submit</a> --}}
             </div>

             <div class="form-group">
                <label for="loginUsername" class="form-label mb-5-t"> Content </label>
                <textarea name="content" id="content" cols="30" placeholder="Enter content" rows="10" class="form-control"></textarea>
                {{-- <input name="username" id="username" type="text" placeholder="Enter name" autocomplete="off" required data-msg="Please enter your name" class="form-control"> --}}
                {{-- <a href="category-rooms.html" class="btn btn-light">Submit</a> --}}
             </div>

             <div class="form-group">
               <button type="button" class="btn btn-primary sendFeedBack">Make Request</button>
             </div>
             
            </form>
          </div>
          </div>
        </div>
        </div>
      </div>
    </section>
    @if(count($testimonials) > 0)
    <section class="py-7">
      <div class="container">
        <div class="text-center">
          <p class="subtitle text-primary">Testimonials</p>
          <h2 class="mb-5">Our dear customers said about us</h2>
        </div>
        <!-- Slider main container-->
        <div class="swiper-container testimonials-slider testimonials">
          <!-- Additional required wrapper-->
          <div class="swiper-wrapper pt-2 pb-5">
            @foreach($testimonials as $testimonial)
            <!-- Slides-->
            <div class="swiper-slide px-3">
              <div class="testimonial card rounded-lg shadow border-0">
                <div class="testimonial-avatar"><img src="{{ asset('assets/password/images/user.png') }}" alt="..." class="img-fluid"></div>
                <div class="text">
                  <div class="testimonial-quote"><i class="fas fa-quote-right"></i></div>
                <p class="testimonial-text"> {{ str_limit($testimonial->content,80,'...' ) }}</p><strong>{{ $testimonial->name }}</strong>
                </div>
              </div>
            </div>
            @endforeach
            </div>
</section> 
@endif
@include('partials.diollo.footer')
@stop

@push('js')
<script src="{{ asset('assets/admin/js/toastr.js')}}"></script>

@endpush