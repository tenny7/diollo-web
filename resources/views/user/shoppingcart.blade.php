@extends('layouts.frontend.app2')
@push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.css') }}">
<link rel="stylesheet" href="{{ asset('diollo/assets/css/custom.css') }}">

@endpush

@section('content')

<br>
<br>
<br>

    <div class="container" style="margin:auto;">
    
<br>
        @include('partials.admin.success')
        @include('partials.admin.error')

        <div class="row">
            
        <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
            <div class="table-responsive">
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
                                     <div class="clearfix"></div>
                                            
                                    <span class="sold badge badge-info">
                                        Sold by {{$store->name }}<br>
                                    </span>
                                    
                                    </div>
                                    <button type="button" id="reserveId" class=" reserveId btn btn-danger btn-sm" data-id="{{ $product->id }}" style="border:none; border-radius:25px; color:#fff;">
                                        <svg height="14" viewBox="0 0 16 14" width="16" class="" 
                                        name="love">
                                        <path d="M14.3 1.3A4.22 4.22 0 0 0 11.254.01c-1.15 0-2.232.46-3.047 1.293l-.425.436-.432-.443A4.242 4.242 0 0 0 4.3 0C3.152 0 2.07.46 1.26 1.29A4.418 4.418 0 0 0 0 4.409a4.43 4.43 0 0 0 1.266 3.116l6.194 6.34a.443.443 0 0 0 .313.135.44.44 0 0 0 .313-.132l6.206-6.33a4.435 4.435 0 0 0 1.264-3.119 4.415 4.415 0 0 0-1.257-3.12z" 
                                            fill="#d8d8d8" 
                                            fill-rule="nonzero">
                                        </path>
                                        </svg>
                                        Reserve for a day
                                    </button>

                                    
                                    

                                </td>
                                <td>
                                <form action="{{ route('updateQty',$product->id)}}" method="post">
                                    @csrf
                                    <input type="hidden" class="productId" id="productId" name="productId" value="{{ $product->id }}">   
                                    <input type="number" class="qty" id="qty" name="qty" style="width:50px; border:solid 1px #333; border-radius:7px;" min="0" placeholder="0" value="{{$cart->qty }}">
                                    <button type="submit" class="purple btn btn-warning btn-sm"  data-id="{{ $product->id }}" id="update-qty" style="border:none; color:#fff;" ><i class="fa fa-upload"></i> update </button>
                          
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
  </div>

        <div class="col-md-4 col-md-offset--4 col-sm-12 col-xs-12 push-margin-top">

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
                    

            </tbody>
        </table>
            <p class="tallytext">
                  Once you make payment at checkout items
                 will be reserved for you in the store until pickup
            </p>
          <center>
            <button type="submit" id="proceedbutton" class="btn btn-success">PROCEED TO CHECKOUT</button>
          </form>
            <br><br>
            <a href="{{ route('customer.pay.from.wallet',$total) }}" id="proceedbutton"  class="btn btn-primary">PAY FROM WALLET</a>
            </form>
            <p class="or">
                or
            </p>
            <a href="{{ route('customer.shop')}}"  id="continuebutton" class="btn">CONTINUE SHOPPING</a>
        </center>
        <br>
        <br>
        <br>
        </div>

        </div>
    </div>

    </div>

@stop

@push('js')
<script src="{{ asset('assets/admin/js/custom.js')}}"></script>
<script src="{{ asset('assets/admin/js/toastr.js')}}"></script>
@endpush