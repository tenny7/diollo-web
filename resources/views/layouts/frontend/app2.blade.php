<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from go.webuildthemes.com/html/landing/portfolio.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Mar 2019 15:12:28 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
     <!-- Price Slider Stylesheets -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" /> --}}
    <link rel="stylesheet" href="http://d19m59y37dris4.cloudfront.net/directory/1-1/vendor/nouislider/nouislider.css">
    <!-- Google fonts - Playfair Display-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700">
    <!-- Google fonts - Poppins-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,700">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/solid.css" integrity="sha384-TbilV5Lbhlwdyc4RuIV/JhD8NR+BfMrvz4BL5QFa2we1hQu6wvREr3v6XSRfCTRp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/regular.css" integrity="sha384-avJt9MoJH2rB4PKRsJRHZv7yiFZn8LrnXuzvmZoD3fh1aL6aM6s0BBcnCvBe6XSD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/brands.css" integrity="sha384-7xAnn7Zm3QC1jFjVc1A6v/toepoG3JXboQYzbM0jrPzou9OFXm/fY6Z/XiIebl/k" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/fontawesome.css" integrity="sha384-ozJwkrqb90Oa3ZNb+yKFW2lToAWYdTiF1vt8JiH5ptTGHTGcN7qdoR1F95e0kYyG" crossorigin="anonymous">

    {{-- <script src="https://kit.fontawesome.com/20898729e6.js"></script> --}}
    <!-- swiper-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/css/swiper.min.css">
    <!-- Magnigic Popup-->
    <link rel="stylesheet" href="https://d19m59y37dris4.cloudfront.net/directory/1-1/vendor/magnific-popup/magnific-popup.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('diollo/resources/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('diollo/resources/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="https://d19m59y37dris4.vcloudfront.net/directory/1-1/img/favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   
   
    

    <style>
    .cat-links > a {
      text-decoration: none;
    }
    </style>
    @stack('css')


  </head>
  <body>
    @include('partials.diollo.nav')
    
    @yield('content')

  

    {{-- <script src="{{ asset('js/jquery-3.31.js')}}"></script> --}}

     <!-- JavaScript files-->
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET.html", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }    
      // to avoid CORS issues when viewing using file:// protocol, using the demo URL for the SVG sprite
      
      // https://demo.bootstrapious.com/directory/1-0/icons/orion-svg-sprite.svg
      injectSvgSprite('icons/orion-svg-sprite.svg'); 
      
    </script>
    <!-- jQuery-->
    <script src="{{ asset('diollo/resources/d19m59y37dris4.cloudfront.net/directory/1-1/vendor/jquery/jquery.min.js') }}"></script>
    
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>
    @stack('js')
    {{-- @stack('scripts') --}}
    <!-- Bootstrap JS bundle - Bootstrap + PopperJS-->
    <script src="{{ asset('diollo/resources/d19m59y37dris4.cloudfront.net/directory/1-1/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Magnific Popup - Lightbox for the gallery-->
    <script src="{{ asset('diollo/resources/d19m59y37dris4.cloudfront.net/directory/1-1/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <!-- Smooth scroll-->
    <script src="{{ asset('diollo/resources/d19m59y37dris4.cloudfront.net/directory/1-1/vendor/smooth-scroll/smooth-scroll.polyfills.min.js') }}"></script>
    <!-- Bootstrap Select-->
    <script src="{{ asset('diollo/resources/d19m59y37dris4.cloudfront.net/directory/1-1/vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <!-- Object Fit Images - Fallback for browsers that don't support object-fit-->
    <script src="{{ asset('diollo/resources/d19m59y37dris4.cloudfront.net/directory/1-1/vendor/object-fit-images/ofi.min.js') }}"></script>
    <!-- Swiper Carousel                       -->
    <script src="{{ asset('diollo/resources/cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/js/swiper.min.js') }}"></script>
    <script>var basePath = '' </script>
   
    <script src="{{ asset('diollo/resources/js/theme.js') }}"></script>
    <script src="{{ asset('assets/password/js/script.js') }}"></script>
    

    
    
  </body>


</html>