<!-- Sidebar -->
          <nav id="sidebar">
              <div class="sidebar-header">
                    @php
$theme_options_data=DB::table('themeoptions')->get()->first();
@endphp
                  <img src="{{URL::to('assets/uploads/'.$theme_options_data->header_logo??'')}}" class="img-fluid">
              </div>

              <ul class="list-unstyled components sidebar-accordions">
                  <li class="{{ (request()->is(\GetRolecode::_getRolecode(Auth::user()->role??'').'/dashboard')) ? 'active' : '' }}"><a href="{{url(\GetRolecode::_getRolecode(Auth::user()->role??'').'/dashboard')}}">Dashboard</a></li>
                  <div id="accordion">
                      
                          <div class="card">
                            <div class="card-header" id="headingOne">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Categories
                                </button>
                              </h5>
                            </div>
                        
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
                              <div class="card-body">
                                  <ul class="list-unstyled" id="catSubmenu">
                                    <li class="{{ (request()->is(\GetRolecode::_getRolecode(Auth::user()->role??'').'/categories') || (request()->is(\GetRolecode::_getRolecode(Auth::user()->role??'').'/categories/*'))) ? 'active' : '' }}">
                            <a href="{{url(\GetRolecode::_getRolecode(Auth::user()->role??'').'/categories')}}">View Categories</a>
                            </li>
                            <li class="{{ (request()->is(\GetRolecode::_getRolecode(Auth::user()->role??'').'/departments') || (request()->is(\GetRolecode::_getRolecode(Auth::user()->role??'').'/departments/*'))) ? 'active' : '' }}">
                            <a href="{{url(\GetRolecode::_getRolecode(Auth::user()->role??'').'/departments')}}">Departments</a>
                            </li>
                                  </ul>
                              </div>
                            </div>
                          </div>
                          
                          <div class="card">
                            <div class="card-header" id="headingTwo">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                  Orders
                                </button>
                              </h5>
                            </div>
                        
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion" style="">
                              <div class="card-body">
                                  <ul class="list-unstyled" id="ordersSubmenu">
                                      <li class="{{ (request()->is(\GetRolecode::_getRolecode(Auth::user()->role??'').'/orders/today?filter=orders&value='.Crypt::encryptString('all'))) ? 'active' : '' }}">
                                          <a href="{{url(Config::get('constants.general').'/orders/today?filter=orders&value='.Crypt::encryptString('all'))}} ">View All</a>
                                      </li>
                                      <li class="{{ (request()->is(\GetRolecode::_getRolecode(Auth::user()->role??'').'/orders/today?filter=orders&value='.Crypt::encryptString('placed'))) ? 'active' : '' }}">
                                          <a href="{{url(Config::get('constants.general').'/orders/today?filter=orders&value='.Crypt::encryptString('placed'))}} ">Placed Orders</a>
                                      </li>
                                      <li class="{{ (request()->is(\GetRolecode::_getRolecode(Auth::user()->role??'').'/orders/today?filter=orders&value='.Crypt::encryptString('processing'))) ? 'active' : '' }}">
                                          <a href="{{url(Config::get('constants.general').'/orders/today?filter=orders&value='.Crypt::encryptString('processing'))}} ">Processing Orders</a>
                                      </li>
                                      <li class="{{ (request()->is(\GetRolecode::_getRolecode(Auth::user()->role??'').'/orders/today?filter=orders&value='.Crypt::encryptString('dispatched'))) ? 'active' : '' }}">
                                          <a href="{{url(Config::get('constants.general').'/orders/today?filter=orders&value='.Crypt::encryptString('dispatched'))}} ">Dispatched Orders</a>
                                      </li>
                                      
                                      <li class="{{ (request()->is(\GetRolecode::_getRolecode(Auth::user()->role??'').'/orders/today?filter=orders&value='.Crypt::encryptString('delivered'))) ? 'active' : '' }}">
                                          <a href="{{url(Config::get('constants.general').'/orders/today?filter=orders&value='.Crypt::encryptString('delivered'))}} ">Delivered Orders</a>
                                      </li>                        
                                    </ul>
                              </div>
                            </div>
                          </div>   
		<li role="presentation">
		<a role="menuitem" tabindex="-1" href="{{url(\GetRolecode::_getRolecode(Auth::user()->role??'').'/profile')}}"><li role="presentation">Profile</li></a>
		</li>				  
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('admin.logout')}}">Logout</a></li>
                          </div>
              </ul>
          </nav>