@extends('layouts.frontend.app')

@push('css')
<link rel="stylesheet" href="{{asset('assets/admin/libs/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/libs/flatpickr/dist/flatpickr.min.css')}}">
@endpush

@section('content')
<br>
<div class="top_star">
    <img src="images/path 41.svg" alt="path star">
  </div>
  <div class="rotated" style="width: 233px;">
    <i class="fab fa-facebook fa-rotate-360" style="color: #FF3C89;"></i>&nbsp;
    <i class="fab fa-whatsapp fa-rotate-360" style="color: #FF3C89;"></i>&nbsp;
    <i class="fab fa-twitter fa-rotate-360" style="color: #FF3C89;"></i> &nbsp;
    <span class="text-muted cabin">
       Follow us on social media </span>
    <span class="run-through"></span>
  </div>

<div class="container" style="margin:auto;">
  <header>
          <a href="index.html">
                  <p class="home">Home /
          </a> <a href="account.html"> <span class="profile"> Update Profile</span> </a>

  </header>
  <div>
          <h2 class="account">
                  Account Information
          </h2>
  </div>

  @include('partials.admin.success')
                  @include('partials.admin.error')

  <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="card card-profile">
                  <div class="table-display bd">
                          <a href="{{ route('customer.accountInfo') }}">
                                  <p class="myprofile"> <i class="far fa-user" style="margin-right:6px;"></i> My
                                          Profile</p>
                          </a>
                          {{-- <p class="personalinfo">
                                  Personal Information
                          </p> --}}
                  </div>
                  <div class="table-display bd">
                          <a href="{{ route('customer.wallet')}}">
                                  <p class="mywallet"> <img src="{{ asset('assets/password/images/wallet-outline.png')}}" alt="wallet" style="margin-right:6px;">
                                          </i> My Wallet</p>
                          </a>
                          {{-- <p class="walletinfo">
                                  Wallet
                          </p> --}}
                  </div>
                  <div class="table-display bd">
                          <a href="{{ route('orders.viewOrders') }}">
                                  <p class="myorders"> <img src="{{ asset('assets/password/images/shopping bag.png')}}" alt="bag"> My Orders</p>
                          </a>
                          {{-- <p class="orderinfo">
                                  My Orders
                          </p> --}}
                  </div>
          </div>
  </div>

  <div class="col-md-8 col-sm-12 col-xs-6">
          <div class="card">
              <div class="col-md-6 col-sm-12 col-xs-6">
              <p class="hidavid">Hi, {{ Auth::user()->fullname }}</p>
                  <p class="infoform"> Personal Information</p>
                  <hr class="line">
                  
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
                          {{-- <div class="row"> --}}
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
                                        {{-- <input type="text" class="form-control" placeholder="" style="font-size: 12px;
                                        font-family: 'Cabin'; font-weight: bold; color: #000033"> --}}
                                </div>
                                  {{-- <div class="form-group">
                                        <label for="">
                                            Date of Birth
                                        </label>
                                        <input type="text" name="dob" class="form-control" placeholder="Enter your birthday" name="birthday" data-toggle="flatpickr" required>
                                    </div> --}}

                        

                        <div class="form-group">
                                <button type="submit" class="purple" style="color:#fff; border-radius:25px; padding:4px; border:none; width:100%;">Update</button>
                        </div>
              </form>
              <h3>Update password</h3>
              <form action="{{ route('customer.profile.password')}}" method="post">
                @csrf


                          <div class="form-group">
                                  <label for="currentPassword" style="font-size: 12px; font-weight: 200;
                                  font-family: 'Cabin', sans-serif; color: #969696">Current Password</label>
                                  <input type="password" name="old_password" class="form-control" placeholder="Enter old password"> 
                                  {{-- value="{{ str_limit($user->password,7) }}> --}}
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
                                <button type="submit" class="purple" 
                                style="color:#fff; border-radius:25px; padding:4px; border:none; width:100%;">Change Password</button>
                        </div>
                  </form>
                  </div>

                  <div class="col-md-6 col-sm-12 col-xs-6" style="margin-top:30px;">

                        <form action="{{ route('customer.profile.location')}}" method="post">
                                @csrf
                          <div class="form-group">
                                          <p class="infoform"> Location Information</p>
                                          <hr class="line">
                                  <label for="location" style="font-size: 12px; font-weight: 200;
                                  font-family: 'Cabin', sans-serif; color: #969696"> Current location</label> <br>

                                  {{-- <div class="input-group form-controlstate"> --}}
                                  <div class="form-group ">
                                          {{-- <div class="input-group-addon">
                                                 <a href="#"> <i class="fas fa-paper-plane" style="color: #FF0066"></i></a>
                                          </div> --}}
                                          {{-- <select name="location" id="location" class="form-control1" style="color:#FF3C89; background-color:rgb(248, 238, 242); font-size: 10px; font-style:italic; font-family:  'Cabin', sans-serif; margin-left: 30px;"> --}}
                                          {{-- @foreach($countries as $country)
                                                {{ $ }}
                                          @endforeach --}}
                                          <select id="country" name="country_code" class="country form-control" style="color:#FF3C89; background-color:rgb(248, 238, 242); font-size: 14px; font-style:italic; font-family:  'Cabin', sans-serif; "
                                          data-toggle="select" data-select2-id="4"  aria-hidden="true">
                                          {{-- tabindex="-1" --}}
                                           {{-- margin-left: 30px; --}}
                                                <option value="">Nothing selected</option>
                                                @foreach($countries as $country)
                                                        <option value="{{ $country->code }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                                {{-- <option value="">{{ $city->name }}</option> --}}
                                                  {{-- <option value="">Abuja</option>
                                                  <option value="">Enugu</option> --}}
                                          {{-- </select> --}}
                                  </div>


                          </div>

                          <div class="form-group">
                                <label for="state" style="font-size: 12px; font-weight: 200;
                                font-family: 'Cabin', sans-serif; color: #969696">State</label>
                                <select id="regions" name="region_id" class="regions form-control " data-toggle="select" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                      {{-- <option data-select2-id="9">Cross River</option> --}}
                                      
                                  </select>
                                {{-- <input type="text" class="form-control" placeholder="Ofiare" style="font-size: 12px;
                                font-family: 'Cabin'; font-weight: bold; color: #000033"> --}}
                        </div>

                          

                          <div class="form-group">
                                  <label for="city" style="font-size: 12px; font-weight: 200;
                                  font-family: 'Cabin', sans-serif; color: #969696">City</label>
                                  <select id="city" name="city_id" class="city form-control " data-toggle="select" data-select2-id="10" tabindex="-1" aria-hidden="true">
                                        {{-- <option data-select2-id="12">Calabar</option>
                                        <option>Akpabuyo</option>
                                        <option>Ikang</option> --}}
                                    </select>
                                  {{-- <input type="text" class="form-control" placeholder="Uyo" style="font-size: 12px;
                                  font-family: 'Cabin';font-weight: bold;  color: #000033"> --}}
                          </div>

                          

                          <div class="form-group">
                                <label for="address" style="font-size: 12px; font-weight: 200;
                                font-family: 'Cabin', sans-serif; color: #969696">Stress Address</label>
                                <input type="text" class="form-control" name="street" value="{{ $user->street }}" placeholder="street">
                        </div>

                          
                                  <button id="savebutton" type="submit">SAVE ALL CHANGES</button>

                                </form>

                  </div>


                  <!-- <p class="Firstname"> First Name</p>
                  <input type="text" value="David"> </p>
                  <p class="Last Name"> Last Name</p>
                  <input type="text" value="Ofiare">
                  <p class="Email" style="margin-top:2px;"> Email Address  </p>
                                  <label for="birthday">Birthday</label>
                                  <input type="text" value=" davidofiare@gmail.com"  style="margin-top:-6px;">
                                  <span class="birthday" style=" margin-top: 35px;">
                                          <div style="margin-left:250px; margin-top:-28px;"><input type="text" value="08" style="width:30px">
                                                  <input type="text" value="XX" style="width:30px;"> <input type="text" value="1999"
                                                          style="width:40px;"></div>
                                  </span>


                          <p class="Current Password"> Current Password</p>
                          <input type="text" value="">
                  <p class="New Password"> New Password</p>
                  <input type="text" value="">
                  <p class="confirm password"> Confirm Password</p>
                   <input type="text" value=""> -->
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


{{-- @push('scripts')
    
@endpush --}}