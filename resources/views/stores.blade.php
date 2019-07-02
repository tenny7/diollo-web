
@extends('layouts.frontend.app')

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
                <p class="home">Home / <span class="top">Stores</span>
        </a> <a href="stores.html">  </a>
    </div>
  </div>
</header>


<div>
<h1 class="stores">
        Stores
</h1>
</div>
<div class="container">

  <img src="{{ asset('assets/password/images/Banner-for-new-stock-passward@2x.jpg')}}" alt="banner" class=" img-responsive img-fluid">


   <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="contain">
            <p class="products">Product Categories</p>
            <ul class="listitems">
                <li> <a href="#" class="product-link">Women's Clothing</a></li>
                <li> <a href="#" class="product-link">Men's Clothing</a></li>
                <li> <a href="#" class="product-link">Jewellery and Hair</a></li>
                <li> <a href="#" class="product-link">Babies and Kids</a></li>
                <li> <a href="#" class="product-link">Women's Clothing</a></li>
                <li> <a href="#" class="product-link">Men's Clothing</a></li>
                <li> <a href="#" class="product-link">Babies Clothing</a></li>
                <li> <a href="#" class="product-link">Jewellery and Hair</a></li>
            </ul>

            <p class="closet"> New Closet Stores</p>
            <ul class="listitems">
              @foreach($stores as $store)
            <li> <a href="{{ route('search.geo.location',$store->id)}}" class="product-link">{{ $store->name }} (1km)</a></li>
            @endforeach
                    {{-- <li> <a href="#" class="product-link">Dantata Visuals (5km)</a></li>
                    <li> <a href="#" class="product-link">Viewnet (5.6km) </a></li> --}}
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
                    @foreach($stores as $store)
                    <div class="col-xs-12 col-md-6 selected">
                                  <div class="img-block">
                                  <a href="{{ route('customer.storePage',$store->id)}}" style="text-decoration:none;"> 
                                     <img src="{{ asset("storage/$store->logo")}}" alt="phone" class="img-responsive img-fluid" style="height:160px">
                                     
                                    <button class="btn shopnow">SHOP NOW</button>
                                  </a>
                                  </div>
                                    <div class="content">
                                    <p class="shop"> {{ $store->name }}</p>
                                    @php 
                                      $region = \Gerardojbaez\GeoData\Models\Region::find($store->region_id);
                                    @endphp
                                        <p class="street"><strong>{{ $store->address }}</strong></p>
                                    <a href="#"><img src="{{ asset('assets/password/images/fav appearance selected.svg')}}" class="fav" alt="favorite"></a>


                                        <div class="details">
                                          <div class="hours">
                                            <p>Opening Hours</p>
                                            <p>{{ $store->opening_hours }}</p>
                                          </div>

                                          <div class="selling">
                                            <p>Selling</p>
                                            <p>{{ str_limit($store->description,20,'...') }}</p>
                                          </div>
                                        </div>
                                    </div>
                    </div>
                    @endforeach
                    
                </div>
                <div class="row" style="margin-top:35px;">
                            <div class="col-md-3 col-xs-6 col-sm-6">
                                    <p class="pages"> 1-20 <span class="page-ext"> of 233,456 results</span></p>
                            </div>

                        <div class="col-md-3 col-xs-12 col-sm-12"> </div>

                    <div class="col-md-3 col-xs-12 col-sm-12"> </div>

                <div class="col-md-3 col-xs-6 col-sm-6" style="margin-top:35px;">
                        <a href="#" style="text-decoration:none;"> <p> <i class="fas fa-angle-left" style="margin-right: 15px;"></i> PREV <span class="next"> NEXT</span> <i class="fas fa-angle-right" style="margin-left:15px;"></i></p> </a>
                </div>

                </div>


        </div>
    </div>
 </div>

 @stop