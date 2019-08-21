@extends('layouts.frontend.app2')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.css') }}">
<link rel="stylesheet" href="{{ asset('diollo/assets/css/custom.css') }}">

@endpush
@section('content')

      
          <div class="container">
                
  
             <div class="row push-margin-top">
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
                    
                  <h2 class="text-center push-margin-top">Products</h2>
      
                      <div class="row">
                        @foreach($products as $product)
                        <div class="col-md-4 col-xs-12" style="margin-bottom:10px;">
                          <div class="h-auto px-2">
                            <!-- place item-->
                            <div data-marker-id="59c0c8e39aa2eed0626e485d" class="w-100 h-100">
                              <div class="card h-100 border-0 shadow">
                                <div class="card-img-top overflow-hidden "> 
                                  @foreach($product->images as $image)
                                      <img src="{{ asset("storage/$image->path")}}" alt="phone" class="img-responsive img-fluid " style="height:160px; width:100%; object-fit:contain;">
                                <a href="{{ route('customer.productPage', $product->id )}}" class="tile-link"></a>
                                  @endforeach
                                  {{-- <img src="{{ asset('diollo/resources/d19m59y37dris4.cloudfront.net/directory/1-1/img/photo/photo-1522771739844-6a9f6d5f14af.jpg' ) }}" alt="Mid-Century Modern Garden Paradise" class="img-fluid"/><a href="detail-rooms.html" class="tile-link"></a> --}}
                                
                                  {{-- <div class="card-img-overlay-top text-right">
                                    <a href="javascript: void();" class="card-fav-icon position-relative z-index-40"> 
                                      </a></div> --}}
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
                                        
                  </div>
                </div>
          </div>  
@stop

@push('scripts')
<script src="{{ asset('assets/admin/js/custom.js')}}"></script>
<script src="{{ asset('assets/admin/js/toastr.js')}}"></script>

<!-- START: page scripts -->
<script>
  (function($) {
    "use strict";
    $(function () {

      $('.ecommerce__catalog__item__like').on('click', function () {
        $(this).toggleClass('ecommerce__catalog__item__like--selected')
      });

      $("[data-toggle=tooltip]").tooltip();

    });
  })(jQuery)
</script>
@endpush