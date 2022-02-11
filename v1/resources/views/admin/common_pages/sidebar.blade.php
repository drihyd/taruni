


<!-- Sidebar -->
          <nav id="sidebar">
              <div class="sidebar-header">
                    @php
$theme_options_data=DB::table('themeoptions')->get()->first();
@endphp
                  <img src="{{URL::to('assets/uploads/'.$theme_options_data->header_logo??'')}}" class="img-fluid">
              </div>

              <ul class="list-unstyled components sidebar-accordions">
                  <li class="{{ (request()->is('admin/dashboard')) ? 'active' : '' }}"><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
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
                                    <li class="{{ (request()->is('admin/categories') || (request()->is('admin/categories/*'))) ? 'active' : '' }}">
                            <a href="{{url('admin/categories')}}">View Categories</a>
                            </li>
                            <li class="{{ (request()->is('admin/departments') || (request()->is('admin/departments/*'))) ? 'active' : '' }}">
                            <a href="{{url('admin/departments')}}">Departments</a>
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
                                      <li class="{{ (request()->is('admin/orders/today?filter=orders&value='.Crypt::encryptString('all'))) ? 'active' : '' }}">
                                          <a href="{{url('admin/orders/today?filter=orders&value='.Crypt::encryptString('all'))}} ">View All</a>
                                      </li>
                                      <li class="{{ (request()->is('admin/orders/today?filter=orders&value='.Crypt::encryptString('placed'))) ? 'active' : '' }}">
                                          <a href="{{url('admin/orders/today?filter=orders&value='.Crypt::encryptString('placed'))}} ">Placed Orders</a>
                                      </li>
                                      <li class="{{ (request()->is('admin/orders/today?filter=orders&value='.Crypt::encryptString('processing'))) ? 'active' : '' }}">
                                          <a href="{{url('admin/orders/today?filter=orders&value='.Crypt::encryptString('processing'))}} ">Processing Orders</a>
                                      </li>
                                      <li class="{{ (request()->is('admin/orders/today?filter=orders&value='.Crypt::encryptString('dispatched'))) ? 'active' : '' }}">
                                          <a href="{{url('admin/orders/today?filter=orders&value='.Crypt::encryptString('dispatched'))}} ">Dispatched Orders</a>
                                      </li>
                                      
                                      <li class="{{ (request()->is('admin/orders/today?filter=orders&value='.Crypt::encryptString('delivered'))) ? 'active' : '' }}">
                                          <a href="{{url('admin/orders/today?filter=orders&value='.Crypt::encryptString('delivered'))}} ">Delivered Orders</a>
                                      </li>
                                      <li class="{{ (request()->is('admin/orders/today?filter=orders&value='.Crypt::encryptString('hold'))) ? 'active' : '' }}">
                                          <a href="{{url('admin/orders/today?filter=orders&value='.Crypt::encryptString('hold'))}} ">Hold Orders</a>
                                      </li>
                                      <li class="{{ (request()->is('admin/orders/today?filter=orders&value='.Crypt::encryptString('cancelled'))) ? 'active' : '' }}">
                                          <a href="{{url('admin/orders/today?filter=orders&value='.Crypt::encryptString('cancelled'))}} ">Cancelled Orders</a>
                                      </li>
                                  
                                      <li class="{{ (request()->is('admin/abandoned_carts') || (request()->is('admin/abandoned_carts/*'))) ? 'active' : '' }}" >
                                          <a href="{{url('admin/abandoned_carts')}}">Abandoned Carts</a>
                                      </li>
                                      <!-- <li class="">
                                          <a href="{{url('admin/underconstruction')}}">Foreign Orders</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Abandoned Carts</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Abandoned Payments</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Paypal Outbox</a>
                                      </li> -->
                                  </ul>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header" id="headingThree">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  Customers
                                </button>
                              </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion" style="">
                              <div class="card-body">
                                  <ul class="list-unstyled" id="cusSubmenu">
                                      <li class="{{ (request()->is('admin/customers') || (request()->is('admin/customers/*'))) ? 'active' : '' }}" >
                                          <a href="{{url('admin/customers')}}">View All</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Export</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Loyal Customers</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Wishlists</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Clicks</a>
                                      </li>
                                  </ul>
                              </div>
                            </div>
                          </div>
                          
                          <div class="card">
                            <div class="card-header" id="headingFour">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                  Products</button>
                              </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion" style="">
                              <div class="card-body">
                                  <ul class="list-unstyled" id="productsSubmenu">
                                      <li class="{{ (request()->is('admin/products') || request()->is('admin/products/*') ) ? 'active' : '' }}">
                                          <a href="{{url('admin/products')}}">View All</a>
                                      </li>

                                      <li class="{{ (request()->is('admin/collections') || request()->is('admin/collections/*')) ? 'active' : '' }}">
                                          <a href="{{url('admin/collections')}}">Collections</a>
                                      </li>
                                      <li class="{{ (request()->is('admin/products/create') || request()->is('admin/products/create')) ? 'active' : '' }}">
                                          <a href="{{url('admin/products/create')}}">Add Product</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Filter</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Add Products</a>
                                      </li>
                                      <li class="{{ (request()->is('admin/parent_attributes') || request()->is('admin/parent_attributes/*')) ? 'active' : '' }}">
                                          <a href="{{url('admin/parent_attributes')}}">Parent Attributes</a>
                                      </li>
                                      <li class="{{ (request()->is('admin/attributes') || request()->is('admin/attributes/*')) ? 'active' : '' }}">
                                          <a href="{{url('admin/attributes')}}">Attributes</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Recommended</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Update $ Price</a>
                                      </li>
                                  </ul>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header" id="headingFive">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                  Masters Data
                                </button>
                              </h5>
                            </div>
                            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion" style="">
                              <div class="card-body">
                                  <ul class="list-unstyled" id="masterSubmenu">
                                      <li>
                                          <a href="#">Tags</a>
                                      </li>
                                      <li class="{{ (request()->is('admin/shipping_rates') || request()->is('admin/shipping_rates/*')) ? 'active' : '' }}">
                                          <a href="{{url('admin/shipping_rates')}}">Shipping Rates</a>
                                      </li>
                                      <li class="{{ (request()->is('admin/attributes_masters') || request()->is('admin/attributes_masters/*')) ? 'active' : '' }}">
                                          <a href="{{url('admin/attributes_masters')}}">Attributes Masters</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Shipping Times</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Countries</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">States</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Cities</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Upload Postal Codes</a>
                                      </li>
                                  </ul>
                              </div>
                            </div>
                          </div>
                          <div class="card">
                            <div class="card-header" id="headingSix">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                  Promotions
                                </button>
                              </h5>
                            </div>
                            <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion" style="">
                              <div class="card-body">
                                  <ul class="list-unstyled" id="promotionsSubmenu">
                                      <li>
                                          <a href="#">Contest</a>
                                      </li>
                                      <li class="{{ (request()->is('admin/coupons') || request()->is('admin/coupons/*')) ? 'active' : '' }}">
                                          <a href="{{url('admin/coupons')}}">Coupons</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Discounts</a>
                                      </li>
                                  </ul>
                              </div>
                            </div>
                          </div>
                          
                          <div class="card">
                            <div class="card-header" id="headingSeven">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                  Content & Pages
                                </button>
                              </h5>
                            </div>
                            <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion" style="">
                              <div class="card-body">
                                  <ul class="list-unstyled" id="pageSubmenu">
                                      <li class="{{ (request()->is('admin/banners') || request()->is('admin/banners/*')) ? 'active' : '' }}">
                                          <a href="{{url('admin/banners')}}">Homepage Featured</a>
                                      </li>
                                      <li class="{{ (request()->is('admin/fashionjournals') || request()->is('admin/fashionjournals/*')) ? 'active' : '' }}">
                                          <a href="{{url('admin/fashionjournals')}}">Fashion Journals</a>
                                      </li>
                                      <li class="{{ (request()->is('admin/testimonials') || request()->is('admin/testimonials/*')) ? 'active' : '' }}">
                                          <a href="{{url('admin/testimonials')}}">Testimonials</a>
                                      </li>
                                      <li class="{{ (request()->is('admin/pages') || request()->is('admin/pages/*')) ? 'active' : '' }}">
                                          <a href="{{url('admin/pages')}}">Pages</a>
                                      </li>
                                      <li class="{{ (request()->is('admin/locations') || request()->is('admin/location/*')) ? 'active' : '' }}">
                                          <a href="{{url('admin/locations')}}">Locations</a>
                                      </li>
                                      <li class="{{ (request()->is('admin/faqs') || request()->is('admin/faqs/*')) ? 'active' : '' }}">
                                          <a href="{{url('admin/faqs')}}">FAQs</a>
                                      </li>
                                  </ul>
                              </div>
                            </div>
                          </div>
                          
                          <div class="card">
                            <div class="card-header" id="headingEight">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                  Settings
                                </button>
                              </h5>
                            </div>
                            <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion" style="">
                              <div class="card-body">
                                  <ul class="list-unstyled" id="settingsSubmenu">
                                      <li class="{{ (request()->is('admin/menu') || request()->is('admin/menu/*')) ? 'active' : '' }}">
                                          <a href="{{url('admin/menu')}}">Menus</a>
                                      </li>
                                      <li class="{{ (request()->is('admin/theme_options') || request()->is('admin/theme_options/*')) ? 'active' : '' }}">
                                          <a href="{{url('admin/theme_options')}}">Theme Options</a>
                                      </li>
                                      <li class="{{ (request()->is('admin/users') || request()->is('admin/user/*')) ? 'active' : '' }}">
                                          <a href="{{url('admin/users')}}">Users</a>
                                      </li>
                                      <li class="{{ (request()->is('admin/gtm_tracking') || request()->is('admin/gtm_tracking/*')) ? 'active' : '' }}">
                                          <a href="{{url('admin/gtm_tracking')}}">Conversion Tracking</a>
                                      </li>
                                  </ul>
                              </div>
                            </div>
                          </div>
                          
                          <div class="card">
                            <div class="card-header" id="headingNine">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                  Reports & Analytics
                                </button>
                              </h5>
                            </div>
                            <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordion" style="">
                              <div class="card-body">
                                  <ul class="list-unstyled" id="reportSubmenu">
								  
								  <li>
                                          <a href="{{url('admin/account_report/today?filter=orders&value='.Crypt::encryptString('today'))}}">Account Report 1</a>
                                      </li>
									  
									    <li>
                                          <a href="{{url('admin/account_report_second/today?filter=orders&value='.Crypt::encryptString('today'))}}">Account Report 2</a>
                                      </li>
								  
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Order Analytics</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Cart Analytics</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Stock Reports</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Product Report</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Monthly Reports</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Monitor Stock</a>
                                      </li>
                                      <li>
                                          <a href="{{url('admin/underconstruction')}}">Color Report</a>
                                      </li><li>
                                          <a href="{{url('admin/underconstruction')}}">Order Location Report</a>
                                      </li><li>
                                          <a href="{{url('admin/underconstruction')}}">Inventory Age</a>
                                      </li>
                                  </ul>
                              </div>
                            </div>
                          </div>
                          
                          <div class="card">
                            <div class="card-header" id="headingTen">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                  Leads
                                </button>
                              </h5>
                            </div>
                            <div id="collapseTen" class="collapse" aria-labelledby="headingTen" data-parent="#accordion" style="">
                              <div class="card-body">
                                  <ul class="list-unstyled" id="leadsmubmenu">
                                      <li class="{{ (request()->is('admin/support_leads')) ? 'active' : '' }}">
                                          <a href="{{url('admin/support_leads')}}">Feedback</a>
                                      </li>
                                      <li class="{{ (request()->is('admin/contacts')) ? 'active' : '' }}">
                                          <a href="{{url('admin/contacts')}}">Contacts leads</a>
                                      </li>
                                      <li class="{{ (request()->is('admin/newsletters')) ? 'active' : '' }}">
                                          <a href="{{url('admin/newsletters')}}">Newsletter leads</a>
                                      </li>
                                  </ul>
                              </div>
                            </div>
                          </div>                          
                          <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('admin.logout')}}">Logout</a></li>
                          
                        </div>
              </ul>

          </nav>