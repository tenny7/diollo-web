@extends('layouts.frontend.app2')



@push('css')
<link href="https://fonts.googleapis.com/css?family=Literata&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('diollo/assets/css/custom.css') }}">

@endpush
@section('content')


<div class="container">
  <div class="row push-margin-top-product"></div>
<div class="table-responsive">
    <table class="table table-sm table-nowrap table-card card-table">
      <thead>
        <tr>
          <th>
            <div class="custom-control custom-checkbox table-checkbox">
              <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectAll">
              <label class="custom-control-label" for="ordersSelectAll">
                &nbsp;
              </label>
            </div>
          </th>
          <th>
            <a href="#" class="text-muted sort" data-sort="sales-onumber">
              Order
            </a>
          </th>
            <th colspan="2">
                <a href="#" class="text-muted sort" data-sort="sales-user">
                    Customer
                </a>
            </th>
            <th colspan="2">
                <a href="#" class="text-muted sort" data-sort="sales-product">
                Products
                </a>
            </th>
          <th>
            <a href="#" class="text-muted sort" data-sort="sales-date">
              Date
            </a>
          </th>
          <th>
              <a href="#" class="text-muted sort" data-sort="sales-date">
                Quantity
              </a>
            </th>
          <th>
            <a href="#" class="text-muted sort" data-sort="sales-total">
              Price(per unit)
            </a>
          </th>
          <th>
            <a href="#" class="text-muted sort" data-sort="sales-status">
              Status
            </a>
          </th>
          <th>
            <a href="#" class="text-muted sort" data-sort="sales-method">
              Payment method
            </a>
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach($orderProducts as $orderProduct)
        @php 
          $orders = \App\Models\Order::where('user_id',Auth::id())->get();
        //   dd($orders);
        //   $order_data =[];
          foreach($orders as $order)
          {
            $data['id'] = $order->id;
            $data['name'] = $order->user->fullname;
            $data['created_at'] = $order->created_at;
            $data_orders = collect($order->products);
            // dd($data_orders);
          }
        //   dd($data_orders);
        @endphp
        

        <tr>
          <td>
            <div class="custom-control custom-checkbox table-checkbox">
              <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectOne">
              <label class="custom-control-label" for="ordersSelectOne">
                &nbsp;
              </label>
            </div>
          </td>
          <td class="sales-onumber">
            # {{ $data['id'] }}
          </td>
          <td colspan="2" class="sales-user">
             {{-- {{ $orderProduct->user->fullname }} --}}
             {{ $data['name'] }}
          </td>
          <td colspan="2" class="sales-product">
            @php 
              foreach($data_orders as $product)
              {
                // dd($product->name);
                // dd($product->pivot->price);
                $data['name'] = $product->name;
                $data['created_at'] = $product->created_at;
                $data['price'] = $product->discount_price;
                $data['status'] = $product->status;
              }
            @endphp
              {{ $data['name'] }}
              {{-- {} --}}
          </td>
          <td class="sales-date">
            <time datetime="2018-07-30">
              {{ $data['created_at'] }}
            </time>
          </td>
          <td>
            {{ $orderProduct->qty }}
          </td>
          <td class="sales-total">
            {{-- N {{ $order->total }} --}}
            @php 
              $order = \App\Models\Order::where('id',$orderProduct->order_id)->first();
            @endphp
            {{-- N {{ number_format($order->total,2) }}  --}}
            ₦ {{ number_format($orderProduct->price,2) }}
          </td>
          <td class="sales-status">
            Paid
              {{-- @if($orderProduct->isReserved())
              <div class="badge badge-soft-success">
              Reserved
              </div>
              @endif
              @if($orderProduct->isReturned())
              <div class="badge badge-soft-warning">
              Returned
              </div>
              @endif
              @if($orderProduct->isDelivered())
              <div class="badge badge-soft-primary">
              Delivered
              </div>
              @endif --}}
              {{-- @if($data['status'] == 1) --}}
                
              {{-- @endif --}}
              {{-- {{  }} --}}
            
          </td>
          <td class="sales-method">
            Debit Card
          </td>
          <td class="text-right">
            <div class="dropdown">
              <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-boundary="window">
                <i class="fe fe-more-vertical"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="#!" class="dropdown-item">
                  View Invoice
                </a>
              <a href="{{ route('admin.orders.markReturned', $orderProduct->id)}}" class="dropdown-item"> 
                  Mark as Returned
                </a>
               <a href="{{ route('admin.orders.markReserved', $orderProduct->id)}}" class="dropdown-item">
                  Mark as Reserved
               </a>
              </div>
            </div>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</div>

@stop