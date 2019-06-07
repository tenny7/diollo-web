@extends('layouts.forms.app')

@section('content')
    <!-- CONTENT
    ================================================== -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 col-xl-5 my-5">
            
                <!-- Heading -->
                <h1 class="display-4 text-center mb-3">
                    Become an Agent
                </h1>
                
                <!-- Subheading -->
                <p class="text-muted text-center">
                    Help thousands of store owners get started on our platform and earn
                    commisions.
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 col-xl-5">
                
                <div class="steps clearfix">
                    <ul role="tablist" class="">
                        <li role="tab" aria-disabled="false" class="first checked current" aria-selected="true">
                            <a id="wizard-t-0" href="#wizard-h-0" aria-controls="wizard-p-0">
                            </a>
                        </li>
                        <li role="tab" aria-disabled="false" class="" aria-selected="false">
                            <a id="wizard-t-1" href="#wizard-h-1" aria-controls="wizard-p-1">
                            </a>
                        </li>
                        <li role="tab" aria-disabled="false">
                            <a id="wizard-t-2" href="#wizard-h-2" aria-controls="wizard-p-2">
                            </a>
                        </li>
                        <li role="tab" aria-disabled="false" class="last">
                            <a id="wizard-t-3" href="#wizard-h-3" aria-controls="wizard-p-3">
                            </a>
                        </li>
                    </ul>
                </div>
    
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 col-xl-5 my-5">
            
                <!-- Form -->
                <form action="{{ route('agent.signupprocess.one') }}" method="POST">
                    @csrf

                    <!-- First Name -->
                    <div class="form-group">
        
                        <!-- Label -->
                        <label>First Name</label>
                        <!-- Input -->
                        <input type="text" name="first_name" class="form-control{{ $errors->has('firstname')?' is-invalid':'' }}" placeholder="Enter your Firstname" required>
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
                        <input type="text" name="last_name" class="form-control{{ $errors->has('lastname')?' is-invalid':'' }}" placeholder="Enter your Lastname" required>
                        @if ($errors->any() && $errors->has('lastname'))
                            <div class="invalid-feedback">
                                {{ $errors->first('lastname') }}
                            </div>
                        @endif
                    </div>

                    <!-- Phone Number -->
                    <div class="form-group">
        
                        <!-- Label -->
                        {{-- <label>Phone Number</label> --}}
                        <!-- Input -->
                        {{-- <input type="text" name="phone" class="form-control{{ $errors->has('phone')?' is-invalid':'' }}" placeholder="name@address.com">
                        @if ($errors->any() && $errors->has('phone'))
                            <div class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif --}}
                    </div>

                    <!-- Email address -->
                    <div class="form-group">
        
                        <!-- Label -->
                        <label>Email Address</label>
                        <!-- Input -->
                        <input type="email" name="email" class="form-control{{ $errors->has('email')?' is-invalid':'' }}" placeholder="name@address.com" required>
                        @if ($errors->any() && $errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <!-- Phone Number -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>Phone Number</label>
                        <!-- Input -->
                        <input type="text" name="phone" class="form-control{{ $errors->has('phone')?' is-invalid':'' }}" placeholder="Enter your phone number" required>
                        @if ($errors->any() && $errors->has('phone'))
                            <div class="invalid-feedback">
                                {{ $errors->first('phone') }}
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
        
                        <!-- Input group -->
                        <div class="input-group input-group-merge">
            
                            <!-- Input -->
                            <input type="password" name="password" class="form-control form-control-appended" id="password" placeholder="Enter your password" required>
            
                            <!-- Icon -->
                            <div class="input-group-append" onclick="showPassword('password')">
                                <span class="input-group-text">
                                    <i class="fe fe-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
        
                        <div class="row">
                            <div class="col">
                                
                                <!-- Label -->
                                <label>Confirm Password</label>
            
                            </div>
                        </div> <!-- / .row -->
        
                        <!-- Input group -->
                        <div class="input-group input-group-merge">
            
                            <!-- Input -->
                            <input type="password" name="password_confirmation" class="form-control form-control-appended" id="password_confirmation" placeholder="Enter your password again" required>
            
                            <!-- Icon -->
                            <div class="input-group-append" onclick="showPassword('password_confirmation')">
                                <span class="input-group-text">
                                    <i class="fe fe-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
        
                    <!-- Submit -->
                    <button type="submit" class="btn btn-lg btn-block btn-primary mb-3">
                        Next Step
                    </button>
        
                    <!-- Link -->
                    <div class="text-center">
                        <small class="text-muted text-center">
                            Don't have an account yet? <a href="#">Sign up</a>.
                        </small>
                    </div>
                    
                </form>
    
            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
@stop
@push('scripts')
    <script>
        function showPassword($id) {
            var x = document.getElementById($id);
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endpush