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
                      <a href="{{url('finance/payments/today?filter=payments&value='.Crypt::encryptString('all'))}}"><div class="inline stat-card">
                        <h3>{{$today_razor_payments->count()??0}}</h3>
                        <p>Today's Payments On Razorpay</p>
                      </div></a>
					  
					  
                       <a href="#"><div class="inline stat-card">
                        <h3>0</h3>
                        <p>Today's Payments On Paypal</p>
                      </div></a>
                      <a href="#"><div class="inline stat-card">
                        <h3>0</h3>
                        <p>Today's Payments On EBS</p>
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
					  <a href="{{url('finance/payments/today?filter=payments&value='.Crypt::encryptString('all'))}}" class="inline stat-card">
                        <h3 class="mb-0"><span class="far fa-list-alt"></span> Razorpay Payments</h3>
                      </a>
					  
					    <a href="#" class="inline stat-card">
                        <h3 class="mb-0"><span class="far fa-list-alt"></span> Paypal Payments</h3>
                      </a>
					  
					    <a href="#" class="inline stat-card">
                        <h3 class="mb-0"><span class="far fa-list-alt"></span> EBS Payments</h3>
                      </a>
        
            
                    </div>
                  </div>
                </div>
              </section>
              



</div>
@endsection