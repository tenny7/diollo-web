@extends('layouts.frontend.app2')
@push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.css') }}">
<link rel="stylesheet" href="{{ asset('diollo/assets/css/custom.css') }}">
@endpush

@section('content')


                  <div class="container" style="margin-bottom:100px;">
                    @include('partials.admin.success')
                    @include('partials.admin.error')
                    <h1 class="text-center" style="font-weight: bolder;">My Wallet</h1>
                    <br>
                  <div class="row push-margin-top">
                   @include('partials.diollo.sidebar')
      
                <div class="col-sm-12 col-md-12">
      {{-- modified ui --}}
                    <div class="card card-edit-login h3-margin-top">
                      {{-- <div class="" style="padding-bottom: 15px; margin-top: 15px;"> --}}
      
                        {{-- <div class="col-md-12 atm-card"> --}}
                            <h5 style="padding:8px;" class="wallet-element-margin">{{ $user->fullname }}</h5>
                            {{-- </div> --}}
                        {{-- <div class="paystack row"> --}}
                          
                            <div class="row">
                            <div class="col-sm-12 col-md-4">
                              {{-- <label for="">Available Balance</label> --}}
                              <h4 style="padding:10px;">Available Balance <span class="badge badge-primary">₦ {{ number_format($wallet,2)}}</span> </h4>
                            </div>
                            <div class="col-sm-12 col-md-4">
                              {{-- margin-top: 20px; object-fit:contain; width:100%; height:42px; --}}
                              <img style="padding:10px;" src="{{ asset('assets/password/images/paystack.png')}}" class="img-responsive img-fluid" alt="paystack logo">
                            </div>
                            <div class="col-sm-12 col-md-4">
                            <a href="{{ route('customer.top.up') }}" name="button" class="btn btn-primary " style="text-decoration:none; margin:10px;">&nbsp;<i class="fas fa-plus-circle"></i> Top Up</a>
                            {{-- withdraw-button --}}
                            </div>
                          </div>
                          <hr>
                          {{-- <div class="row">
                            <div class="col-md-12 col-xs-12"> --}}
                                <h3 style="text-align:center;">{{ str_limit($user->account_number, $limit = 4, $end = '******') }}</h3>
                            {{-- </div>
                          </div> --}}
      
                            
      
                          
                        {{-- </div> --}}
      
                         
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
                          <button id="continuebutton" class="btn btn-primary" style="margin-left:10px;" type="submit">CONTINUE</button>
                          </form>
      
                        {{-- </div> --}}
      
                        
      
                      </div>
                    </div>
                </div>
      
                </div>
              </div>

@stop