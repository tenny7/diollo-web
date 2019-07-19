@extends('layouts.backend.app')
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
                      Categories
                    </h1>

                                </div>
                                <div class="col-auto">



                                </div>
                            </div>
                            <!-- / .row -->
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Nav -->
                                    <ul class="nav nav-tabs nav-overflow header-tabs">
                                        <li class="nav-item">
                                            <a href="products-all.html" class="nav-link active">
                                              All <span class="badge badge-pill badge-soft-secondary">823</span>
                                            </a>
                                        </li>


                                    </ul>

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
                            <button class="dropdown-item deleteCategoryAction" id="deleteCategoryAction">Delete</button>
                        </div>
                                        
                                    </div>

                                </div>
                            </div>
                            <!-- / .row -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm table-nowrap card-table" id="tableId">
                            <!-- <table class="table table-sm card-table"> -->
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-control custom-checkbox table-checkbox">
                                                select
                                                {{-- <input type="checkbox" class="" name="productsSelect" id="productsSelectAll"> --}}
                                                {{-- <label class="custom-control-label" for="productsSelectAll"> --}}
                            &nbsp;
                          </label>
                          
                                            </div>
                                        </th>
                                        <th colspan="2">
                                            <a href="#" class="text-muted sort" data-sort="customers-name">
                                              Category Name
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="customers-email">
                                              Category Level
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="customers-phone">
                                              Meta title
                                            </a>
                                        </th>
                                        <th>
                                            <a href="#" class="text-muted sort" data-sort="customers-city">
                                              Meta description
                                            </a>
                                        </th>
                                        
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox table-checkbox">
                                                {{-- <input type="checkbox" class="custom-control-input" name="productsSelect" id="productsSelectOne">
                                                <label class="custom-control-label" for="productsSelectOne">
                                                    &nbsp;
                                                </label> --}}
                                                <input type="checkbox" class="categoryIDs" value="{{ $category->id }}" name="category[]" id="categoryId">
                                            </div>
                                        </td>
                                        <td class="customers-name" colspan="2">
                                            {{ $category->name }}
                                        </td>
                                        <td class="customers-email">
                                            @if($category->parent_id == null)
                                                {{ 'No parent category' }}
                                            @endif
                                                {{ $category->parent_id }}
                                        </td>
                                        <td class="customers-phone">
                                                {{ $category->meta_title }}
                                        </td>
                                        <td class="customers-city">
                                                {{ $category->meta_description }}
                                        </td>

                                        

                                        <!-- <td class="orders-status">
                                            <div class="badge badge-soft-success">
                                                Shipped
                                            </div>
                                        </td> -->



                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-boundary="window">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="{{route('admin.category.showCategoryUpdate',$category->id)}}" class="dropdown-item">
                                                      Edit Category
                                                    </a>
                                                    {{-- <a href="#!" class="dropdown-item">
                                                      View Ratings
                                                    </a>
                                                    <a href="#!" class="dropdown-item">
                                                      View Returns
                                                    </a> --}}
                                                    
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

@push('scripts')
<script src="{{ asset('assets/admin/js/custom.js')}}"></script>
{{-- <script src="{{ asset('assets/admin/js/toastr.js')}}"></script> --}}
@endpush