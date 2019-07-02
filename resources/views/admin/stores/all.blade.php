@extends('layouts.backend.app')
{{-- @push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.css') }}">
@endpush --}}
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
                                        Stores
                                    </h1>

                                </div>
                                <div class="col-auto">
                                <a href="{{route('admin.stores.new')}}" class="btn btn-primary">
                                        New Store
                                    </a>
                                </div>
                            </div>
                            <!-- / .row -->
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Nav -->
                                    <ul class="nav nav-tabs nav-overflow header-tabs">
                                        <li class="nav-item">
                                            <a href="products-all.html" class="nav-link active">
                                              All <span class="badge badge-pill badge-soft-secondary">823</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="products-all.html" class="nav-link">
                                                Complete <span class="badge badge-pill badge-soft-secondary">700</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="products-all.html" class="nav-link">
                                                Incomplete <span class="badge badge-pill badge-soft-secondary">123</span>
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
                                            <button class="dropdown-item deleteAction" id="deleteAction">Delete</button>
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
                                                checkbox
                                            </div>
                                        </th>
                                        <th colspan="2">
                                            <a href="#" class="text-muted sort" data-sort="stores-name">
                                              Store
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="stores-email">
                                              Email
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="stores-phone">
                                              Phone
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="stores-city">
                                              City
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="stores-state">
                                              State
                                            </a>
                                        </th>
                                       
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="vendors-name">
                                              Vendor
                                            </a>
                                        </th>

                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="vendors-contactphone">
                                                Vendor Phone
                                            </a>
                                        </th>

                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="stores-status">
                                                Status
                                            </a>
                                        </th>

                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="stores-registration">
                                                Registration
                                            </a>
                                        </th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach($stores as $store)
                                    <tr>
                                        <td>
                                            {{-- <input type="checkbox" name="service_sel[]" value="{{ $service->id}}"  class="service_sel"> --}}
                                            {{-- <div class="custom-control custom-checkbox table-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="{{ $store->id }}" name="storeId[]" id="storeSelected">
                                                <label class="custom-control-label" for="productsSelectOne">
                                                    &nbsp;
                                                </label>
                                            </div> --}}
                                            <div class="custom-control custom-checkbox table-checkbox">
                                                   
                                            <input type="checkbox" class="storeIDs" value="{{ $store->id }}" name="store[]" id="storeId">
                                                    
                                                </div>
                                        </td>
                                        <td class="stores-name" colspan="2">
                                                {{ $store->name }}
                                        </td>
                                        <td class="stores-email">
                                                {{ $store->email }}
                                        </td>
                                        <td class="stores-phone">
                                                {{ $store->phones }}
                                        </td>
                                        <td class="stores-city">
                                            @if(isset($store->city_id))
                                                @php 
                                                    $storeCity = \Gerardojbaez\GeoData\Models\City::where('id', $store->city_id)->first();
                                                @endphp
                                            
                                                {{ $storeCity->name }}
                                            @endif
                                        </td>

                                        <td class="stores-state">
                                            @php 
                                                $storeRegion = \Gerardojbaez\GeoData\Models\Region::where('id', $store->region_id)->first();
                                            @endphp
                                                {{ $storeRegion->name }}
                                        </td>
                                        <td class="vendors-contactname">
                                            Christian Jombo
                                        </td>
                                        {{-- <td class="vendors-contactemail">
                                            chris@codekago.com
                                        </td> --}}
                                        <td class="vendors-contactphone">
                                            080666128880
                                        </td>
                                        <td class="vendors-status">
                                            <div class="badge badge-soft-danger">
                                                suspended
                                            </div>
                                        </td>
                                        <td class="vendors-status">
                                            <div class="badge badge-soft-success">
                                                complete
                                            </div>
                                        </td>

                                        <!-- <td class="orders-status">
                                            <div class="badge badge-soft-success">
                                                Shipped
                                            </div>
                                        </td> -->

                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-boundary="window">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                <a href="{{ route('admin.stores.view') }}" class="dropdown-item">
                                                        View Store
                                                    </a>
                                                <a href="{{ route('admin.stores.showUpdateForm',$store->id)}}" class="dropdown-item">
                                                        Edit Store
                                                    </a>
                                                <a href="{{ route('admin.vendors.new',$store->id) }}" class="dropdown-item">
                                                        Add Vendor
                                                    </a>
                                                    <a href="{{ route('admin.agents.new',$store->id) }}" class="dropdown-item">
                                                        Add Agent
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

{{-- @push('scripts')
<script src="{{ asset('assets/admin/js/custom.js')}}"></script>
<script src="{{ asset('assets/admin/js/toastr.js')}}"></script>
@endpush --}}