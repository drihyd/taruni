@php
  $firstStringCharacter = substr(auth()->user()->firstname, 0, 1);
  $secondStringCharacter = substr(auth()->user()->lastname, 0, 1);
  
@endphp

<div id="my-account-menu">
              
              <div id="my-account-menu-backdrop"></div>
              
              <div class="profile-box">
                <div class="profile-dp">
                  @if (auth()->user()->profile)
                  <div class="profile-letter" style="background-image: url('{{url('assets/uploads/')}}/{{auth()->user()->profile??''}}'); background-size: 75px;">
                </div>  
            @else
            <div class="profile-letter">
                                <h2>{{ucwords($firstStringCharacter)}}{{ucwords($secondStringCharacter)}}</h2>
                              
             </div>
                              @endif
                  
                </div>

                

                <div class="details">
                  <h2 class="name">{{ucwords(auth()->user()->firstname)??''}}   {{ucwords(auth()->user()->lastname??'')}}</h2>
                  <p class="email">{{auth()->user()->email??''}}</p>
                                    
                </div>
              </div>
              
              <div class="account-grid clearfix">
                
                <a href="{{url('myorders')}}" class="item {{ (request()->is('myorders/*')) || (request()->is('myorders')) ? 'active' : '' }}">
                  <div class="wrapper">
                    <img src="{{url('assets/img/icons/order-icon.jpg')}}" alt="My Orders" title="My Orders">
                    <span class="text">My Orders</span>
                  </div>
                </a>
                
                <a href="{{url('myprofile')}}" class="item {{ (request()->is('myprofile')) ? 'active' : '' }}">
                  <div class="wrapper">
                    <img src="{{url('assets/img/icons/profile-icon.jpg')}}" alt="My Profile" title="My Profile">
                    <span class="text">My Profile</span>
                  </div>
                </a>
                
                <a href="{{url('myfitprofile')}}" class="item {{ (request()->is('myfitprofile')) ? 'active' : '' }}" >
                  <div class="wrapper">
                    <img src="{{url('assets/img/icons/fit-icon.jpg')}}" alt="My Fit Profile" title="My Fit Profile">
                    <span class="text">My Fit Profile</span>
                  </div>
                </a>
                <a href="{{url('mywishlist')}}" class="item {{ (request()->is('mywishlist')) ? 'active' : '' }}">
                  <div class="wrapper">
                    <img src="{{url('assets/img/icons/wishlist-icon.jpg')}}" alt="My Wishlist" title="My Wishlist">
                    <span class="text">My Wishlist</span>
                  </div>
                </a>
                
                 <a href="{{url('myaddresses')}}" class="item {{ (request()->is('myaddresses')) ? 'active' : '' }}">
                  <div class="wrapper">
                   <img src="{{url('assets/img/icons/addresses-icon.jpg')}}" alt="My Addresses" title="My Addresses">
                    <span class="text">My Addresses</span>
                  </div>
                </a>
                
                <a href="{{url('mycoupons')}}" class="item {{ (request()->is('mycoupons')) ? 'active' : '' }}">
                  <div class="wrapper">
                    <img src="{{url('assets/img/icons/coupons-icon.jpg')}}" alt="My Coupons" title="My Coupons">
                    <span class="text">My Coupons</span>
                  </div>
                </a>
                
              </div> <!-- ./account-grid -->

              
              <ul class="account-links">
                <li class=""><a href="#">Track Orders</a></li>
                <li><a href="{{url('help')}}">FAQs</a></li>
                <li><a href="{{url('mytickets')}}">My Tickets</a></li>
                <li><a href="{{url('help')}}">Help</a></li>
                <li><a href="{{url('change_password')}}">Change Password</a></li>
                <li><a href="{{ route('register.logout')}}">Logout</a></li>
              </ul>
              
            </div>