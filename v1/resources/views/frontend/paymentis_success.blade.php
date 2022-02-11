@extends('frontend.template_v1')
@section('title', 'Payment Successful')
@section('content')
<section>
<div class="container">
<div class="col-sm-12 p-0">


@php


$logparams=
[
'subject'=>'Landed on order confirmation page - '.$Ordersdetails->order_id??0,
'order_id'=>0,
'order_number'=>$Ordersdetails->order_number??0,
'razorpay_order_id'=>$Ordersdetails->order_id??0,
];

\LogActivity::addToLog($logparams);

@endphp



<div class="container">
   <div class="row">
      <div class="col-md-6 mx-auto mt-5">
         <div class="payment">
            <div class="payment_header">
               <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
            </div>
            <div class="content">
               <h2 class="card-title pt-2 mb-3">@yield('title')</h2>
               <p><strong>Order Number :</strong> {{$Ordersdetails->order_number??''}}</p>
               <p><strong>Payment Order Id :</strong> {{ $Ordersdetails->order_id??'' }}</p>
               <p><strong>No. Of Items :</strong> {{ $Ordersdetails->total_items??'' }}</p>
               <p><strong>Amount :</strong> {{ $Ordersdetails->currency??'' }} {{ $Ordersdetails->grand_total??'' }}</p>
             
			  <p><strong> Note<span style="color:#ff0000">&#x2a;</span>: Order confirmation mail will get in next 5-10 minutes.</strong></p>
			  <p><strong><span style="color:#ff0000">&#x2a;</span>Please also check your spam/updates folder for the confirmation email, If you have not received in your mail inbox.</strong></p>
			  
           
			
				@if($Ordersdetails->checkout_mode=="checkoutasguest")
				<p> Please <a target="" href="{{url('/contact-us')}}"> <strong><u>Click Here</u></strong></a> to get contact details for further order communication.<p>
				@else
				<a href="{{url('/myorders')}}" class=" btn btn-brand mt-4">Go to Purchase history</a>
				@endif
				
				 </div>
            
         </div>
      </div>
   </div>
</div>

</div>
</div>
</section>
@endsection