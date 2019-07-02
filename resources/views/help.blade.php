@extends('layouts.frontend.app')

@section('content')
<div class="path">
<img src="{{ asset('assets/password/images/Path 41.svg')}}" alt="path_star">
      </div>
          <div class="container-fluid">
              <!-- start first row -->
              <div class="row ">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                  <!-- start second row -->
                  <div class="row">
                      <div class="col-md-4 col-sm-12 col-xs-12">
                      </div>
                      <div class="col-md-3 col-sm-12 col-xs-12" style="margin-top: 50px;">
                          <h1 class="login">Customer Service Help</h1>
                          <div class="card card-edit-login">
      
                              <form style="padding: 15px;">
                                <div class="form-group">
                                  <h4 class="text-center">We'd be glad to help you</h4>
                                  <label for="name" class="text-muted">FIrst Name:</label>
                                  <input type="text" class="form-control" id="InputName" placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                  <label for="name" class="text-muted">Last Name:</label>
                                  <input type="text" class="form-control" id="InputName" placeholder="Your Last Name">
                                </div>
                                <div class="form-group">
                                  <label for="email" class="text-muted">Email Address:</label>
                                  <input type="text" class="form-control" id="InputEmail3" placeholder="Your Email Address">
                                </div>
                                <div class="form-group">
                                  <label for="email" class="text-muted">Subject:</label>
                                  <input type="text" class="form-control" id="InputEmail3" placeholder="">
                                </div>
                                <div class="form-group">
                                  <label for="email" class="text-muted">Message:</label>
                                  <textarea name="subject" class="round" rows="3" cols="36"></textarea>
                                </div>
                              </form>
                              <div class="" style="padding-bottom: 15px;">
      
                                <button id="continuebutton">SEND MESSAGE</button>
      
                              </div>
      
                          </div>
                      </div>
      
                      <div class="top_star">
                        <img src="{{ asset('assets/password/images/path 41.svg')}}" alt="path star">
                      </div>
      
                      <div class="rotated" style="width: 244px;">
                        <i class="fab fa-facebook fa-rotate-360" style="color: #FF3C89;"></i>&nbsp;
                        <i class="fab fa-whatsapp fa-rotate-360" style="color: #FF3C89;"></i>&nbsp;
                        <i class="fab fa-twitter fa-rotate-360" style="color: #FF3C89;"></i> &nbsp;
                        <span class="text-muted cabin">
                           Let us help from social media </span>
                        <span class="run-through"></span>
                      </div>
      
                      <div class="star">
                          <img src="images/Path 41.svg" alt="">
                      </div>
      
                      <!-- start buyer section -->
                      <div class="col-md-3 col-sm-12 col-xs-12" style="padding-bottom: 50px;">
                          <div class="card edit-card-edit">
                              <div class="row notabuyer">
                                <span class="fa-stack fa-lg" style="position: absolute; top: -23px; right: 17px;">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-phone fa-flip-horizontal fa-stack-1x fa-inverse"></i>
                                </span>
                                <h4 class="text-center">OR Try Calling Our Support</h4>
                              </div>
                              <p class="text-muted text-center" style="font-size: 24px;">(+234) 70 3927 8132</p>
      
                              <hr>
                              <div class="box">
                              <p>Opening Hours</p>
                              <h5>8am - 6pm, Monday to Sunday</h5>
                              </div>
                          </div>
                      </div>
      
                        <!-- end buyer section -->
                      <div class="col-md-3 col-sm-12 col-xs-12">
      
                      </div>
                  </div>
                  <!-- end second row -->
                  <!-- start of third row(below) -->
      
      
                  </div>
              </div>
              <!-- end first row -->
              @stop