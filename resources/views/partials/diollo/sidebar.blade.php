<div class="col-md-4 col-sm-12" style="margin-bottom:20px;">

          <ul class="list-group">
          <li class="list-group-item fontColor {{ url()->current() == 'http://localhost:8000/customer/account-info' ? 'active'  : ''}} ">
              
              <a class=" bd {{ url()->current() == 'http://localhost:8000/customer/account-info' ? 'fontColor'  : ''}}" href="{{ route('customer.accountInfo') }}">My Profile</a>
             {{-- @if(url()->current() == "http://localhost:8000/show-saved-item") --}}
            </li>
            <li class="list-group-item fontColor  {{ url()->current() == 'http://localhost:8000/customer/wallet-show' ? 'active ' : ''}}">
              <a class=" bd {{ url()->current() == 'http://localhost:8000/customer/wallet-show' ? 'fontColor'  : ''}}"  href="{{ route('customer.wallet')}}">My Wallet</a>
              {{-- {{ dd(url()->current())}} --}}
            </li>
            <li class="list-group-item  {{ url()->current() == 'http://localhost:8000/orders/view-orders' ? 'active' : ''}}">
              <a class=" bd {{ url()->current() == 'http://localhost:8000/orders/view-orders' ? 'fontColor'  : ''}}" href="{{ route('orders.viewOrders') }}">My Orders</a>
              {{-- {{ dd(url()->current())}} --}}
            </li>
          </ul>
       
</div>