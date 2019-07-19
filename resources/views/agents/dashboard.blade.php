
@extends('layouts.backend.app')
@section('content')
 

<div class="main-content">


    <!-- HEADER -->
    <div class="header">
        <div class="container-fluid">

            <!-- Body -->
            <div class="header-body">
                <div class="row align-items-end">
                    <div class="col">

                        <!-- Pretitle -->
                        
                        <h6 class="header-pretitle">
                            <img src="{{asset('assets/password/images/user.png')}}" alt="" width="60" height="60">
                        @if(Auth::user()->isAgent())
                                   Role: Agent
                                   <br>
                                   {{ Auth::user()->fullname }}
                        @endif
                        </h6>

                        

                        <!-- Title -->
                        <h1 class="header-title">
                            Dashboard
                            @if (Auth::user()->isActive())
                                <span class="badge badge-primary" style="font-size: 14px">Active</span>
                            @elseif (Auth::user()->isInActive())
                                <span class="badge badge-secondary" style="font-size: 14px">Inactive</span>
                            @elseif (Auth::user()->isInActive())
                                <span class="badge badge-warning" style="font-size: 14px">Inactive</span>
                            @endif
                        </h1>
                        @if (Auth::user()->isInActive() || Auth::user()->isBlocked())
                            <p class="text-muted mb-4 mt-4">
                                Your account has been disabled. Kindly contact Passward support to activate your account.
                            </p>
                        @endif

                        

                    </div>
                    
                    <div class="col-auto">

                        <!-- Button -->
                        @if (Auth::user()->isActive())
                            <a href="{{ url('agent/stores/new') }}" class="btn btn-primary">
                                Add Store
                            </a>
                        @endif

                    </div>

                   
                    
                </div>
                <!-- / .row -->
            </div>
            <!-- / .header-body -->

        </div>
    </div>
    <!-- / .header -->

    <!-- CARDS -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6 col-xl">

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    Stores
                                </h6>

                                

                                <!-- Heading -->
                                <span class="h2 mb-0">
                                    {{thousand_format(Auth::user()->agentStores()->count())}}
                                </span>

                                <!-- Badge -->
                                {{-- <span class="badge badge-soft-success mt--1">
                                    +3.5%
                                </span> --}}

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-shopping-cart text-muted mb-0"></span>

                            </div>
                        </div>
                        <!-- / .row -->

                    </div>
                </div>

            </div>
            <div class="col-12 col-lg-6 col-xl">

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="card-title text-uppercase text-muted mb-2">
                                    Products
                                </h6>

                                <div class="row align-items-center no-gutters">
                                    <div class="col-auto">

                                        <!-- Heading -->
                                        <span class="h2 mr-2 mb-0">
                                            {{thousand_format(Auth::user()->agentProducts()->count())}}
                                        </span>

                                    </div>
                                    <div class="col">

                                    </div>
                                </div>
                                <!-- / .row -->

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-box text-muted mb-0"></span>

                            </div>
                        </div>
                        <!-- / .row -->

                    </div>
                </div>

            </div>
            
            
            <div class="col-12 col-lg-6 col-xl">

                <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h6 class="card-title text-uppercase text-muted mb-2">
                  Wallet
                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                                    ₦{{thousand_format(Auth::user()->wallet_balance)}}
                                </span>

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-pocket text-muted mb-0"></span>

                            </div>
                        </div>
                        <!-- / .row -->

                    </div>
                </div>

            </div>
        </div>
        <!-- / .row -->
        <div class="row">
            <div class="col-12 col-xl-12">

                <!-- Orders -->
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h4 class="card-header-title">
                                  Stores
                                </h4>

                            </div>
                            
                        </div>
                        <!-- / .row -->

                    </div>
                    <div class="card-body">

                        <!-- Chart -->
                        <div class="chart">
                            {!! $chart->container() !!}
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- / .row -->

       
    </div>

</div>
@stop
@push('scripts')
        {!! $chart->script() !!}
@endpush