@extends('layouts.frontend.app2')
@push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.css') }}">
<link rel="stylesheet" href="{{ asset('diollo/assets/css/custom.css') }}">
@endpush

@section('content')


                         
                       
                         <div class="row push-margin-top-product" style="margin-bottom:50px;">
                            
                             <div class="col-md-4 offset-md-4 card" style="padding:20px;">
                        <form action="{{ route('addfund')}}" method="post">
                              @csrf
                          {{-- <div class="col-md-12"> --}}
                            <div class="foldable">
                              <h4>Top up</h4>
                              
                            </div>
                            <div class="form-group">
                              <label for="name" class="text-muted">Amount</label>
                              <input type="text" class="form-control" name="amount" id="InputName" placeholder="" required>
                            </div>
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                        {{-- <input type="hidden" name="amount" value="{{ Auth::user()->email }}"> --}}
                            {{-- <div class="form-group">
                              <label for="name" class="text-muted">Bank Name</label>
                              <input type="text" class="form-control" name="bank" id="InputName" placeholder="" required>
                            </div> --}}
                            {{-- <div class="form-group">
                              <label for="name" class="text-muted">Account name</label>
                              <input type="text" class="form-control" name="account_name" id="InputName" placeholder="" required>
                            </div> --}}
      
                          {{-- </div> --}}
                          <button id="continuebutton" class="btn btn-primary" type="submit">CONTINUE</button>
                          </form>
                        </div> 
                        <div class="col-md-4"></div>
                         </div>
      
                      

@stop
@push('js')
<script src="{{ asset('assets/admin/js/custom.js')}}"></script>
<script src="{{ asset('assets/admin/js/toastr.js')}}"></script>
@endpush