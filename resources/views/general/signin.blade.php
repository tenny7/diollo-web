@extends('layouts.forms.app')

@section('content')
    <!-- CONTENT
    ================================================== -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 col-xl-4 my-5">
            
                <!-- Heading -->
                <h1 class="display-4 text-center mb-3">
                    Sign in
                </h1>
                
                <!-- Subheading -->
                <p class="text-muted text-center mb-5">
                    Free access to our dashboard.
                </p>
            
                @include('partials.admin.success')
                @include('partials.admin.error')
                @include('partials.admin.warning')
                @include('partials.admin.status')
                <!-- Form -->
                <form action="{{ route('signinAction') }}" method="POST">
                    {{ csrf_field() }}
                    <!-- Email address -->
                    <div class="form-group">
        
                        <!-- Label -->
                        <label>Email Address</label>
                        <!-- Input -->
                        <input type="email" name="email" class="form-control{{ $errors->has('email')?' is-invalid':'' }}" placeholder="name@address.com">
                        @if ($errors->any() && $errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
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
                        <script>
                            function showPassword() {
                                var x = document.getElementById("password");
                                if (x.type === "password") {
                                    x.type = "text";
                                } else {
                                    x.type = "password";
                                }
                            }
                        </script>
        
                        <!-- Input group -->
                        <div class="input-group input-group-merge">
            
                            <!-- Input -->
                            <input type="password" name="password" class="form-control form-control-appended" id="password" placeholder="Enter your password">
            
                            <!-- Icon -->
                            <div class="input-group-append" onclick="showPassword()">
                                <span class="input-group-text">
                                    <i class="fe fe-eye"></i>
                                </span>
                            </div>
                        </div>
                    </div>
        
                    <!-- Submit -->
                    <button class="btn btn-lg btn-block btn-primary mb-3">
                    Sign in
                    </button>

        
                    <!-- Link -->
                    <div class="text-center">
                        <small class="text-muted text-center">
                        Don't have an account yet? <a href="{{ route('signup')}}">Sign up</a>.
                        </small>
                    </div>
                    
                </form>

                 @if(session()->has('status'))
                        <form action="{{ route('resend.mail')}}" method="get">
                        <button class="btn btn-lg btn-block btn-primary mb-3">
                        Resend Mail
                        </button>
                        </form>
                    @endif
            
                </form>
    
            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
@endsection