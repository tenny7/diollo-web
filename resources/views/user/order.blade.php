@extends('layouts.frontend.app2')

@push('css')
<link href="https://fonts.googleapis.com/css?family=Literata&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('diollo/assets/css/custom.css') }}">

@endpush

@section('content')

{{-- <div class="top_star">
<img src="{{ asset('assets/password/images/path 41.svg')}}" alt="path star">
    </div> --}}
    {{-- <div class="rotated" style="width: 233px;">
      <i class="fab fa-facebook fa-rotate-360" style="color: #FF3C89;"></i>&nbsp;
      <i class="fab fa-whatsapp fa-rotate-360" style="color: #FF3C89;"></i>&nbsp;
      <i class="fab fa-twitter fa-rotate-360" style="color: #FF3C89;"></i> &nbsp;
      <span class="text-muted cabin">
         Follow us on social media </span>
      <span class="run-through"></span>
    </div> --}}

    <div class="container">
      <h1 class="text-center" style="font-weight: bolder;">Orders</h1>
     <div class="row push-margin-top">
       @include('partials.diollo.sidebar')
      @include('partials.admin.success')
      @include('partials.admin.error')
      <div class="col-md-8">
        <h3>My Orders</h3>
        
        
        <div class="row">
          <div class="col-md-8 col-sm-8 offset-md-4">
              <h4>Orders</h4>
          </div>
          
        </div>
        <hr>
        
        <div class="whole-table">
          {{-- <form action="{{ route('pay')}}" method="post"> --}}
          {{-- @csrf --}}
          
          <table class="table table-hover table-bordered table-card table-condensed">
            <thead>
              <th>S/N</th>
              <th width="30%">Customer Name</th>
              {{-- <th width="20%">Shop</th> --}}
              <th width="30%">Total Amount</th>
              <th width="20%">Action</th>
            {{-- <th width="20%">Buyer</th> --}}
              
              
            </thead>
              
              @foreach($orders as $order)
                 {{-- {{dd($order)}} --}}
              <tr>
                <td>
                  {{ $order->id }}
                </td>
               

                <td>
                  {{$order->user->fullname }}
                </td>
                {{-- @php 
                  $store = \App\Models\Store::where('id',$order->store_id)->first(); 
                @endphp
                <td>
                      {{ $store->name }}
                </td> --}}
                <td>
                     <span class="badge badge-info">₦ {{ number_format($order->total,2) }}</span> 
                </td>
                <td>
                <a href="{{ route('orders.orderList',$order->id)}}" class="btndetails btn-edit btn btn-success btn-sm" 
                 >View Details</a>
                </td>
                {{-- <td>
                  {{Auth::user()->fullname }}
                </td> --}}
                
                
              </tr>
              @endforeach
            </tbody>
           
      
          
          </table>

          {{-- <button type="submit" class="btn btn-success btn-md btn-block" style="border-radius:25px;">Checkout</button> --}}
        {{-- </form> --}}

          
{{-- start row --}}
{{-- @foreach($orders as $order)
<ul> 
  <li><a href=""># {{ $order->id }} </a> </li> 
</ul> 
<div class="row" style="border:solid #555 1px;">
         <div class="row" style="border-bottom: 1px solid #ccc;">
            <div class="col-md-2">Orders</div>
            <div class="col-md-2">112A66668</div>
            <div class="col-md-2">12-10-2018</div>
            <div class="col-md-2">Total: N90,999</div>
            <div class="col-md-2" id="completed">Completed</div>
            <div class="col-md-2">View Details <span class="caret sr-only"></span></div>
        </div>  
         <div class="row" >
          <div class="col-md-2">
              <div class="col-md-12" style="padding: 10px;">Order</div>
              <div class="col-md-12" style="padding: 10px;">Product</div>
              <div class="col-md-12" style="padding: 10px; padding-top: 30px;">Sold by</div>
              <div class="col-md-12" style="padding: 10px;">Buyer</div>
              <div class="col-md-12" style="padding: 10px;">Payment</div>
          </div>
          <div class="col-md-9" style="border-left: 1px solid #ccc;">
            <div class="row">
              <div class="col-md-8">
                  <div class="row" style="padding: 10px;">
                  <div class="col-md-4" id="essential">{{ $orderProduct->id }}</div>
                  <div class="col-md-4">{{ $orderProduct->created_at}}</div>
                  <div class="col-md-4"><span id="essential">{{ $orderProduct->price }}</span></div>
                  </div>
                  <div class="row" style="padding: 10px;">
                    <div class="col-md-12">iPhone Xs pro with Air shield technology 5-Inch QHD (1.5GB, 8GB ROM) 8MP + … Dual SIM 4G Smartphone</div>
                  </div>
                  <div class="row" style="padding: 10px;">
                    <div class="col-md-12">SLOT, Oron Road, Uyo, Nigeria</div>
                  </div>
                  <div class="row">
                    <div class="col-md-12" style="padding: 10px;">David Ofiare, Shelter Afrique, Uyo, Nigeria</div>
                  </div>
                  <div class="row">
                    <div class="col-md-12" style="padding: 10px;">Paystack</div>
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="row" style="padding: 10px;">
                    <div class="col-md-6">Pending</div>
                    <div class="col-md-6" id="view-details">View Details</div>
                  </div>
                  <div class="row" style="padding: 10px;">
                      <div class="col-md-6"><img src="{{ asset('assets/password/admin/images/hitcase-pro-for-iphone-x-case-13904579.jpg')}}" style="height: 60px;" class="img-responsive img-fluid" alt="iPhone case"></div>
                      <div class="col-md-6">N30,999</div>
                  </div>
              </div>
              <div class="col-md-12">
                <div class="row" style="display: flex; justify-content: flex-end;">
                  
                </div>
              </div>
          </div>
      </div>
      </div> 
</div>
@endforeach --}}
<br>
<br>
{{-- end row --}}



      {{-- </div> --}}
           {{-- <div class="other-table">
            <div class="row">
              <div class="col-md-2">Orders</div>
              <div class="col-md-2" id="essential">112A66678</div>
              <div class="col-md-2">12-10-2018</div>
              <div class="col-md-2">Total: <span id="essential">N10,999</span></div>
              <div class="col-md-2" id="cancelled">Cancelled</div>
              <div class="col-md-2" id="view-details">View Details</div>
            </div>
          </div>  --}}
     </div>
   </div>
 </div>


@stop