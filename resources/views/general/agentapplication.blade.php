@extends('layouts.forms.app')
@section('content')
    <!-- CONTENT
    ================================================== -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-xl-6 my-5">
            
            <!-- Heading -->
            <h1 class="display-4 text-center mb-3">
                Become an Agent
            </h1>
            
            <!-- Subheading -->
            <p class="text-muted text-center mb-5">
                Help Passward manage stores, add products and receive a commission
            </p>
    
            <!-- Form -->
            <form action="{{ route('agent.storeApplication') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-12 col-md-6">
                        <!-- First Name -->
                        <div class="form-group">
        
                            <!-- Label -->
                            <label>
                                First Name
                            </label>
                
                            <!-- Input -->
                            <input type="text" name="firstname" class="form-control" placeholder="First Name">
            
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-6">
                        <!-- Last Name -->
                        <div class="form-group">
            
                            <!-- Label -->
                            <label>
                                Last Name
                            </label>
                
                            <!-- Input -->
                            <input type="text" name="lastname" class="form-control" placeholder="Last Name">
            
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <!-- Email address -->
                        <div class="form-group">
                            <!-- Label -->
                            <label>
                                Email Address
                            </label>
                
                            <!-- Input -->
                            <input type="email" name="email" class="form-control" placeholder="name@address.com">
            
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <!-- Phone Number -->
                        <div class="form-group">
            
                            <!-- Label -->
                            <label>
                                Phone Number
                            </label>
                
                            <!-- Input -->
                            <input type="text" name="phone" class="form-control" placeholder="Phone Number">
            
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <!-- Date of Birth -->
                        <div class="form-group">
            
                            <!-- Label -->
                            <label>
                                Date of Birth
                            </label>
                
                            <!-- Input -->
                            <input type="text" name="dateofbirth" class="form-control" placeholder="Date of Birth" data-toggle="flatpickr">
            
                        </div>
                    </div>


                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <!-- Label -->
                            <label>
                                Knowledge of Computer Use
                            </label>
                            <select class="form-control" data-toggle="select">
                                <option>None</option>
                                <option>Beginner</option>
                                <option>Intermediate</option>
                                <option>Pro</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">

                        <!-- Phone -->
                        <div class="form-group">

                            <!-- Label -->
                            <label>
                                State
                            </label>

                            <!-- Input -->
                            <select class="form-control select2-hidden-accessible" data-toggle="select" name="state" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                <option value="">Akwa Ibom</option>
                                <option value="">Lagos</option>
                                <option value="">Oyo</option>
                            </select>

                        </div>

                    </div>

                    <div class="col-12 col-md-6">

                        <!-- City -->
                        <div class="form-group">
                            <!-- Label -->
                            <label>
                                City
                            </label>
                            <!-- Input -->
                            <select class="form-control select2-hidden-accessible" data-toggle="select" name="city" data-select2-id="7" tabindex="-1" aria-hidden="true">
                                
                                <option value="">Uyo</option>
                                <option value="">Lagos</option>
                                <option value="">Ibadan</option>
                            </select>

                        </div>

                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <!-- Label -->
                            <label>
                                Upload Valid ID
                            </label>
                            <div class="dropzone dropzone-single mb-3" data-toggle="dropzone" data-dropzone-url="http://">

                                <div class="fallback">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="projectCoverUploads">
                                        <label class="custom-file-label" for="projectCoverUploads">Choose file</label>
                                    </div>
                                </div>
                            
                                <div class="dz-preview dz-preview-single">
                                    <div class="dz-preview-cover">
                                        <img class="dz-preview-img" src="..." alt="..." data-dz-thumbnail>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <!-- Label -->
                            <label class="mb-1">
                                Why are you interested in the position and what are your expectations?
                            </label>

                            <!-- Input -->
                            <textarea name="interest" class="form-control" placeholder="[200 Words Max]"></textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <!-- Label -->
                            <label class="mb-1">
                                How would you find interested vendors for Passward? 
                            </label>

                            <!-- Input -->
                            <textarea name="method" class="form-control" placeholder="[200 Words Max]"></textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <!-- Label -->
                            <label class="mb-1">
                                What is your BEST way to establish relationship with a vendor?  
                            </label>

                            <!-- Input -->
                            <textarea name="relationship" class="form-control" placeholder="[200 Words Max]"></textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <!-- Label -->
                            <label class="mb-1">
                                    How would you handle objections from a vendor?   
                            </label>

                            <!-- Input -->
                            <textarea name="objection" class="form-control" placeholder="[200 Words Max]"></textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <!-- Label -->
                            <label class="mb-1">
                                Passward requires you to capture correct details of vendor items on sale and take good quality photos of the items in store. How would you achieve this?    
                            </label>

                            <!-- Input -->
                            <textarea name="photo" class="form-control" placeholder="[200 Words Max]"></textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <!-- Label -->
                            <label class="mb-1">
                                How would you handle SALES TARGETS and cope with LOW SALES?    
                            </label>

                            <!-- Input -->
                            <textarea name="salestarget" class="form-control" placeholder="[200 Words Max]"></textarea>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <!-- Label -->
                            <label>
                                Please choose one – would you rather close a huge sale with a huge commission without recognition or close a small sale that gains you recognition?
                            </label>
                            <select class="form-control" data-toggle="select">
                                <option>Huge Sale</option>
                                <option>Small Sale</option>
                            </select>
                        </div>
                    </div>
        
                    {{-- <!-- Password -->
                    <div class="form-group">
        
                        <!-- Label -->
                        <label>
                            Password
                        </label>
        
                        <!-- Input group -->
                        <div class="input-group input-group-merge">
            
                            <!-- Input -->
                            <input type="password" class="form-control form-control-appended" placeholder="Enter your password">
            
                            <!-- Icon -->
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fe fe-eye"></i>
                                </span>
                            </div>
            
                        </div>
                    </div> --}}
                </div>
    
                <!-- Submit -->
                <button class="btn btn-lg btn-block btn-primary mb-3">
                Apply
                </button>
    
                <!-- Link -->
                <div class="text-center">
                    <small class="text-muted text-center">
                        Already have an account? <a href="#">Log in</a>.
                    </small>
                </div>
    
            </form>
    
            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
@endsection