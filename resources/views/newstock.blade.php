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
      <!-- side links   -->
      <div class="container">
          <div class="row">
            <a href="index.html" style="text-decoration:none; color: #d1d2d3;">
                    <p class="home">Home / <span class="top">Stores / </span> <span class="storename">Stores</span>
            </a> <a href="PhonesComputers.html">  </a>
          </div>
      </div>
  
      <!-- end of side links -->
      <div>
          <h1 class="stores text-center">New Stock</h1>
  </div>
          <div class="container">
                {{-- <div class="container"> --}}
                        <div class="row">
                            <div class="col-xs-12 col-md-12">
                            <img src="{{ asset('assets/password/images/Banner-for-new-stock-passward@2x.jpg')}}" alt="banner" class=" img-responsive img-fluid">
                            </div>
                        </div>
                      {{-- </div> --}}
  
             <div class="row">
                  <div class="col-md-3 col-sm-6 col-xs-6">
                      <div class="contain">
                      <p class="products">Product Categories</p>
                      <ul class="listitems">
                         
                       
                        @foreach($categories as $category)
                          <li> 
                            <a href="{{ route('category.search',$category->id )}}" class="product-link">{{ $category->name }}</a>
                          </li>
                        @endforeach
                      </ul>
  
                      <p class="closet"> New Closet Stores</p>
                      <ul class="listitems">
                              <li> <a href="#" class="product-link">Abuma Tech (1km)</a></li>
                              <li> <a href="#" class="product-link">Dantata Visuals (5km)</a></li>
                              <li> <a href="#" class="product-link">Viewnet (5.6km) </a></li>
                      </ul>
                      <a href="#" class="product-link"><p class="otherstores"> see other stores</p></a>
                  </div>
                  </div>
  
                  <div class="col-md-9 col-sm-12 col-xs-12">
                              <div class="row">
  
                                  <div class="col-md-3 col-xs-12 col-sm-12">
                                      <p class="pages"> 1-20 <span class="page-ext"> of 2,334 results</span></p>
                                  </div>
  
  
                                  <div class="col-md-3 col-xs-6 col-sm-6">
  
                                      </div>
                                      <div class="col-md-3 col-xs-6 col-sm-6">
  
                                          </div>
                                          <div class="col-md-3 col-xs-12 col-sm-12">
                                              <button class="sortbutton"><p class="sort"> Sort By: <span class="lowprice">Lowest Price</span> <span style="margin-left:12px;"><i class="fas fa-angle-down"></i></span> </p></button>
  
                                          </div>
                          </div>
                          <div class="row" style="margin-top: 35px;">
                            @foreach($newStocks as $newStock)
                            <div class="col-xs-6 col-md-3">
                              <div class="img-block">
                                <a href="{{ route('customer.productPage', $newStock->id )}}"> 
                                        @php
                                        $images = \App\Models\ProductImage::where('product_id', $newStock->id)->get();
                                        $image_var = json_decode($images);
                                        @endphp
                    
                                        @if(is_array($image_var))
                                        @foreach(array_slice($image_var, 0, 1) as $image)
                                            <img src="{{ asset("storage/$image->path")}}" alt="phone" class="img-responsive img-fluid" style="height:160px">
                                        @endforeach
                                        @endif
                                    {{-- <img src="{{ asset('assets/password/images/download.jpg') }}" alt="download" class="img-responsive img-fluid" style="height:160px"></a> --}}
                                        <div class="edit">
                                          <a href="#"><img src="images/fav appearance selected.svg" style="height: 25px;" alt=""></a>
                                        </div>
                                        <div class="content">
                                              @php 
                                                // $product = \App\Models\Product::find($topSellingProduct->product_id);
                                                $store = \App\Models\Store::find($newStock->store);
                                                $city =  \Gerardojbaez\GeoData\Models\City::find($store->city_id);
                                              @endphp
                                          <div class="amount">
                                            <p class="price">&#8358;{{ number_format($newStock->discount_price,2)}}</p>
                                              <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                                          </div>
                                            <p class="shop"> {{ $store->name }}</p>
                                            <p class="street">{{ $store->address}} , {{ $city->name }}</p>
                                            <button type="button" style="border:none; color:#fff;" class="product_cart_single purple" data-price="{{ $newStock->discount_price }}" data-id="{{ $newStock->id }}">ADD TO CART <i class="fas fa-plus"></i></button>
                                        </div>
                                        <br>
                              </div>
                            </div>
                            @endforeach
                            
                           
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
  
                  <div class="container">
                      {{-- <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-xs-12 col-md-9">
                          <div class="row" style="margin-top: 35px;">
                            <div class="col-xs-6 col-md-3">
                              <div class="img-block">
                                   <a href="#"> <img src="images/download.jpg" alt="download" class="img-responsive img-fluid" style="height:160px"></a>
                                        <div class="edit">
                                          <a href="#"><img src="images/fav appearance selected.svg" style="height: 25px;" alt=""></a>
                                        </div>
                                        <div class="content">
                                          <div class="amount">
                                            <p class="price">&#8358;9,000</p>
                                              <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                                          </div>
                                            <p class="shop"> Gionee Shop</p>
                                            <p class="street">Nwaniba Rd. Uyo</p>
                                        </div>
                              </div>
                            </div>
                            <div class="col-xs-6 col-md-3">
                              <div class="img-block">
                                <a href="#"> <img src="images/phone 3.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
                                        <div class="edit">
                                          <a href="#"><img src="images/fav appearance selected.svg" style="height: 25px;" alt=""></a>
                                        </div>
                                        <div class="content">
                                          <div class="amount">
                                            <p class="price">&#8358;9,000</p>
                                              <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                                          </div>
                                            <p class="shop"> Gionee Shop</p>
                                            <p class="street">Nwaniba Rd. Uyo</p>
                                        </div>
                              </div>
                            </div>
                            <div class="col-xs-6 col-md-3">
                              <div class="img-block">
                                <a href="#"> <img src="images/pjone 1.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
                                <div class="edit">
                                  <a style="display: flex; justify-content: flex-end;" href="#"><img src="images/fav appearance selected.svg" style="height: 25px;" alt=""></a>
                                </div>
                              </div>
                              <div class="content">
                                <div class="amount">
                                  <p class="price">&#8358;4,000</p>
                                    <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                                </div>
                                  <p class="shop"> Gionee Shop</p>
                                  <p class="street">Nwaniba Rd. Uyo</p>
                              </div>
                            </div>
                            <div class="col-xs-6 col-md-3">
                              <div class="img-block">
                                <a href="#"> <img src="images/phone 3.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
                                <div class="edit">
                                  <a style="display: flex; justify-content: flex-end;" href="#"><img src="images/fav appearance selected.svg" style="height: 25px;" alt=""></a>
                                </div>
                              </div>
                              <div class="content">
                                <div class="amount">
                                  <p class="price">&#8358;9,000</p>
                                  <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                                </div>
                                  <p class="shop"> Gionee Shop</p>
                                  <p class="street">Nwaniba Rd. Uyo</p>
                              </div>
                            </div>
                          </div>
                          <div class="row"  style="margin-top: 35px;">
                            <div class="col-xs-6 col-md-3">
                              <div class="img-block">
                                    <a href="#"> <img src="images/download.jpg" alt="download" class="img-responsive img-fluid" style="height:160px"></a>
                                        <div class="edit">
                                          <a href="#"><img src="images/fav appearance selected.svg" style="height: 25px;" alt=""></a>
                                        </div>
                                        <div class="content">
                                          <div class="amount">
                                            <p class="price">&#8358;9,000</p>
                                              <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                                          </div>
                                            <p class="shop"> Gionee Shop</p>
                                            <p class="street">Nwaniba Rd. Uyo</p>
                                        </div>
                              </div>
                            </div>
                            <div class="col-xs-6 col-md-3">
                              <div class="img-block">
                                <a href="#"> <img src="images/phone 3.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
                                        <div class="edit">
                                          <a href="#"><img src="images/fav appearance selected.svg" style="height: 25px;" alt=""></a>
                                        </div>
                                        <div class="content">
                                          <div class="amount">
                                            <p class="price">&#8358;9,000</p>
                                              <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                                          </div>
                                            <p class="shop"> Gionee Shop</p>
                                            <p class="street">Nwaniba Rd. Uyo</p>
                                        </div>
                              </div>
                            </div>
                            <div class="col-xs-6 col-md-3">
                              <div class="img-block">
                                <a href="#"> <img src="images/download.jpg" alt="download" class="img-responsive img-fluid" style="height:160px"></a>
                                <div class="edit">
                                  <a style="display: flex; justify-content: flex-end;" href="#"><img src="images/fav appearance selected.svg" style="height: 25px;" alt=""></a>
                                </div>
                                </div>
                              <div class="content">
                                <div class="amount">
                                  <p class="price">&#8358;4,000</p>
                                    <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                                </div>
                                  <p class="shop"> Gionee Shop</p>
                                  <p class="street">Nwaniba Rd. Uyo</p>
                              </div>
                              </div>
                            <div class="col-xs-6 col-md-3">
                              <div class="img-block">
                                <a href="#"> <img src="images/phone 3.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
                                <div class="edit">
                                  <a style="display: flex; justify-content: flex-end;" href="#"><img src="images/fav appearance selected.svg" style="height: 25px;" alt=""></a>
                                </div>
                              </div>
                              <div class="content">
                                <div class="amount">
                                  <p class="price">&#8358;9,000</p>
                                  <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                                </div>
                                  <p class="shop"> Gionee Shop</p>
                                  <p class="street">Nwaniba Rd. Uyo</p>
                              </div>
                            </div>
                          </div>
                          <div class="row" style="margin-top:35px;">
                                      <div class="col-md-3 col-xs-6 col-sm-6">
                                              <p class="pages"> 1-20 <span class="page-ext"> of 233,456 results</span></p>
                                      </div>
  
                                  <div class="col-md-3 col-xs-12 col-sm-12"> </div>
  
                              <div class="col-md-3 col-xs-12 col-sm-12"> </div>
  
                          <div class="col-md-3 col-xs-6 col-sm-6">
                                  <a href="#" style="text-decoration:none;"> <p> <i class="fas fa-angle-left" style="margin-right: 15px;"></i> PREV <span class="next"> NEXT</span> <i class="fas fa-angle-right" style="margin-left:15px;"></i></p> </a>
                          </div>
  
                          </div>
                        </div>
                    </div> --}}
                  </div>
  
    
@stop

@push('scripts')
<script src="{{ asset('assets/admin/js/custom.js')}}"></script>
<script src="{{ asset('assets/admin/js/toastr.js')}}"></script>
@endpush