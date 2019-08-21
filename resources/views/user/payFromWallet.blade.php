@extends('layouts.frontend.app2')
{{-- @push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.css') }}">
@endpush --}}

@section('content')


                         
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

                        
                         <div class="row" style="margin-bottom:50px;">
                             
                             <div class="col-md-4 card offset-md-4" style="padding:20px;">
                                @include('partials.admin.success')
                                @include('partials.admin.error')
                        <form action="{{ route('customer.take.from.wallet')}}" method="post">
                              @csrf
                          {{-- <div class="col-md-12"> --}}
                            <div class="foldable">
                              <h4>Pay from wallet</h4>
                            <h5>Current wallet balance <span class="badge badge-info">₦ {{ number_format(Auth::user()->wallet_balance,2)}}</span></h5>
                              {{-- <i class="fas fa-angle-up"></i> --}}
                            </div>
                            <div class="form-group">
                              <label for="name" class="text-muted">Deduct Amount</label>
                            <input type="text" class="form-control" name="amount" value="{{ $total }}" id="InputName" placeholder="" readonly required>
                            {{-- </div> --}}
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                        
      
                          </div>
                          <button id="continuebutton" class="btn btn-primary" type="submit">CONTINUE</button>

                          </form>
                          <br>
                          <div class="row">
                          <div class="col-sm-12 col-md-12">
                            <a href="{{ route('customer.top.up') }}" name="button" class="btn btn-sm btn-success withdraw-button" style="">&nbsp;<i class="fas fa-plus-circle"></i> Top Up Wallet</a>
                            </div>
                          </div>
                        </div> 
                        <div class="col-md-4"></div>
                         </div>
      
                      

@stop