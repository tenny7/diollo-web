@extends('layouts.frontend.app')


@push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.css') }}">
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
  
      <div class="container">
        <h1 class="text-center" style="font-weight: bolder;">Saved Items</h1>
       <div class="row">
        <div class="col-md-4 col-sm-12 " style="padding-top: 20px;">
          <div class="_display">
            <div class="">
          <i class="far fa-user">&nbsp;&nbsp;</i>
            </div>
            <div>
              <a class="bd" href="{{ route('customer.accountInfo') }}">My Profile</a>
              <p class="text-muted">Account Information</p>
            </div>
          </div>
          <div class="_display">
            <div class="">
            <img src="{{ asset('assets/password/images/wallet-outline.png')}}" alt="wallet">&nbsp;&nbsp;
            </div>
            <div>
              <a class="bd" href="{{ route('customer.wallet')}}">My Wallet</a>
              <p class="text-muted">Wallet</p>
            </div>
          </div>
          <div class="_display">
            <div class="">
              <img src="{{ asset('assets/password/images/shopping bag.png')}}" alt="bag">
            </div>
            <div>
              <a class="bd" href="{{ route('orders.viewOrders') }}">My Orders</a>
              <p class="text-muted">Orders</p>
            </div>
          </div>
        </div>
  
        <div class="col-md-8">
          <h3>Wishlist</h3>
          <h4>All Items</h4>
          <hr>
          
          <div class="row" style="margin-top:35px;">
                @foreach($products as $product)
                  <div class="col-md-3 col-xs-6 col-sm-6">
                          <div class="img-block">
                                  <a href="{{ route('customer.productPage', $product->product_id )}}">
                                        @php
                                        $images = \App\Models\ProductImage::where('product_id', $product->product_id)->get();
                                        $image_var = json_decode($images);
                                        @endphp
                    
                                        @if(is_array($image_var))
                                        @foreach(array_slice($image_var, 0, 1) as $image)
                                            <img src="{{ asset("storage/$image->path")}}" alt="phone" class="img-responsive img-fluid" style="height:160px">
                                        @endforeach
                                        @endif 
                                      {{-- <img src="images/phone 6.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a> --}}
                                  <div class="edit">
                                    <a href="#"><img src="images/fav appearance selected.svg" style="height: 25px;" alt=""></a>
                                  </div>
                                </div>
                                  <div class="content">
                                        @php 
                                        $product = \App\Models\Product::find($product->product_id);
                                        $store = \App\Models\Store::find($product->store);
                                        $city =  \Gerardojbaez\GeoData\Models\City::find($store->city_id);
                                      @endphp
                                      <p class="price">&#8358;{{ number_format($product->discount_price,2)}}<span style="margin-left:20px;"><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span></p>
                                      <p class="shop"> {{ $store->name }}</p>
                                      <p class="street">{{ $store->address}} , {{ $city->name }}</p>
                                      
                                      <button type="button" style="border:none; color:#fff;" class="product_cart_single purple" data-price="{{ $product->discount_price }}" data-id="{{ $product->id }}">ADD TO CART <i class="fas fa-plus"></i></button>
                                  </div>
                                  <br>
                  </div>
                  @endforeach
                  
                  
          </div>
        </div>
       </div>
     </div>



@stop


@push('scripts')
<script src="{{ asset('assets/admin/js/custom.js')}}"></script>
<script src="{{ asset('assets/admin/js/toastr.js')}}"></script>
@endpush