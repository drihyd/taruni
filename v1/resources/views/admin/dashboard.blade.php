@extends('admin.template_v1')
@section('title', 'Dashboard')
@section('content')
<div class="paddingleftright">
                <h4>Today's Updates</h4>
              </div>

              <section class="stats-section">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-sm-12 text-center">
                      <div class="inline stat-card">
                        <h3>8</h3>
                        <p>Today's Orders</p>
                      </div>
                       <div class="inline stat-card">
                        <h3>Rs. 1,04,510.25</h3>
                        <p>Today's Order Worth</p>
                      </div>
                      <div class="inline stat-card">
                        <h3>19</h3>
                        <p>Today's Registrations</p>
                      </div>
                    </div>
                  </div> <!-- ./row -->
                </div>
              </section>

              <section class="stats-section analytics-section">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-sm-12 text-center">
                      <a href="./orders.html" class="inline stat-card">
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
@endsection