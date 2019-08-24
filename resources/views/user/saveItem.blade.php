@extends('layouts.frontend.app2')


@push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.css') }}">
<link rel="stylesheet" href="{{ asset('diollo/assets/css/custom.css') }}">
@endpush
@section('content')


  
      <div class="container">
        <h1 class="text-center" style="font-weight: bolder;">Saved Items</h1>
       <div class="row push-margin-top">

        {{-- start sidebar --}}
        @include('partials.diollo.sidebar')
        <div class="col-md-8">
          <h3 class="h3-margin-top">Wishlist Items</h3>
          
          <hr>
          
          <div class="row" style="margin-top:35px;">

                    @forelse($products as $product)
                        <div class="col-md-4 col-xs-12" style="margin-bottom:10px;">
                          <div class="h-auto px-2">
                            <!-- place item-->
                            {{-- {{ dd($product)}} --}}
                            <div data-marker-id="59c0c8e39aa2eed0626e485d" class="w-100 h-100">
                              <div class="card h-100 border-0 shadow">
                                <a href="{{ route('customer.productPage', $product->id )}}">
                                <div class="card-img-top overflow-hidden "> 
                                  @php 
                                    $product = App\Models\Product::find($product->product_id);
                                  @endphp
                                  @foreach($product->images as $image)
                                      <img src="{{ asset("storage/$image->path")}}" alt="phone" class="img-responsive img-fluid " style="height:160px; width:100%; object-fit:contain;">
                                
                                  @endforeach
                                 
                                </div>
                                </a>
                                <div class="card-body d-flex align-items-center">
                                  <div class="w-100">
                                  <h6 class="card-title"><a href="{{ route('customer.productPage', $product->id )}}" class="text-decoration-none text-dark">{{ $product->name }}</a></h6>
                                    
                                    <div class="content">
                                        @php 
                                        // $product = \App\Models\Product::find($product->product_id);
                                        $store = \App\Models\Store::find($product->store);
                                        $city =  \Gerardojbaez\GeoData\Models\City::find($store->city_id);
                                      @endphp
                                      {{-- <p class="price">&#8358;{{ number_format($product->discount_price,2)}}
                                        <span style="margin-left:20px;">
                                       </span>
                                    </p> --}}
                                    
                                      <p class="shop" style="justify-content:center; font-size:13px;"> {{ $store->name }}</p>
                                      {{-- <p class="street">{{ $store->address}} , {{ $city->name }}</p> --}}
                                      
                                      <button type="button" style="border:none; color:#fff;" class="product_cart_single btn btn-primary btn-sm" data-price="{{ $product->discount_price }}" data-id="{{ $product->id }}">ADD TO CART <i class="fas fa-plus"></i></button>
                                  </div>
                                  <p class="card-text text-muted"><span class="h4 text-primary"> ₦ {{ number_format($product->discount_price,2) }}</span></p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        @empty 

                        <div class="card h-100 border-0 shadow text-center">
                            <p>No Items on your Wishlist.</p>
                            <a href="{{ route('customer.shop')}}" class="btn btn-primary">Add Item <i class="fa fa-plus"></i></a>
                        </div>
                        @endforelse
                          
                  
                  
          </div>
        </div>
       </div>
     </div>



@stop


@push('js')
<script src="{{ asset('assets/admin/js/custom.js')}}"></script>
<script src="{{ asset('assets/admin/js/toastr.js')}}"></script>
@endpush