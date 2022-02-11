@extends('frontend.template_v1')
@section('title', "Razorpay Processing")
@section('content')



<section class="chekout-steps-sec">
<div class="container">
<div class="row">
<div class="col-sm-8">
                    				
@php
$logparams=
[
'subject'=>'Payment processing after receive response from razopay - '.$request_data->razorpay_order_id??0,
'order_id'=>0,
'order_number'=>0,
'razorpay_order_id'=>$request_data->razorpay_order_id??0,
];
\LogActivity::addToLog($logparams);

@endphp

@if($request_data)
	
<div class="card">  
<div class="card-body p-5">   	
<h4>Please wait... your payment is currently being processed. Do not refresh or close your browser.</h4>
</div>
</div>
<form id="myform" action="{{ URL('/callbackrazorpayment') }}" method="POST" >
@csrf
<input type="hidden"  name="razorpay_order_id"  value="{{$request_data->razorpay_order_id}}" />
<input type="hidden"  name="razorpay_payment_id"  value="{{$request_data->razorpay_payment_id}}" />
<input type="hidden"  name="razorpay_signature"  value="{{$request_data->razorpay_signature}}" />
<input type="hidden"  name="_token"  value="{{$request_data->_token}}" />
 <input name="hidden" type="hidden" value="submit" />
</form>

@else
	
<div class="card">  
<div class="card-body p-3">   	
<h4>Sorry, your payment is declined. Please try again. <a href="{{ URL('/cart') }}"><u>Back to your cart</u></a></h4>
</div>
</div>

	
@endif



</div>	
</div>
</div>
</section>
@endsection


@push('scripts')
<script>
document.getElementById("myform").submit();
</script>
 @endpush