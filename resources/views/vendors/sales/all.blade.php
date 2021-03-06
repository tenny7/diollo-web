@extends('layouts.backend.app')
@section('content')
    <div class="main-content">

        

      <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12">

            <!-- Header -->
            <div class="header mt-md-5">
              <div class="header-body">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                      Overview
                    </h6>

                    <!-- Title -->
                    <h1 class="header-title">
                      Sales
                    </h1>

                  </div>
                  <div class="col-auto">

                    <!-- Button -->
                    <!-- <a href="#" class="btn btn-primary">
                      New order
                    </a> -->

                  </div>
                </div> <!-- / .row -->
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Nav -->
                    <ul class="nav nav-tabs nav-overflow header-tabs">
                      <li class="nav-item">
                        <a href="sales-all.html" class="nav-link active">
                        All <span class="badge badge-pill badge-soft-secondary">{{ count($orderProducts) }}</span>
                        </a>
                      </li>
                     
                    </ul>

                  </div>
                </div>
              </div>
            </div>

            <!-- Card -->
            <div class="card" data-toggle="lists" data-lists-values="[&quot;orders-order&quot;, &quot;orders-product&quot;, &quot;orders-date&quot;, &quot;orders-total&quot;, &quot;orders-status&quot;, &quot;orders-method&quot;]">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">

                    <!-- Search -->
                    <form class="row align-items-center">
                      <div class="col-auto pr-0">
                        <span class="fe fe-search text-muted"></span>
                      </div>
                      <div class="col">
                          <input type="search" class="form-control form-control-flush search" placeholder="Search">
                      </div>
                    </form>

                  </div>
                  <div class="col-auto">

                    <!-- Button -->

                    <div class="dropdown">
                      <button class="btn btn-sm btn-white dropdown-toggle" type="button" id="bulkActionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bulk action
                      </button>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bulkActionDropdown">
                          <button class="dropdown-item admindeleteOrderAction" id="admindeleteOrderAction">Delete</button>
                      </div>
                    </div>

                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="table-responsive">
                <table class="table table-sm table-nowrap card-table">
                  <thead>
                    <tr>
                      <th>
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectAll">
                          select
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
                    @if(isset($orderProducts))
                      @foreach($orderProducts as $orderProduct)
                      @php 
                        $order = \App\Models\Order::find($orderProduct->order_id);
                      @endphp
          
                      <tr>
                        <td>
                          <div class="custom-control custom-checkbox table-checkbox">
                              <input type="checkbox" class="orderIDs" value="{{ $order->id }}" name="order[]" id="orderId">

                          </div>
                        </td>
                        <td class="sales-onumber">
                          # {{ $order->id }}
                        </td>
                        <td colspan="2" class="sales-user">
                           {{ $order->user->fullname }}
                        </td>
                        <td colspan="2" class="sales-product">
                          @php 
                            foreach($order->products as $product)
                            {
                              // dd($product->pivot->price);
                              $data['name']       = $product->name;
                              $data['created_at'] = $product->created_at;
                              $data['price']      = $product->pivot->price;
                              $data['status']     = $product->status;
                            }
                          @endphp
                            {{ $data['name'] }}
                            {{-- {} --}}
                        </td>
                        <td class="sales-date">
                          <time datetime="2018-07-30">
                            {{ $order->created_at}}
                          </time>
                        </td>
                        <td class="sales-total">
                          {{-- N {{ $order->total }} --}}
                          {{-- $data['price'] --}}
                          {{ number_format($orderProduct->price,2) }}
                        </td>
                        <td class="sales-status">
                          
                            @if($order->isReserved())
                            <div class="badge badge-soft-success">
                            Reserved
                            </div>
                            @endif
                            {{-- @if($order->isReturned())
                            <div class="badge badge-soft-warning">
                            Returned
                            </div>
                            @endif --}}
                            @if($order->isPaid())
                            <div class="badge badge-soft-primary">
                            Paid
                            </div>
                            @endif
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
                            {{-- <a href="{{ route('admin.orders.markReturned', $order->id)}}" class="dropdown-item"> 
                                Mark as Returned
                              </a> --}}
                             <a href="{{ route('vendor.sales.markReserved', $order->id)}}" class="dropdown-item">
                                Mark as Reserved
                             </a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div> <!-- / .row -->
      </div>

    </div>
@endsection

@push('scripts')
<script src="{{ asset('assets/admin/js/custom.js')}}"></script>
<script src="{{ asset('assets/admin/js/toastr.js')}}"></script>
@endpush