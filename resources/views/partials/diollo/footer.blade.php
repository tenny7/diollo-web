 <!-- Footer-->
    <footer class="position-relative z-index-10">
      <!-- Main block - menus, subscribe form-->
      <div class="py-6 bg-gray-200 text-muted"> 
        <div class="container">
          <div class="row">
            <div class="col-lg-4 mb-5 mb-lg-0">
              <div class="font-weight-bold text-uppercase text-dark mb-3">About us</div>
              <p>Diollo Wardrobe is an online fashion shop for getting quality nigerian dresses for women, men, and kids. We focus on precision, quality and fast delivery</p>
              <ul class="list-inline">
                <li class="list-inline-item"><a href="#" target="_blank" title="twitter" class="text-muted text-hover-primary"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" title="facebook" class="text-muted text-hover-primary"><i class="fab fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" title="instagram" class="text-muted text-hover-primary"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" title="pinterest" class="text-muted text-hover-primary"><i class="fab fa-pinterest"></i></a></li>
                <li class="list-inline-item"><a href="#" target="_blank" title="vimeo" class="text-muted text-hover-primary"><i class="fab fa-vimeo"></i></a></li>
              </ul>
            </div>
            <div class="col-lg-2 col-md-6 mb-5 mb-lg-0">
              <h6 class="text-uppercase text-dark mb-3">Category</h6>
              <ul class="list-unstyled">
                @php 
                                        $categories = App\Models\Category::all();
                                        @endphp
                @foreach($categories as $category)
                                             <li><a href="{{ route('category.search',$category->id )}}" class="text-muted">{{ strtoupper($category->name)}}</a> </li>
                                        @endforeach
                {{-- <li><a href="index-2.html" class="text-muted">Rooms     </a></li> --}}
              </ul>
            </div>
            <div class="col-lg-2 col-md-6 mb-5 mb-lg-0">
              <h6 class="text-uppercase text-dark mb-3">Pages</h6>
              <ul class="list-unstyled">
                {{-- <li><a href="contact.html" class="text-muted">Contact   
                  @guest                                </a></li> --}}
                  @guest
                <li><a href="{{ route('customer.shop')}}" class="text-muted">Shop                                   </a></li>
                <li><a href="{{ route('signin')}}" class="text-muted">Login                                   </a></li>
                <li><a href="{{ route('signup')}}" class="text-muted">Sign up  <span class="badge badge-info ml-1">New</span>                                   </a></li>
                @else
                <li><a href="{{ route('admin.dashboard')}}" class="text-muted">Dashboard <span class="badge badge-info ml-1">New</span>                                   </a></li>
                @endguest
                {{-- <li><a href="coming-soon.html" class="text-muted">Coming soon                                   </a></li> --}}
              </ul>
            </div>
            <div class="col-lg-4">
              <h6 class="text-uppercase text-dark mb-3">Daily Offers & Discounts</h6>
              <p class="mb-3"> Subscribe to our newsletter and be the first to know when we've got great discounts and offer</p>
              <form action="#" id="newsletter-form">
                <div class="input-group mb-3">
                  <input type="email" placeholder="Your Email Address" aria-label="Your Email Address" class="form-control bg-transparent border-dark border-right-0">
                  <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-dark border-left-0"> <i class="fa fa-paper-plane text-lg"></i></button>
                  </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Copyright section of the footer-->
      <div class="py-4 font-weight-light bg-gray-800 text-gray-300">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-left">
              <p class="text-sm mb-md-0">&copy; 2019 {{ config('app.name', 'Laravel')}}.  All rights reserved.</p>
            </div>
            <div class="col-md-6">
              <ul class="list-inline mb-0 mt-2 mt-md-0 text-center text-md-right">
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- /Footer end-->