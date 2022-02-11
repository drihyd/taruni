@extends('frontend.template_v1')
@section('title', 'My Account')
@section('content')
<section class="my-account-sec">
        <div class="container">
            <div class="row">
              <div class="col-sm-12">
          <div class="my-account-area">
            
            
@include('frontend.myaccount.mysidebar')
            
            <div id="account-details-area">
              
              <div id="account-menu-toggle" class="btn btn-custom btn-brand btn-sm" href="#my-account-menu"><span class="glyphicon glyphicon-menu-hamburger"></span> Menu</div>
              
                  <h2 class="smaller section-title">My Used Coupons</h2>
@if($coupons_data->count()==0)

<div class="row">
          <div class="col-sm-12 text-center">
            
          
          <div id="products-area" style="min-height: 50px; margin-top: 50px;">
            
            <div class="text-align-center padding-bottom-30">
              
              <p>Oops! Seems like your closet is empty.<br>Add your favorite outfits now, buy them later.</p>
              <a href="{{ URL('/')}}" class="btn btn-custom btn-curved btn-brand btn-wide btn-sm btn-no-margin">Continue Shopping</a>
            </div>
            
          </div> <!-- ./products-area -->
          
      
          </div>
        </div>

@else
      <div class="row ">
        
        <div class="col-sm-12 mb-2">
          
          <div id="cart-area" class="table-responsive cart-container">
            <table class="table cart-table responsive">
              <table id="orders-table" class="table customdatatable  table-striped " style="width:100%">
                  <thead class="thead-dark">
                      <tr>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>Code</th>                                  
                        <th>Description</th>                 
           
                      </tr>
                  </thead>
                  <tbody>
                     @foreach($coupons_data as $coupon)
                      <tr >
                        <td>{{$loop->iteration}}</td>
                          <td>{{ucwords($coupon->Coupon_title)??''}}</td>
                          <td>{{strtoupper($coupon->CouponCode)??''}}</td>
                          <!--<td>{{ \Carbon\Carbon::parse($coupon->CouponAddedon)->format('d M Y')}}</td>   -->     
                          <td>{{$coupon->Description??''}}</td>                   
                   

                          
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </table>
            
          
        </div> <!-- ./col -->

        </div> <!-- ./col -->

       

                                
            </div> <!-- ./account-details-area -->

            @endif
            
          </div>
        </div>
                
            </div>
        </div>
    </div></section>
    @endsection