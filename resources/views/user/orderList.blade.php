@extends('layouts.frontend.app')

@section('content')
<br>
<br>
<br>
<br>
<br>

<div class="container">
<div class="table-responsive">
    <table class="table table-sm table-nowrap card-table">
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
            <a href="#" class="text-muted sort" data-sort="sales-total">
              Price
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
      <tbody class="list">
        @foreach($orderProducts as $orderProduct)
        @php 
          $orders = \App\Models\Order::where('user_id',Auth::id())->get();
        //   dd($orders);
        //   $order_data =[];
          foreach($orders as $order)
          {
            $data['name'] = $order->user->fullname;
            $data['created_at'] = $order->created_at;
            $data_orders = collect($order->products);
            // dd($data['products']);
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
            # {{ $orderProduct->id }}
          </td>
          <td colspan="2" class="sales-user">
             {{-- {{ $orderProduct->user->fullname }} --}}
             {{ $data['name'] }}
          </td>
          <td colspan="2" class="sales-product">
            @php 
              foreach($data_orders as $product)
              {
                // dd($product->pivot->price);
                $data['name'] = $product->name;
                $data['created_at'] = $product->created_at;
                $data['price'] = $product->price;
                $data['status'] = $product->status;
              }
            @endphp
              {{-- {{ $data['name'] }} --}}
              {{-- {} --}}
          </td>
          <td class="sales-date">
            <time datetime="2018-07-30">
              {{-- {{ $orderProduct->created_at->diffForHumans() }} --}}
            </time>
          </td>
          <td class="sales-total">
            {{-- N {{ $order->total }} --}}
            {{ $data['price'] }} 
            {{-- {{ $orderProduct->price }} --}}
          </td>
          <td class="sales-status">
            
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
            Card
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