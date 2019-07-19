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


                                        @include('partials.admin.success')
                                        @include('partials.admin.error')

                                        
                                    <!-- Pretitle -->
                                    <h6 class="header-pretitle">
                                        Update Store
                                    </h6>

                                    <!-- Title -->
                                    <h1 class="header-title">
                                        Update Store
                                    </h1>

                                </div>
                            </div>
                            <!-- / .row -->
                            <div class="row align-items-center">
                                <div class="col">

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form -->
                <form class="mb-4" method="post" action="{{ route('agent.stores.update',$store->id)}}" enctype="multipart/form-data">
                    @csrf 
                    <div class="row">
                            <div class="col-12">

                                <!-- name -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Business Name
                                    </label>

                                    <!-- Input -->
                                    <input type="text" class="form-control" name="bussiness_name" value="{{ $store->name }}">

                                </div>

                            </div>
                            <div class="col-12 col-md-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Business Phone
                                    </label>

                                    <!-- Input -->
                                    <input type="text" value="{{ $store->phones }}" name="bussiness_phone" class="form-control mb-3" placeholder="(+234)_______-____" data-mask="(+234) 00000000000" autocomplete="off" maxlength="18">

                                </div>

                            </div>

                            <div class="col-12 col-md-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Business Email
                                    </label>

                                    <!-- Input -->
                                    <input type="text" name="bussiness_email" class="form-control" value="{{ $store->email }}">

                                </div>

                            </div>

                            <div class="col-12">
                                <!-- Email address -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="mb-1">
                                        Business Description
                                    </label>

                                    <!-- Input -->
                                    <textarea name="bussiness_description" class="form-control" placeholder="Our affordability, fast and reliable delivery, and the fact that you will always be able to find the phone that you are looking for in our offer, have made us stand out in the market.

                                    ">{{ $store->description }}</textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <!-- Business Opening Hours -->
                                <div class="form-group">
                                    <!-- Label -->
                                    <label class="mb-1">
                                        Opening Hours
                                    </label>
                                    <input type="text" value="{{ $store->opening_hours }}" name="opening_hours" class="form-control" placeholder="8am - 6pm, Monday to Saturday">
                                </div>
                            </div>

                            <div class="col-12">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Country
                                    </label>

                                    <!-- Input -->
                                    <select name="country_code" id="country" class="country form-control select2-hidden-accessible" data-toggle="select" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        @foreach($countries as $country)
                                            <option value="{{$country->code}}">{{$country->name}}</option>
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
                                    <select name="region_id" id="regions" class="form-control select2-hidden-accessible regions" data-toggle="select" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                        {{-- @foreach ($regions as $region)
                                            <option value="{{$region->id}}">{{$region->name}}</option>
                                        @endforeach --}}
                                    </select>

                                </div>

                            </div>

                            <div class="col-12 col-md-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      City
                                    </label>

                                    <!-- Input -->
                                    <select name="city_id" id="city" class="form-control select2-hidden-accessible city" data-toggle="select" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                        {{-- @foreach ($cities as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach --}}
                                    </select>

                                </div>

                            </div>


                            <div class="col-12">
                                <!-- Business Street address -->
                                <div class="form-group">
                                    <!-- Label -->
                                    <label class="mb-1">
                                        Street Address
                                    </label>
                                    <input type="text" value="{{ $store->address }}" name="street_address" class="form-control" placeholder="229 Maitama">
                                </div>
                            </div>

                        </div>
                        <!-- / .row -->

                        <!-- Divider -->
                        <hr class="mt-4 mb-5">

                        <div class="row">
                            <div class="col-12">
                                <label class="mb-1">
                                  Business Logo
                                </label>
                                <small class="form-text text-muted">
                                  Please use an image no larger than 5MB
                                </small>
                                <!-- Single -->

                                <input type="file" class="form-control" name="bussiness_logo" id="bussiness_logo">
                                {{-- <div  class="dropzone dropzone-single mb-3 dz-clickable" data-toggle="dropzone" data-dropzone-url="http://">
                                    <div class="dz-preview dz-preview-single" name="bussiness_logo"></div>

                                    <div class="dz-default dz-message" ><span>Drop files here to upload</span></div>
                                </div> --}}
                            </div>
                        </div>
                        <!-- / .row -->
                        <br><br>

                        <!-- Divider -->
                        {{-- <hr class="mt-4 mb-5"> --}}

                        <div class="row">
                            <div class="col-12">

                                <!-- Public profile -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="mb-1">
                                       Availability
                                    </label>

                                    <!-- Form text -->
                                    <small class="form-text text-muted">
                                        Making a vendor available means that users can see and make orders from this vendor and the vendor is obligated to attend to them.
                                    </small>

                                    <div class="row">
                                        <div class="col-auto">

                                            <!-- Toggle -->
                                            <div class="custom-control custom-checkbox-toggle">
                                                <input type="checkbox" name="availability" class="custom-control-input" id="toggleOne">
                                                <label class="custom-control-label" for="toggleOne"></label>
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Help text -->
                                            <small class="text-muted">
                                              You're currently Unavailable
                                            </small>

                                        </div>
                                    </div>
                                    <!-- / .row -->
                                </div>

                            </div>
                        </div>
                        <!-- / .row -->

                        <br>

                        <div class="row">
                            <div class="col-12">

                                <!-- Public profile -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="mb-1">
                                        Store Background Colour
                                    </label>

                                    <!-- Form text -->
                                    <small class="form-text text-muted">
                                        Making a vendor available means that users can see and make orders from this vendor and the vendor is obligated to attend to them.
                                    </small>

                                    <div class="row">
                                        <div class="col-auto">

                                            <!-- Toggle -->
                                            {{-- <div class="custom-control custom-checkbox-toggle">
                                                <input type="checkbox" class="custom-control-input" id="toggleOne">
                                                <label class="custom-control-label" for="toggleOne"></label>
                                            </div> --}}
                                            <input type="color" value="{{ $store->color }}" name="store_background_color" value="#f6b73c">

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Help text -->
                                            <small class="text-muted">
                                                Color
                                            </small>

                                        </div>
                                    </div>
                                    <!-- / .row -->
                                </div>

                            </div>
                        </div>
                        <!-- / .row -->
    

                        <hr class="mt-4 mb-5">

                        <div class="row">
                            <div class="col-12 col-md-6 order-md-2">

                                <!-- Card -->
                                <div class="card bg-light border ml-md-4">
                                    <div class="card-body">

                                        <p class="mb-2">
                                            Important Notice
                                        </p>

                                        <p class="small text-muted mb-2">
                                            Please note the following.
                                        </p>

                                        <ul class="small text-muted pl-4 mb-0">
                                            <li>
                                                A Vendor is the owner of the Store.
                                            </li>
                                            <li>
                                                An Agent is a user authorized by Passward to add products to the online store onbehalf of the Vendor.
                                            </li>
                                        </ul>

                                        

                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-md-6">

                                <!-- Password -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                        Select Vendor
                                    </label>
      
                                    <!-- Input -->
                                    <select name="vendor_id" class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option value="">None selected</option>
                                        @foreach($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->fullname }}</option>
                                        @endforeach
                                        
                                    </select>

                                </div>

                                <!-- New password -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                        Select Agent
                                    </label>
        
                                    <!-- Input -->
                                    <select name="agent_id" class="form-control select3-hidden-accessible" data-toggle="select" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option value="">Select Agent</option>
                                        @foreach($agents as $agent)
                                            <option value="{{ $agent->id }}">{{ $agent->fullname }}</option>
                                        @endforeach
                                        
                                    </select>

                                </div>

                            </div>
                        </div>
                        <!-- / .row -->

                        <hr class="mt-4 mb-5">

                        <!-- Submit -->
                        <button type="submit" class="btn btn-primary">
                            Update shop settings
                        </button>
                        <br><br>

                    </form>
                </div>

            </div>
        </div>
    
@endsection

@push('scripts')
    <script src="{{ asset('assets/admin/js/custom.js')}}"></script>
@endpush