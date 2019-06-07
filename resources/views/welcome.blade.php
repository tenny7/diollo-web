
@extends('layouts.frontend.app')

@section('content')

      <div class="rotated" style="width: 233px;">
        <i class="fab fa-facebook fa-rotate-360" style="color: #FF3C89;"></i>&nbsp;
        <i class="fab fa-whatsapp fa-rotate-360" style="color: #FF3C89;"></i>&nbsp;
        <i class="fab fa-twitter fa-rotate-360" style="color: #FF3C89;"></i> &nbsp;
        <span class="text-muted cabin">
           Follow us on social media </span>
        <span class="run-through"></span>
      </div>
      <div class="top_star">
        <img src="{{ asset('assets/password/images/path 41.svg')}}" alt="path star">
      </div>
      <div class="container">
        <div class="banner">
          <div class="">
            <a href="#">
              <img src="{{ asset('assets/password/images/Banner-for-passward.jpg')}}" alt="banner" class="img-fluid img-responsive banner">
            </a>
          </div>
          <div class="">
            <a href="#">
              <img src="{{ asset('assets/password/images/Banner-for-passward.jpg')}}" alt="banner" class="img-fluid img-responsive banner">
            </a>
          </div>
          <div>
            <a href="#">
            <img src="{{ asset('assets/password/images/Banner-for-passward.jpg')}}" alt="banner" class="img-fluid img-responsive banner">
            </a>
          </div>
        </div>


      </div>

    <img src="{{ asset('assets/password/images/Path 32.svg')}}" alt="path" class="path">

  <div class="header-form">

  <form class="form-inline row" action="{{ route('search.query')}}" method="get"> -
   @csrf
      <div class="form-group col-md-5">
        <label class="text-muted" for="search">What are you looking for?</label> <br>

        <div class="input-group">
          <input type="text" class="form-control" name="search_input" id="search" placeholder="Find the best Electronics, clothes and more...">
           <div class="input-group-addon purple"><i class="fa fa-search"></i></div>
        </div>

      </div>

      <div class="form-group col-md-5">
        <label class="text-muted" for="location">Tell us your current location</label>  <br>

          <div class="select">
            <div class="input-group">
              <div class="input-group-addon">
                <i class="fa fa-paper-plane"></i>
              </div>
              <select name="location" class="mdb-select md-form form-control loc_select_box" searchable="Search here..">
                @foreach($regions as $region)
                @php 
                  $country = \Gerardojbaez\GeoData\Models\Country::where('code', $region->country_code)->first();
                @endphp
              <option value="{{ $region->id }}">{{ $region->name }} , {{ $country->name }}</option>
                @endforeach
              </select>
          </div>
          </div>
        </div>
        <div class="form-group col-md-2">
          <label class="text-muted" for="Shop">Shop Now!</label>
         <div class="center_cart-box">
          <span class="cart-box">
              <i class="fa fa-shopping-cart fa-2x" style="color: #fff;"></i>
          </span>
         </div>
        </div>



      </div>
  </form>

  </div>

  <div class="filter"></div>

  <section id="products" style="position: relative; margin-top: 145px; padding-bottom: 50px;">

      <h1 class="text-center clearance" >Featured Products</h1>
      <p class="text-center">THE BEST CLOTHING ITEMS CLOSEST TO YOU, FIND YOUR ALL YOUR SHOPPING NEEDS</p>



      <div class="wrapper">
        <div class="carousel" style="display: flex; align-items: center; " >
          <div class="slider col-md-3 col-sm-6 col-xs-6">
            <div class="zoom">
            <a href="#"><img src="{{ asset('assets/password/images/Product-cat-Jeez.jpg')}}" class="img-responsive img-fluid curve ">
              <div class="overlay-1">
                <h6>Zephyrane Beauty</h6> <p>Beauty and Hair</p>
              </div>
            </a>
            </div>
          </div>
        <div class="slider col-md-3 col-sm-6 col-xs-6">
            <div class="zoom">
              <a href="#"><img src="{{ asset('assets/password/images/Product-cat-Jeez-2.png')}}" class="img-responsive img-fluid curve">
                <div class="overlay-2">
                  <h6>Full Tower Home Set</h6> <p>Kitchen</p>
                </div>
              </a>
            </div>
        </div>
        <div class="slider col-md-3 col-sm-6 col-xs-6">
            <div class="zoom">
              <a href="#"><img src="{{ asset('assets/password/images/Product-cat-Jeez-3.jpg')}}" class="img-responsive img-fluid curve">
              <div class="overlay-3">
                <h6>iPhone 8</h6> <p>Phone and Computers</p>
              </div>
              </a>
            </div>
        </div>
        <div class="slider col-md-3 col-sm-6 col-xs-6 ">
            <div class="zoom">
              <a href="#"><img src="{{ asset('assets/password/images/Product-cat-Jeez-4.jpg')}}" class="img-responsive img-fluid curve"></a>
              <div class="overlay-4">
                <h6>Zara Cut Outdoor Suit</h6> <p>Women's Clothing</p>
              </div>
            </div>
            </a>
          </div>
          <div class="slider col-md-3 col-sm-6 col-xs-6 ">
            <div class="zoom">
            <a href="#"><img src="{{ asset('assets/password/images/Product-cat-Jeez.jpg')}}" class="img-responsive curve img-fluid curve ">
              <div class="overlay-5">
                <h6>Zephyrane Beauty</h6> <p>Beauty and Hair</p>
              </div>
            </a>
            </div>
          </div>
        <div class="slider col-md-3 col-sm-6 col-xs-6 ">
            <div class="zoom">
              <a href="#"><img src="{{ asset('assets/password/images/Product-cat-Jeez-2.png')}}" class="img-responsive img-fluid curve ">
                <div class="overlay-6">
                  <h6>Full Tower Home Set</h6> <p>Kitchen</p>
                </div>
              </a>
            </div>
        </div>
        <div class="slider col-md-3 col-sm-6 col-xs-6">
            <div class="zoom">
              <a href="#"><img src="{{ asset('assets/password/images/Product-cat-Jeez-3.jpg')}}" class="img-responsive img-fluid curve ">
              <div class="overlay-7">
                <h6>iPhone 8</h6> <p>Phone and Computers</p>
              </div>
            </div>
            </a>
        </div>

        </div>

      </div>

</section>

<section class="Shops">
  <div class="container">

  <div class="row">
    <div class="col-md-3 col-xs-12">
      <div class="shop-it col-md-12 col-xs-6 ">
        <img src="{{ asset('assets/password/images/shop icon.svg')}}" class="img-responsive img-fluid shop-icon" alt="Shop icon">
      </div>
      <div class="">
        <h1>Find Shops</h1>
      </div>
      <div class="shop-text col-md-12 col-xs-6">
        <p>Find well stocked shops <span class="fill">in your location</span> selling just what you need, with the <span class="fill">best discounts.</span> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et et dolore.</p>
      </div>

      <button type="button" class="btn btn-none hidden-sm" name="button"> FIND MORE &ensp; <i class="fa fa-angle-right"></i> </button>
    </div>

    <div class="col-md-9 col-xs-12">
     <div class="grid-container">
        <div class="first">
            <img src="{{ asset('assets/password/images/Hanger-jungle-logo.jpg')}}" class="img-responsive img-fluid curve" alt="Hanger">
            <span class="on-top"><br> One stop shop for all the best <br> youtube inspired articles and merch <br> just 0.5km away</span>
            <span class="pop-up" style="padding-bottom: 20px;"><img src="images/Logo_of_Youtube.png" style="height: 30px;"> <br> POP UP SHOP</span>
            <div class="on-side"><img src="{{ asset('assets/password/images/reveal button).svg')}}" style="height: 46px;" alt=""></div>
        </div>
        <div class="second">
            <img src="{{ asset('assets/password/images/store-square-2.jpg')}}" class="img-responsive img-fluid curve"  alt="">
            <div class="on-side-last"><img src="{{ asset('assets/password/images/reveal button).svg')}}" style="height: 46px;" alt=""></div>
        </div>
        <div class="third">
             <img src="{{ asset('assets/password/images/eni-stores-passward.jpg')}}" style="padding-top: 4px;" class="img-responsive img-fluid curve" alt="">
             <span class="eni">Grocery shopping and <br> home items just for you <br> only 0.5km away</span>
             <div class="on-side-2"><img src="{{ asset('assets/password/images/reveal button).svg')}}" style="height: 46px;" alt=""></div>
        </div>
        <div class="fourth">
            <img src="{{ asset('assets/password/images/store-square.jpg')}}" class="img-responsive img-fluid curve"  alt="">
            <div class="on-side-3"><img src="{{ asset('assets/password/images/reveal button).svg')}}" style="height: 46px;" alt=""></div>
        </div>
        <div class="fifth">
             <img src="{{ asset('assets/password/images/store-square-3.jpg')}}" class="img-responsive img-fluid curve" alt="">
             <div class="on-side-4"><img src="{{ asset('assets/password/images/reveal button).svg')}}" style="height: 46px;" alt=""></div>
        </div>
        <div class="sixth">
             <img src="{{ asset('assets/password/images/store-square-4.jpg')}}" class="img-responsive img-fluid curve" alt="">
             <div class="on-side-5"><img src="{{ asset('assets/password/images/reveal button).svg')}}" style="height: 46px;" alt=""></div>
        </div>

    </div>

    <button type="button" class="btn btn-none hide-md" name="button"> FIND MORE &ensp; <i class="fa fa-angle-right"></i> </button>

  </div>

</div>

</section>

    <div class="main">
        <div>
            <h1 class="clearance">Clearance Sales</h1>
        </div>
        <div>
            <p class="hotsell">HOT HOT HOT TOP SELL AFFORDABLE PRODUCTS</p>
        </div>
        <div>
            <p class="show text-center">Show all flash sales</p>
        </div>
        <div class="container">
            <div class="row" style="padding-top: 40px; margin: auto; ">
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <div class="img-block">
                    <a href="#"> <img src="{{ asset('assets/password/images/clock.png')}}" alt="clock" class="img-responsive img-fluid" style="height:160px"></a>
                    <div class="edit">
                      <a style="display: flex; justify-content: flex-end;" href="#"><img src="{{ asset('assets/password/images/fav appearance selected.svg')}}" style="height: 25px;" alt=""></a>
                    </div>
                  </div>
                    <div class="content">
                        <p class="items"> Vintage Desk Clock</p>
                        <p class="price">&#8358;10,000 <span class="newprice">&#8358;11,000</span></p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <div class="img-block">
                    <a href="#"> <img src="{{ asset('assets/password/images/mockup-df8f5437_1024x1024.jpg')}}" alt="mockup" class="img-responsive img-fluid" style="height:160px"></a>
                    <div class="edit">
                      <a style="display: flex; justify-content: flex-end;" href="#"><img src="images/fav appearance selected.svg')}}" style="height: 25px;" alt=""></a>
                    </div>
                  </div>
                    <div class="content">
                        <p class="items"> Dual Piece Beats Headphones</p>
                        <p class="price">&#8358;10,000<span class="newprice">&#8358;11,000</span></p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <div class="img-block">
                    <a href="#"> <img src="{{ asset('assets/password/images/download.jpg')}}" alt="download" class="img-responsive img-fluid" style="height:160px"></a>
                    <div class="edit">
                      <a href="#"><img src="{{ asset('assets/password/images/fav appearance selected.svg')}}" style="height: 25px;" alt=""></a>
                    </div>

                  </div>
                    <div class="content">
                        <p class="items"> Samsung Galaxy S9</p>
                        <p class="price">&#8358;70,000<span class="newprice">&#8358;11,000</span></p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <div class="img-block">
                    <a href="#"> <img src="{{ asset('assets/password/images/Sony MDR-XB950BT EXTRA BASS.jpg')}}" alt="Sony" class="img-responsive img-fluid"
                            style="height:160px"></a>
                            <div class="edit">
                              <a><img src="{{ asset('assets/password/images/fav appearance selected.svg')}}" style="height: 25px;" alt=""></a>
                            </div>
                  </div>
                    <div class="content">
                        <p class="items"> Sony Piece Headphones</p>
                        <p class="price">&#8358;11,999<span class="newprice">&#8358;11,000</span></p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <div class="img-block">
                    <a href="#"> <img src="{{ asset('assets/password/images/phone 6.jpg')}}" alt="phone" class="img-responsive img-fluid" style="height:160px"></a>
                    <div class="edit">
                      <a  href="#"><img src="{{ asset('assets/password/images/fav appearance selected.svg')}}" style="height: 25px;" alt=""></a>
                    </div>

                  </div>
                    <div class="content">
                        <p class="items"> Dual Piece Beats Headphones</p>
                        <p class="price">&#8358;4,999<span class="newprice">&#8358;11,000</span></p>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6">
                  <div class="img-block">
                    <a href=""> <img src="{{ asset('assets/password/images/GameSir-G4s-2-4Ghz-Wireless-Bluetooth-Gamepad-Controller-for-PS3-Android-TV-BOX-Smartphone-Tablet-PC.jpg')}}"
                            alt="game" class="img-responsive img-fluid" style="height:160px"></a>
                            <div class="edit">
                              <a href="#"><img src="{{ asset('assets/password/images/fav appearance selected.svg')}}" style="height: 25px;" alt=""></a>
                            </div>
                  </div>

                    <div class="content">
                        <p class="items"> Mobile Game Pad Console</p>
                        <p class="price">&#8358;34,999 <span class="newprice">&#8358;11,000</span></p>
                    </div>
                </div>


            </div>
        </div>

        <div class="background">
            <div class="rectangle">
            </div>
            <div class="grad">
                <div class="container">
                    <div class="row box ">
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="row" style="margin-left: -6px;
                    margin-top: 31px;">

                                <div class="col-md-3 col-sm-6 col-xs-6 flash">
                                    <div class="show" style=" background: linear-gradient(to right, #00D8FF,#FF5599); height: 150px; border: 1px solid white;border-radius: 8%; padding: 10px; width: auto;">
                                        <button id="buybutton">BUY NOW</button>
                                        <p class="description">
                                            Full computer deskset with noiseless rollers
                                            <span id="spanprice"> &#8358;70,000</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-6 flash">
                                    <img src="{{ asset('assets/password/images/19496273.jpg')}}" alt="194" class="img-responsive img-fluid images">
                                    <div class="ease-up_overlay" style=" background: linear-gradient(to right, #00D8FF,#FF5599); height: 150px; border: 1px solid white; border-radius: 8%; padding: 10px;">
                                        <button id="buybutton">BUY NOW</button>
                                        <p class="description">
                                            Full computer deskset with noiseless rollers
                                            <span id="spanprice"> &#8358;70,000</span>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-6 flash">
                                    <img src="{{ asset('assets/password/images/phone 3.jpg')}}" alt="phone3" class="img-responsive img-fluid images">
                                    <div class="ease-up_overlay" style=" background: linear-gradient(to right, #00D8FF,#FF5599);height: 150px; border: 1px solid white;border-radius: 8%; padding: 10px;">
                                        <button id="buybutton">BUY NOW</button>
                                        <p class="description">
                                            Full computer deskset with noiseless rollers
                                            <span id="spanprice"> &#8358;70,000</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-6 flash">
                                    <img src="{{ asset('assets/password/images/category-shuffle-panel.jpg')}}" alt="shuffle" class="img-responsive img-fluid images">
                                    <div class="ease-up_overlay" style=" background: linear-gradient(to right, #00D8FF,#FF5599);height: 150px; border: 1px solid white;border-radius: 8%;padding: 10px;">
                                        <button id="buybutton">BUY NOW</button>
                                        <p class="description">
                                            Full computer deskset with noiseless rollers
                                            <span id="spanprice"> &#8358;70,000</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-6 flash none">
                                    <img src="{{ asset('assets/password/images/category-shuffle-panel.jpg')}}" alt="194" class="img-responsive img-fluid images">
                                    <div class="ease-up_overlay" style=" background: linear-gradient(to right, #00D8FF,#FF5599);height: 150px; border: 1px solid white;border-radius: 8%;padding: 10px;">
                                        <button id="buybutton">BUY NOW</button>
                                        <p class="description">
                                            Full computer deskset with noiseless rollers
                                            <span id="spanprice"> &#8358;70,000</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6 col-xs-6 flash none">
                                    <img src="{{ asset('assets/password/images/clock.png')}}" alt="194" class="img-responsive img-fluid images">
                                    <div class="ease-up_overlay" style=" background: linear-gradient(to right, #00D8FF,#FF5599);height: 150px; border: 1px solid white;border-radius: 8%;padding: 10px;">
                                        <button id="buybutton">BUY NOW</button>
                                        <p class="description">
                                            Full computer deskset with noiseless rollers
                                            <span id="spanprice"> &#8358;70,000</span>
                                        </p>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-6 flash none">
                                    <img src="{{ asset('assets/password/images/phone 6.jpg')}}" alt="phone3" class="img-responsive img-fluid images">
                                    <div class="ease-up_overlay" style=" background: linear-gradient(to right, #00D8FF,#FF5599);height: 150px; border: 1px solid white;border-radius: 8%;padding: 10px;">
                                        <button id="buybutton">BUY NOW</button>
                                        <p class="description">
                                            Full computer deskset with noiseless rollers
                                            <span id="spanprice"> &#8358;70,000</span>
                                        </p>
                                    </div>

                                </div>

                                <div class="col-md-3 col-sm-6 col-xs-6 flash none">
                                    <img src="{{ asset('assets/password/images/GameSir-G4s-2-4Ghz-Wireless-Bluetooth-Gamepad-Controller-for-PS3-Android-TV-BOX-Smartphone-Tablet-PC.jpg')}}"
                                        alt="shuffle" class="img-responsive img-fluid images">
                                    <div class="ease-up_overlay" style=" background: linear-gradient(to right, #00D8FF,#FF5599);height: 150px; border: 1px solid white;border-radius: 8%;padding: 10px;">
                                          <button id="buybutton">BUY NOW</button>
                                            <p class="description">
                                                Full computer deskset with noiseless rollers
                                                <span id="spanprice"> &#8358;70,000</span>
                                            </p>
                                    </div>

                                </div>
                                <br>
                            </div>


                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12 textcol">
                            <p class="experience">
                                <span id="ease"> Ease Up</span></p>
                            <p class="shopping"> Your Shopping Experience</p>
                            <p class="check"> Check out these iteam recommended for you.</p>
                        </div>
                        <!-- <a href="#" class="findmore"> FIND MORE ></a> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="shopping_space">
                <h2 class="affordable">New and Affordable</h2>
                <p class="shouldbuy">YOU SHOULD BUY THESE</p>
                <p class="show">Show all new and Affordable</p>

            <div class="row " style=" align-items: center; justify-content: center;">
                <div class="wrapper">
                  <div class="carousel gimme-space" style="display: flex;">
                      <div class="col-md-3 col-sm-6 col-xs-6 neon">
                        <a href="#"> <img src="{{ asset('assets/password/images/19496273.jpg')}}" alt="194" class="img-responsive img-fluid" style="height: 250px; object-fit: contain;"></a>
                        <div class="content">
                            <p class="items"> Dual Piece Beats</p>
                            <p class="price">&#8358;3,999
                                <span class="star"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i></span></p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 neon">
                        <a href="#"> <img src="{{ asset('assets/password/images/10-Purple-$cience crown .jpg')}}" alt="crown" class="img-responsive img-fluid" style="height: 250px; object-fit: contain;"
                                ></a>
                        <div class="content">
                            <p class="items"> Dual Piece Beats</p>
                            <p class="price">&#8358;70,000<span class="star"><i class="fas fa-star"></i><i class="fas fa-star"></i>
                              <i class="far fa-star"></i> </span></p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 neon">
                        <a href="#"> <img src="{{ asset('assets/password/images/1-zoom.jpg')}}" alt="zoom" class="img-responsive img-fluid" style="height: 250px; object-fit: contain;"></a>
                        <div class="content">
                            <p class="items"> Sony Piece Headphones</p>
                            <p class="price">&#8358;11,999<span class="star"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                        class="far fa-star"></i></span></p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-6 neon">
                        <a href="#"> <img src="{{ asset('assets/password/images/phoone 2.jpg')}}" alt="phoone" class="img-responsive img-fluid" style="height: 250px; object-fit: contain;"></a>
                        <div class="content">
                            <p class="items"> Sony Piece Headphones</p>
                            <p class="price">&#8358;11,999<span class="star"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                        class="far fa-star"></i></span></p>
                        </div>
                    </div>
                  </div>
                </div>
             </div>
           </div>
        </div>
       @stop