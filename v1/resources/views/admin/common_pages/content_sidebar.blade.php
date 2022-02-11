<!-- Sidebar -->
          <nav id="sidebar">
              <div class="sidebar-header">
                  
@php
$theme_options_data=DB::table('themeoptions')->get()->first();
@endphp
                  <img src="{{URL::to('assets/uploads/'.$theme_options_data->header_logo??'')}}" class="img-fluid">
              </div>

              <ul class="list-unstyled components sidebar-accordions">
                  <li class="{{ (request()->is('content/dashboard')) ? 'active' : '' }}"><a href="{{url('content/dashboard')}}">Dashboard</a></li>
                  <div id="accordion">
                                      
                      
                         
                          
                          <div class="card">
                            <div class="card-header" id="headingSeven">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                  Content Management
                                </button>
                              </h5>
                            </div>
                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion" style="">
                              <div class="card-body">
                                  <ul class="list-unstyled" id="pageSubmenu">
                                      <li class="{{ (request()->is('content/banners')) ? 'active' : '' }}">
                                          <a href="{{url('content/banners')}}">Homepage Featured</a>
                                      </li>
                                      <li class="{{ (request()->is('content/testimonials')) ? 'active' : '' }}">
                                          <a href="{{url('content/testimonials')}}">Testimonials</a>
                                      </li>
                                      <li class="{{ (request()->is('content/pages')) ? 'active' : '' }}">
                                          <a href="{{url('content/pages')}}">Pages</a>
                                      </li>
                                      <li class="{{ (request()->is('content/faqs')) ? 'active' : '' }}">
                                          <a href="{{url('content/faqs')}}">FAQs</a>
                                      </li>
                                  </ul>
                              </div>
                            </div>
                          </div>
                          
                          
                          
                         

						  
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('admin.logout')}}">Logout</a></li>
                          
                        </div>
              </ul>

          </nav>