@extends('layouts.frontend.app')
@push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.css') }}">
@endpush

@section('content')

<br>
<br>
<br>
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
    <div class="container" style="margin:auto;">
        <header>
           <a href="index.html"> <p class="home">Home /</a> <a href=""> <span class="shopping_cart"> Shopping Cart</span></a>
            </p>
        </header>
        <div>
            <p class="carting">Shopping Cart</p>
        </div>
        

        {{-- <div class="row">
                
        </div> --}}

        @include('partials.admin.success')
        @include('partials.admin.error')

        {{-- @if(Session::has('success'))
        <p class="alert {{ session()->get('alert-class', 'alert-info') }}">{{ session()->get('message') }}</p>
        @endif --}}
        <div class="row">
            
        <div class="col-md-8 col-md-offset--2 col-sm-12 col-xs-12">
            
                <table class="table" style="margin-top: 50px;" id="tableId">
                   
                       <thead>
                           <tr>
                               <th  width="3%"><button class="btn btn-danger purple btn-sm deleteProduct" id="deleteProduct">Delete</button></th>
                                <th class="item table-head"> Item</th>
                                <th class="quantity table-head">Quantity</th>
                                <th class="unitprice table-head">Unit Price</th>
                           </tr>
                        </thead>

                        <tbody>
                                @php 
                                $total = 0;
                                @endphp
                                @foreach($carts as $cart)
                                @php 
                                  $subtotal = $cart->price * $cart->qty;
                                  
                                  $total += $subtotal;
                                 // dd($subtotal);
                                @endphp
                            <tr>
                                <td>
                                <input type="checkbox" class="product_sel" value="{{ $cart->product_id }}" name="product_sel[]" id="product_sel">
                                </td>
                                    @php
                                    $product = \App\Models\Product::find($cart->product_id);
                                @endphp
                                @php
                                    $store = \App\Models\Store::find($product->store);
                                @endphp
                                <td class="phone">
                                    <div class="newphone" style="float:left; margin-right: 10px;">
                                            @php
                                            $images = \App\Models\ProductImage::where('product_id', $product->id)->get();
                                            $image_var = json_decode($images);
                                            @endphp
                        
                                            @if(is_array($image_var))
                                            @foreach(array_slice($image_var, 0, 1) as $image)
                                                <img src="{{ asset("storage/$image->path")}}" alt="phone" class="img-responsive img-fluid" style="height:80px; object-fit:contain;">
                                            @endforeach
                                            @endif
                                        
                                    </div>

                                    <div>
                                            {{$product->name }}
                                            
                                    <span class="sold">
                                        Sold by {{$store->name }}<br>
                                    </span>
                                    <span class="heart">
                                        <i class="fas fa-heart" style="color:#FF0066">
                                        </i>
                                        <a href="#">  Save for later instead </a>
                                    </span>
                                    </div>
                                    <div class="clearfix"></div>

                                </td>
                                <td>
                                <form action="{{ route('updateQty',$product->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" class="productId" id="productId" name="productId" value="{{ $product->id }}">   
                                    <input type="number" class="qty" id="qty" name="qty" style="width:50px; border:solid 1px #333; border-radius:7px;" min="0" placeholder="0" value="{{$cart->qty }}">
                                    <button type="submit" class="purple"  data-id="{{ $product->id }}" id="update-qty" style="border:none; color:#fff;" >update </button>
                                    
                                </form>
                                    
                                </td>

                                <td class="price">
                                        ₦ {{ number_format($cart->price,2) }}  &nbsp; <button type="button" style="border-radius: 9px; border: none; color: #ACACAC; background-color: #fff;" class="btn-secondary">x {{$cart->qty }}</button> &nbsp;
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
  </div>

        <div class="col-md-4 col-md-offset--4 col-sm-12 col-xs-12">

                <div class="card card-edit" >
        <form action="{{ route('pay')}}" method="post">
                @csrf
        <table class=" table summarytable" style="margin-top: 50px;" id="tableId1">
            <thead>
                <tr>
                    <th class="table-head-2"><strong>Order Summary</strong></th>
                    <th class="table-head-2"><strong> Item</strong></th>
                </tr>
            </thead>
            <tbody>
                    @php 
                    $total = 0;
                    @endphp
                    @foreach($carts as $cart)
                        @php 
                        $subtotal = $cart->price * $cart->qty;
                        
                        $total += $subtotal;
                        // dd($subtotal);
                        @endphp
                
                
                <tr>
                        {{-- @php
                        $product = \App\Models\Product::find($cart->product_id);
                    @endphp --}}
                        <td class="total"> Subtotal</td>
                        <td class="price"> ₦ {{ number_format($subtotal,2) }} <br> <span class="items"> ₦ {{ number_format($cart->price,2) }} x {{$cart->qty }} Item</span></td>
                        
                    </tr>
                    @endforeach
                    <tfoot>
                        <tr>
                                <td class="tally" colspan="1"> Total</td>
                                <td class="tally">₦ {{ number_format($total,2) }}</td>
                                <input type="hidden" name="total" value="{{ $total }}">
                        </tr>
                    </tfoot>
                    {{-- <tr>
                        
                    </tr> --}}

            </tbody>
        </table>
            <p class="tallytext">
                  Once you make payment at checkout items
                 will be reserved for you in the store until pickup
            </p>
          <center>
            <button type="submit" id="proceedbutton">PROCEED TO CHECKOUT</button>
          </form>
        {{-- <form action="{{ route('pay.from.wallet')}}" method="get"> --}}
        <a href="{{ route('customer.pay.from.wallet',$total) }}" id="proceedbutton" style="background-color: #555;">PAY FROM WALLET</a>
          </form>
            <p class="or">
                or
            </p>
        <a href="{{ route('customer.stores')}}"  id="continuebutton" class="btn">CONTINUE SHOPPING</a>
        </center>
        <br>
        <br>
        <br>
        </div>

        </div>
    </div>

    </div>

@stop

@push('scripts')
<script src="{{ asset('assets/admin/js/custom.js')}}"></script>
<script src="{{ asset('assets/admin/js/toastr.js')}}"></script>
@endpush