@extends('layouts.backend.app')
@push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrapdatatable.min.css')}}">
@endpush
@section('content')
    <div class="main-content">
        


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
                                        Vendors
                                    </h1>

                                </div>
                                <div class="col-auto">
                                <a href="{{route('agent.vendors.new')}}" class="btn btn-primary">
                                        New Vendor
                                    </a>
                                </div>
                            </div>
                            <!-- / .row -->
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Nav -->
                                    <ul class="nav nav-tabs nav-overflow header-tabs">
                                        <li class="nav-item">
                                            <a href="products-all.html" class="nav-link active">
                                            All <span class="badge badge-pill badge-soft-secondary">{{ count($names)}}</span>
                                            </a>
                                        </li>

                                        {{-- <li class="nav-item">
                                            <a href="products-all.html" class="nav-link">
                                                Complete <span class="badge badge-pill badge-soft-secondary">700</span>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="products-all.html" class="nav-link">
                                                Incomplete <span class="badge badge-pill badge-soft-secondary">123</span>
                                            </a>
                                        </li> --}}

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card -->
                    <div class="row">
                    @foreach($names as $referredUser)
                    
                    <div class="col-2">
                            <div class="card">
                                    <img class="card-img-top" src="{{ asset('assets/password/images/user.png')}}" alt="Card image" style="height:50px width:50px; object-fit:contain;" >
                                            <div class="card-body">
                                              <h4 class="card-title text-center">{{ $referredUser}}</h4>
                                              
                                            </div>
                                          </div>
                    </div>
                    
                    
                            
                              
                            
                        @endforeach
                    </div>

                </div>
            </div>
            <!-- / .row -->
        </div>

    </div>
@endsection

@push('scripts') 
<script src="{{ asset('assets/admin/js/jquerydatatable.min.js')}}"></script>
<script src="{{ asset('assets/admin/js/bootstrapdatatable.min.js')}}"></script>

    <script>
    $(document).ready(function() {
    $('#history-datatable').DataTable();
    } );
</script>
@endpush