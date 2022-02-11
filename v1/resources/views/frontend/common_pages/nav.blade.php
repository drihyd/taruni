@php
$Categories='';
@endphp	
<header class="main-header hidden-print">
      <div class="container pr-sm-0">
        <div class="text-center mt-3">
          <a href="{{ URL('/')}}"><img src="{{URL::to('assets/uploads/'.$theme_options_data->header_logo??'')}}" alt="Taruni Logo" class="img-fluid nav-logo"></a>
        </div>
        <div class="cart-wrapper">
   
            
            
            <div class="dropdown show searchform-dropdown">
                  <a class="btn dropdown-toggle currency-dropdown-toggle mr-sm-3 mr-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{ URL::to('images/search.svg')}}" alt="search" class="img-fluid">
                  </a>
                
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <form class="navbar-form" role="search" action="{{ route('products.headersearch') }}" method="GET">
                    	<div class="input-group"> 
                    		<input class="form-control" placeholder="Search..." name="q"> 
                    		<span class="input-group-btn"> 
                    			<button class="btn btn-default" type="submit">
                    			<i class="fas fa-chevron-right"></i>
                    			</button> 
                    		</span> 
                    	</div>
                    </form>
                  </div>
                </div>
            
            <a href="{{url('/locations')}}" class="mr-sm-3 mr-2">Stores <i class="fas fa-map-marker-alt"></i></a>
              
              <div class="dropdown show currency-dropdown">
                  <a class="btn dropdown-toggle currency-dropdown-toggle mr-sm-3 mr-2" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  {{Str::upper(session()->get('appcurrency')??'INR')}}
                  </a>
                
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="{{ route('currency.switch','inr') }}">INR</a>
                    <a class="dropdown-item" href="{{ route('currency.switch','usd') }}">USD</a>
                  </div>
                </div>
              <a href="{{ URL('/cart')}}" class="mr-sm-3 mr-2 pos-relative"><img src="{{ URL::to('images/cart.svg')}}" alt="Cart" class="img-fluid">
			@if(isset($cartCount) && $cartCount>0)
				<span class="item-count cart-count" id="nav_no_cart_items">
			{{$cartCount??''}}
			</span>
			@else
			@endif
			  </a>
				
		
			  
              <a href="{{ URL('/mywishlist')}}" class="pos-relative"><img src="{{ URL::to('images/wishlist.svg')}}" alt="wishlist" class="img-fluid">
			  
			  
			  
			@if(isset($wishlistsCount) && $wishlistsCount>0)
			<span class="item-count" id="nav_no_cart_items">
			{{$wishlistsCount??''}}
			</span>
			@else
			@endif

			  
			  </a>
        </div>
		
	
		@php

$parent_menu=DB::table('menus')->select('menu_name as parentmenu','id as parentmenuid','mapping_sub_cat','menu_url as menu_url')
->where('parent_id',0)
->where("menu_category","header-menu")
->where('is_active', "Yes") 
->orderBy('menu_sorting', 'ASC')
->get();

@endphp
		
         <nav class="navbar navbar-expand-lg navbar-light p-0">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">



@foreach($parent_menu as $key => $item_parent)
<li class="nav-item dropdown active">
@if($item_parent->menu_url)
    <a class="nav-link link-about" href="{{$item_parent->menu_url??''}}">{{$item_parent->parentmenu??''}}</a>
@else
<a class="nav-link link-about dropdown-toggle" href="{{$item_parent->menu_url??''}}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
{{$item_parent->parentmenu??''}}
</a>
@endif


@php
$subcat_menus=DB::table('menus')->select('menu_name as childname','id as childid','menu_url as menu_url')
->where('parent_id',$item_parent->parentmenuid)
->where('child_id',0)
->where('is_active',"Yes") 
->orderBy('menu_sorting', 'ASC')  
->get();
@endphp


@if($subcat_menus->count()>0 && $item_parent->mapping_sub_cat=="yes")

    <div class="dropdown-menu navitem-submenu mega-menu" aria-labelledby="navbarDropdownMenuLink">
        <div>
            <div class="row">
               
                    @foreach($subcat_menus as $key => $item_subcat)
                     <div class="col-sm-2 col-6">
                    <div class="dropdown-menu-wrapper">
                        
                        <a href="@if($item_subcat->menu_url) {{$item_subcat->menu_url??''}}@else # @endif"><h4>{{$item_subcat->childname??''}}</h4></a>




@php

$subchild_cat_menus=DB::table('menus')->select('menu_name as subchildname','id as subchildid','menu_url as menu_url')
->where('parent_id',$item_parent->parentmenuid)
->where('child_id',$item_subcat->childid)
->where('is_active', "Yes")
->orderBy('menu_sorting', 'ASC')   
->get();

@endphp

                        @foreach($subchild_cat_menus as $key => $item_subchildname)
                        <a class="dropdown-item" href="{{$item_subchildname->menu_url??''}}">{{$item_subchildname->subchildname??''}}</a>
                        @endforeach
                    </div>
                     </div>
                    @endforeach
               
            </div>
        </div>
    </div>

@else


    @php

    $subchild_cat_menus=DB::table('menus')->select('menu_name as subchildname','id as subchildid','menu_url as menu_url')
    ->where('parent_id',$item_parent->parentmenuid)
    ->where('child_id',0)
    ->where('is_active', "Yes")
    ->orderBy('menu_sorting', 'ASC')   
    ->get();
    @endphp



    @if($subchild_cat_menus->count()>0 && $item_parent->mapping_sub_cat=="no" )
    <div class="dropdown-menu navitem-submenu" aria-labelledby="navbarDropdownMenuLink">
    @foreach($subchild_cat_menus as $key => $item_subchildname)
    <a class="dropdown-item" href="{{$item_subchildname->menu_url??''}}">{{$item_subchildname->subchildname??''}}</a> 
    @endforeach  
    </div>
    @endif
	
	
	


@endif



</li>
@endforeach



                
					






                
				  
                  <div class="account-wrapper">
				  
				  
                    <li class="nav-item mb-sm-0">
						@if (Auth::check())    
									<div>
					<a class="nav-link" href="{{ route('customer.myaccount')}}"><i class="fas fa-user-alt"></i> {{ucwords(auth()->user()->firstname)??''}}   {{ucwords(auth()->user()->lastname??'')}}</a>
          </div>
					@else
					 <a class="nav-link" href="{{ route('customer.signin')}}">Login</a>
					 @endif
                  </li>
                  <!-- <li class="nav-item mb-sm-0">
                    <a class="nav-link" href="{{ URL('/sale')}}">Sale</a>
                  </li> --> <li class="nav-item mb-sm-0">
                    <a class="nav-link" href="{{ URL('/contact-us')}}">Contact Us</a>
                  </li>
				  <!--
                  <li class="nav-item">
                    <a class="nav-link" href="{{ URL('/contactus')}}">Contact Us</a>
                  </li>
				  -->
				  
				   @if (Auth::check()) 
				   <!--
				   <li class="nav-item">
                    <a class="nav-link" href="{{ route('customer.myaccount')}}">Myaccount</a>
					</li>
					-->
					@else				
					 @endif
				  
				 
                  </div>
                </ul>




              </div>
      </nav>
      </div>
    </header>
	
