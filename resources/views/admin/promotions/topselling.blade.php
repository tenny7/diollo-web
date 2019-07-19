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
                                       Top selling  Promotions
                                    </h1>

                                </div>
                                <div class="col-auto">
                                <a href="{{route('admin.promotions.new')}}" class="btn btn-primary">
                                        New Promotion
                                    </a>
                                </div>
                            </div>
                            <!-- / .row -->
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Nav -->
                                    @include('partials.admin.promotab')
                                    {{-- <ul class="nav nav-tabs nav-overflow header-tabs">
                                        <li class="nav-item">
                                            <a href="products-all.html" class="nav-link">
                                              All <span class="badge badge-pill badge-soft-secondary">823</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="products-all.html" class="nav-link">
                                                Active <span class="badge badge-pill badge-soft-secondary">700</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="products-all.html" class="nav-link active">
                                                Complete <span class="badge badge-pill badge-soft-secondary">123</span>
                                            </a>
                                        </li>

                                    </ul> --}}

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
                                            <a class="dropdown-item" href="#!">Action</a>
                                            <a class="dropdown-item" href="#!">Another action</a>
                                            <a class="dropdown-item" href="#!">Something else here</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- / .row -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm table-nowrap card-table">
                            <!-- <table class="table table-sm card-table"> -->
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-control custom-checkbox table-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="productsSelect" id="productsSelectAll">
                                                <label class="custom-control-label" for="productsSelectAll">
                                                    &nbsp;
                                                </label>
                                            </div>
                                        </th>
                                        <th colspan="2">
                                            <a href="#" class="text-muted sort" data-sort="stores-name">
                                              Store
                                            </a>
                                        </th>
                                       
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="stores-state">
                                              State
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="store-start">
                                                Started
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="store-start">
                                                End date
                                            </a>
                                        </th>
                                       

                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="stores-status">
                                                Status
                                            </a>
                                        </th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                        @foreach($promotions as $promotion)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox table-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="productsSelect" id="productsSelectOne">
                                                    <label class="custom-control-label" for="productsSelectOne">
                                                        &nbsp;
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="stores-name" colspan="2">
                                                @php 
                                                    $store = \App\Models\Store::find($promotion->store_id);
                                                @endphp
                                               {{ $store->name }}
                                            </td>
                                            {{-- <td class="stores-email">
                                                {{ $promotion->email }}
                                            </td>
                                            <td class="stores-phone">
                                                {{ $promotion->phone }}
                                            </td> --}}
    
                                            <td class="stores-state">
                                                @php 
                                                    $region = \Gerardojbaez\GeoData\Models\Region::find($promotion->region_id);
                                                @endphp
                                                {{ $region->name }}
                                            </td>
                                            <td class="stores-start">
                                                {{date('F j, Y', strtotime($promotion->started)) }}
                                            </td>

                                            <td class="stores-duration">
                                                    {{date('F j, Y', strtotime($promotion->end_date)) }}
                                            </td>
                                            {{-- <td class="vendors-contactemail">
                                                chris@codekago.com
                                            </td> --}}
                                            {{-- <td class="stores-impressions">
                                                {{ $promotion->impressions }}
                                            </td>
                                            <td class="stores-views">
                                                {{ $promotion->views }}
                                            </td> --}}
                                            @if($promotion->isActive())
                                            <td class="stores-status">
                                                <div class="badge badge-soft-success">
                                                    active
                                                </div>
                                            </td>
                                            @endif
                                            @if($promotion->isInactive())
                                            <td class="stores-status">
                                                <div class="badge badge-soft-danger">
                                                    suspended
                                                </div>
                                            </td>
                                            @endif
                                            @if($promotion->isCompleted())
                                            <td class="stores-status">
                                                <div class="badge badge-soft-primary">
                                                    completed
                                                </div>
                                            </td>
                                            @endif
    
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-boundary="window">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="{{ route('admin.promotions.showUpdateForm', $promotion->id )}}" class="dropdown-item">
                                                            Edit Promotion
                                                        </a>
                                                    <a href="{{ route('admin.promotions.completed', $promotion->id )}}" class="dropdown-item">
                                                            Mark as Complete
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