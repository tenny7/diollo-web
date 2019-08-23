@extends('layouts.frontend.app2')

@push('css')
<link href="https://fonts.googleapis.com/css?family=Literata&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('diollo/assets/css/custom.css') }}">

@endpush

@section('content')


    <div class="container">
      <h1 class="text-center" style="font-weight: bolder;">Orders</h1>
     <div class="row push-margin-top">
       @include('partials.diollo.sidebar')
      @include('partials.admin.success')
      @include('partials.admin.error')
      <div class="col-md-8">
        <h3 class="h3-margin-top">My Orders</h3>
        
        
        <div class="row">
          <div class="col-md-8 col-sm-8 offset-md-4">
              <h4>Orders</h4>
          </div>
          
        </div>
        <hr>
        
        <div class="whole-table">
          {{-- <form action="{{ route('pay')}}" method="post"> --}}
          {{-- @csrf --}}
          <div class="table-responsive">
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
          </div>

         
     </div>
   </div>
 </div>


@stop