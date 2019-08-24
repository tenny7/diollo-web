@extends('layouts.frontend.app2')

@push('css')
<link rel="stylesheet" href="{{asset('assets/admin/libs/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/libs/flatpickr/dist/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{ asset('diollo/assets/css/custom.css') }}">
@endpush

@section('content')
<br>


<div class="container" style="margin:auto;">
 <div class="row push-margin-top-product ">

  @include('partials.admin.success')
  @include('partials.admin.error')
  
  @include('partials.diollo.sidebar')

  
  <div class="col-md-8 col-sm-12 col-xs-12">
          <div class="card" style="margin-bottom:100px;">
              <p class="hidavid" style="padding:14px;"><span class="badge badge-primary">Hi, {{ Auth::user()->fullname }}</span> </p>
                  <p class="infoform" style="padding:14px;"> Personal Information</p>
                  <hr class="line">
                <div class="row" style=" padding:25px;">
                        <div class="col-md-6 col-xs-12">   
                        <form action="{{ route('customer.profile.update')}}" method="post">
                                @csrf
                                        <div class="form-group">
                                                <label for="firstName" style="font-size: 12px; font-weight: 200;
                                                font-family: 'Cabin', sans-serif; color: #969696">First Name</label>
                                                <input type="text" class="form-control" name="first_name" value="{{ $user->first_name}}" placeholder="David" style="font-size: 12px;
                                                font-family: 'Cabin', sans-serif; font-weight:bold; color:#0a0a3f" >
                                        </div>
                                        <div class="form-group">
                                                <label for="lastName" style="font-size: 12px; font-weight: 200;
                                                font-family: 'Cabin', sans-serif; color: #969696">Last Name</label>
                                                <input type="text" name="last_name" value="{{ $user->last_name}}" class="form-control" placeholder="Ofiare"  style="font-size: 12px;
                                                font-family: 'Cabin', sans-serif; font-weight:bold; color:#000033">
                                        </div>
                                        
                                                <div class="form-group ">
                                                        <label for="email" style="font-size: 12px; font-weight: 200;
                                                        font-family: 'Cabin', sans-serif; color: #969696">Email</label>
                                                        <input type="text" name="email" class="form-control" value="{{ $user->email}}" placeholder="email">
                                                </div>

                                                <div class="form-group">
                                                        <label for="state" style="font-size: 12px; font-weight: 200;
                                                        font-family: 'Cabin', sans-serif; color: #969696">Phone Number</label> <br>
                                                        <input type="text" class="form-control" name="phone" placeholder="+234" value="{{ $user->phone }}" style=" font-size: 12px;
                                                        font-family: 'Cabin'; font-weight: bold;">
                                                        
                                                </div>
                                                

                                        

                                        <div class="form-group">
                                                <button type="submit" class="purple btn btn-primary" style="color:#fff; border-radius:25px; padding:4px; border:none; width:100%;">Update</button>
                                        </div>
                        </form>
                        </div>

                        <div class="col-md-6 col-xs-12">
                        <h3>Update password</h3>
                        <form action="{{ route('customer.profile.password')}}" method="post">
                                @csrf


                                        <div class="form-group">
                                                <label for="currentPassword" style="font-size: 12px; font-weight: 200;
                                                font-family: 'Cabin', sans-serif; color: #969696">Current Password</label>
                                                <input type="password" name="old_password" class="form-control" placeholder="Enter old password"> 
                                                
                                        </div>

                                        <div class="form-group">
                                                <label for="newPassword" style="font-size: 12px; font-weight: 200;
                                                font-family: 'Cabin', sans-serif; color: #969696">New Password</label>
                                                <input type="password" name="new_password" class="form-control" placeholder="Enter new password">
                                        </div>
                                        <div class="form-group">
                                                <label for="confirmPassword" style="font-size: 12px; font-weight: 200;
                                                font-family: 'Cabin', sans-serif; color: #969696">Confirm Password</label>
                                                <input type="password" name="c_password" class="form-control" placeholder="confirm new password">
                                        </div>

                                        <div class="form-group">
                                                <button type="submit" class="purple btn btn-primary" 
                                                style="color:#fff; border-radius:25px; padding:4px; border:none; width:100%;">Change Password</button>
                                        </div>
                                </form>
                                </div>
                                </div>
                  

                  <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-6" style="margin-top:30px; padding:25px;">

                        <form action="{{ route('customer.profile.location')}}" method="post">
                                @csrf
                          <div class="form-group">
                                          <p class="infoform"> Location Information</p>
                                          <hr class="line">
                                  <label for="location" style="font-size: 12px; font-weight: 200;
                                  font-family: 'Cabin', sans-serif; color: #969696"> Current location</label> <br>

                                  <div class="form-group ">
                                         
                                          <select id="country" name="country_code" class="country form-control" 
                                          data-toggle="select" data-select2-id="4"  aria-hidden="true">
                                        
                                                <option value="">Nothing selected</option>
                                                @foreach($countries as $country)
                                                        <option value="{{ $country->code }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                  </div>


                          </div>

                          <div class="form-group">
                                <label for="state" style="font-size: 12px; font-weight: 200;
                                font-family: 'Cabin', sans-serif; color: #969696">State</label>
                                <select id="regions" name="region_id" class="regions form-control " data-toggle="select" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                </select>
                        </div>

                          

                          <div class="form-group">
                                  <label for="city" style="font-size: 12px; font-weight: 200;
                                  font-family: 'Cabin', sans-serif; color: #969696">City</label>
                                  <select id="city" name="city_id" class="city form-control " data-toggle="select" data-select2-id="10" tabindex="-1" aria-hidden="true">
                                  </select>
                                  
                          </div>

                          

                          <div class="form-group">
                                <label for="address" style="font-size: 12px; font-weight: 200;
                                font-family: 'Cabin', sans-serif; color: #969696">Stress Address</label>
                                <input type="text" class="form-control" name="street" value="{{ $user->street }}" placeholder="street">
                          </div>

                          
                                  <button id="savebutton" class="btn btn-primary" style="text-align:center;" type="submit">SAVE ALL CHANGES</button>

                                </form>

                  </div>
                  </div>
                  {{-- end row --}}

          </div>

  </div>




</div>

@stop

@push('scripts')
<script src="{{ asset('assets/admin/js/custom.js')}}"></script>
<script src="{{ asset('assets/admin/js/toastr.js')}}"></script>
<script src="{{asset('assets/admin/libs/highlightjs/highlight.pack.min.js')}}"></script>
<script src="{{asset('assets/admin/libs/flatpickr/dist/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/admin/libs/jquery-mask-plugin/dist/jquery.mask.min.js')}}"></script>
    
@endpush
