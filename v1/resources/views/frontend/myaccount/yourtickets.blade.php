@extends('frontend.template_v1')
@section('title', 'My Tickets')
@section('content')
<section class="my-account-sec">
        <div class="container">
            <div class="row">
              <div class="col-sm-12">
          <div class="my-account-area">
            
            
@include('frontend.myaccount.mysidebar')
            
            <div id="account-details-area">
              
              <div id="account-menu-toggle" class="btn btn-custom btn-brand btn-sm" href="#my-account-menu"><span class="glyphicon glyphicon-menu-hamburger"></span> Menu</div>
              
                  <h2 class="smaller section-title">My Tickets</h2>
@if($tickets_data->count()==0)

<div class="row">
          <div class="col-sm-12 text-center">
            
          
          <div id="products-area" style="min-height: 50px; margin-top: 50px;">
            
            <div class="text-align-center padding-bottom-30">
              
              <p>No data found.</p>
              <a href="{{ URL('/help')}}" class="btn btn-custom btn-curved btn-brand btn-wide btn-sm btn-no-margin">Open Tickets</a>
            </div>
            
          </div> <!-- ./products-area -->
          
      
          </div>
        </div>

@else
      <div class="row ">
        
        <div class="col-sm-12 mb-2">
          
          <div id="cart-area" class="table-responsive cart-container">
            <table class="table cart-table responsive">
              <table id="orders-table" class="table customdatatable" style="width:100%">
                  <thead>
                      <tr>
                        <th>S.No.</th>
                        <th>Issue</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th>Remarks</th>
                      </tr>
                  </thead>
                  <tbody>
                     @foreach($tickets_data as $ticket)
                      <tr >
                        <td>{{$loop->iteration}}</td>
                          <td>{{ucwords($ticket->issue)??''}}</td>
                          <td>{{ucfirst($ticket->message)??''}}</td>
                          <td>{{ucwords($ticket->status)??''}}</td>
                          <td>{{$ticket->status_remarks??''}}</td>

                          
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