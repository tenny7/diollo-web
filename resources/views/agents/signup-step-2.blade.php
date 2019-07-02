@extends('layouts.forms.app')

@push('css')
<link rel="stylesheet" href="{{ asset('assets/admin/css/toastr.css') }}">
@endpush
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
                        <li role="tab" aria-disabled="false" class="checked current" aria-selected="false">
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
                @include('partials.admin.error')
                @include('partials.admin.success')
                <!-- Form -->
                <form action="{{ route('agent.signupprocess.two') }}" method="POST">
                    @csrf

                    <!-- Gender -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>Gender</label>
                        <!-- Input -->
                        <select class="form-control" data-toggle="select" name="gender" id="gender">
                            <option>Choose Gender</option>
                            @foreach ($genders as $gender)
                                <option value="{{$gender['id']}}">{{$gender['name']}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">
                            Date of Birth
                        </label>
                        <input type="text" class="form-control" placeholder="Enter your birthday" name="birthday" data-toggle="flatpickr" required>
                    </div>
                    
                    <!-- Country -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>Country</label>
                        <!-- Input -->
                        <select class="form-control country" data-toggle="select" name="country_code" id="country">
                            <option>Choose Country</option>
                            @foreach ($countries as $country)
                                <option value="{{$country->code}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- State -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>State</label>
                        <!-- Input -->
                        <select class="form-control regions" data-toggle="select"  name="region_id" id="regions" required>
                            <option>Choose State</option>
                        </select>
                    </div>
                          
                    <!-- City -->
                    <div class="form-group">
                        <!-- Label -->
                        <label>City</label>
                        <!-- Input -->
                        <select class="form-control city" data-toggle="select" name="city_id" id="city" required>
                            <option>Choose City</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="street">Street Address</label>
                        <input type="text" class="form-control" placeholder="Enter your street address" name="street" id="street">
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

@section('js')
    <script src="{{ asset('assets/admin/js/custom.js')}}"></script>
@stop
{{-- @push('scripts')
    <script>
        $(function() {
            // Country Change
            $('#country').change(function(){

                // Country Code
                var country_code = $(this).val();

                // Empty the state dropdown
                $('#state').find('option').not(':first').remove();
                $('#city').find('option').not(':first').remove();

                // AJAX request 
                $.ajax({
                    url: '{{ config('app.url', 'passward') }}/states/'+country_code,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                        console.log(response);
                        var len = 0;
                        if(response != null){
                            len = response.regions.length;
                        }


                        if(len > 0){
                            // Read data and create <option >
                            for(var i=0; i<len; i++){

                                var id = response.regions[i].id;
                                var name = response.regions[i].name;

                                var option = "<option value='"+id+"'>"+name+"</option>"; 

                                $("#state").append(option); 
                                
                            }
                        }

                    },
                    error: function (e){
                        console.log(e);
                    },
                });
            });

            // State Change
            $('#state').change(function(){

                //Country code
                var country_code = $('#country').val();

                // State Code
                var state_id = $(this).val();
                console.log(country_code);
                console.log(state_id);

                // Empty the state dropdown
                $('#city').find('option').not(':first').remove();

                // AJAX request 
                $.ajax({
                    url: '{{ config('app.url', 'app.greenridge.com') }}/cities/'+country_code+'/'+state_id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                        console.log(response);
                        var len = 0;
                        if(response != null){
                            len = response.cities.length;
                        }


                        if(len > 0){
                            // Read data and create <option >
                            for(var i=0; i<len; i++){

                                var id = response.cities[i].id;
                                var name = response.cities[i].name;

                                var option = "<option value='"+id+"'>"+name+"</option>"; 

                                $("#city").append(option); 
                            }
                        }

                    },
                    error: function (e){
                        console.log(e);
                    },
                });
            });
        });
    </script>
@endpush --}}

@push('scripts')
{{-- <script src="{{ asset('assets/admin/js/custom.js')}}"></script> --}}
<script src="{{ asset('assets/admin/js/toastr.js')}}"></script>
@endpush