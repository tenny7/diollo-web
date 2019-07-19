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
                      Products
                    </h1>

                                </div>
                                <div class="col-auto">
                                    

                                </div>
                            </div>
                            <!-- / .row -->
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Nav -->
                                    @include('partials.admin.tab')

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
                                                <button class="dropdown-item admindeleteProductAction" id="admindeleteProductAction">Delete</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- / .row -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm table-nowrap card-table" id="tableId">
                            <!-- <table class="table table-sm card-table"> -->
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-control custom-checkbox table-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="productsSelect" id="productsSelectAll">
                                                select
                            &nbsp;
                          </label>
                                            </div>
                                        </th>
                                        <th colspan="2">
                                            <a href="#" class="text-muted sort" data-sort="products-product">
                                              Product
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="products-code">
                                              Code
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="products-brand">
                                              Brand
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="products-price">
                                              Price
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="products-dprice">
                                              Discount Price
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="products-quantity">
                                              Quantity
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="products-category">
                                              Category
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="products-vendor">
                                              Vendor
                                            </a>
                                        </th>

                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="products-date">
                                              Date
                                            </a>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                        {{-- {{ dd($products)}} --}}
                                        @foreach($products as $product)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox table-checkbox">
                                                        <input type="checkbox" class="productIDs" value="{{ $product->id }}" name="product[]" id="productId">
                                                </div>
                                            </td>
                                            <td class="products-product" colspan="2">
                                                {{ $product->name }}
                                            </td>
                                            <td class="products-code">
                                                {{ $product->code }}
                                            </td>
                                            <td class="products-brand">
                                                {{ $product->brand }}
                                            </td>
                                            <td class="products-price">
                                                {{ $product->original_price }}
                                            </td>
    
                                            <td class="products-dprice">
                                                {{ $product->discount_price }}
                                            </td>
                                            <td class="products-quantity">
                                                {{ $product->qty }}
                                            </td>
                                            <td class="products-category">
                                                @foreach($product->categories as $category)
                                                    {{ $category->name }}
                                                @endforeach
                                            </td>
                                            <td class="products-vendor">
                                                {{-- @foreach($product->store as $store) --}}
                                                @php 
                                                    $store = \App\Models\Store::where('id',$product->store)->first();
                                                @endphp
                                                {{ $store->name }}
                                                {{-- @endforeach --}}
                                            </td>
                                            <!-- <td class="orders-status">
                                                <div class="badge badge-soft-success">
                                                    Shipped
                                                </div>
                                            </td> -->
    
                                            <td class="orders-date">
                                                {{-- <time datetime="2018-07-30">07/30/18</time> --}}
                                                {{ $product->created_at->diffForHumans() }}
                                            </td>
    
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-boundary="window">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#!" class="dropdown-item">
                                                          View Product
                                                        </a>
                                                    <a href="{{ route('vendor.products.updateForm', $product->slug) }}" class="dropdown-item">
                                                          Edit Product
                                                        </a>
                                                    <a href="{{ route('vendor.products.addFeatured',$product->slug) }}" class="dropdown-item">
                                                          Add to featured
                                                        </a>
                                                        <a href="{{ route('vendor.products.addClearance',$product->slug) }}" class="dropdown-item">
                                                          Add to Clearance Sales
                                                        </a>
                                                        <a href="{{ route('vendor.products.delete',$product->slug) }}" class="dropdown-item">
                                                          Delete Product
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                        <div class="card-footer">
                            <div class="row align-items-center">
                                <!-- <div class="col">



                                </div> -->
                                <div class="col-auto" style="height:33px">

                                    <!-- Button -->

                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination pagination-sm">
                                            <li class="page-item"><a class="page-link" href="#!">Previous</a></li>
                                            <li class="page-item"><a class="page-link" href="#!">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#!">Next</a></li>
                                        </ul>
                                    </nav>

                                </div>
                            </div>
                            <!-- / .row -->
                        </div>
                    </div>

                </div>
            </div>
            <!-- / .row -->
        </div>

    </div>
@endsection


@push('scripts')
<script src="{{ asset('assets/admin/js/custom.js')}}"></script>
<script src="{{ asset('assets/admin/js/toastr.js')}}"></script>
@endpush