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
                                            <a href="{{route('agent.settings.profile')}}" class="nav-link active">
                                              Profile
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('agent.settings.password')}}" class="nav-link">
                                              Password
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('agent.settings.bank')}}" class="nav-link">
                                              Bank
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>

                    @include('partials.admin.success')
                    @include('partials.admin.error')
                    <!-- Form -->
                <form class="mb-4" method="post" action="{{ route('agent.settings.add') }}">
                    @csrf
                        <div class="row">
                            <div class="col-12 col-md-6">

                                <!-- name -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      First Name
                                    </label>

                                    <!-- Input -->
                                    <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}">

                                </div>

                            </div>
                            <div class="col-12 col-md-6">

                                <!-- name -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Last Name
                                    </label>

                                    <!-- Input -->
                                <input type="text" name="last_name" class="form-control" value="{{ $user->last_name }}">

                                </div>

                            </div>
                            <div class="col-12 col-md-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Phone
                                    </label>

                                    <!-- Input -->
                                    <input type="text" name="phone" class="form-control mb-3" placeholder="(+234)_______-____" data-mask="(+234) 00000000000" autocomplete="off" maxlength="18" value="{{ $user->phone }}">

                                </div>

                            </div>

                            <div class="col-12 col-md-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Email
                                    </label>

                                    <!-- Input -->
                                    <input type="text" value="{{ $user->email }}" name="email" class="form-control">

                                </div>

                            </div>
                            <div class="col-12">

                                <!-- Email address -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="mb-1">
                                     Street Address
                                    </label>

                                    <!-- Form text -->
                                    <!-- <small class="form-text text-muted">
                                      This contact will be shown to others publicly, so choose it carefully.
                                    </small> -->

                                    <!-- Input -->
                                    <textarea name="street" placeholder="Enter street your address" class="form-control">{{ $user->street }}</textarea>

                                </div>

                            </div>

                            <div class="col-12 col-md-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Gender
                                    </label>

                                    <!-- Input -->
                                    <select name="gender" class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option  value="Male">Male</option>
                                        {{-- data-select2-id="3" --}}
                                        <option value="Female">Female</option>
                                    </select>

                                </div>

                            </div>

                            <div class="col-12 col-md-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Country
                                    </label>

                                    <!-- Input -->
                                    <select id="country" name="country_code" class="country form-control select2-hidden-accessible" data-toggle="select" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                        {{-- <option data-select2-id="6">Nigeria</option> --}}
                                        {{-- <option>Ghana</option> --}}
                                        {{-- <option>Togo</option> --}}
                                        @foreach($countries as $country)
                                    <option value="{{ $country->code }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                            </div>

                            <div class="col-12 col-md-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      State
                                    </label>

                                    <!-- Input -->
                                    <select id="regions" name="region_id" class="regions form-control select2-hidden-accessible" data-toggle="select" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                        {{-- <option data-select2-id="9">Cross River</option> --}}
                                        
                                    </select>

                                </div>

                            </div>

                            <div class="col-12 col-md-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Region
                                    </label>

                                    <!-- Input -->
                                    <select id="city" name="city_id" class="city form-control select2-hidden-accessible" data-toggle="select" data-select2-id="10" tabindex="-1" aria-hidden="true">
                                        {{-- <option data-select2-id="12">Calabar</option>
                                        <option>Akpabuyo</option>
                                        <option>Ikang</option> --}}
                                    </select>

                                </div>

                            </div>

                        </div>
                        <!-- / .row -->


                        <!-- Divider -->
                        <hr class="mt-4 mb-5">


                        <!-- Submit -->
                        <button type="submit" class="btn btn-primary">
                            Update Profile
                        </button>

                    </form>

                </div>
            </div>
            <!-- / .row -->
        </div>

    </div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/admin/js/custom.js')}}"></script>
@endpush