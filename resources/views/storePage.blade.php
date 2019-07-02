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
    <div class="row">
      <a href="index.html" style="text-decoration:none; color: #d1d2d3;">
              <p class="home">Home / <span class="top">Stores / </span> <span class="storename"> Abumatech Nigeria LTD</span>
      </a> <a href="PhonesComputers.html">  </a>
    </div>
</div>
<div class="container-fluid">
<div id="grad1">
  <div class="row rowstore">
    <div class="col-md-6 col-sm-12 col-xs-12 shopAbumatech-rectangle">
    <p class="abumatech">{{ $store->name }}</p>
      <img src="{{ asset('assets/password/images/Abumatech-long@2x.jpg')}}" alt="image" class="img-responsive img-fluid" style="position:absolute; height: 170px; margin-top: 30px; margin-left: 50px;">
    </div>
    <div class="col-md-6  col-sm-12 col-xs-12 shopAbumatech-rectangle1">
        <p class="abumatechlocation"> <i class="fas fa-paper-plane" style="color:white; margin-right: 15px;"></i>{{ $store->address }}</p>
        <hr style="border-color:#575757; margin-left: 20px; margin-right: 8px; margin-top: 10px;">
        <p class="text">{{ $store->description }}</p>
        <hr style="border-color:#575757; margin-left: 20px;margin-right: 8px; margin-top: 12px;">
        <p class="text2"> Opening Hours <span class="text3"> Selling </span></p>
    <p class="text4">{{ $store->opening_hours }} <span class="text5">{{ str_limit($store->description,20,'...')}}</span></p>
        <hr style="border-color:#575757; margin-left: 20px; margin-right: 8px; margin-top: 10px;">
        <p class="text6"> Phone Numbers</p>
        <p class="text7"> {{ $store->phones }} <span class="text8"> <i class="fas fa-star" style="color:white;  padding-left:170px;"></i><i class="fas fa-star" style="color:white; padding-left:8px;"></i><i class="far fa-star" style="color:white;  padding-left:8px;"></i> (Reviews from 400 users)</span></p>

    <button class="productbutton"> Products <span>
      {{-- <a href="{{ route('reviews',$store->id)}}" class="btn reviewbutton"> Reviews</a> --}}
    </span></button>
      </div>

    </div>

</div>
</div>

<div class="col-md-9 col-sm-12 col-xs-12">
  <div class="row">

      <div class="col-md-3 col-xs-12 col-sm-12">

      </div>
      <div class="col-md-3 col-xs-6 col-sm-6">
        <p class="pages"> 1-20 <span class="page-ext"> of 2,334 results</span></p>
          </div>
          <div class="col-md-3 col-xs-6 col-sm-6">
            <button class="sortbutton"><p class="sort"> Showing for: <span class="lowprice">Phones</span> <span style="margin-left:12px;"><i class="fas fa-angle-down"></i></span> </p></button>

              </div>
              <div class="col-md-3 col-xs-12 col-sm-12">
                  <button class="sortbutton"><p class="sort"> Sort By: <span class="lowprice">New Items<span> <span style="margin-left:12px;"><i class="fas fa-angle-down"></i></span> </p></button>

              </div>
</div>
</div>
<div class="col-md-3"></div>

<!-- content for ABumatech Shop -->
<div class="container">
<div class="row">
<div class="col-xs-12 col-md-9 col-md-offset-3">

<div class="row" style="margin-top:35px;">
  @foreach($products as $product)
        <div class=" col-xs-6 col-md-3" style="margin-bottom:15px;">
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
                </a>
                  {{-- <img src="{{ asset('assets/password/images/phone 5.jpg')}}" alt="phone" class="img-responsive img-fluid" style="height:160px"></a> --}}
                      </div>
                        <div class="content">
                          <div class="amount">
                          <p class="price">&#8358; {{ number_format($product->discount_price,2)}}</p>
                              <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                          </div>
                        </div>
                      <p class="shop"> {{ $store->name }}</p>
                            <p class="street">{{ $store->address }}</p>
                            <button type="button" style="border:none; color:#fff; border-radius:15%" class="product_cart_single purple btn btn-xs" data-price="{{ $product->discount_price }}" data-id="{{ $product->id }}">ADD TO CART <i class="fas fa-plus"></i></button>
                        
                          </div>
                          
                        @endforeach
                        
        {{-- <div class="col-xs-6 col-md-3">
                <div class="img-block">
                        <a href="#"> <img src="{{ asset('assets/password/images/Product-cat-Jeez-3.jpg')}}" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
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
        <div class="col-xs-6 col-md-3">
                <div class="img-block">
                        <a href="#"> <img src="{{ asset('assets/password/images/phoone 2.jpg')}}" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
                      </div>
                        <div class="content">
                          <div class="amount">
                            <p class="price">&#8358;5,000</p>
                            <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                          </div>
                            <p class="shop"> Gionee Shop</p>
                            <p class="street">Nwaniba Rd. Uyo</p>
                        </div>
        </div>
        <div class="col-xs-6 col-md-3">
                <div class="img-block">
                        <a href="#"> <img src="{{ asset('assets/password/images/phone 4.jpg')}}" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
                      </div>
                        <div class="content">
                          <div class="amount">
                            <p class="price">&#8358;80,000</p>
                              <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i></span>
                          </div>
                            <p class="shop"> Gionee Shop</p>
                            <p class="street">Nwaniba Rd. Uyo</p>
                        </div>
        </div> --}}
</div>
{{-- <div class="row" style="margin-top:35px;">
        <div class="col-xs-6 col-md-3">
                <div class="img-block">
                        <a href="#"> <img src="{{ asset('assets/password/images/phone 6.jpg')}}" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
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
                        <a href="#"> <img src="images/Sony MDR-XB950BT EXTRA BASS.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
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
        <div class="col-xs-6 col-md-3">
                <div class="img-block">
                        <a href="#"> <img src="images/download.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
                      </div>
                        <div class="content">
                          <div class="amount">
                            <p class="price">&#8358;5,000</p>
                            <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                          </div>
                            <p class="shop"> Gionee Shop</p>
                            <p class="street">Nwaniba Rd. Uyo</p>
                        </div>
        </div>
        <div class="col-xs-6 col-md-3">
                <div class="img-block">
                        <a href="#"> <img src="images/pjone 1.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
                      </div>
                        <div class="content">
                          <div class="amount">
                            <p class="price">&#8358;80,000</p>
                              <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                          </div>
                            <p class="shop"> Gionee Shop</p>
                            <p class="street">Nwaniba Rd. Uyo</p>
                        </div>
        </div>
  </div> --}}
  </div>
</div>
</div>

<!-- clearance sales -->
<div class="gray">
  <br>
    <h1 class="text-center clearance" >Clearance Products</h1>
<div class="container">
    <div class="row" style="padding-top: 40px; margin: auto; ">
      @foreach($clearances as $clearance)
        <div class="col-xs-6 col-md-2">
          <div class="img-block">
            <a href="#"> 
                @php
                $images = \App\Models\ProductImage::where('product_id', $clearance->id)->get();
                $image_var = json_decode($images);
                @endphp

                @if(is_array($image_var))
                @foreach(array_slice($image_var, 0, 1) as $image)
                    <img src="{{ asset("storage/$image->path")}}" alt="phone" class="img-responsive img-fluid" style="height:160px">
                @endforeach
                @endif
              {{-- <img src="{{ asset('assets/password/images/clock.png')}}" alt="clock" class="img-responsive img-fluid" style="height:160px"></a> --}}
            <div class="edit">
              <a style="display: flex; justify-content: flex-end;" href="#"><img src="images/fav appearance selected.svg" style="height: 25px;" alt=""></a>
            </div>
          </div>
            <div class="content">
            <p class="items"> {{ $clearance->name }}</p>
            <p class="price">&#8358;{{ number_format($clearance->discount_price,2) }} <span class="newprice">&#8358;{{ number_format($clearance->original_price,2)}}</span></p>
            <button type="button" style="border:none; color:#fff; border-radius:15%" class="product_cart_single purple btn btn-xs" data-price="{{ $clearance->discount_price }}" data-id="{{ $clearance->id }}">ADD TO CART <i class="fas fa-plus"></i></button>  
          </div>
          <br>
        </div>
        @endforeach
        


    </div>
  </div>
</div>
<!-- end of clearance sales -->
<div class="container">
{{-- <div class="row">
<div class="col-xs-12 col-md-9 col-md-offset-3">
    <div class="row" style="margin-top:35px;">
        <div class="col-xs-6 col-md-3">
                <div class="img-block">
                        <a href="#"> <img src="images/phone 5.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
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
                        <a href="#"> <img src="images/Product-cat-Jeez-3.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
                      </div>
                        <div class="content">
                          <div class="amount">
                            <p class="price">&#8358;9,000</p>
                            <span style="margin-left:20px;"><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                          </div>
                            <p class="shop"> Gionee Shop</p>
                            <p class="street">Nwaniba Rd. Uyo</p>
                        </div>
        </div>
        <div class="col-xs-6 col-md-3">
                <div class="img-block">
                        <a href="#"> <img src="images/phoone 2.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
                      </div>
                        <div class="content">
                          <div class="amount">
                            <p class="price">&#8358;5,000</p>
                            <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                          </div>
                            <p class="shop"> Gionee Shop</p>
                            <p class="street">Nwaniba Rd. Uyo</p>
                        </div>
        </div>
        <div class="col-xs-6 col-md-3">
                <div class="img-block">
                        <a href="#"> <img src="images/phone 4.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
                      </div>
                        <div class="content">
                          <div class="amount">
                            <p class="price">&#8358;80,000</p>
                            <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                          </div>
                            <p class="shop"> Gionee Shop</p>
                            <p class="street">Nwaniba Rd. Uyo</p>
                        </div>
        </div>
</div>
<div class="row" style="margin-top:35px;">
        <div class="col-xs-6 col-md-3">
                <div class="img-block">
                        <a href="#"> <img src="images/phone 6.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
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
                        <a href="#"> <img src="images/Sony MDR-XB950BT EXTRA BASS.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
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
        <div class="col-xs-6 col-md-3">
                <div class="img-block">
                        <a href="#"> <img src="images/download.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
                      </div>
                        <div class="content">
                          <div class="amount">
                            <p class="price">&#8358;5,000</p>
                              <span style="margin-left:20px;"><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                          </div>
                            <p class="shop"> Gionee Shop</p>
                            <p class="street">Nwaniba Rd. Uyo</p>
                        </div>
        </div>
        <div class="col-xs-6 col-md-3">
                <div class="img-block">
                        <a href="#"> <img src="images/pjone 1.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
                      </div>
                        <div class="content">
                          <div class="amount">
                            <p class="price">&#8358;80,000</p>
                              <span style="margin-left:20px;"><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                          </div>
                            <p class="shop"> Gionee Shop</p>
                            <p class="street">Nwaniba Rd. Uyo</p>
                        </div>
        </div>
</div>
<div class="row">
    <div class="col-xs-6 col-md-3">
                  <div class="img-block">
                    <a href="#"> <img src="images/phone 6.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
                  </div>
                    <div class="content">
                      <div class="amount">
                        <p class="price">&#8358;10,000</p>
                        <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                      </div>
                        <p class="shop"> Gionee Shop</p>
                        <p class="street">Nwaniba Rd. Uyo</p>
                    </div>
    </div>
    <div class="col-xs-6 col-md-3">
                  <div class="img-block">
                    <a href="#"> <img src="images/phone 3.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
                  </div>
                    <div class="content">
                      <div class="amount">
                        <p class="price">&#8358;9,999</p>
                          <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                      </div>
                        <p class="shop"> Gionee Shop</p>
                        <p class="street">Nwaniba Rd. Uyo</p>
                    </div>
    </div>
    <div class="col-xs-6 col-md-3">
                  <div class="img-block">
                    <a href="#"> <img src="images/pjone 1.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
                  </div>
                    <div class="content">
                      <div class="amount">
                        <p class="price">&#8358;90,000</p>
                          <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                      </div>
                        <p class="shop"> Gionee Shop</p>
                        <p class="street">Nwaniba Rd. Uyo</p>
                    </div>
    </div>
    <div class="col-xs-6 col-md-3">
                  <div class="img-block">
                    <a href="#"> <img src="images/phoone 2.jpg" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
                  </div>
                    <div class="content">
                      <div class="amount">
                        <p class="price">&#8358;10,000</p>
                          <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                      </div>
                        <p class="shop"> Gionee Shop</p>
                        <p class="street">Oron Rd. Uyo</p>
                    </div>
    </div>
</div>

<div class="row" style="margin-top:35px;">
        <div class="col-xs-6 col-md-3">
                <p class="pages"> 1-20 <span class="page-ext"> of 233,456 results</span></p>
        </div>

    <div class="col-xs-12 col-md-3"> </div>

<div class="col-xs-12 col-md-3"> </div>

<div class="col-xs-6 col-md-3" style="margin-top:35px;">
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
