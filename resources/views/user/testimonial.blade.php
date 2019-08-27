@extends('layouts.frontend.app2')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.css') }}">
<link rel="stylesheet" href="{{ asset('diollo/assets/css/custom.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('assets/admin/css/rating.css') }}"> --}}

@endpush
@section('content')

<div class="container ">
<div class="row push-margin-top-product">
    <div class="col-md-8 col-sm-12 offset-md-2">
        @include('partials.admin.success')
        @include('partials.admin.error')

        
        {{-- <div class="container">
                  <div class="ratings">
                      <input type="radio" name="star" id="rating" value="1" />
                      <input type="radio" name="star" id="rating" value="2" />
                      <input type="radio" name="star" id="rating" value="3" />
                      <input type="radio" name="star" id="rating" value="4" />
                      <input type="radio" name="star" id="rating" value="5" />
                  </div>
                </div> --}}
                {{-- <input type="hidden" id="productID" name="productID" value="{{ $product->id }}"> --}}

        <div class="card h-100 border-0 shadow">
            <div class="card-title"><h4 style="padding-top:20px; text-align:center;">Say something abut us</h4></div>
            <div class="card-body">
                <form>
                        <div class="form-group">
                            <label for="testifier">Name</label>
                            <input type="text" name="name" id="username" class="form-control" placeholder="Enter Your Name">
                        </div>

                        <div class="form-group">
                            <label for="testifier">Message</label>
                            <textarea name="content" id="content" cols="30" rows="10" class="form-control" placeholder="Enter testimonial"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" id="testimonialButton" class="btn btn-primary btn-md">Post</button>
                        </div>
                </form>   
            </div>
        </div>
    </div>
</div>
</div>
@stop

@push('js')
<script src="{{ asset('assets/admin/js/product.js')}}"></script>
<script src="{{ asset('assets/admin/js/toastr.js')}}"></script>
{{-- <script src="{{ asset('assets/admin/js/rating.js')}}"></script> --}}

{{-- nice --}}
@endpush