
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

    <header>
      <div class="container">
        <div class="row">
            <a href="index.html">
                    <p class="home">Home / <span class="top">Top Selling </span>
            </a> <a href="Topselling.html">  </a>
        </div>
      </div>
    </header>


<div>
    <p class="topselling">
            Top Selling
    </p>
</div>
    <div class="container">

{{-- {{ dd($promotion->promo_image)}} --}}
@foreach($promotion as $promo)
    @php
    $images = \App\Models\Image::where('promotion_id', $promo->id)->get();
    // dd($images);
    $image_var = json_decode($images);
    @endphp

    @if(is_array($image_var))
    @foreach(array_slice($image_var, 0, 1) as $image)
    {{-- <img src="{{ asset('storage/'.$promotion->photos->path)}}" alt="banner" class=" img-responsive img-fluid" style="width:100%; height:250px; object-fit:fill;"> --}}
        <img src="{{ asset("storage/$image->path")}}" alt="banner" class=" img-responsive img-fluid" style="width:100%; height:250px; object-fit:fill;">
    @endforeach
    @endif
@endforeach
    {{-- <img src="{{ asset('storage/'.$promotion->photos->path)}}" alt="banner" class=" img-responsive img-fluid" style="width:100%; height:250px; object-fit:fill;"> --}}


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

                {{-- <p class="closet"> New Closet Stores</p>
                <ul class="listitems">
                        <li> <a href="#" class="product-link">Abuma Tech (1km)</a></li>
                        <li> <a href="#" class="product-link">Dantata Visuals (5km)</a></li>
                        <li> <a href="#" class="product-link">Viewnet (5.6km) </a></li>
                </ul>
                <a href="#" class="product-link"><p class="otherstores"> see other stores</p></a> --}}
            </div>
            </div>

            <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="row">

                            <div class="col-md-3 col-xs-12 col-sm-12">
                                {{-- <p class="pages"> 1-20 <span class="page-ext"> of 2,334 results</span></p> --}}
                            </div>


                            <div class="col-md-3 col-xs-6 col-sm-6">

                                </div>
                                <div class="col-md-3 col-xs-6 col-sm-6">

                                    </div>
                                    <div class="col-md-3 col-xs-12 col-sm-12">
                                        <button class="sortbutton"><p class="sort"> Sort By: <span class="lowprice">Lowest Price</span> <span style="margin-left:12px;"><i class="fas fa-angle-down"></i></span> </p></button>

                                    </div>
                    </div>
                    <div class="row">
                      @if(isset($topSellingProducts))
                        @forelse($topSellingProducts as $topSellingProduct)
                        <div class="col-md-3 col-xs-6 col-sm-6">
                                      <div class="img-block">
                                        <a href="{{ route('customer.productPage', $topSellingProduct->product_id )}}"> 
                                                @php
                                                $images = \App\Models\ProductImage::where('product_id', $topSellingProduct->product_id)->get();
                                                $image_var = json_decode($images);
                                                @endphp
                            
                                                @if(is_array($image_var))
                                                @foreach(array_slice($image_var, 0, 1) as $image)
                                                    <img src="{{ asset("storage/$image->path")}}" alt="phone" class="img-responsive img-fluid" style="height:160px">
                                                @endforeach
                                                @endif
                                        </a> {{-- <img src="images/phone 6.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a> --}}
                                      </div>
                                      @php 
                                        $product = \App\Models\Product::find($topSellingProduct->product_id);
                                        // dd($product);
                                        // if(isset($product->store)){
                                        $store = \App\Models\Store::find($product->store);
                                        // }
                                        $city =  \Gerardojbaez\GeoData\Models\City::find($store->city_id);
                                      @endphp

                                      {{-- @if(isset($store)) --}}
                                    <div class="content">
                                        <p class="price">&#8358;{{ number_format($product->discount_price,2)}}<span style="margin-left:20px;"><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span></p>
                                        <p class="shop"> {{ $store->name }}</p>

                                    <p class="street">{{ $store->address}} , {{ $city->name }}</p>
                                    {{-- @endif     --}}
                                    
                                    
                                    <button type="button" style="border:none; color:#fff;" class="product_cart_single purple" data-price="{{ $product->discount_price }}" data-id="{{ $product->id }}">ADD TO CART <i class="fas fa-plus"></i></button>
                                    </div>
                                  <br>
                        </div>
                        @empty 

                        No product to display
                        @endforelse
                        @endif
                       
                    <div class="row" style="margin-top:35px;">
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                        <img src="images/store-square.jpg" class="img-responsive img-fluid curve"  alt="" style="height:180px; border-radius: 10px;">
                                        <div class="on-side-3"><img src="images/reveal button).svg" style="height: 40px;" alt=""></div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                         <img src="images/store-square-3.jpg" class="img-responsive img-fluid curve" alt="" style="height:180px; border-radius:10px;">
                                         <div class="on-side-4"><img src="images/reveal button).svg" style="height: 40px;" alt=""></div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                         <img src="images/store-square-4.jpg" class="img-responsive img-fluid curve" alt=""style="height:180px;  border-radius: 10px;">
                                         <div class="on-side-5"><img src="images/reveal button).svg" style="height: 40px;" alt=""></div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6">
                                            <img src="images/store-square-4.jpg" class="img-responsive img-fluid curve" alt="" style="height:180px;  border-radius: 10px;">
                                            <div class="on-side-5"><img src="images/reveal button).svg" style="height: 40px;" alt=""></div>
                                    </div>
                        </div>
                        
                        

                        <div class="row" style="margin-top:35px;">
                                {{-- <div class="col-md-3 col-xs-6 col-sm-6">
                                        <p class="pages"> 1-20 <span class="page-ext"> of 233,456 results</span></p>
                                </div> --}}

                            <div class="col-md-3 col-xs-12 col-sm-12"> </div>

                        <div class="col-md-3 col-xs-12 col-sm-12"> </div>

                    {{-- <div class="col-md-3 col-xs-6 col-sm-6" style="margin-top:35px;">
                            <a href="#" style="text-decoration:none;"> <p> <i class="fas fa-angle-left" style="margin-right: 15px;"></i> PREV <span class="next"> NEXT</span> <i class="fas fa-angle-right" style="margin-left:15px;"></i></p> </a>
                    </div> --}}

                    </div>


            </div>
        </div>
     </div>
    </div>

@stop

@push('scripts')
<script src="{{ asset('assets/admin/js/custom.js')}}"></script>
<script src="{{ asset('assets/admin/js/toastr.js')}}"></script>
@endpush