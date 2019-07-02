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
                <div class="col-6 col-lg-6 col-xl-6">

                    <!-- Header -->
                    <div class="header mt-md-5">
                        <div class="header-body">
                            <div class="row align-items-center">
                                <div class="col">

                                    <!-- Pretitle -->
                                    <h6 class="header-pretitle">
                                        New Vendor
                                    </h6>

                                    <!-- Title -->
                                    <h1 class="header-title">
                                        Add Vendor
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

                 
              
              <!-- Subheading -->
              <p class="text-muted text-center mb-5">
                  Select a user
              </p>

              {{-- <div class="text-center">
                  <small class="text-center">
                  user already registered?, select user from the list
                  </small>
              </div> --}}

              <div class="form-group">
      
                  <!-- Label -->
                  <label>Users</label>
                  <!-- Input -->
                  <select name="user_name" id="" class="form-control">
                      @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->fullname }}</option>
                      @endforeach
                  </select>
              </div>
              
              
            <br>
            <hr>

               <!-- Heading -->
               <h1 class="display-4 text-center mb-3">
                  Sign Up
              </h1>
          
              {{-- @include('partials.admin.success')
              @include('partials.admin.error') --}}
              @if(isset($success))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success! </strong> {{ $success }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
              </div>

              @endif
              <!-- Form -->
              <form action="{{ route('storeVendorAgent') }}" method="POST">
                  @csrf

                  <!-- First Name -->
                  <div class="form-group">
      
                      <!-- Label -->
                      <label>First Name</label>
                      <!-- Input -->
                      <input type="text" name="first_name" class="form-control{{ $errors->has('firstname')?' is-invalid':'' }}" placeholder="name@address.com">
                      @if ($errors->any() && $errors->has('firstname'))
                          <div class="invalid-feedback">
                              {{ $errors->first('firstname') }}
                          </div>
                      @endif
                  </div>

                  <!-- Last Name -->
                  <div class="form-group">
      
                      <!-- Label -->
                      <label>Last Name</label>
                      <!-- Input -->
                      <input type="text" name="last_name" class="form-control{{ $errors->has('lastname')?' is-invalid':'' }}" placeholder="name@address.com">
                      @if ($errors->any() && $errors->has('lastname'))
                          <div class="invalid-feedback">
                              {{ $errors->first('lastname') }}
                          </div>
                      @endif
                  </div>

                  <!-- Phone Number -->
                  <div class="form-group">
      
                      <!-- Label -->
                      <label>Phone Number</label>
                      <!-- Input -->
                      <input type="text" name="phone" class="form-control{{ $errors->has('phone')?' is-invalid':'' }}" placeholder="name@address.com">
                      @if ($errors->any() && $errors->has('phone'))
                          <div class="invalid-feedback">
                              {{ $errors->first('phone') }}
                          </div>
                      @endif
                  </div>

                  <!-- Email address -->
                  <div class="form-group">
      
                      <!-- Label -->
                      <label>Email Address</label>
                      <!-- Input -->
                      <input type="email" name="email" class="form-control{{ $errors->has('email')?' is-invalid':'' }}" placeholder="name@address.com">
                      @if ($errors->any() && $errors->has('email'))
                          <div class="invalid-feedback">
                              {{ $errors->first('email') }}
                          </div>
                      @endif
                      
                  </div>
      
                  <!-- Password -->
                  <div class="form-group">
      
                      <div class="row">
                          <div class="col">
                              
                              <!-- Label -->
                              <label>Password</label>
          
                          </div>
                          <div class="col-auto">
                          
                              <!-- Help text -->
                              <a href="#" class="form-text small text-muted">
                                  Forgot password?
                              </a>
          
                          </div>
                      </div> <!-- / .row -->
                      <script>
                          function showPassword() {
                              var x = document.getElementById("password");
                              if (x.type === "password") {
                                  x.type = "text";
                              } else {
                                  x.type = "password";
                              }
                          }
                      </script>
      
                      <!-- Input group -->
                      <div class="input-group input-group-merge">
          
                          <!-- Input -->
                          <input type="password" name="password" class="form-control form-control-appended" id="password" placeholder="Enter your password">
          
                          <!-- Icon -->
                          <div class="input-group-append" onclick="showPassword()">
                              <span class="input-group-text">
                                  <i class="fe fe-eye"></i>
                              </span>
                          </div>
                      </div>
                  </div>
      
                  <!-- Submit -->
                  <button class="btn btn-lg btn-block btn-primary mb-3" type="submit">
                  Proceed
                  </button>
      
                  <!-- Link -->
                  
                  
              </form>

              <hr>

              

            {{-- <p>or <span>Select from already existing users</span></p> --}}

             
                    </div>
                    {{-- <div class="form-group"> --}}
                        
                    {{-- </div> --}}

                </div>

                
            </div>
    
@endsection