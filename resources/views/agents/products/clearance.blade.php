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
                <div class="col-12">

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
                      Products
                    </h1>

                                </div>
                                <div class="col-auto">

                                    <!-- Button -->
                                    <!-- <a href="#" class="btn btn-primary">
                                      New Product
                                    </a> -->

                                </div>
                            </div>
                            <!-- / .row -->
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Nav -->
                                    @include('partials.admin.tab')

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card -->
                    <div class="card" data-toggle="lists" data-lists-values="[&quot;orders-order&quot;, &quot;orders-product&quot;, &quot;orders-date&quot;, &quot;orders-total&quot;, &quot;orders-status&quot;, &quot;orders-method&quot;]">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Search -->
                                    <form class="row align-items-center">
                                        <div class="col-auto pr-0">
                                            <span class="fe fe-search text-muted"></span>
                                        </div>
                                        <div class="col">
                                            <input type="search" class="form-control form-control-flush search" placeholder="Search">
                                        </div>
                                    </form>

                                </div>
                                <div class="col-auto">

                                    <!-- Button -->

                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-white dropdown-toggle" type="button" id="bulkActionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Bulk action
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bulkActionDropdown">
                                            <a class="dropdown-item" href="#!">Action</a>
                                            <a class="dropdown-item" href="#!">Another action</a>
                                            <a class="dropdown-item" href="#!">Something else here</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- / .row -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm table-nowrap card-table">
                            <!-- <table class="table table-sm card-table"> -->
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-control custom-checkbox table-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="productsSelect" id="productsSelectAll">
                                                <label class="custom-control-label" for="productsSelectAll">
                            &nbsp;
                          </label>
                                            </div>
                                        </th>
                                        <th colspan="2">
                                            <a href="#" class="text-muted sort" data-sort="products-product">
                                              Product
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="products-code">
                                              Code
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="products-brand">
                                              Brand
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="products-price">
                                              Price
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="products-dprice">
                                              Discount Price
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="products-quantity">
                                              Quantity
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="products-category">
                                              Category
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="products-vendor">
                                              Vendor
                                            </a>
                                        </th>

                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="products-date">
                                              Date
                                            </a>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                        {{-- {{ dd($products)}} --}}
                                        @foreach($products as $product)
                                        <tr>
                                            <td>
                                                <div class="custom-control custom-checkbox table-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="productsSelect" id="productsSelectOne">
                                                    <label class="custom-control-label" for="productsSelectOne">
                                                        &nbsp;
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="products-product" colspan="2">
                                                {{ $product->name }}
                                            </td>
                                            <td class="products-code">
                                                {{ $product->code }}
                                            </td>
                                            <td class="products-brand">
                                                {{ $product->brand }}
                                            </td>
                                            <td class="products-price">
                                                {{ $product->original_price }}
                                            </td>
    
                                            <td class="products-dprice">
                                                {{ $product->discount_price }}
                                            </td>
                                            <td class="products-quantity">
                                                {{ $product->qty }}
                                            </td>
                                            <td class="products-category">
                                                @foreach($product->categories as $category)
                                                    {{ $category->name }}
                                                @endforeach
                                            </td>
                                            <td class="products-vendor">
                                                {{-- @foreach($product->store as $store) --}}
                                                @php 
                                                    $store = \App\Models\Store::where('id',$product->store)->first();
                                                @endphp
                                                {{ $store->name }}
                                                {{-- @endforeach --}}
                                            </td>
                                            <!-- <td class="orders-status">
                                                <div class="badge badge-soft-success">
                                                    Shipped
                                                </div>
                                            </td> -->
    
                                            <td class="orders-date">
                                                {{-- <time datetime="2018-07-30">07/30/18</time> --}}
                                                {{ $product->created_at->diffForHumans() }}
                                            </td>
    
                                            <td class="text-right">
                                                <div class="dropdown">
                                                    <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-boundary="window">
                                                        <i class="fe fe-more-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#!" class="dropdown-item">
                                                          View Product
                                                        </a>
                                                    <a href="{{ route('agent.products.updateForm', $product->slug) }}" class="dropdown-item">
                                                          Edit Product
                                                        </a>
                                                    <a href="{{ route('agent.products.addFeatured',$product->slug) }}" class="dropdown-item">
                                                          Add to featured
                                                        </a>
                                                        <a href="{{ route('agent.products.addClearance',$product->slug) }}" class="dropdown-item">
                                                          Add to Clearance Sales
                                                        </a>
                                                        <a href="{{ route('agent.products.delete',$product->slug) }}" class="dropdown-item">
                                                          Delete Product
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                        <div class="card-footer">
                            <div class="row align-items-center">
                                <!-- <div class="col">



                                </div> -->
                                <div class="col-auto" style="height:33px">

                                    <!-- Button -->

                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination pagination-sm">
                                            <li class="page-item"><a class="page-link" href="#!">Previous</a></li>
                                            <li class="page-item"><a class="page-link" href="#!">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#!">Next</a></li>
                                        </ul>
                                    </nav>

                                </div>
                            </div>
                            <!-- / .row -->
                        </div>
                    </div>

                </div>
            </div>
            <!-- / .row -->
        </div>

    </div>
@endsection