@extends('admin.template_v1')
@section('content')
<div class="paddingleftright pt-2 pb-5" >
<h4>{{$page->name??''}}</h4>

<div class="paddingleftright">
                <!--<h4>Today's Updates</h4>-->
              </div>

              <section class="stats-section">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-sm-12 text-center">
                      <a href="{{url('admin/orders/today?filter=orders&value='.Crypt::encryptString('all'))}}"><div class="inline stat-card">
                        <h3>{{$orders_data??''}}</h3>
                        <p>Today's Orders</p>
                      </div></a>
                       <a href="{{url('admin/orders/today?filter=orders&value='.Crypt::encryptString('all'))}}"><div class="inline stat-card">
                        <h3><i class="fas fa-rupee-sign"></i> {{number_format($orders_amount_inr??'', 2, '.', ',')}}</h3>
                        <p>Today's Order Worth in INR</p>
						</div>
					  </a>
					  
					  
					    <a href="{{url('admin/orders/today?filter=orders&value='.Crypt::encryptString('all'))}}"><div class="inline stat-card">
                        <h3><i class="fas fa-dollar-sign"></i> {{$orders_amount_usd??''}}</h3>
                        <p>Today's Order Worth in USD</p>
                      </div>
					  </a>
					  
                      <a href="{{url('admin/customers')}}"><div class="inline stat-card">
                        <h3>{{$registratons??''}}</h3>
                        <p>Today's Registrations</p>
                      </div></a>
                    </div>
                  </div> <!-- ./row -->
                </div>
              </section>

              <section class="stats-section analytics-section">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-sm-12 text-center">
                      <!--<a href="{{url('admin/orders/today')}}" class="inline stat-card">-->
					  <a href="{{url('admin/orders/today?filter=orders&value='.Crypt::encryptString('all'))}}" class="inline stat-card">
                        <h3 class="mb-0"><span class="far fa-list-alt"></span> View Orders</h3>
                      </a>
                      <a href="#" class="inline stat-card">
                        <h3 class="mb-0"><span class="fas fa-bell"></span> Stock Monitor</h3>
                      </a>
                      <a href="#" class="inline stat-card">
                        <h3 class="mb-0"><span class="fas fa-signal"></span> Order Analytics</h3>
                      </a>
                      <a href="#" class="inline stat-card">
                        <h3 class="mb-0"><span class="fas fa-shopping-cart"></span> Cart Analytics</h3>
                      </a>
                    </div>
                  </div>
                </div>
              </section>
              
 @include('admin.elastic_statistics')


</div>
@endsection