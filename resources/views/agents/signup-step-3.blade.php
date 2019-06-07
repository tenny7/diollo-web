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
                        <li role="tab" aria-disabled="false" class="first checked done" aria-selected="true">
                            <a id="wizard-t-0" href="#wizard-h-0" aria-controls="wizard-p-0">
                            </a>
                        </li>
                        <li role="tab" aria-disabled="false" class="checked done" aria-selected="false">
                            <a id="wizard-t-1" href="#wizard-h-1" aria-controls="wizard-p-1">
                            </a>
                        </li>
                        <li role="tab" aria-disabled="false" class="checked current">
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
                @include('partials.admin.error')
                @include('partials.admin.success')
    
                <!-- Form -->
                <form action="{{ route('agent.signupprocess.three') }}" method="POST" enctype="multipart/form-data" id="dropzone">
                    @csrf

                    <div class="form-group">
                        <!-- Label -->
                        <label>
                            Knowledge of Computer Use
                        </label>
                        <select class="form-control" name="computer_use" data-toggle="select" required>
                            <option value="None">None</option>
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Pro">Pro</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <!-- Label -->
                        <label>
                            Upload Valid ID
                        </label>
                        <div class="dropzone dropzone-single mb-3" id="dropzone" data-toggle="dropzone" >

                            <div class="fallback">
                                <div class="custom-file">
                                    <input type="file" name="valid_id" class="custom-file-input" id="validIDUpload" required>
                                    <label class="custom-file-label" for="validIDUpload">Choose file</label>
                                </div>
                            </div>
                        
                            <div class="dz-preview dz-preview-single">
                                <div class="dz-preview-cover">
                                    <img class="dz-preview-img" src="..." alt="..." data-dz-thumbnail>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <!-- Label -->
                        <label class="mb-1">
                            Why are you interested in the position and what are your expectations?
                        </label>

                        <!-- Input -->
                        <textarea name="interest" class="form-control" placeholder="[200 Words Max]" required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <!-- Label -->
                        <label class="mb-1">
                            How would you find interested vendors for Passward? 
                        </label>

                        <!-- Input -->
                        <textarea name="method" class="form-control" placeholder="[200 Words Max]"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <!-- Label -->
                        <label class="mb-1">
                            What is your BEST way to establish relationship with a vendor?  
                        </label>

                        <!-- Input -->
                        <textarea name="relationship" class="form-control" placeholder="[200 Words Max]"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <!-- Label -->
                        <label class="mb-1">
                                How would you handle objections from a vendor?   
                        </label>

                        <!-- Input -->
                        <textarea name="objection" class="form-control" placeholder="[200 Words Max]"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <!-- Label -->
                        <label class="mb-1">
                            Passward requires you to capture correct details of vendor items on sale and take good quality photos of the items in store. How would you achieve this?    
                        </label>

                        <!-- Input -->
                        <textarea name="photo" class="form-control" placeholder="[200 Words Max]"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <!-- Label -->
                        <label class="mb-1">
                            How would you handle SALES TARGETS and cope with LOW SALES?    
                        </label>

                        <!-- Input -->
                        <textarea name="salestarget" class="form-control" placeholder="[200 Words Max]"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <!-- Label -->
                        <label>
                            Please choose one – would you rather close a huge sale with a huge commission without recognition or close a small sale that gains you recognition?
                        </label>
                        <select class="form-control" name="recognition" data-toggle="select" required>
                            <option value="Huge Sale without recognition">Huge Sale without recognition</option>
                            <option value="Small Sale with recognition">Small Sale with recognition</option>
                        </select>
                    </div>
    
                    <!-- Submit -->
                    <button type="submit" class="btn btn-lg btn-block btn-primary mb-3">
                        Become an Agent
                    </button>
                    <a href="{{ route('agent.signup.one') }}" class="btn btn-lg btn-block btn-secondary mb-3">Restart Agent Application</a>
        
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
@stop
@push('scripts')
    <script>
        
    </script>
@endpush