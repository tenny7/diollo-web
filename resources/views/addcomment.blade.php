@extends('layouts.frontend.app2')

@section('content')



<div class="container" style="margin-top:100px;">
    <div class="row">
        <div class="col-xs-12 col-md-4">
            <div class="img-loved">
                    
          
                  
                    @foreach($product->images as $image)
                        <img src="{{ asset("storage/$image->path")}}" alt="phone" class="img-responsive img-fluid" style="border: 2px solid transparent; border-radius: 4px;" >
                    @endforeach
                   
                {{-- <img src="{{ asset('assets/password/images/hitcase-pro-for-iphone-x-case-13904579.jpg')}}" class="img-responsive img-fluid" style="border: 2px solid transparent; border-radius: 4px;" --}}
                    {{-- alt="iphone Xs Pro"> --}}
                {{-- <div class="edit">
                    <a href="#" style="padding: 10px;">
                        <img src="{{ asset('assets/password/images/fav appearance selected.svg')}}" style="height: 25px;"
                            alt="favorited"></a>
                </div> --}}
            </div>
        </div>
        <div class="col-xs-12 col-md-8">
            @include('partials.admin.success')
            <div class="row">
                <div class="col-md-6">
                    <p class="text-light" style="margin-left: 20px;">Apple Product </p>
                </div>
                <div class="col-md-6"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <div class="col-md-8"> <h4 style="color: #000333; ">{{ $product->name }}</h4>
                {{-- @php 
                    $store = App\Models\Store::find($product->store);
                @endphp --}}
                {{-- <p class="text-light">Sold by {{ $store->name}}</p> --}}
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
                            <form style="padding: 15px;" action="{{ route('customer.review.add')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="text-muted">Title:</label>
                                    <input type="text" name="title" class="form-control" id="InputName">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="text-muted">Review:</label><br>
                                    <textarea class="review_text form-control" name="review_text" rows="5" cols="43"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="text-muted">Publish As:</label>
                                <input type="text" class="form-control" name="publish_as" id="InputName" disabled value="{{ Auth::user()->fullname }}">
                                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="rating" value="{{ $rating }}">
                                </div>
                                <button type="submit" class="publish_btn center-block btn btn-primary">PUBLISH</button>
                            </form>
                            
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                        
                        
                        
                        
                        
                </div>
            </div>
            
            
           
            
        </div>
    </div>
</div>



<div class="row" style="margin-top:35px;">
    {{-- <div class="col-xs-6 col-md-3">
        <p class="pages"> 1-20 <span class="page-ext"> of 233,456 results</span></p>
    </div>

    <div class="col-xs-12 col-md-3"> </div>

    <div class="col-xs-12 col-md-3"> </div> --}}

    {{-- <div class="col-xs-6 col-md-3" style="margin-top:35px;">
        <a href="#" style="text-decoration:none;">
            <p> <i class="fas fa-angle-left" style="margin-right: 15px;"></i> PREV <span class="next"> NEXT</span>
                <i class="fas fa-angle-right" style="margin-left:15px;"></i></p>
        </a>
    </div> --}}

</div>
</div>
@stop