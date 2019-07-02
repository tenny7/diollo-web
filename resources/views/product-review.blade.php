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
            <a href="index.html" style="text-decoration:none; color: #d1d2d3;"
                class="storename"> <i class="fas fa-angle-left fa-2x" style="margin-top: 15px;"></i>&nbsp; &nbsp; <a href="product.html">Back to Product</a></p>
            </a> 
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-4">
                <div class="img-loved">
                    <img src="images/hitcase-pro-for-iphone-x-case-13904579.jpg" class="img-responsive img-fluid" style="border: 2px solid transparent; border-radius: 4px;"
                        alt="iphone Xs Pro">
                    <div class="edit">
                        <a href="#" style="padding: 10px;"><img src="images/fav appearance selected.svg" style="height: 25px;"
                                alt="favorited"></a>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <p class="text-light" style="margin-left: 20px;">Apple Product </p>
                    </div>
                    <div class="col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-8"> <h4 style="color: #000333; ">iPhone Xs pro with Air shield technology 5-Inch QHD (1.5GB, 8GB ROM) 8MP +
                            5MP Dual SIM 4G Smartphone</h4>
                            <p class="text-light">Sold by SLOT</p>
                        </div>
                            <div class="col-md-4"> <br></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 style="margin-left: 20px;">My Rating</h5>
                                    <hr>
                                    <div id="rater" class="rating-class"></div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 style="margin-left: 20px;">My Review</h5>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                                            <form style="padding: 15px;">
                                                                <div class="form-group">
                                                                    <label for="name" class="text-muted">Title:</label>
                                                                    <input type="text" class="form-control" id="InputName">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email" class="text-muted">Review:</label><br>
                                                                    <textarea name="subject" class="review_text" rows="5" cols="43"></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="name" class="text-muted">Publish As:</label>
                                                                    <input type="text" class="form-control" id="InputName">
                                                                </div>
                                                            </form>
                                                            <button type="submit" class="publish_btn center-block">PUBLISH</button>
                                </div>
                                <div class="col-md-6"></div>
                            </div>
                            
                            
                            
                            
                            
                    </div>
                </div>
                
                
               
                
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
            <a href="#" style="text-decoration:none;">
                <p> <i class="fas fa-angle-left" style="margin-right: 15px;"></i> PREV <span class="next"> NEXT</span>
                    <i class="fas fa-angle-right" style="margin-left:15px;"></i></p>
            </a>
        </div>

    </div>
    </div>
@stop
@push('scripts')
<script src="{{ asset('assets/admin/js/custom.js')}}"></script>
<script src="{{ asset('assets/admin/js/toastr.js')}}"></script>
@endpush