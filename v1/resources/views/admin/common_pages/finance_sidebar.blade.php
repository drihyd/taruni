<!-- Sidebar -->
          <nav id="sidebar">
              <div class="sidebar-header">
               @php
$theme_options_data=DB::table('themeoptions')->get()->first();
@endphp
                  <img src="{{URL::to('assets/uploads/'.$theme_options_data->header_logo??'')}}" class="img-fluid">
              </div>

              <ul class="list-unstyled components sidebar-accordions">
                  <li class="{{ (request()->is('finance/dashboard')) ? 'active' : '' }}"><a href="{{url('finance/dashboard')}}">Dashboard</a></li>
                  <div id="accordion">
                          <div class="card">
                            <div class="card-header" id="headingOne">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Payments
                                </button>
                              </h5>
                            </div>
                        
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
                              <div class="card-body">
                                  <ul class="list-unstyled" id="catSubmenu">
                                    <li class="{{ (request()->is('finance/payments')) ? 'active' : '' }}">
                            <a href="{{url('finance/payments/today?filter=payments&value='.Crypt::encryptString('all'))}}">View Payments</a>
                            </li>
                                  </ul>
                              </div>
                            </div>
                          </div>                    
                                        
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('admin.logout')}}">Logout</a></li>
                          
                        </div>
              </ul>

          </nav>