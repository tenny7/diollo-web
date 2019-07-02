
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
                                        Agents
                                    </h1>

                                </div>
                                <div class="col-auto">

                                </div>
                            </div>
                            <!-- / .row -->
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Nav -->
                                    <ul class="nav nav-tabs nav-overflow header-tabs">
                                        <li class="nav-item">
                                            <a href="products-all.html" class="nav-link">
                                                All <span class="badge badge-pill badge-soft-secondary">10</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="products-all.html" class="nav-link">
                                                Suspended <span class="badge badge-pill badge-soft-secondary">2</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="products-all.html" class="nav-link active">
                                                Applications <span class="badge badge-pill badge-soft-secondary">23</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('partials.admin.success')
                    @include('partials.admin.error')
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
                                            <a href="#" class="text-muted sort" data-sort="agent-name">
                                              Agent's Name
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="agent-email">
                                              Email
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="agent-phone">
                                              Phone
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="agent-gender">
                                                Gender
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="agent-city">
                                                Street Address
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="agent-city">
                                              City
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="agent-state">
                                              State
                                            </a>
                                        </th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach($applications as $application)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox table-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="productsSelect" id="productsSelectOne">
                                                <label class="custom-control-label" for="productsSelectOne">
                                                    &nbsp;
                                                </label>
                                            </div>
                                        </td>
                                        <td class="agents-name" colspan="2">
                                            {{ $application->user->fullname }}
                                        </td>
                                        <td class="agents-email">
                                                {{ $application->user->email }}
                                        </td>
                                        <td class="agents-phone">
                                                {{ $application->user->phone }}
                                        </td>
                                        <td class="agents-gender">
                                            @if($application->user->gender == 1)
                                            Male 
                                            @else 
                                            Female 
                                            @endif
                                                {{-- {{ $application->user->gender }} --}}
                                        </td>
                                        <td class="agents-street">
                                                {{ $application->user->street }}
                                        </td>
                                        <td class="agents-city">
                                            @php 
                                                $city = \Gerardojbaez\GeoData\Models\City::find($application->user->city_id);
                                            @endphp
                                            {{ $city->name }}
                                                {{-- {{ $application->user->fullname }} --}}
                                        </td>

                                        <td class="agents-state">
                                            @php 
                                                $region = \Gerardojbaez\GeoData\Models\Region::find($application->user->region_id);
                                            @endphp
                                            {{ $region->name }}
                                            {{-- Akwa Ibom State --}}
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
                                                    <a href="#!" class="dropdown-item">
                                                        View Application
                                                    </a>
                                                <a href="{{ route('admin.agents.approve',$application->id)}}" class="dropdown-item">
                                                        Approve Application
                                                    </a>
                                                    <a href="{{ route('admin.agents.reject',$application->id)}}" class="dropdown-item">
                                                        Reject Application
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