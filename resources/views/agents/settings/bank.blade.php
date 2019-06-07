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
                      Settings
                    </h1>

                                </div>
                            </div>
                            <!-- / .row -->
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Nav -->
                                    <ul class="nav nav-tabs nav-overflow header-tabs">
                                        <li class="nav-item">
                                            <a href="#!" class="nav-link">
                                              Profile
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#!" class="nav-link">
                                              Password
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#!" class="nav-link active">
                                              Bank
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form -->
                    @include('partials.admin.success')
                    @include('partials.admin.error')
                <form class="mb-4" method="post" action="{{ route('agent.settings.saveBank') }}">
                    @csrf
                        <div class="row">
                            <div class="col-12">

                                <!-- name -->
                                <div class="form-group">

                                    <!-- Bank Name -->
                                    <div class="form-group">

                                        <!-- Label -->
                                        <label>
                                          Bank
                                        </label>

                                        <!-- Input -->
                                        <select name="bank" class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option data-select2-id="3">Select Bank</option>
                                            @foreach($banks as $bank)
                                                <option value="{{ $bank->bank }}">{{ $bank->bank}}</option>
                                        
                                            @endforeach
                                           
                                        </select>

                                    </div>

                                </div>

                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Account Number -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Account Number
                                    </label>

                                    <!-- Input -->
                                <input type="text" name="account_number" value="{{ $user->account_number }}" class="form-control">

                                </div>

                            </div>

                            <div class="col-12 col-md-6">

                                <!-- Account Name -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Account Name
                                    </label>

                                    <!-- Input -->
                                    <input type="text" name="account_name" value="{{ $user->account_name }}" class="form-control">

                                </div>

                            </div>



                        </div>
                        <!-- / .row -->

                        <!-- Divider -->
                        <hr class="mt-4 mb-5">

                        <!-- Submit -->
                        <button type="submit" class="btn btn-primary">
                            Update bank details
                        </button>

                    </form>

                </div>
            </div>
            <!-- / .row -->
        </div>

    </div>
    @endsection