
@extends('layouts.backend.app')
@section('content')
    <div class="main-content">

        <nav class="navbar navbar-expand-md navbar-light d-none d-md-flex" id="topbar" style="display: none !important">
            <div class="container-fluid">

                <!-- Form -->
                <form class="form-inline mr-4 d-none d-md-flex">
                    <div class="input-group input-group-flush input-group-merge" data-toggle="lists" data-lists-values="[&quot;name&quot;]">

                        <!-- Input -->
                        <input type="search" class="form-control form-control-prepended dropdown-toggle search" data-toggle="dropdown" placeholder="Search" aria-label="Search">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fe fe-search"></i>
                            </div>
                        </div>

                        <!-- Menu -->
                        <div class="dropdown-menu dropdown-menu-card">
                            <div class="card-body">

                                <!-- List group -->
                                <div class="list-group list-group-flush list my--3"><a href="team-overview.html" class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-auto">

                                                <!-- Avatar -->
                                                <div class="avatar">
                                                    <img src="assets/img/avatars/teams/team-logo-1.jpg" alt="..." class="avatar-img rounded">
                                                </div>

                                            </div>
                                            <div class="col ml--2">

                                                <!-- Title -->
                                                <h4 class="text-body mb-1 name">
                              Airbnb
                            </h4>

                                                <!-- Time -->
                                                <p class="small text-muted mb-0">
                                                    <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 2hr ago</time>
                                                </p>

                                            </div>
                                        </div>
                                        <!-- / .row -->
                                    </a><a href="team-overview.html" class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-auto">

                                                <!-- Avatar -->
                                                <div class="avatar">
                                                    <img src="assets/img/avatars/teams/team-logo-2.jpg" alt="..." class="avatar-img rounded">
                                                </div>

                                            </div>
                                            <div class="col ml--2">

                                                <!-- Title -->
                                                <h4 class="text-body mb-1 name">
                              Medium Corporation
                            </h4>

                                                <!-- Time -->
                                                <p class="small text-muted mb-0">
                                                    <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 2hr ago</time>
                                                </p>

                                            </div>
                                        </div>
                                        <!-- / .row -->
                                    </a><a href="project-overview.html" class="list-group-item px-0">

                                        <div class="row align-items-center">
                                            <div class="col-auto">

                                                <!-- Avatar -->
                                                <div class="avatar avatar-4by3">
                                                    <img src="assets/img/avatars/projects/project-1.jpg" alt="..." class="avatar-img rounded">
                                                </div>

                                            </div>
                                            <div class="col ml--2">

                                                <!-- Title -->
                                                <h4 class="text-body mb-1 name">
                              Homepage Redesign
                            </h4>

                                                <!-- Time -->
                                                <p class="small text-muted mb-0">
                                                    <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                                                </p>

                                            </div>
                                        </div>
                                        <!-- / .row -->

                                    </a><a href="project-overview.html" class="list-group-item px-0">

                                        <div class="row align-items-center">
                                            <div class="col-auto">

                                                <!-- Avatar -->
                                                <div class="avatar avatar-4by3">
                                                    <img src="assets/img/avatars/projects/project-2.jpg" alt="..." class="avatar-img rounded">
                                                </div>

                                            </div>
                                            <div class="col ml--2">

                                                <!-- Title -->
                                                <h4 class="text-body mb-1 name">
                              Travels &amp; Time
                            </h4>

                                                <!-- Time -->
                                                <p class="small text-muted mb-0">
                                                    <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                                                </p>

                                            </div>
                                        </div>
                                        <!-- / .row -->

                                    </a><a href="project-overview.html" class="list-group-item px-0">

                                        <div class="row align-items-center">
                                            <div class="col-auto">

                                                <!-- Avatar -->
                                                <div class="avatar avatar-4by3">
                                                    <img src="assets/img/avatars/projects/project-3.jpg" alt="..." class="avatar-img rounded">
                                                </div>

                                            </div>
                                            <div class="col ml--2">

                                                <!-- Title -->
                                                <h4 class="text-body mb-1 name">
                              Safari Exploration
                            </h4>

                                                <!-- Time -->
                                                <p class="small text-muted mb-0">
                                                    <span class="fe fe-clock"></span> <time datetime="2018-05-24">Updated 4hr ago</time>
                                                </p>

                                            </div>
                                        </div>
                                        <!-- / .row -->

                                    </a><a href="profile-posts.html" class="list-group-item px-0">

                                        <div class="row align-items-center">
                                            <div class="col-auto">

                                                <!-- Avatar -->
                                                <div class="avatar">
                                                    <img src="assets/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                                                </div>

                                            </div>
                                            <div class="col ml--2">

                                                <!-- Title -->
                                                <h4 class="text-body mb-1 name">
                              Dianna Smiley
                            </h4>

                                                <!-- Status -->
                                                <p class="text-body small mb-0">
                                                    <span class="text-success">●</span> Online
                                                </p>

                                            </div>
                                        </div>
                                        <!-- / .row -->

                                    </a><a href="profile-posts.html" class="list-group-item px-0">

                                        <div class="row align-items-center">
                                            <div class="col-auto">

                                                <!-- Avatar -->
                                                <div class="avatar">
                                                    <img src="assets/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
                                                </div>

                                            </div>
                                            <div class="col ml--2">

                                                <!-- Title -->
                                                <h4 class="text-body mb-1 name">
                              Ab Hadley
                            </h4>

                                                <!-- Status -->
                                                <p class="text-body small mb-0">
                                                    <span class="text-danger">●</span> Offline
                                                </p>

                                            </div>
                                        </div>
                                        <!-- / .row -->

                                    </a></div>

                            </div>
                        </div>
                        <!-- / .dropdown-menu -->

                    </div>
                </form>

                <!-- User -->
                <div class="navbar-user">

                    <!-- Dropdown -->
                    <div class="dropdown mr-4 d-none d-md-flex">

                        <!-- Toggle -->
                        <a href="#" class="text-muted" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="icon active">
                    <i class="fe fe-bell"></i>
                  </span>
                </a>

                        <!-- Menu -->
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h5 class="card-header-title">
                          Notifications
                        </h5>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Link -->
                                        <a href="#!" class="small">
                          View all
                        </a>

                                    </div>
                                </div>
                                <!-- / .row -->
                            </div>
                            <!-- / .card-header -->
                            <div class="card-body">

                                <!-- List group -->
                                <div class="list-group list-group-flush my--3">
                                    <a class="list-group-item px-0" href="#!">

                                        <div class="row">
                                            <div class="col-auto">

                                                <!-- Avatar -->
                                                <div class="avatar avatar-sm">
                                                    <img src="assets/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                                                </div>

                                            </div>
                                            <div class="col ml--2">

                                                <!-- Content -->
                                                <div class="small text-muted">
                                                    <strong class="text-body">Dianna Smiley</strong> shared your post with <strong class="text-body">Ab Hadley</strong>, <strong class="text-body">Adolfo Hess</strong>, and <strong class="text-body">3 others</strong>.
                                                </div>

                                            </div>
                                            <div class="col-auto">

                                                <small class="text-muted">
                              2m
                            </small>

                                            </div>
                                        </div>
                                        <!-- / .row -->

                                    </a>
                                    <a class="list-group-item px-0" href="#!">

                                        <div class="row">
                                            <div class="col-auto">

                                                <!-- Avatar -->
                                                <div class="avatar avatar-sm">
                                                    <img src="assets/img/avatars/profiles/avatar-2.jpg" alt="..." class="avatar-img rounded-circle">
                                                </div>

                                            </div>
                                            <div class="col ml--2">

                                                <!-- Content -->
                                                <div class="small text-muted">
                                                    <strong class="text-body">Ab Hadley</strong> reacted to your post with a 😍
                                                </div>

                                            </div>
                                            <div class="col-auto">

                                                <small class="text-muted">
                              2m
                            </small>

                                            </div>
                                        </div>
                                        <!-- / .row -->

                                    </a>
                                    <a class="list-group-item px-0" href="#!">

                                        <div class="row">
                                            <div class="col-auto">

                                                <!-- Avatar -->
                                                <div class="avatar avatar-sm">
                                                    <img src="assets/img/avatars/profiles/avatar-3.jpg" alt="..." class="avatar-img rounded-circle">
                                                </div>

                                            </div>
                                            <div class="col ml--2">

                                                <!-- Content -->
                                                <div class="small text-muted">
                                                    <strong class="text-body">Adolfo Hess</strong> commented
                                                    <blockquote class="text-body">“I don’t think this really makes sense to do without approval from Johnathan since he’s the one...” </blockquote>
                                                </div>

                                            </div>
                                            <div class="col-auto">

                                                <small class="text-muted">
                              2m
                            </small>

                                            </div>
                                        </div>
                                        <!-- / .row -->

                                    </a>
                                    <a class="list-group-item px-0" href="#!">

                                        <div class="row">
                                            <div class="col-auto">

                                                <!-- Avatar -->
                                                <div class="avatar avatar-sm">
                                                    <img src="assets/img/avatars/profiles/avatar-4.jpg" alt="..." class="avatar-img rounded-circle">
                                                </div>

                                            </div>
                                            <div class="col ml--2">

                                                <!-- Content -->
                                                <div class="small text-muted">
                                                    <strong class="text-body">Daniela Dewitt</strong> subscribed to you.
                                                </div>

                                            </div>
                                            <div class="col-auto">

                                                <small class="text-muted">
                              2m
                            </small>

                                            </div>
                                        </div>
                                        <!-- / .row -->

                                    </a>
                                    <a class="list-group-item px-0" href="#!">

                                        <div class="row">
                                            <div class="col-auto">

                                                <!-- Avatar -->
                                                <div class="avatar avatar-sm">
                                                    <img src="assets/img/avatars/profiles/avatar-5.jpg" alt="..." class="avatar-img rounded-circle">
                                                </div>

                                            </div>
                                            <div class="col ml--2">

                                                <!-- Content -->
                                                <div class="small text-muted">
                                                    <strong class="text-body">Miyah Myles</strong> shared your post with <strong class="text-body">Ryu Duke</strong>, <strong class="text-body">Glen Rouse</strong>, and <strong class="text-body">3 others</strong>.
                                                </div>

                                            </div>
                                            <div class="col-auto">

                                                <small class="text-muted">
                              2m
                            </small>

                                            </div>
                                        </div>
                                        <!-- / .row -->

                                    </a>
                                    <a class="list-group-item px-0" href="#!">

                                        <div class="row">
                                            <div class="col-auto">

                                                <!-- Avatar -->
                                                <div class="avatar avatar-sm">
                                                    <img src="assets/img/avatars/profiles/avatar-6.jpg" alt="..." class="avatar-img rounded-circle">
                                                </div>

                                            </div>
                                            <div class="col ml--2">

                                                <!-- Content -->
                                                <div class="small text-muted">
                                                    <strong class="text-body">Ryu Duke</strong> reacted to your post with a 😍
                                                </div>

                                            </div>
                                            <div class="col-auto">

                                                <small class="text-muted">
                              2m
                            </small>

                                            </div>
                                        </div>
                                        <!-- / .row -->

                                    </a>
                                    <a class="list-group-item px-0" href="#!">

                                        <div class="row">
                                            <div class="col-auto">

                                                <!-- Avatar -->
                                                <div class="avatar avatar-sm">
                                                    <img src="assets/img/avatars/profiles/avatar-7.jpg" alt="..." class="avatar-img rounded-circle">
                                                </div>

                                            </div>
                                            <div class="col ml--2">

                                                <!-- Content -->
                                                <div class="small text-muted">
                                                    <strong class="text-body">Glen Rouse</strong> commented
                                                    <blockquote class="text-body">“I don’t think this really makes sense to do without approval from Johnathan since he’s the one...” </blockquote>
                                                </div>

                                            </div>
                                            <div class="col-auto">

                                                <small class="text-muted">
                              2m
                            </small>

                                            </div>
                                        </div>
                                        <!-- / .row -->

                                    </a>
                                    <a class="list-group-item px-0" href="#!">

                                        <div class="row">
                                            <div class="col-auto">

                                                <!-- Avatar -->
                                                <div class="avatar avatar-sm">
                                                    <img src="assets/img/avatars/profiles/avatar-8.jpg" alt="..." class="avatar-img rounded-circle">
                                                </div>

                                            </div>
                                            <div class="col ml--2">

                                                <!-- Content -->
                                                <div class="small text-muted">
                                                    <strong class="text-body">Grace Gross</strong> subscribed to you.
                                                </div>

                                            </div>
                                            <div class="col-auto">

                                                <small class="text-muted">
                              2m
                            </small>

                                            </div>
                                        </div>
                                        <!-- / .row -->

                                    </a>
                                </div>

                            </div>
                        </div>
                        <!-- / .dropdown-menu -->

                    </div>

                    <!-- Dropdown -->
                    <div class="dropdown">

                        <!-- Toggle -->
                        <a href="#" class="avatar avatar-sm avatar-online dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="assets/img/avatars/profiles/avatar-1.jpg" alt="..." class="avatar-img rounded-circle">
                </a>

                        <!-- Menu -->
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="profile-posts.html" class="dropdown-item">Profile</a>
                            <a href="settings.html" class="dropdown-item">Settings</a>
                            <hr class="dropdown-divider">
                            <a href="sign-in.html" class="dropdown-item">Logout</a>
                        </div>

                    </div>

                </div>

            </div>
        </nav>


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
                      Update product
                    </h1>

                                </div>
                            </div>
                            <!-- / .row -->
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Nav -->
                                    <ul class="nav nav-tabs nav-overflow header-tabs">
                                        <li class="nav-item">
                                            <a href="#!" class="nav-link active">
                                              update
                                            </a>
                                        </li>
                                        {{-- <li class="nav-item">
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
                                            <a href="#!" class="nav-link">
                                              Bank
                                            </a>
                                        </li> --}}
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    @include('partials.admin.success')
                    @include('partials.admin.error')
                    <!-- Form -->
                <form class="mb-4" method="post" action="{{ route('vendor.products.update',$product->slug)}}" enctype="multipart/form-data">
                    @csrf
                {{-- <input type="hidden" value="{{ $product->id }}" name="product_id"> --}}
                        <div class="row">
                            <div class="col-12">

                                <!-- name -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Name
                                    </label>

                                    <!-- Input -->
                                <input type="text" value="{{ $product->name }}" name="name" class="form-control">

                                </div>

                            </div>
                            <div class="col-12 col-md-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Code
                                    </label>

                                    <!-- Input -->
                                    <input type="text" value="{{ $product->code }}" name="code" disabled class="form-control mb-3" placeholder="must be numeric e.g 1234">
                                    <!-- <input type="text" class="form-control mb-3" placeholder="(___)____-____" data-mask="(000) 000000000"> -->

                                </div>

                            </div>

                            <div class="col-12 col-md-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Brand
                                    </label>

                                    <select name="brand" id="brand" class="form-control">
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" class="form-control" name="brand" placeholder="brand"> --}}
                                    

                                </div>

                            </div>

                            
                            <div class="col-6">

                                <!-- Email address -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="mb-1">
                                      Description
                                    </label>

                                    <!-- Form text -->
                                    <!-- <small class="form-text text-muted">
                                      This contact will be shown to others publicly, so choose it carefully.
                                    </small> -->

                                    <!-- Input -->
                                    <textarea name="description" class="form-control">{{ $product->description }}</textarea>

                                </div>

                            </div>

                            
                            <div class="col-12 col-md-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                        Quick  Description
                                    </label>

                                    <!-- Input -->
                                    <input type="text" value="{{ $product->quick_description }}" name="quick_description" class="form-control" required>

                                </div>

                            </div>

                            <div class="col-12 col-md-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Quantity
                                    </label>
                                    <input type="number" value="{{ $product->qty }}" name="qty" class="form-control">

                                  

                                </div>

                            </div>

                            <div class="col-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Store
                                    </label>

                                    <select name="store" id="store" class="form-control">
                                        @foreach($stores as $store)
                                            <option value="{{ $store->id }}">{{ $store->name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- <input type="text" name="warranty" class="form-control" placeholder="warranty"> --}}
                                    <!-- Input -->
                                    {{-- <select class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="3">Nigeria</option>
                                        <option>Ghana</option>
                                        <option>Togo</option>
                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-zqj4-container"><span class="select2-selection__rendered" id="select2-zqj4-container" role="textbox" aria-readonly="true" title="Nigeria">Nigeria</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> --}}

                                </div>

                            </div>

                        </div>
                        <div class="row">
                                <div class="col-6">

                                        <!-- Phone -->
                                        <div class="form-group">
        
                                            <!-- Label -->
                                            <label>
                                              Warranty
                                            </label>
        
                                            
                                            <input type="text" value="{{ $product->waranty }}" name="waranty" class="form-control" placeholder="warranty">
                                            <!-- Input -->
                                            {{-- <select class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="3">Nigeria</option>
                                                <option>Ghana</option>
                                                <option>Togo</option>
                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-zqj4-container"><span class="select2-selection__rendered" id="select2-zqj4-container" role="textbox" aria-readonly="true" title="Nigeria">Nigeria</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> --}}
        
                                        </div>
        
                                    </div>
                                <div class="col-6">

                                        <!-- Phone -->
                                        <div class="form-group">
        
                                            <!-- Label -->
                                            <label>
                                              Agent
                                            </label>
                                            @php
                                              $agent = \App\Models\User::where('id',$product->agent)->first();   
                                            @endphp
                                        <input type="text" disabled class="form-control" name="" value="{{ $agent->fullname }}">
        
                                            {{-- <select name="agent" id="agent" class="form-control">
                                                @foreach($agents as $agent)
                                                    <option value="{{ $agent->id }}">{{ $agent->fullname }}</option>
                                                @endforeach
                                            </select> --}}
                                            {{-- <input type="text" name="agent" class="form-control" placeholder="Agen"> --}}
                                            <!-- Input -->
                                            {{-- <select class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option data-select2-id="3">Nigeria</option>
                                                <option>Ghana</option>
                                                <option>Togo</option>
                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-zqj4-container"><span class="select2-selection__rendered" id="select2-zqj4-container" role="textbox" aria-readonly="true" title="Nigeria">Nigeria</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> --}}
        
                                        </div>
        
                                    </div>
                        </div>
                        <!-- / .row -->

                        <!-- Divider -->
                        <hr class="mt-4 mb-5">
                        <div class="row">
                                <div class="col-12 col-md-6">

                                        <!-- Phone -->
                                        <div class="form-group">
        
                                            <!-- Label -->
                                            <label>
                                              Original Price
                                            </label>
        
                                            <input type="text" value="{{ $product->original_price }}" class="form-control" name="original_price" placeholder="original price e.g 2500">
                                            
        
                                        </div>
        
                                    </div>
                            <div class="col-12 col-md-6">

                                <!-- Phone -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Discount Price
                                    </label>

                                    <input type="text" class="form-control" value="{{ $product->discount_price }}" name="discount_price" placeholder="discount price e.g 2000">
                                    

                                </div>

                            </div>
                            
                        </div>
                        {{-- <div class="row">
                            <div class="col-12">
                                <label class="mb-1">
                                  Product Image
                                </label>
                                <small class="form-text text-muted">
                                  Please use an image no larger than 5MB. You can select multiple images
                                </small>
                                <!-- Single -->
                                <input type="file" disabled class="form-control" name="product_image[]" id="" multiple>
                                
                            </div>
                        </div> --}}
                        <!-- / .row -->

                        

                        <!-- Divider -->
                        <hr class="mt-4 mb-5">
                        <div class="row">
                            <div class="col-6">
                                <label class="mb-1">
                                  Meta Title
                                </label>
                                {{-- <small class="form-text text-muted">
                                 
                                </small> --}}
                                <!-- Single -->
                                <input type="text" value="{{ $product->meta_title }}" class="form-control" name="meta_title" id="" >
                                
                            </div>

                            <div class="col-6">
                                <label class="mb-1">
                                  Meta Description
                                </label>
                                {{-- <small class="form-text text-muted">
                                 
                                </small> --}}
                                <!-- Single -->
                                <input type="text" value="{{ $product->meta_description }}" class="form-control" name="meta_description" id="">
                                
                            </div>
                        </div>
                        <hr class="mt-4 mb-5">
                        <div class="row">
                            <div class="col-12">

                                <!-- Public profile -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label class="mb-1">
                                       Is taxable?
                                    </label>

                                    <!-- Form text -->
                                    <small class="form-text text-muted">
                                        is this product taxable
                                    </small>

                                    <div class="row">
                                        <div class="col-auto">

                                            <select name="is_taxable" id="" class="form-control">
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                            <!-- Toggle -->
                                            {{-- <div class="custom-control custom-checkbox-toggle">
                                                <input type="checkbox" name="is_taxable" class="custom-control-input" id="toggleOne" checked="">
                                                <label class="custom-control-label" for="toggleOne"></label>
                                            </div> --}}

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Help text -->
                                            {{-- <small class="text-muted">
                                              Currently not taxable
                                            </small> --}}

                                        </div>
                                    </div>
                                    <!-- / .row -->
                                </div>

                            </div>
                        </div>
                        <!-- / .row -->

                        <hr class="mt-4 mb-5">

                        <!-- Submit -->
                        <button type="submit" class="btn btn-primary">
                            Update Product
                        </button>

                            </form></div>
                        </div>
                        <!-- / .row -->

                </div>
            </div>
    
@endsection