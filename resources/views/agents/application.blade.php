@extends('layouts.backend.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8">

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
                                        Application
                                    </h1>
                                    <br>
                                    <!-- Subheading -->
                                    <p class="text-muted mb-1">
                                        Help Passward manage stores, add products and receive a commission
                                    </p>
                                </div>
                            </div>
                            <!-- / .row -->
                            <div class="row align-items-center">
                                <div class="col">
                                    
                                    <!-- Nav -->
                                    <ul class="nav nav-tabs nav-overflow header-tabs">
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form -->
                    <form class="mb-4">

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <!-- name -->
                                <div class="form-group">
                                    <!-- Label -->
                                    <label>
                                        Knowledge of Computer Use
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <!-- name -->
                                <div class="form-group">
                                    <p>{{$application?$application->computer_use:''}}</p>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <!-- name -->
                                <div class="form-group">
                                    <!-- Label -->
                                    <label>
                                        Why are you interested in the position and what are your expectations?
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <!-- name -->
                                <div class="form-group">
                                    <p>{{$application?$application->interest:''}}</p>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <!-- name -->
                                <div class="form-group">
                                    <!-- Label -->
                                    <label>
                                        Why are you interested in the position and what are your expectations?
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <!-- name -->
                                <div class="form-group">
                                    <p>{{$application?$application->interest:''}}</p>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <!-- name -->
                                <div class="form-group">
                                    <!-- Label -->
                                    <label>
                                        How would you find interested vendors for Passward?
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <!-- name -->
                                <div class="form-group">
                                    <p>{{$application?$application->method:''}}</p>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <!-- name -->
                                <div class="form-group">
                                    <!-- Label -->
                                    <label>
                                            What is your BEST way to establish relationship with a vendor?  
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <!-- name -->
                                <div class="form-group">
                                    <p>{{$application?$application->relationship:''}}</p>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <!-- name -->
                                <div class="form-group">
                                    <!-- Label -->
                                    <label>
                                            How would you handle objections from a vendor?
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <!-- name -->
                                <div class="form-group">
                                    <p>{{$application?$application->objection:''}}</p>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <!-- name -->
                                <div class="form-group">
                                    <!-- Label -->
                                    <label>
                                        Passward requires you to capture correct details of vendor items on sale and take good quality photos of the items in store. How would you achieve this? 
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <!-- name -->
                                <div class="form-group">
                                    <p>{{$application?$application->photo:''}}</p>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-5">
                                <!-- name -->
                                <div class="form-group">
                                    <!-- Label -->
                                    <label>
                                            Please choose one – would you rather close a huge sale with a huge commission without recognition or close a small sale that gains you recognition?
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <!-- name -->
                                <div class="form-group">
                                    <p>{{$application?$application->recognition:''}}</p>
                                </div>

                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12 col-md-5">
                                <!-- name -->
                                <div class="form-group">
                                    <!-- Label -->
                                    <label>
                                        Status
                                    </label>
                                </div>
                            </div>
                            <div class="col-12 col-md-7">
                                <!-- name -->
                                <div class="form-group">
                                    <p>
                                        @if ($application)
                                            <span class="badge badge-soft-primary ml-1 mt--1">{{$application?ucwords($application->applicationStatus()):''}}</span>
                                        @endif
                                    </p>
                                </div>

                            </div>
                        </div>
                            

                    </form>

                </div>
            </div>
            <!-- / .row -->
        </div>

    </div>
@endsection