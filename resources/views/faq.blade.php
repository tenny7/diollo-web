@extends('layouts.frontend.app')

@section('content')
<div class="top_star">
        <img src="images/path 41.svg" alt="path star">
      </div>
      <div class="rotated" style="width: 233px;">
        <i class="fab fa-facebook fa-rotate-360" style="color: #FF3C89;"></i>&nbsp;
        <i class="fab fa-whatsapp fa-rotate-360" style="color: #FF3C89;"></i>&nbsp;
        <i class="fab fa-twitter fa-rotate-360" style="color: #FF3C89;"></i> &nbsp;
        <span class="text-muted cabin">
           Follow us on social media </span>
        <span class="run-through"></span>
      </div>
      <div class="container">
          <div class="bc mb-5 ">
              <ul class="breadcrumb">
                  <li class="breadcrumb-list" ><a href="#" >Home</a></li>
                  <li class="breadcrumb-list-current" ><a href="#" >Frquently Asked Questions(FAQ)</a></li>
              </ul>
          </div>
          <h1 class="text-center faq-title ">FAQ</h1>
          <div class="row">
              <div class="col-md-4">
                  <h5 class="mb-4 mt-5 ml-q ">Top Questions</h5>
  
                  <ul class="unlist">
                      <li>My Orders</li>
                      <li>Refunds and Returns</li>
                      <li>Payments</li>
                      <li>Delivery</li>
                      <li>Lorem</li>
                      <li>Ipsum</li>
                      <li>Dolor</li>
                      <li>Password Change</li>
                  </ul>
              </div>
              <div class="col-md-8">
                  <p class="mo "><strong> My Orders</strong></p>
                  <p class="faq-text-1 border">The payment has been deducted from my account more than once. What can I do.</p>
                  <div class="border">
                  <p class="faq-text-inside">I clicked Buy Now, but received an error message saying that there was an internet connection problem. What can I do.</p>
                  <div class="row" style="padding: 35px;">
                      <div class="col-md-12">
                          <div class="row">
                              <div class="col-md-12 left-border" >
                                  <p class="faq-text-2">Passward.com is One of Nigeria's largest online mall. We launched in July 2019 and our mission is to become the engine of commerce and trade in Africa.</p>
                                  <p class="faq-text-2" >We serve a retail customer base that continues to grow exponentially, offering products that span various categories including Phones, Computers, Clothing, Shoes, Home Appliances, Books, Healthcare, Baby Products, Personal Care and much more.</p>
                              </div>
                          </div>
                      </div>
                  </div>
                  </div>
                  <p class="faq-text-1">I paid for my order already, but I haven't received a message from my bank. What's going on.</p>
                  <div class="mt-5">
                      <p class="text-bottom mt-5 " > <strong>Still</strong> Not Helpful?</p>
                      <button type="button"  class="btn btn-bottom btn-text " >GET EXTRA HELP</button>
                  </div>
              </div>
          </div>
      </div>
@stop