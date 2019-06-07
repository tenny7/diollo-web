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
                      Orders
                    </h1>

                  </div>
                  <div class="col-auto">

                    <!-- Button -->
                    <!-- <a href="#" class="btn btn-primary">
                      New order
                    </a> -->

                  </div>
                </div> <!-- / .row -->
                <div class="row align-items-center">
                  <div class="col">

                      <!-- Nav -->
                      <ul class="nav nav-tabs nav-overflow header-tabs">
                        <li class="nav-item">
                          <a href="sales-all.html" class="nav-link">
                            All <span class="badge badge-pill badge-soft-secondary">823</span>
                          </a>
                        </li>
                        {{-- <li class="nav-item">
                          <a href="sales-pending.html" class="nav-link">
                            Pending <span class="badge badge-pill badge-soft-secondary">24</span>
                          </a>
                        </li> --}}
                        <li class="nav-item">
                          <a href="sales-reserved.html" class="nav-link active">
                            Reserved <span class="badge badge-pill badge-soft-secondary">3</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="sales-returns.html" class="nav-link">
                            Returns <span class="badge badge-pill badge-soft-secondary">71</span>
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
                        <a class="dropdown-item" href="#!">Action</a>
                        <a class="dropdown-item" href="#!">Another action</a>
                        <a class="dropdown-item" href="#!">Something else here</a>
                      </div>
                    </div>

                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="table-responsive">
                <table class="table table-sm table-nowrap card-table">
                  <thead>
                    <tr>
                      <th>
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectAll">
                          <label class="custom-control-label" for="ordersSelectAll">
                            &nbsp;
                          </label>
                        </div>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="sales-onumber">
                          Order
                        </a>
                      </th>
                      <th colspan="2">
                            <a href="#" class="text-muted sort" data-sort="sales-user">
                                Customer
                            </a>
                        </th>
                        <th colspan="2">
                        <a href="#" class="text-muted sort" data-sort="sales-product">
                          Products
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="sales-date">
                          Date
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="sales-total">
                          Total
                        </a>
                      </th>
                      <th>
                        <a href="#" class="text-muted sort" data-sort="sales-status">
                          Status
                        </a>
                      </th>
                      <th colspan="2">
                        <a href="#" class="text-muted sort" data-sort="sales-method">
                          Payment method
                        </a>
                      </th>
                    </tr>
                  </thead>
                  <tbody class="list"><tr>
                      <td>
                        <div class="custom-control custom-checkbox table-checkbox">
                          <input type="checkbox" class="custom-control-input" name="ordersSelect" id="ordersSelectOne">
                          <label class="custom-control-label" for="ordersSelectOne">
                            &nbsp;
                          </label>
                        </div>
                      </td>
                      <td class="sales-onumber">
                        #6520
                      </td>
                      <td colspan="2" class="sales-user">
                            Christian Jombo
                        </td>
                      <td colspan="2" class="sales-product">
                          LG 8Kg Washer &amp; 5Kg Dryer Front Load Washing Machine - F4J6TMP8S <br>
                          Scanfrost Front Loader 8kg Wash And Dry (full Automatic ) <br>
                          Hisense AUTOMATIC WASHING MACHINE FRONT LOADER <br>
                      </td>
                      <td class="sales-date">
                        <time datetime="2018-07-30">07/30/18</time>
                      </td>
                      <td class="sales-total">
                        $55.25
                      </td>
                      <td class="sales-status">
                        <div class="badge badge-soft-warning">
                          reserved
                        </div>
                      </td>
                      <td class="sales-method">
                        Mastercard
                      </td>
                      <td class="text-right">
                        <div class="dropdown">
                          <a href="#!" class="dropdown-ellipses dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-boundary="window">
                            <i class="fe fe-more-vertical"></i>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a href="#!" class="dropdown-item">
                              View Invoice
                            </a>
                            <a href="#!" class="dropdown-item">
                              Mark as Returned
                            </a>
                            <a href="#!" class="dropdown-item">
                              Mark as Reserved
                            </a>
                          </div>
                        </div>
                      </td>
                    </tr></tbody>
                </table>
              </div>
            </div>

          </div>
        </div> <!-- / .row -->
      </div>

    </div>
@endsection