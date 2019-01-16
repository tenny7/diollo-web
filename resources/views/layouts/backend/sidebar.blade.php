<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light" id="sidebar">
        <div class="container-fluid">

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

            <!-- Brand -->
            <a class="navbar-brand" href="index.html">
            <img src="{{asset('assets/admin/img/logo.svg')}}" class="navbar-brand-img
            mx-auto" alt="...">
          </a>

            <!-- User (xs) -->
            <div class="navbar-user d-md-none">

                <!-- Dropdown -->
                <div class="dropdown">

                    <!-- Toggle -->
                    <a href="#!" id="sidebarIcon" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="avatar avatar-sm avatar-online">
                            <img src="assets/img/avatars/profiles/avatar-1.jpg" class="avatar-img rounded-circle" alt="...">
                        </div>
                    </a>

                    <!-- Menu -->
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sidebarIcon">
                        <a href="profile-posts.html" class="dropdown-item">Profile</a>
                        <a href="settings.html" class="dropdown-item">Settings</a>
                        <hr class="dropdown-divider">
                        <a href="sign-in.html" class="dropdown-item">Logout</a>
                    </div>

                </div>

            </div>

            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidebarCollapse">

                <!-- Form -->
                <form class="mt-4 mb-3 d-md-none">
                    <div class="input-group input-group-rounded input-group-merge">
                        <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <span class="fe fe-search"></span>
                            </div>
                        </div>
                    </div>
                </form>

                @if (1 == 1)
                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('vendor.dashboard')}}" role="button" aria-expanded="true" aria-controls="sidebarDashboards">
                                <i class="fe fe-home"></i> Dashboard
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="navbar-divider my-3">
    
                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#products" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="products">
                                <i class="fe fe-box"></i> Products
                             </a>
                            <div class="collapse {{ Request::is('vendor/products*') ? 'show' : '' }}" id="products">
                                <ul class="nav nav-sm flex-column">
                                    
                                    
                                    <li class="nav-item">
                                    <a href="{{route('vendor.products.index')}}" class="nav-link {{ Request::is('vendor/products/all*') ? 'active' : '' }}">
                                            All Products
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('vendor.products.clearance')}}" class="nav-link {{ Request::is('*clearance') ? 'active' : '' }}">
                                            Clearance Products
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('vendor.products.featured')}}" class="nav-link {{ Request::is('vendor/products/featured*') ? 'active' : '' }}">
                                            Featured Products
                                        </a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="#sales" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="sales">
                                <i class="fe fe-shopping-cart"></i> Sales
                                </a>
                            <div class="collapse {{ Request::is('vendor/sales*') ? 'show' : '' }}" id="sales">
                                <ul class="nav nav-sm flex-column">
                                    
                                    
                                    <li class="nav-item">
                                        <a href="{{route('vendor.sales.index')}}" class="nav-link {{ Request::is('vendor/sales/all*') ? 'active' : '' }}">
                                            All Sales
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('vendor.sales.reserved')}}" class="nav-link {{ Request::is('vendor/sales/reserved*') ? 'active' : '' }}">
                                            Reserved
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('vendor.sales.returns')}}" class="nav-link {{ Request::is('vendor/sales/returns*') ? 'active' : '' }}">
                                            Returns
                                        </a>
                                    </li>
    
                                    <li class="nav-item">
                                        <a href="{{route('vendor.sales.customers')}}" class="nav-link {{ Request::is('vendor/sales/customers*') ? 'active' : '' }}">
                                            Customers
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>
                        
                    </ul>
    
                    <!-- Divider -->
                    <hr class="navbar-divider my-3">
    
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-4">
                        <li class="nav-item">
                            <a class="nav-link" href="#settings" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="settings">
                                <i class="fe fe-settings"></i> Settings
                                </a>
                            <div class="collapse {{ Request::is('vendor/settings*') ? 'show' : '' }}" id="settings">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{route('vendor.settings.general')}}" class="nav-link {{ Request::is('vendor/settings/general*') ? 'active' : '' }}">
                                            General
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('vendor.settings.profile')}}" class="nav-link {{ Request::is('vendor/settings/profile*') ? 'active' : '' }}">
                                            Profile
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('vendor.settings.password')}}" class="nav-link {{ Request::is('vendor/settings/password*') ? 'active' : '' }}">
                                            Password
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('vendor.settings.bank')}}" class="nav-link {{ Request::is('vendor/settings/bank*') ? 'active' : '' }}">
                                            Bank
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarModalActivity" data-toggle="modal">
                                <span class="fe fe-bell"></span> Notifications &nbsp;<span class="badge badge-soft-dark" style="font-size:70%">17</span>
                            </a>
                        </li>
                    </ul>

                    
                @elseif (2 == 2)
                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('vendor.dashboard')}}" role="button" aria-expanded="true" aria-controls="sidebarDashboards">
                                <i class="fe fe-home"></i> Dashboard
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="navbar-divider my-3">
    
                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#vendors" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="vendors">
                                <i class="fe fe-briefcase"></i> Vendors
                             </a>
                            <div class="collapse {{ Request::is('agent/vendors*') ? 'show' : '' }}" id="vendors">
                                <ul class="nav nav-sm flex-column">
                                    
                                    
                                    <li class="nav-item">
                                    <a href="{{route('agent.vendors.index')}}" class="nav-link {{ Request::is('agent/vendors/all*') ? 'active' : '' }}">
                                            All Vendors
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('agent.vendors.complete')}}" class="nav-link {{ Request::is('agent/vendors/complete*') ? 'active' : '' }}">
                                            Complete
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('agent.vendors.incomplete')}}" class="nav-link {{ Request::is('agent/vendors/incomplete*') ? 'active' : '' }}">
                                            Incomplete
                                        </a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#products" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="products">
                                <i class="fe fe-box"></i> Products
                                </a>
                            <div class="collapse {{ Request::is('agent/products*') ? 'show' : '' }}" id="products">
                                <ul class="nav nav-sm flex-column">
                                    
                                    
                                    <li class="nav-item">
                                    <a href="{{route('agent.products.index')}}" class="nav-link {{ Request::is('agent/products/all*') ? 'active' : '' }}">
                                            All Products
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('agent.products.clearance')}}" class="nav-link {{ Request::is('*clearance') ? 'active' : '' }}">
                                            Clearance Products
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('agent.products.featured')}}" class="nav-link {{ Request::is('agent/products/featured*') ? 'active' : '' }}">
                                            Featured Products
                                        </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>
                        
                    </ul>
    
                    <!-- Divider -->
                    <hr class="navbar-divider my-3">
    
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-4">
                        <li class="nav-item">
                            <a class="nav-link" href="#settings" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="settings">
                                <i class="fe fe-settings"></i> Settings
                                </a>
                            <div class="collapse {{ Request::is('agent/settings*') ? 'show' : '' }}" id="settings">
                                <ul class="nav nav-sm flex-column">
                                    
                                    <li class="nav-item">
                                        <a href="{{route('agent.settings.profile')}}" class="nav-link {{ Request::is('agent/settings/profile*') ? 'active' : '' }}">
                                            Profile
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('agent.settings.password')}}" class="nav-link {{ Request::is('agent/settings/password*') ? 'active' : '' }}">
                                            Password
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('agent.settings.bank')}}" class="nav-link {{ Request::is('agent/settings/bank*') ? 'active' : '' }}">
                                            Bank
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
    
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarModalActivity" data-toggle="modal">
                                <span class="fe fe-bell"></span> Notifications &nbsp;<span class="badge badge-soft-dark" style="font-size:70%">17</span>
                            </a>
                        </li>
                    </ul>
                @endif

                


            </div>
            <!-- / .navbar-collapse -->

        </div>
    </nav>