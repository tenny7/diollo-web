@extends('layouts.frontend.app2')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.css') }}">
<link rel="stylesheet" href="{{ asset('diollo/assets/css/custom.css') }}">

@endpush
@section('content')


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
      <!-- side links   -->
      {{-- <div class="container">
          <div class="row">
            <a href="index.html" style="text-decoration:none; color: #d1d2d3;">
                    <p class="home">Home / <span class="top">Stores / </span> <span class="storename">Stores</span>
            </a> <a href="PhonesComputers.html">  </a>
          </div>
      </div> --}}
  
      <!-- end of side links -->
      {{-- <div>
          <h1 class="stores text-center">Products</h1>
  </div> --}}
          <div class="container">
                
                {{-- <div class="container"> --}}
                        {{-- <div class="row">
                            <div class="col-xs-12 col-md-12">
                            <img src="{{ asset('assets/password/images/Banner-for-new-stock-passward@2x.jpg')}}" alt="banner" class=" img-responsive img-fluid">
                            </div>
                        </div> --}}
                      {{-- </div> --}}
  
             <div class="row">
                  <div class="col-md-3 col-sm-6 col-xs-6">
                      <div class="contain">
                      <h2 class="products push-margin-top">Categories</h2>
                      <ul class="list-group">
                        @forelse($categories as $key => $category)
                        <li class="list-group-item {{ ($key == 0) ? 'active fontColor' : ' fontBlack '}} "><a href="{{ route('category.search',$category->id )}}"  class="product-link {{ ($key == 0) ? 'fontColor' : ' fontBlack '}}">{{ $category->name }}</a></li>
                        
                         @empty 
                          No category
                        @endforelse
                      </ul>
  
                      {{-- <p class="closet"> New Closest Stores</p>
                      <ul class="listitems">
                              <li> <a href="#" class="product-link">Abuma Tech (1km)</a></li>
                              <li> <a href="#" class="product-link">Dantata Visuals (5km)</a></li>
                              <li> <a href="#" class="product-link">Viewnet (5.6km) </a></li>
                      </ul>
                      <a href="#" class="product-link"><p class="otherstores"> see other stores</p></a> --}}
                  </div>
                  </div>
  
                  <div class="col-md-9 col-sm-12 col-xs-12">
                    <h4 class="text-center push-margin-top"> Your search returned  <span class="badge badge-primary"><strong>{{ $products->count() }}</strong></span>  <span class="page-ext"> results.</span></h4>
                              <div class="row">
                               @forelse($products as $product)
                        <div class="col-md-4 col-xs-12 small-card">
                          <div class="h-auto px-2">
                            <!-- place item-->
                            <div data-marker-id="59c0c8e39aa2eed0626e485d" class="w-100 h-100">
                              <div class="card h-100 border-0 shadow">
                                <div class="card-img-top overflow-hidden "> 
                                  @foreach($product->images as $image)
                                        <img src="{{ asset("storage/$image->path")}}" alt="phone" class="img-responsive img-fluid " style="height:160px; width:100%; object-fit:contain;">
                                  <a href="{{ route('customer.productPage', $product->id )}}" class="tile-link"></a>
                                    @endforeach
                                  
                                </div>
                                <div class="card-body d-flex align-items-center">
                                  <div class="w-100">
                                  <h6 class="card-title"><a href="#" class="text-decoration-none text-dark">{{ $product->name }}</a></h6>
                                    <div class="d-flex card-subtitle mb-3">
                                      <p class="flex-grow-1 mb-0 text-muted text-sm"><i class="fas fa-kidneys    "></i></p>
                                      <p class="flex-shrink-1 mb-0 card-stars text-xs text-right"><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i>
                                      </p>
                                    </div>
                                  <p class="card-text text-muted"><span class="h4 text-primary">{{ number_format($product->discount_price,2) }}</span></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        
                                            @empty
                                            
                                            @php 
                                            $products = \App\Models\Product::inRandomOrder()->get();
                                            @endphp
                                            <h4 class="text-center push-margin-top push-to-center">See Suggestions</h4>
                                          <div class="row">
                                        @foreach($products as $product)
                                            <div class="col-md-4 col-xs-12 small-card">
                                              <div class="h-auto px-2">
                                                <!-- place item-->
                                                <div data-marker-id="59c0c8e39aa2eed0626e485d" class="w-100 h-100">
                                                  <div class="card h-100 border-0 shadow">
                                                    <div class="card-img-top overflow-hidden "> 
                                                      @foreach($product->images as $image)
                                            <img src="{{ asset("storage/$image->path")}}" alt="phone" class="img-responsive img-fluid " style="height:160px; width:100%; object-fit:contain;">
                                      <a href="{{ route('customer.productPage', $product->id )}}" class="tile-link"></a>
                                        @endforeach
                                  
                                </div>
                                <div class="card-body d-flex align-items-center">
                                  <div class="w-100">
                                  <h6 class="card-title"><a href="#" class="text-decoration-none text-dark">{{ $product->name }}</a></h6>
                                    <div class="d-flex card-subtitle mb-3">
                                      <p class="flex-grow-1 mb-0 text-muted text-sm"><i class="fas fa-kidneys    "></i></p>
                                      <p class="flex-shrink-1 mb-0 card-stars text-xs text-right"><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i>
                                      </p>
                                    </div>
                                  <p class="card-text text-muted"><span class="h4 text-primary">{{ number_format($product->discount_price,2) }}</span></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        @endforeach
                        </div>
                                        {{-- @foreach($products as $product)
                                            <div class="col-xs-6 col-md-3">
                                                <div class="img-block">
                                                  <a href="{{ route('customer.productPage', $product->id )}}"> 
                                                          @php
                                                          $images = \App\Models\ProductImage::where('product_id', $product->id)->get();
                                                          $image_var = json_decode($images);
                                                          @endphp
                                      
                                                          @if(is_array($image_var))
                                                          @foreach(array_slice($image_var, 0, 1) as $image)
                                                              <img src="{{ asset("storage/$image->path")}}" alt="phone" class="img-responsive img-fluid" style="height:160px">
                                                          @endforeach
                                                          @endif
                                                          <div class="edit">
                                                            <a href="#"><img src="images/fav appearance selected.svg" style="height: 25px;" alt=""></a>
                                                          </div>
                                                          <div class="content">
                                                                @php 
                                                                  $store = \App\Models\Store::find($product->store);
                                                                  $city =  \Gerardojbaez\GeoData\Models\City::find($store->city_id);
                                                                @endphp
                                                            <div class="amount">
                                                              <p class="price">&#8358;{{ number_format($product->discount_price,2)}}</p>
                                                                <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                                                            </div>
                                                              <p class="shop"> {{ $store->name }}</p>
                                                              <p class="street">{{ $store->address}} , {{ $city->name }}</p>
                                                              <button type="button" style="border:none; color:#fff; border-radius:15%" class="product_cart_single purple btn btn-xs" data-price="{{ $product->discount_price }}" data-id="{{ $product->id }}">ADD TO CART <i class="fas fa-plus"></i></button>
                                                          </div>
                                                          <br>
                                                        </a>
                                                </div>
                                              </div>
                                              @endforeach --}}
                                              {{-- @else 
      
                                              @endif --}}
                                            @endforelse
                                            
                                           
                                      </div>
                          </div>
                          
                          
                  </div>
                </div>
                </div>
              
  
              {{-- <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                    <img src="{{ asset('assets/password/images/Banner-for-new-stock-passward@2x.jpg')}}" alt="banner" class=" img-responsive img-fluid">
                    </div>
                </div>
              </div> --}}
  
                  
  
    
@stop

@push('scripts')
<script src="{{ asset('assets/admin/js/custom.js')}}"></script>
<script src="{{ asset('assets/admin/js/toastr.js')}}"></script>
@endpush