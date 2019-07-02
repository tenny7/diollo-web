
@extends('layouts.backend.app')
@section('content')
    <div class="main-content">

            <div class="modal fade" id="modalMembers" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-card card" data-toggle="lists" data-lists-values="[&quot;name&quot;]">
                          <div class="card-header">
                            <div class="row align-items-center">
                              <div class="col">
              
                                <!-- Title -->
                                <h4 class="card-header-title" id="exampleModalCenterTitle">
                                  Add User to Shop
                                </h4>
              
                              </div>
                              <div class="col-auto">
              
                                <!-- Close -->
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
              
                              </div>
                            </div> <!-- / .row -->
                          </div>
                          <div class="card-header">
              
                            <!-- Form -->
                            <form>
                                <div class="input-group input-group-flush input-group-merge">
                                    <input type="search" class="form-control form-control-prepended search" placeholder="Search">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                        <span class="fe fe-search"></span>
                                    </div>
                                    </div>
                                </div>
                            </form>
              
                          </div>
                          <div class="card-body">
              
                            <!-- List group -->
                            <ul class="list-group list-group-flush list my--3"><li class="list-group-item px-0">
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col ml--2">
                
                                            <!-- Title -->
                                            <h4 class="mb-1 name">
                                            <a href="profile-posts.html">Miyah Myles</a>
                                            </h4>
                
                                        </div>
                                        <div class="col-auto">
                
                                            <!-- Button -->
                                            <a href="#!" class="btn btn-sm btn-white">
                                            Add
                                            </a>
                
                                        </div>
                                    </div> <!-- / .row -->
              
                                </li>
                                <li class="list-group-item px-0">
                                    <div class="row align-items-center">
                                        <div class="col ml--2">
                                            <!-- Title -->
                                            <h4 class="mb-1 name">
                                                <a href="profile-posts.html">Ryu Duke</a>
                                            </h4>
                                        </div>
                                        <div class="col-auto">
                                            <!-- Button -->
                                            <a href="#!" class="btn btn-sm btn-white">
                                            Add
                                            </a>
                                        </div>
                                    </div> <!-- / .row -->
              
                                </li>
                                <li class="list-group-item px-0">
              
                                <div class="row align-items-center">
                                  <div class="col-auto">
              
                                    <!-- Avatar -->
                                    <a href="profile-posts.html" class="avatar">
                                      <img src="assets/img/avatars/profiles/avatar-7.jpg" alt="..." class="avatar-img rounded-circle">
                                    </a>
              
                                  </div>
                                  <div class="col ml--2">
              
                                    <!-- Title -->
                                    <h4 class="mb-1 name">
                                      <a href="profile-posts.html">Glen Rouse</a>
                                    </h4>
              
                                    <!-- Time -->
                                    <p class="small mb-0">
                                      <span class="text-warning">●</span> Busy
                                    </p>
              
                                  </div>
                                  <div class="col-auto">
              
                                    <!-- Button -->
                                    <a href="#!" class="btn btn-sm btn-white">
                                      Add
                                    </a>
              
                                  </div>
                                </div> <!-- / .row -->
              
                              </li><li class="list-group-item px-0">
              
                                <div class="row align-items-center">
                                  <div class="col-auto">
              
                                    <!-- Avatar -->
                                    <a href="profile-posts.html" class="avatar">
                                      <img src="assets/img/avatars/profiles/avatar-8.jpg" alt="..." class="avatar-img rounded-circle">
                                    </a>
              
                                  </div>
                                  <div class="col ml--2">
              
                                    <!-- Title -->
                                    <h4 class="mb-1 name">
                                      <a href="profile-posts.html">Grace Gross</a>
                                    </h4>
              
                                    <!-- Time -->
                                    <p class="small mb-0">
                                      <span class="text-danger">●</span> Offline
                                    </p>
              
                                  </div>
                                  <div class="col-auto">
              
                                    <!-- Button -->
                                    <a href="#!" class="btn btn-sm btn-white">
                                      Add
                                    </a>
              
                                  </div>
                                </div> <!-- / .row -->
              
                              </li></ul>
              
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


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
                                        New Promotion
                                    </h6>

                                    <!-- Title -->
                                    <h1 class="header-title">
                                        Add Promotion
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

                    @include('partials.admin.success')
                    @include('partials.admin.error')
                    <!-- Form -->
                <form class="mb-4" method="post" action="{{ route('admin.promotions.addPromotion') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-12">

                                <!-- name -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Store
                                    </label>

                                    <!-- Input -->
                                    <select name="store_id" id="store" class="form-control stores">
                                        @foreach($stores as $store)
                                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" class="form-control" name="store"> --}}

                                </div>

                            </div>
                            <div class="col-12 col-md-12">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Promo Type
                                    </label>

                                    <!-- Input -->
                                    <select name="promo_type" class="form-control">
                                    <option value="slider">Homepage Slide</option>
                                    <option value="topselling">Topselling</option>
                                    <option value="newstock">Newstock</option>
                                    <option value="store">Store</option>
                                    </select>
                                    {{-- <input type="text" id="phone" name="phone" class="form-control mb-3" placeholder="(+234)_______-____" data-mask="(+234) 00000000000" autocomplete="off" maxlength="18"> --}}

                                </div>

                            </div>

                            {{-- <div class="col-12 col-md-6"> --}}

                                <!-- Phone -->
                                {{-- <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Email
                                    </label>

                                    <!-- Input -->
                                    <input type="text" id="email" class="form-control" name="email">

                                </div> --}}

                            {{-- </div> --}}

                            <div class="col-6">
                                <!-- Email address -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="mb-1">
                                        Start date
                                    </label>

                                    <!-- Input -->
                                    <input type="text" class="form-control" placeholder="Enter start date" name="started" data-toggle="flatpickr" required>
                                    {{-- <textarea name="state" class="form-control" placeholder="Our affordability, fast and reliable delivery, and the fact that you will always be able to find the phone that you are looking for in our offer, have made us stand out in the market.

                                    "></textarea> --}}
                                </div>
                            </div>

                            <div class="col-6">
                                <!-- Email address -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="mb-1">
                                        End Date
                                    </label>

                                    <!-- Input -->
                                    <input type="text" class="form-control" name="end_date" data-toggle="flatpickr" required>
                                    {{-- <textarea name="state" class="form-control" placeholder="Our affordability, fast and reliable delivery, and the fact that you will always be able to find the phone that you are looking for in our offer, have made us stand out in the market.

                                    "></textarea> --}}
                                </div>
                            </div>

                            {{-- <div class="col-12">
                                <!-- Business Opening Hours -->
                                <div class="form-group">
                                    <!-- Label -->
                                    <label class="mb-1">
                                        Impressions
                                    </label>
                                    <input type="text" class="form-control" placeholder="Impressions" name="impressions">
                                </div>
                            </div> --}}

                            {{-- <div class="col-6"> --}}

                                <!-- Phone -->
                                {{-- <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Views
                                    </label>

                                    <!-- Input -->
                                    <input type="text" name="views" placeholder="Views" class="form-control">
                                    
                                    

                                </div> --}}

                            {{-- </div> --}}

                            <div class="col-6 col-md-12">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      State
                                    </label>

                                    <!-- Input -->
                                    {{-- <input type="text" name="region_id" id="region" class="form-control"> --}}
                                    <select name="region_id" id="region" class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                        {{-- @foreach ($regions as $region) --}}
                                        @php 
                                            $region = \Gerardojbaez\GeoData\Models\Region::find($store->region_id);
                                        @endphp
                                            <option value="{{$region->id}}">{{$region->name}}</option>
                                         {{-- @endforeach --}}
                                    </select>

                                </div>

                            </div>

                            <div class="col-12 col-md-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Status
                                    </label>

                                    <!-- Input -->
                                    <select name="status" class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                        <option value="1">Active</option>
                                        <option value="0">Suspended</option>
                                    </select>

                                </div>

                            </div>


                            <div class="col-6">
                                <!-- Business Street address -->
                                <div class="form-group">
                                    <!-- Label -->
                                    <label class="mb-1">
                                        Image
                                    </label>
                                    <input type="file" class="form-control" name="promo_image">
                                </div>
                            </div>

                        </div>
                        <!-- / .row -->

                        <!-- Divider -->
                        {{-- <hr class="mt-4 mb-5"> --}}

                        {{-- <div class="row">
                            <div class="col-12">
                                <label class="mb-1">
                                  Business Logo
                                </label>
                                <small class="form-text text-muted">
                                  Please use an image no larger than 5MB
                                </small>
                                <!-- Single -->
                                <div class="dropzone dropzone-single mb-3 dz-clickable" data-toggle="dropzone" data-dropzone-url="http://">

                                  

                                  <div class="dz-preview dz-preview-single"></div>

                                <div class="dz-default dz-message"><span>Drop files here to upload</span></div></div>
                            </div>
                        </div> --}}
                        <!-- / .row -->
                        {{-- <br><br> --}}

                        <!-- Divider -->
                        {{-- <hr class="mt-4 mb-5"> --}}

                        {{-- <div class="row">
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
                                                <input type="checkbox" class="custom-control-input" id="toggleOne">
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
                        </div> --}}
                        <!-- / .row -->

                        {{-- <br> --}}

                        {{-- <div class="row">
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
                                            <div class="custom-control custom-checkbox-toggle">
                                                <input type="checkbox" class="custom-control-input" id="toggleOne">
                                                <label class="custom-control-label" for="toggleOne"></label>
                                            </div>
                                            <input type="color" value="#f6b73c">

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
                        </div> --}}
                        <!-- / .row -->
    

                        {{-- <hr class="mt-4 mb-5"> --}}

                        {{-- <div class="row">
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
                                    <select class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option value="">Christian Jombo</option>
                                        <option value="">Nduke-abasi Sam</option>
                                        
                                    </select>

                                </div>

                                <!-- New password -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                        Select Agent
                                    </label>
        
                                    <!-- Input -->
                                    <select class="form-control select3-hidden-accessible" data-toggle="select" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option value="">Christian Jombo</option>
                                        <option value="">Nduke-abasi Sam</option>
                                        
                                    </select>

                                </div>

                            </div>
                        </div> --}}
                        <!-- / .row -->

                        <hr class="mt-4 mb-5">

                        <!-- Submit -->
                        <button type="submit" class="btn btn-primary">
                            Save Promotion
                        </button>
                        <br><br>

                    </form>
                </div>

            </div>
        </div>
    
@endsection

@push('scripts')
    <script src="{{asset('assets/admin/js/custom.js') }}"></script>
@endpush