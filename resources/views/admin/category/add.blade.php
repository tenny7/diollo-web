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
                                        New Category
                                    </h6>

                                    <!-- Title -->
                                    <h1 class="header-title">
                                        Add Category
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
                <form class="mb-4" method="post" action="{{ route('admin.category.add') }}">
                    @csrf
                        <div class="row">
                            <div class="col-6">

                                <!-- name -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Category Name
                                    </label>
                                    

                                    <!-- Input -->
                                    <input type="text" class="form-control" name="name" >
                                    {{-- <input type="text" class="form-control"> --}}

                                </div>

                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Category Level
                                    </label>
                                    

                                    <!-- Input -->
                                    <select name="parent_id" class="form-control">
                                      <option value="0">Main Category</option>
                                      @foreach($levels as $val)
                                      <option value="{{ $val->id }}">{{ $val->name }}</option>
                                        
                                      @endforeach
                                    </select>
                                    {{-- <input type="text" class="form-control" name="name" > --}}
                                    {{-- <input type="text" class="form-control"> --}}

                                </div>

                            </div>
                            <div class="col-6">

                                <!-- name -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Meta Title
                                    </label>
                                    

                                    <!-- Input -->
                                    <input type="text" class="form-control" name="meta_title" >
                                    {{-- <input type="text" class="form-control"> --}}

                                </div>

                            </div>
                            <div class="col-12">

                                <!-- Email address -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="mb-1">
                                      Meta Description
                                    </label>

                                    

                                    <!-- Input -->
                                    <textarea name="meta_description" class="form-control"></textarea>

                                </div>

                            </div>
                            

                            {{-- <div class="col-12 col-md-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Business Email
                                    </label>

                                    <!-- Input -->
                                    <input type="text" class="form-control">

                                </div>

                            </div> --}}
                            {{-- <div class="col-12">

                                <!-- Email address -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="mb-1">
                                      Business address
                                    </label>

                                    <!-- Form text -->
                                    <!-- <small class="form-text text-muted">
                                      This contact will be shown to others publicly, so choose it carefully.
                                    </small> -->

                                    <!-- Input -->
                                    <textarea name="address" class="form-control"></textarea>

                                </div>

                            </div> --}}
{{-- 
                            <div class="col-12">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Country
                                    </label>

                                    <!-- Input -->
                                    <select class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="3">Nigeria</option>
                                        <option>Ghana</option>
                                        <option>Togo</option>
                                    </select>
                                    

                                </div>

                            </div> --}}

                            {{-- <div class="col-12 col-md-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      State
                                    </label>

                                    <!-- Input -->
                                    <select class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="6">Cross River</option>
                                        <option>Akwa Ibom</option>
                                        <option>Kaduna</option>
                                    </select>

                                </div>

                            </div> --}}

                            {{-- <div class="col-12 col-md-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Region
                                    </label>

                                    <!-- Input -->
                                    <select class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="9">Calabar</option>
                                        <option>Akpabuyo</option>
                                        <option>Ikang</option>
                                    </select>

                                </div>

                            </div> --}}

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

                        {{-- <hr class="mt-4 mb-5"> --}}
                        {{-- <div class="row">
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
                                            <select class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="3">Select Bank</option>
                                                <option>Guaranty trust Bank</option>
                                                <option>Zenith Bank</option>
                                                <option>First Bank of Nigeria</option>
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
                                        <input type="text" class="form-control">
    
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
                                        <input type="text" class="form-control">
    
                                    </div>
    
                                </div>
    
    
    
                            </div> --}}
                            <!-- / .row -->

                            <hr class="mt-4 mb-5">

                            <!-- Submit -->
                            <button type="submit" class="btn btn-primary">
                                Add Category
                            </button>
                            <br><br>

                        </form>
                    </div>

                </div>
            </div>
    
@endsection