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
                      Settings
                    </h1>

                                </div>
                            </div>
                            <!-- / .row -->
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Nav -->
                                    <ul class="nav nav-tabs nav-overflow header-tabs">
                                            {{-- <li class="nav-item">
                                                <a href="{{route('vendor.settings.general')}}" class="nav-link">
                                                  General
                                                </a>
                                            </li> --}}
                                            <li class="nav-item">
                                                <a href="{{route('vendor.settings.profile')}}" class="nav-link active">
                                                  Profile
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('vendor.settings.password')}}" class="nav-link">
                                                  Password
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{route('vendor.settings.bank')}}" class="nav-link">
                                                  Bank
                                                </a>
                                            </li>
                                        </ul>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form -->
                    <form class="mb-4">

                        <div class="row">
                            <div class="col-12">

                                <!-- name -->
                                <div class="form-group">

                                    <!-- Label -->
                                    <label>
                                      Business Name
                                    </label>

                                    <!-- Input -->
                                    <input type="text" class="form-control">

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
                                    <input type="text" class="form-control mb-3" placeholder="(+234)_______-____" data-mask="(+234) 00000000000" autocomplete="off" maxlength="18">
                                    <!-- <input type="text" class="form-control mb-3" placeholder="(___)____-____" data-mask="(000) 000000000"> -->

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
                                    <input type="text" class="form-control">

                                </div>

                            </div>
                            <div class="col-12">

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

                            </div>

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
                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-zqj4-container"><span class="select2-selection__rendered" id="select2-zqj4-container" role="textbox" aria-readonly="true" title="Nigeria">Nigeria</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

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
                                    <select class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="6">Cross River</option>
                                        <option>Akwa Ibom</option>
                                        <option>Kaduna</option>
                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="5" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-warq-container"><span class="select2-selection__rendered" id="select2-warq-container" role="textbox" aria-readonly="true" title="Cross River">Cross River</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

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
                                    <select class="form-control select2-hidden-accessible" data-toggle="select" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                        <option data-select2-id="9">Calabar</option>
                                        <option>Akpabuyo</option>
                                        <option>Ikang</option>
                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="8" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-1od8-container"><span class="select2-selection__rendered" id="select2-1od8-container" role="textbox" aria-readonly="true" title="Calabar">Calabar</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>

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
                                <div class="dropzone dropzone-single mb-3 dz-clickable" data-toggle="dropzone" data-dropzone-url="http://">

                                  

                                  <div class="dz-preview dz-preview-single"></div>

                                <div class="dz-default dz-message"><span>Drop files here to upload</span></div></div>
                            </div>
                        </div>
                        <!-- / .row -->

                        <!-- Divider -->
                        <hr class="mt-4 mb-5">

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
                                        Making your shop available means that users can see and make orders from your shop and you are obligated to attend to them.
                                    </small>

                                    <div class="row">
                                        <div class="col-auto">

                                            <!-- Toggle -->
                                            <div class="custom-control custom-checkbox-toggle">
                                                <input type="checkbox" class="custom-control-input" id="toggleOne" checked="">
                                                <label class="custom-control-label" for="toggleOne"></label>
                                            </div>

                                        </div>
                                        <div class="col ml--2">

                                            <!-- Help text -->
                                            <small class="text-muted">
                                              You're currently Available
                                            </small>

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
                            Save shop settings
                        </button>

                            </form></div>
                        </div>
                        <!-- / .row -->

                </div>
            </div>
    
@endsection