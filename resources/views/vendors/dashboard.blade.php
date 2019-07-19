
@extends('layouts.backend.app')
@section('content')
<div class="main-content">


    


    <!-- HEADER -->
    <div class="header">
        <div class="container-fluid">
            <br>
                @include('partials.admin.warning')
            <!-- Body -->
            <div class="header-body">
                <div class="row align-items-end">
                    <div class="col">

                        <!-- Pretitle -->
                        <h6 class="header-pretitle">
                            <img src="{{asset('assets/password/images/user.png')}}" alt="" width="60" height="60">
                            @if(Auth::user()->isVendor())
                                        Role: Vendor
                                        <br>
                                        {{ Auth::user()->fullname }}
                            @endif
            </h6>

                        <!-- Title -->
                        <h1 class="header-title">
              Dashboard
            </h1>

                    </div>
                    <div class="col-auto">

                        <!-- Button -->
                        <a href="#!" class="btn btn-primary">
              Create Report
            </a>

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
                  Sales
                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                  ₦24,500
                </span>

                                <!-- Badge -->
                                <span class="badge badge-soft-success mt--1">
                  +3.5%
                </span>

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
                  Rating
                </h6>

                                <!-- Heading -->
                                <span class="h2 mb-0">
                  4.55
                </span>

                                <!-- Badge -->
                                <span class="badge badge-soft-danger mt--1">
                  -0.5%
                </span>

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-activity text-muted mb-0"></span>

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
                  Returns
                </h6>

                                <div class="row align-items-center no-gutters">
                                    <div class="col-auto">

                                        <!-- Heading -->
                                        <span class="h2 mr-2 mb-0">
                      0
                    </span>

                                    </div>
                                    <div class="col">

                                        <!-- Progress -->
                                        <!-- <div class="progress progress-sm">
                      <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> -->

                                    </div>
                                </div>
                                <!-- / .row -->

                            </div>
                            <div class="col-auto">

                                <!-- Icon -->
                                <span class="h2 fe fe-rotate-ccw text-muted mb-0"></span>

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
            <div class="col-12 col-xl-8">

                <!-- Orders -->
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h4 class="card-header-title">
                                  Orders
                                </h4>

                            </div>
                            <div class="col-auto mr--3">

                                <!-- Caption -->
                                <span class="text-muted">
                                  Show Returns:
                                </span>

                            </div>
                            <div class="col-auto">

                                <!-- Toggle -->
                                <div class="custom-control custom-checkbox-toggle">
                                    <input type="checkbox" class="custom-control-input" id="cardToggle" data-toggle="chart" data-target="#ordersChart" data-add="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[15,10,20,12,7,0,8,16,18,16,10,22],&quot;backgroundColor&quot;:&quot;#d2ddec&quot;,&quot;label&quot;:&quot;Affiliate&quot;}]}}">
                                    <label class="custom-control-label" for="cardToggle"></label>
                                </div>

                            </div>
                        </div>
                        <!-- / .row -->

                    </div>
                    <div class="card-body">

                        <!-- Chart -->
                        <div class="chart"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="ordersChart" class="chart-canvas chartjs-render-monitor" height="600" width="1374" style="display: block; height: 300px; width: 687px;"></canvas>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-12 col-xl-4">

                <!-- Devices -->
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h4 class="card-header-title">
                                  Categories
                                </h4>

                            </div>
                            <div class="col-auto">

                                <!-- Tabs -->
                                <ul class="nav nav-tabs nav-tabs-sm card-header-tabs">
                                    <li class="nav-item" data-toggle="chart" data-target="#devicesChart" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[60,25,15]}]}}">
                                        <a href="#" class="nav-link active" data-toggle="tab">
                                          All
                                        </a>
                                    </li>
                                    <li class="nav-item" data-toggle="chart" data-target="#devicesChart" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[15,45,20]}]}}">
                                        <a href="#" class="nav-link" data-toggle="tab">
                                          Direct
                                        </a>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <!-- / .row -->

                    </div>
                    <div class="card-body">

                        <!-- Chart -->
                        <div class="chart chart-appended"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="devicesChart" class="chart-canvas chartjs-render-monitor" data-target="#devicesChartLegend" height="482" width="614" style="display: block; height: 241px; width: 307px;"></canvas>
                        </div>

                        <!-- Legend -->
                        <div id="devicesChartLegend" class="chart-legend"><span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #2C7BE5"></i>Desktop</span><span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #A6C5F7"></i>Tablet</span><span class="chart-legend-item"><i class="chart-legend-indicator" style="background-color: #D2DDEC"></i>Mobile</span></div>

                    </div>
                </div>

            </div>
        </div>
        <!-- / .row -->

       
    </div>

</div>
@endsection
