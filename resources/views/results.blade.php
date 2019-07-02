
@extends('layouts.frontend.app')

@section('content')
<br>
<br>
<br>
<br>


{{-- 
@foreach($searchResults->groupByType() as $type => $modelSearchResults)
   <h2>{{ $type }}</h2>
   
   @foreach($modelSearchResults as $searchResult)
       <ul>
            <li><a href="{{ $searchResult->url }}">{{ $searchResult->title }}</a></li>
       </ul>
   @endforeach
@endforeach --}}
<div class="container">
        <h1>Search</h1>

        There are {{ $results->count() }} results.
        <div class="row" style="margin-top:35px;">
                @foreach($results as $product)
                {{-- {{ dd($product) }} --}}
                      <div class=" col-xs-6 col-md-3">
                              <div class="img-block">
                                {{-- @foreach($product->images as $image) --}}
                                    {{-- {{ $image->name }} --}}
                                {{-- @endforeach --}}
                                
                                
                                {{-- @foreach($images as $key => $image)
                                <li >
                                    <img src="{{ asset("storage/$image->path")}}" alt="" style="height:415px;">
                                </li>
                                {{ dd(asset("storage/$image->path"))}}
                                @endforeach --}}
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
                                {{-- <img src="" alt="phone" class="img-responsive img-fluid" style="height:160px"></a> --}}
                          </div>
                          <div class="content">
                              <div class="amount">
                              <p class="price">&#8358; {{ number_format($product->discount_price,2)}}</p>
                              <span class="product_newprice" style="font-size:14px;"><del>&#8358;</del> {{ $product->original_price }}</span>
                                  <span><i class="fas fa-star star" style="margin-left:4px;"></i><i class="fas fa-star star" style="margin-left:4px;"></i><i class="far fa-star star" style="margin-left:4px;"></i> </span>
                              </div>
                          </div>
                          @php 
                              $region = \Gerardojbaez\GeoData\Models\Region::find($product->region_id);
                          @endphp 
                          <p>{{ $region->name }}</p>
                          <p>{{ $product->address }}</p>
                          {{-- <p class="shop"> {{ $store->name }}</p>
                              <p class="street">{{ $store->address }}</p> --}}
                          </div>
                  @endforeach
            </div> 
            <br>  
</div> 
   


  
    @stop 

  