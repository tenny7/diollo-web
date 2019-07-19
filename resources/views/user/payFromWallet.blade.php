@extends('layouts.frontend.app')
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
                             <div class="col-md-4"></div>
                             <div class="col-md-4">
                                @include('partials.admin.success')
                                @include('partials.admin.error')
                        <form action="{{ route('customer.take.from.wallet')}}" method="post">
                              @csrf
                          <div class="col-md-12">
                            <div class="foldable">
                              <h4>Pay from wallet</h4>
                              <i class="fas fa-angle-up"></i>
                            </div>
                            <div class="form-group">
                              <label for="name" class="text-muted">Amount</label>
                            <input type="text" class="form-control" name="amount" value="{{ $total }}" id="InputName" placeholder="" required>
                            </div>
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                        
      
                          </div>
                          <button id="continuebutton" type="submit">CONTINUE</button>
                          </form>
                        </div> 
                        <div class="col-md-4"></div>
                         </div>
      
                      

@stop