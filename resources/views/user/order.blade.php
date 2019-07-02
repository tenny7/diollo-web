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
      <h1 class="text-center" style="font-weight: bolder;">Orders</h1>
     <div class="row">
      <div class="col-md-4 col-sm-12 " style="padding-top: 20px;">
        <div class="_display">
          <div class="">
        <i class="far fa-user" style="font-size:20px;">&nbsp;&nbsp;</i>
          </div>
          <div>
            <a class="bd" href="#">My Profile</a>
            <p class="text-muted">Account Information</p>
          </div>
        </div>
        <div class="_display">
          <div class="">
          <img src="{{ asset('assets/password/images/wallet-outline.png') }}" alt="wallet">&nbsp;&nbsp;
          </div>
          <div>
            <a class="bd" href="#">My Wallet</a>
            <p class="text-muted">Wallet</p>
          </div>
        </div>
        <div class="_display">
          <div class="">
            <img src="{{ asset('assets/password/images/shopping bag.png')}}" alt="bag">
          </div>
          <div>
            <a class="bd" href="#">My Orders</a>
            <p class="text-muted">Orders</p>
          </div>
        </div>
      </div>
      @include('partials.admin.success')
      @include('partials.admin.error')
      <div class="col-md-8">
        <h3>My Cart</h3>
        {{-- <div class="row">
          <div class="col-md-8 col-sm-8">
              <h4>Orders</h4>
          </div>
          <div class="col-md-4 col-sm-4">
              <div class="select">
                  <div class="input-group">
                      <div class="input-group-addon">
                        sort by:
                      </div>
                      <select class="mdb-select md-form form-control loc_select_box" searchable="Search here..">
                        <option value="" disabled selected>Most recent <span class="caret sr-only"></span></option>
                        <option value="1">Most purchased</option>
                        <option value="2">Most viewed</option>
                        <option value="2">Last purchased</option>
                      </select>
                  </div>
              </div>
        </div>
        </div> --}}
        <hr>
        
        <div class="whole-table">
          {{-- <form action="{{ route('pay')}}" method="post">
          @csrf
          
          <table class="table table-hover table-bordered table-condensed">
            <thead>
              <th width="10%">Product</th>
              <th width="20%">Store</th>
              <th width="20%">Buyer</th>
              <th>Payment</th>
              <th >Qty</th>
              <th>Price/unit</th>
              <th>Subtotal</th>
              <th>Action</th>
            </thead>
              @php 
              $total = 0;
              @endphp
              @foreach($carts as $cart)
                  @php 
                          $subtotal = $cart->price * $cart->qty;
                          
                          $total += $subtotal;
                      // dd($subtotal);
                  @endphp
              <tr>
                @php
                    $product = \App\Models\Product::find($cart->product_id);
                @endphp
                @php
                    $store = \App\Models\Store::find($product->store);
                @endphp

                <td>
                  {{$product->name }}
                </td>
                <td>
                  {{$store->name }}
                </td>
                <td>
                  {{Auth::user()->fullname }}
                </td>
                <td>
                  {{ ('Paystack') }}
                </td>
                <td>
                  {{$cart->qty }}
                  
                </td>
                <td>
                    ₦ {{ number_format($cart->price,2) }}
                </td>
                <td>
                    ₦ {{ number_format($subtotal,2) }}
                </td>
                <td>
                  <a href="" class="btn btn-danger btn-sm">Remove</a>
                </td>
              </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                  <td colspan="5"></td>
                  
                  <td>
                    <strong>₦ {{ number_format($total,2) }}</strong>
                  <input type="hidden" name="total" value="{{ $total }}">
                  </td>
                  
              </tr> 
            </tfoot>
      
          
          </table>

          <button type="submit" class="btn btn-success btn-md btn-block" style="border-radius:25px;">Checkout</button>
        </form> --}}

          
{{-- start row --}}
@foreach($orderProducts as $orderProduct)
<div class="row" style="border:solid #555 1px;">
         <div class="row" style="border-bottom: 1px solid #ccc;">
            <div class="col-md-2">Orders</div>
            <div class="col-md-2">112A66668</div>
            <div class="col-md-2">12-10-2018</div>
            <div class="col-md-2">Total: N90,999</div>
            <div class="col-md-2" id="completed">Completed</div>
            <div class="col-md-2">View Details <span class="caret sr-only"></span></div>
        </div>  
         <div class="row" >
          <div class="col-md-2">
              <div class="col-md-12" style="padding: 10px;">Order</div>
              <div class="col-md-12" style="padding: 10px;">Product</div>
              <div class="col-md-12" style="padding: 10px; padding-top: 30px;">Sold by</div>
              <div class="col-md-12" style="padding: 10px;">Buyer</div>
              <div class="col-md-12" style="padding: 10px;">Payment</div>
          </div>
          <div class="col-md-9" style="border-left: 1px solid #ccc;">
            <div class="row">
              <div class="col-md-8">
                  <div class="row" style="padding: 10px;">
                  <div class="col-md-4" id="essential">{{ $orderProduct->id }}</div>
                  <div class="col-md-4">{{ $orderProduct->created_at}}</div>
                  <div class="col-md-4"><span id="essential">{{ $orderProduct->price }}</span></div>
                  </div>
                  <div class="row" style="padding: 10px;">
                    <div class="col-md-12">iPhone Xs pro with Air shield technology 5-Inch QHD (1.5GB, 8GB ROM) 8MP + … Dual SIM 4G Smartphone</div>
                  </div>
                  <div class="row" style="padding: 10px;">
                    <div class="col-md-12">SLOT, Oron Road, Uyo, Nigeria</div>
                  </div>
                  <div class="row">
                    <div class="col-md-12" style="padding: 10px;">David Ofiare, Shelter Afrique, Uyo, Nigeria</div>
                  </div>
                  <div class="row">
                    <div class="col-md-12" style="padding: 10px;">Paystack</div>
                  </div>
              </div>

              <div class="col-md-4">
                  <div class="row" style="padding: 10px;">
                    <div class="col-md-6">Pending</div>
                    <div class="col-md-6" id="view-details">View Details</div>
                  </div>
                  <div class="row" style="padding: 10px;">
                      <div class="col-md-6"><img src="{{ asset('assets/password/admin/images/hitcase-pro-for-iphone-x-case-13904579.jpg')}}" style="height: 60px;" class="img-responsive img-fluid" alt="iPhone case"></div>
                      <div class="col-md-6">N30,999</div>
                  </div>
              </div>
              <div class="col-md-12">
                <div class="row" style="display: flex; justify-content: flex-end;">
                  {{-- <div class="col-md-12" style=" display: flex; justify-content: flex-end;">
                    <button type="button" class="btn-md btn-secondary" id="add-to-cart" name="button">ADD TO CART <i class="fa fa-plus"></i></button>
                  </div> --}}
                </div>
              </div>
          </div>
      </div>
      </div> 
</div>
@endforeach
<br>
<br>
{{-- end row --}}



      </div>
           {{-- <div class="other-table">
            <div class="row">
              <div class="col-md-2">Orders</div>
              <div class="col-md-2" id="essential">112A66678</div>
              <div class="col-md-2">12-10-2018</div>
              <div class="col-md-2">Total: <span id="essential">N10,999</span></div>
              <div class="col-md-2" id="cancelled">Cancelled</div>
              <div class="col-md-2" id="view-details">View Details</div>
            </div>
          </div>  --}}
     </div>
   </div>
 </div>


 <!-- Start of Footer -->
 <footer>
 <div class="row merchant" style="margin:0px; margin-top: 100px;">
     <div class="container">
             <div class="col-md-4 col-sm-12 col-xs-12 col-md-push-8">
                     <div class="video">
                         <iframe width="310" height="200" src="https://www.youtube.com/embed/kHLHSlExFis" frameborder="0"
                             allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture, fullscreen"
                             ></iframe>
                     </div>

                     <div style="position:relative; top:200px;">
                         <p id="inspire">Inspired ?</p>
                         <p id="share"><a href="#"> WATCH AND SHARE THESE STORIES</a></p>
                     </div>
                 </div>
         <div class="col-md-3 col-sm-12 col-xs-12 col-md-pull-4 part1" style="margin-top:40px; justify-content: center;">
             <p class="become a">
                 Become a <span class="becoming a">Merchant</span>
             </p>
             <p class="abc">
                 Easy as A, B, C _
             </p>
             <p class="lorem i">
                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex nulla vel fuga aspernatur harum
                 earum amet praesentium ipsam.</p>
             <a href="#">
                 <p class="find">FIND OUT MORE</p>
             </a>
         </div>
         <div class="col-md-5 col-sm-12 col-xs-12 col-md-pull-4 part2" style="justify-content:center;">
             <p class="become">
                 Find the perfect Merchant <span class="becoming">For your Business</span>
             </p>
             <p class="abc">
                 Easy as A, B, C _
             </p>
             <p class="lorem">
                 Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex nulla vel fuga aspernatur harum
                 earum amet praesentium perspiciatis inventore ipsam. Ipsum iusto in cupiditate architecto rem
                 corporis iure quibusdam hic.
             </p>
             <a href="#">
                 <p class="find">FIND OUT MORE</p>
             </a>
         </div>

     </div>
 </div>
 <div class="row rated" style="margin:0px; top:-30px">
     <div class="container accessory">
         <div class="col-md-3 col-sm-12 col-xs-12">
               <p class="category">RATED CATEGORIES</p>
                <div class="list">
                <ul><a href="#">Women Clothing </a></ul>
                <ul><a href="#">Jewellery </a></ul>
                <ul><a href="#">Automobile </a></ul>
             </div>
         </div>
         <div class="col-md-3 col-sm-12 col-xs-12">
                 <p class="category">TOP SEARCHES</p>
                 <div class="list">
                 <ul><a href="#">Bags </a></ul>
                 <ul><a href="#">Gucci </a></ul>
                 <ul><a href="#">Palm slippers </a></ul>
                 <ul><a href="#">Gas cooker </a></ul>
                 <ul><a href="#">Olive cleanser </a></ul>
                 <ul><a href="#">Banana oat </a></ul>
                 <ul><a href="#">Brown sugar </a></ul>
             </div>
             </div>
             <div class="col-md-3 col-sm-12 col-xs-12">
 <p class="categorya">REGISTERED MERCHANTS</p>
 <p class="platform">Merchants on pasward platform are registered and trained. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Possimus iure cumque odio laborum mollitia inventore quod nostrum magni, tempora cupiditate nisi consectetur! Quasi, repudiandae dolor minus non sit sed dignissimos!
 </p>
                 </div>
                 <div class="col-md-3 col-sm-12 col-xs-12">
                     <p class="categorya">VENDORS</p>
                     <p class="platform">Each vendor is registered under a selected merchant. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laborum minima nisi vitae id suscipit odit delectus, voluptate repellendus fuga earum velit nihil iusto et commodi, quos blanditiis facilis voluptas culpa?</p>
                     </div>
 </div>
 <div class="line"><hr>
 <div class=" container list" style="margin-top:20px;">
     <div class="col-md-3 col-sm-12 col-xs-12">
 <ul><a href="#">Help </a></ul>
 <ul><a href="#">Privacy Policy </a></ul>
 <ul><a href="#">Frequently Asked Questions
      </a></ul>
 </div>
 <div class="col-md-3 col-sm-12 col-xs-12">
 <ul><a href="#">Newsletter </a></ul>
 <ul><a href="#">Email Address </a></ul>
      <div class="line1">
       <input type="text">
      </div>
 </div>
 <div class="col-md-3 col-sm-12 col-xs-12">
 <button id="subscribebutton">SUBSCRIBE</button>
 </div>
 </div>

 </div>
 <div class="line"><hr></div>
 <div class="container">
 <div class="col-md-3 col-sm-12 col-xs-12">
 <p class="copyright">
 Copyright 2018
 </p>
 </div>
 <div class="col-md-3 col-sm-12 col-xs-12">
 <img src="images/passward logo white.svg" alt="logo" class="img-responsive img-fluid pasward">
 </div>
 <div class="col-md-3 col-sm-12 col-xs-12">

 </div>
 <div class="col-md-3 col-sm-12 col-xs-12" style="display: flex; justify-content: flex-end;">
 <a href="order.html">
  <span class="circle">
    <i class="fas fa-caret-up up"></i>
  </span>
 </a>

 </div>
 </div>

 </div>
</footer>
 <!-- End of Footer -->
    <!-- Start of script-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    function openNav() {
  document.getElementById("mySidenav").style.width = "200px";
  document.getElementById("mySidenav").style.paddingLeft = "50px";
  document.getElementById("mySidenav").style.backgroundColor = "#F9D8D5";
  document.body.style.backgroundColor = "rgba(0,0,0,0.1)";
  }

  /* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
  function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("mySidenav").style.paddingLeft = "0";
  document.body.style.backgroundColor = "white";
  }
    </script>

@push('scripts')
    <script type="text/javascript">
    $(function(){
        $("#tog-btn").click(function(){
          console.log("hello world");
          $(".other-menu").toggle();
        });
    });
    </script>
@endpush
  </body>
</html>


@stop