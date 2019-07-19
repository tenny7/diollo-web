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
                        <form action="{{ route('addfund')}}" method="post">
                              @csrf
                          <div class="col-md-12">
                            <div class="foldable">
                              <h4>Top up</h4>
                              <i class="fas fa-angle-up"></i>
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
      
                          </div>
                          <button id="continuebutton" type="submit">CONTINUE</button>
                          </form>
                        </div> 
                        <div class="col-md-4"></div>
                         </div>
      
                      

@stop