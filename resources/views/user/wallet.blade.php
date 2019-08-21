@extends('layouts.frontend.app2')
@push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.css') }}">
<link rel="stylesheet" href="{{ asset('diollo/assets/css/custom.css') }}">
@endpush

@section('content')

{{-- <div class="path">
        <img src="{{ asset('assets/password/images/Path 41.svg')}}" alt="path_star">
      </div>
      <div class="top_star">
        <img src="{{ asset('assets/password/images/path 41.svg')}}" alt="path star">
      </div> --}}
      {{-- <div class="rotated" style="width: 233px;">
        <i class="fab fa-facebook fa-rotate-360" style="color: #FF3C89;"></i>&nbsp;
        <i class="fab fa-whatsapp fa-rotate-360" style="color: #FF3C89;"></i>&nbsp;
        <i class="fab fa-twitter fa-rotate-360" style="color: #FF3C89;"></i> &nbsp;
        <span class="text-muted cabin">
           Follow us on social media </span>
        <span class="run-through"></span>
      </div> --}}
      {{-- <br>
      <br>
      <br> --}}
                  <div class="container" style="margin-bottom:100px;">
                    @include('partials.admin.success')
                    @include('partials.admin.error')
                    <h1 class="text-center" style="font-weight: bolder;">My Wallet</h1>
                    <br>
                  <div class="row push-margin-top">
                   @include('partials.diollo.sidebar')
      
                <div class="col-sm-12 col-md-6 col-offset-md-2">
      
                    <div class="card card-edit-login">
                      <div class="" style="padding-bottom: 15px; margin-top: 15px;">
      
                        <div class="paystack row">
                          <div class="col-md-12 atm-card">
                            <h5 style="padding:8px;" class="wallet-element-margin">{{ $user->fullname }}</h5>
                            <div class="row">
                            <div class="col-sm-6 col-md-6">
                              
                              
                              <p class="wallet-element-margin">Available Balance</p>
                              
                            </div>
                            <div class="col-md-6">
                              <h3> <span class="badge badge-info">₦ {{ number_format($wallet,2)}}</span> </h3>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6 col-md-6">
                              <img style="margin-top: 20px; object-fit:contain; width:100%; height:42px;" src="{{ asset('assets/password/images/paystack.png')}}" class="img-responsive img-fluid" alt="paystack logo">
                            </div>
      
                            <div class="col-md-6 col-xs-12">
                                <h3>{{ str_limit($user->account_number, $limit = 4, $end = '******') }}</h3>
                              {{-- <h2>{{ $password = str_repeat("*", strlen($user->account_number)) }}</h2> --}}
                            </div>
                            </div>
      
                            
      
                          </div>
                        </div>
      
                        <div class="row">
                          <div class="col-sm-12 col-md-12">
                            <a href="{{ route('customer.top.up') }}" name="button" class="btn btn-sm btn-primary withdraw-button" style="text-decoration:none; margin-left:58px;">&nbsp;<i class="fas fa-plus-circle"></i> Top Up</a>
                            </div>
                          </div>
                         
                        <hr>
                          
                        <form action="{{ route('customer.account')}}" method="post">
                              @csrf
                          <div class="col-md-12">
                            <div class="foldable">
                              <h4 style="margin-top:30px;">Update Wallet Details</h4>
                              <i class="fas fa-angle-up"></i>
                            </div>
                            <div class="form-group">
                              <label for="name" class="text-muted">Account number</label>
                              <input type="text" class="form-control" name="account_number" id="InputName" value="{{ str_limit($user->account_number, $limit = 4, $end = '******') }}" placeholder="" required>
                            </div>
                            <div class="form-group">
                              <label for="name" class="text-muted">Bank Name</label>
                            <input type="text" class="form-control" name="bank" id="InputName" value="{{ $user->bank}}" placeholder="" required>
                            </div>
                            <div class="form-group">
                              <label for="name" class="text-muted">Account name</label>
                              <input type="text" class="form-control" name="account_name" value="{{ $user->account_name}}" id="InputName" placeholder="" required>
                            </div>
      
                          </div>
                          <button id="continuebutton" class="btn btn-primary btn-sm" style="margin-left:58px;" type="submit">CONTINUE</button>
                          </form>
      
                        </div>
      
                        
      
                      </div>
                    </div>
                </div>
      
                </div>
              </div>

@stop