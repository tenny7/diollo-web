@extends('layouts.frontend.app2')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.css') }}">
<link rel="stylesheet" href="{{ asset('diollo/assets/css/custom.css') }}">

@endpush
@section('content')

<div class="container ">
<div class="row push-margin-top-product">
    <div class="col-md-8 col-sm-12 offset-md-2">
        @include('partials.admin.success')
        @include('partials.admin.error')
        <div class="card h-100 border-0 shadow">
            <div class="card-title"><h4 style="padding-top:20px; text-align:center;">Say something abut us</h4></div>
            <div class="card-body">
                <form>
                        <div class="form-group">
                            <label for="testifier">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
                        </div>

                        <div class="form-group">
                            <label for="testifier">Message</label>
                            <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="Enter testimonial"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary btn-md testimonialButton">Post</button>
                        </div>
                </form>   
            </div>
        </div>
    </div>
</div>
</div>
@stop

@push('js')
<script src="{{ asset('assets/admin/js/custom.js')}}"></script>
<script src="{{ asset('assets/admin/js/toastr.js')}}"></script>
{{-- nice --}}
@endpush