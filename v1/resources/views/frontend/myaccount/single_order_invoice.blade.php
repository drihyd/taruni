@extends('frontend.template_v1')
@section('content')

@php
$theme_options_data=DB::table('themeoptions')->get()->first();
@endphp
  <style>
         p{
            color: #000;
         }
         body{
            color: #000;
			background:#fff;
			
         }
         .customdatatable {
             border: 1px solid #ddd !important;
         }
		 
		 table { border-collapse: collapse; }
		 .table-responsive { overflow-x:none!important; }
tr { border: none; }
td,th {
  border-right: 1px solid #dee2e6;
  border-left: 1px solid #dee2e6;
}

		 
		 
      </style>
<section class="p-0">
      <div class="container-fluid">
	  
	  			  <div class="row hidden-print">
         <div class="col-sm-12">
            <button id="printInv"  onClick="window.print();" class="btn btn-danger btn-sm">Print Invoice</button> &nbsp; 
         </div>
		 
		
        </div>     
	  
         <div class="row">
		 
		  <div class="col-sm-6">

			
               <img src="{{URL::to('assets/uploads/'.$theme_options_data->header_logo??'')}}" width="200" style="margin-top: 8px;float: left;">
             
            </div>
		 
            <div class="col-sm-6 pull-right text-align-right" style="text-align:right;">

			
              
               
               <p class="ml-5" style="display: inline-block;">
                   <em>{{$theme_options_data->company_invoice??''}}<br>
                   {{$theme_options_data->drno_invoice??''}},{{$theme_options_data->street_invoice??''}},<br>{{$theme_options_data->landmark_invoice??''}},<br>
                   {{$theme_options_data->city_invoice??''}}, {{$theme_options_data->state_invoice??''}},<br> Pincode: {{$theme_options_data->pincode_invoice??''}},<br>{{$theme_options_data->country_invoice??''}}.</em>
               </p>
            </div>
         </div>
         <div class="row mt-3">
            <div class="col-sm-12"><em>
               <p>GSTIN: {{$theme_options_data->gst_no_invoice??''}}</br>
               PH# {{$theme_options_data->mobile_no_invoice??''}}</p></em>
            </div>
         </div>
         <div class="row mt-4 mycards">
            <div class="col-sm-4">			  
			  @include('frontend.myaccount.shippingdetails')
			  
            </div>
         

            <div class="col-sm-4">
              @include('frontend.myaccount.billingdetails')
            </div>
             <div class="col-sm-4">
              @include('frontend.myaccount.paymentstatus')
            </div>
    </div>
         <hr>
         <div class="row">
            <div class="col-sm-6">
                <b>Order Number: {{$orders_data->order_number??''}} </b><br>
				
            </div>
			
			<div class="col-sm-6" style="text-align:right;">
              
				<b>Order Date: {{\Carbon\Carbon::parse($orders_data->created_at??'')->format('d-m-Y') }} </b>
            </div>
        </div>
        <hr>
        @include('frontend.myaccount.ordersitems_table')
        <div class="row hidden-print">
         <div class="col-sm-12">
            <button id="printInv"  onClick="window.print();" class="btn btn-danger btn-sm">Print Invoice</button> &nbsp; 
         </div>			
        </div>
      </div>
   </section>
   
   @endsection
