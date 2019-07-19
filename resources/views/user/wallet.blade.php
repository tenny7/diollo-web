@extends('layouts.frontend.app')
{{-- @push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.css') }}">
@endpush --}}

@section('content')

<div class="path">
        <img src="{{ asset('assets/password/images/Path 41.svg')}}" alt="path_star">
      </div>
      <div class="top_star">
        <img src="{{ asset('assets/password/images/path 41.svg')}}" alt="path star">
      </div>
      <div class="rotated" style="width: 233px;">
        <i class="fab fa-facebook fa-rotate-360" style="color: #FF3C89;"></i>&nbsp;
        <i class="fab fa-whatsapp fa-rotate-360" style="color: #FF3C89;"></i>&nbsp;
        <i class="fab fa-twitter fa-rotate-360" style="color: #FF3C89;"></i> &nbsp;
        <span class="text-muted cabin">
           Follow us on social media </span>
        <span class="run-through"></span>
      </div>
      <br>
      <br>
      <br>
                  <div class="container">
                    @include('partials.admin.success')
                    @include('partials.admin.error')
                    <h1 class="text-center" style="font-weight: bolder;">My Wallet</h1>
                    <br>
                  <div class="row">
                  <div class="col-md-4 col-sm-12 " style="padding-top: 20px;">
                   <div class="_display">
                     <div class="">
                       <i class="far fa-user">&nbsp;&nbsp;</i>
                     </div>
                     <div>
                       <a class="bd" href="{{ route('customer.accountInfo') }}">My Profile</a>
                       <p class="text-muted">Account Information</p>
                     </div>
                   </div>
                   <div class="_display">
                     <div class="">
                     <img src="{{ asset('assets/password/images/wallet-outline.png')}}" alt="wallet">&nbsp;&nbsp;
                     </div>
                     <div>
                       <a class="bd" href="{{ route('customer.wallet')}}">My Wallet</a>
                       <p class="text-muted">Wallet</p>
                     </div>
                   </div>
                   <div class="_display">
                     <div class="">
                  <img src="{{ asset('assets/password/images/shopping bag.png')}}" alt="bag">
                     </div>
                     <div>
                       <a class="bd" href="{{ route('orders.viewOrders') }}">My Orders</a>
                       <p class="text-muted">Orders</p>
                     </div>
                   </div>
                  </div>
      
                <div class="col-sm-12 col-md-4 col-offset-md-2">
      
                    <div class="card card-edit-login">
                      <div class="" style="padding-bottom: 15px; margin-top: 15px;">
      
                        <div class="paystack row">
                          <div class="col-md-12 atm-card">
                            <div class="col-sm-6 col-md-6">
                              <p>Available Balance</p>
                            <h3>N {{ number_format($wallet,2)}}</h3>
                            </div>
                            <div class="col-sm-6 col-md-6">
                              <img style="margin-top: 20px;" src="{{ asset('assets/password/images/paystack.png')}}" class="img-responsive img-fluid" alt="paystack logo">
                            </div>
      
                            <div class="col-md-12">
                                    
                                
                                <h2>{{ str_limit($user->account_number, $limit = 4, $end = '******') }}</h2>
                              {{-- <h2>{{ $password = str_repeat("*", strlen($user->account_number)) }}</h2> --}}
                            </div>
      
                            <div class="col-md-12 apart">
                            <p>{{ $user->fullname }}</p>
                            {{-- <p>01/19</p> --}}
                            </div>
      
                          </div>
                        </div>
      
                        <div class="col-sm-12 col-md-12">
      
                          <div class="centralize">
                            <div class="col-sm-6 col-md-6">
                              <a href="" class="btn-md btn-secondary withdraw-button">&nbsp;<i class="fas fa-minus-circle"></i> Withdraw</a>
                            </div>
                            <div class="col-sm-6 col-md-6">
                            <a href="{{ route('customer.top.up') }}" name="button" class="btn-md btn-secondary withdraw-button ">&nbsp;<i class="fas fa-plus-circle"></i> Top Up</a>
                            
                              
                            </div>
                          </div>
      
                          {{-- <div class="col-md-12">
                              <div class="foldable">
                                  <h4>All Transactions</h4>
                                  <i class="fas fa-angle-down"></i>
                              </div>
      
                            <div class="row">
                              <div class="col-md-12 no-padding">
                                <div class="row row-details">
                                  <div class=""><i class="fas fa-minus" style="color: #FFB000;"></i></div>
                                  <div class=""><h4>N3,999</h4></div>&nbsp;
                                  <div class="">Withdrawal</div>&nbsp;
                                  <div class="">12-10-2018</div>&nbsp;
                              </div>
                              </div>
      
      
                              <div class="col-md-12 no-padding">
                                <div class="row row-details">
                                  <div class=""><i class="fas fa-minus" style="color: #52CB9C;"></i></div>
                                  <div class=""><h4>N3,999</h4></div>&nbsp;
                                  <div class="">Top Up</div>&nbsp;
                                  <div class="">12-10-2018</div>&nbsp;
                                </div>
                              </div>
      
      
                              <div class="col-md-12 no-padding">
                                <div class="row row-details">
                                  <div class=""><i class="fas fa-minus" style="color: #FF0066;"></i></div>
                                  <div class=""><h4>N3,999</h4></div>&nbsp;
                                  <div class="">Purchase</div>&nbsp;
                                  <div class="">12-10-2018</div>&nbsp;
                               </div>
                              </div>
      
      
                              <div class="col-md-12 no-padding">
                                <div class="row row-details">
                                  <div class=""><i class="fas fa-minus" style="color: #FFB000;"></i></div>
                                  <div class=""><h4>N3,999</h4></div>&nbsp;
                                  <div class="">Withdrawal</div>&nbsp;
                                  <div class="``">12-10-2018</div>&nbsp;
                                </div>
                              </div>
                            </div> --}}
      
      
                          </div>
                         
                        
                          
                        <form action="{{ route('customer.account')}}" method="post">
                              @csrf
                          <div class="col-md-12">
                            <div class="foldable">
                              <h4>Update Wallet Details</h4>
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
                          <button id="continuebutton" type="submit">CONTINUE</button>
                          </form>
      
                        </div>
      
                        
      
                      </div>
                    </div>
                </div>
      
                </div>
              </div>

@stop