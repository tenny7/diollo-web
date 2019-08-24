<header class="header">
    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg fixed-top shadow navbar-light bg-white">
        <div class="container-fluid">
        <div class="d-flex"><a href="{{ url('/')}}" class="navbar-brand text-uppercase font-weight-bold"><span>{{ config('app.name','Laravel')}}</span></a>
        <form action="{{ route('search.query')}}" method="get" id="search" class="form-inline d-none d-sm-flex">
                    <div class="input-label-absolute input-label-absolute-left input-reset input-expand ml-lg-2 ml-xl-3">
                        <label for="search_search" class="label-absolute"><i class="fa fa-search"></i><span class="sr-only">What are you looking for?</span></label>
                        <input name="search" id="search_search" placeholder="Search" aria-label="Search" class="form-control form-control-sm border-0 shadow-0 bg-gray-200">
                        <button type="submit" class="btn btn-reset btn-sm"><i class="fa-times fas"></i></button>
                    </div>
                </form>
            </div>
            <button type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
            <!-- Navbar Collapse -->
            <div id="navbarCollapse" class="collapse navbar-collapse">
            <form action="{{ route('search.query')}}" method="get" id="searchcollapsed" class="form-inline my-2 d-sm-none">
                    <div class="input-label-absolute input-label-absolute-left w-100">
                        <label for="searchcollapsed_search" class="label-absolute"><i class="fa fa-search"></i><span class="sr-only">What are you looking for?</span></label>
                        <input id="searchcollapsed_search" name="search" placeholder="Search" aria-label="Search" class="form-control form-control-sm border-0 shadow-0 bg-gray-200">
                        <button type="reset" class="btn btn-reset btn-sm"><i class="fa-times fas"></i></button>
                    </div>
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link active">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="docsDropdownMenuLink" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle ">Categories</a>
                        <div aria-labelledby="docsDropdownMenuLink" class="dropdown-menu dropdown-menu-right">
                           
                                        {{-- WOMEN --}}
                                        @php 
                                        $categories = App\Models\Category::all();
                                        @endphp
                                        @foreach($categories as $category)
                                             <a href="{{ route('category.search',$category->id )}}" class="dropdown-item">{{ strtoupper($category->name)}}</a> 
                                        @endforeach
                                    
                                    {{-- <div class="col-md-4 col-xs-4 col-sm-4 text-center">
                                        MEN 
                                    </div>
                                    <div class="col-md-4 col-xs-4 col-sm-4 text-center">
                                        KIDS
                                    </div> --}}
                                
                            {{-- @php 
                                $categories = \App\Category::all();
                            @endphp
                            @forelse($categories as $category)
                            <a href="{{ route('virtual.image.index', $category->slug) }}" class="dropdown-item">{{ $category->name }} </a>
                            @empty 
                            No category
                            @endforelse  --}}
                        </div>
                    </li>
                    {{-- <li class="nav-item dropdown">
                        <a id="docsDropdownMenuLink" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle ">Projects</a>
                        <div aria-labelledby="docsDropdownMenuLink" class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('virtual.photos') }}" class="dropdown-item">Photos </a>
                            <a href="{{ route('virtual.videos') }}" class="dropdown-item">Videos </a>
                           
                        </div>
                    </li> --}}
                    {{-- <li class="nav-item">
                        <a href="{{ url('/') }}" class="nav-link">Home</a>
                    </li> --}}
                    @guest
                     <li class="nav-item ml-lg-3"><a href="{{ route('signin')}}" class="nav-link" >Login</a></li>
                     <li class="nav-item ml-lg-3"><a href="{{ route('signup')}}" class="nav-link" >Sign up</a></li>

                    @else
                    @if (Auth::user()->isAdmin())
                    <li class="nav-item ml-lg-3"><a href="{{ route('admin.dashboard')}}" class="nav-link" >Dashboard</a></li>
                    
                    @endif 
                     <li class="nav-item dropdown">
                        <a id="docsDropdownMenuLink" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle ">Account</a>
                        <div aria-labelledby="docsDropdownMenuLink" class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('customer.accountInfo') }}" class="dropdown-item">Profile </a>
                            <a href="{{ route('saved.item') }}" class="dropdown-item">Wishlist </a>
                            <a href="{{ route('testimonial') }}" class="dropdown-item">Feedback </a>
                            <a href="{{ route('orders.viewOrders') }}" class="dropdown-item">Order History </a>
                            <a href="{{ route('customer.wallet')}}" class="dropdown-item">Wallet</a>
                            <a href="{{ route('customer.logout')}}" class="dropdown-item">Logout</a>
                            
                            {{-- <li class="nav-item ml-lg-3"><a href="{{ route('saved.item')}}" class="nav-link" >Favorite</a></li> --}}
                           
                        </div>
                    </li>
                    
                    @endguest
                    <li class="nav-item ml-lg-3"><a href="{{ route('customer.shop')}}" class="nav-link" >Shop</a></li>
                    <li class="nav-item ml-lg-3"><a href="{{ route('orders.orderPage') }}" class="btn btn-primary">My Cart</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /Navbar -->
</header>