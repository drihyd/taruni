@extends('frontend.template_v1')
@section('title', "Razorpay")
@section('content')
@php
use App\Models\Cart;
use App\Models\Cart_details;
use Razorpay\Api\Api;
use App\Models\Payment;
$Cart_total_sum=Cart::select('user_id','currency','total_amount','discount_coupon','grand_total','ship_to_name','ship_to_email','ship_to_phone')->where('id',session()->get('cart'))->where('order_status','hold')->first();
$Cart_details_count=Cart_details::select('*')->where('cart_id',session()->get('cart'))->where('item_status','placed')->count();


if($Cart_total_sum){

$api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
$order  = $api->order->create([
'receipt' => '',
'amount'  => $Cart_total_sum->grand_total*100,
'currency' => $Cart_total_sum->currency??'INR'
]);

$order_created_id=$order->id??0;
	Payment::updateOrCreate(				
				[			
				 'razorpay_order_id' =>$order->id??0,	
				 'paypal_currency_type' =>$order->currency,	
				 'entity' =>$order->entity,			
				 'billing_email' =>$Cart_total_sum->ship_to_email,	
				 'billing_phone' =>$Cart_total_sum->ship_to_phone,	
				 'billing_name' =>$Cart_total_sum->ship_to_name,	
				 'paypal_payment_status' =>$order->status,	
				 'amount' =>$Cart_total_sum->grand_total??0,	
				 'user_id' =>$Cart_total_sum->user_id??0,	
				 'cart_id' =>session()->get('cart')??0,	
				 
				]
			);		
			
$Cartupdate=Cart::where('order_status',"hold")->where('id',session()->get('cart'))->update(['order_id'=>$order->id??0]);
$Cartdtupdate=Cart_details::where('item_status',"hold")->where('cart_id',session()->get('cart'))->update(['order_id'=>$order->id??0]);
		

$logorderintiated=
[
	'subject'=>'Payment Intiated - '.$order->id??0,
	'order_id'=>0,
	'order_number'=>0,
	'razorpay_order_id'=>$order->id,
];
		
\RpayOrderInitated::addToLog($logorderintiated);


$logparams=
[
	'subject'=>'Payment Intiated - '.$order->id??0,
	'order_id'=>0,
	'order_number'=>0,
	'razorpay_order_id'=>$order->id,
];
		
	\LogActivity::addToLog($logparams);		
}		
@endphp
<section class="chekout-steps-sec">
<div class="container">
<div class="row">
@if($order_created_id??'')
<div class="col-sm-8">





                        @if($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Error!</strong> {{ $message }}
                            </div>
                        @endif
                            <div class="alert alert-success success-alert alert-dismissible fade show" role="alert" style="display: none;">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Success!</strong> <span class="success-message"></span>
                            </div>
                        {{ Session::forget('success') }}
                        <div class="card card-default">
                            <div class="card-header">
                               <h4 class="text-dark">Your selected Payment gateway is Razorpay</h4>
                            </div>
							
							

                            <div class="card-body text-center">
							
							
							
							<div id="processing_info" class="text text-danger mt-2">

Note: Do not refresh or close your browser while processing the payment process.

</div>
							
                                <div class="form-group mt-5 mb-5">
                                    <input type="hidden" name="amount" class="form-control amount" placeholder="Enter Amount" value="{{$Cart_total_sum}}">
                                </div>
                             
							 
							   <button id="rzp-button1" class="btn btn-custom btn-curved btn-wide btn-brand">Click again if you didn't get payment popup.</button>
							
								 <!--<button onClick="window.location.reload();" class="btn btn-custom btn-curved btn-wide btn-brand">Reload Again</button>-->
                            <br><br>
							</div>
                        </div>
						
					

		
					<div class="row col-md-12 mt-4">
			   
			   <h4>Instruction to PayPal account holders in gateway</h4>
			   </div>
			   	
			<div class="row">
			
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body p-0">
						<p class="p-2">Step1</p>
						<img src="https://i.imgur.com/LpIsva3.png" width=250 />
						</div>
					</div>
				</div>
				
				<div class="col-md-6">
                    <div class="card">
                        <div class="card-body p-0">
						<p class="p-2">Step 2</p>
						<img src="https://i.imgur.com/5kloowC.png"width=270/>
						</div>
					</div>
				</div>
			</div>
					


</div>

<div class="col-sm-4">				
@include('frontend.cart_summary')						
</div>	
</div>


@else
	<div class="col-md-12 text-center">		

		
		<div class="card p-3">
  <div class="card-body">
  
   <h2 class="card-title">@yield('title')</h2>

					
                    <p>
                       <a onClick="window.location.reload();">Payment Gateway is not connected/Cart is closed</a>	
                    </p>
             
						
                    </div>
                    <a href="{{url('/cart')}}" class="btn btn-brand btn-block mt-4">Go to your cart</a>
  
  
  
  </div>
</div>
					
</div>

@endif
</div>
</section>

<!-- This form is hidden -->
<!--
<form id="myform" action="{{ URL('/callbackrazorpayment') }}" method="POST" >
<input type="hidden" value="{{csrf_token()}}" name="_token" /> 
<input type="hidden"  name="razorpay_order_id"  id="rzp_orderid"  value="" />
<input type="hidden"  name="razorpay_payment_id"  id="rzp_paymentid"  value="" />
<input type="hidden"  name="razorpay_signature" id="rzp_signature"  value="" />
<button type="hidden" id="rzp-paymentresponse" ></button>
</form>
-->






@endsection

@push('scripts')



<script>
var options = {
    "key": "{{ env('RAZOR_KEY') }}", // Enter the Key ID generated from the Dashboard
    "amount": "{{$Cart_total_sum->grand_total*100}}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "{{$Cart_total_sum->currency??'INR'}}",
    "name": "Product Purchases - {{ env('APP_NAME') }}",
    "description": "{{ env('APP_NAME') }} - Pay to order",
    "image": "{{ env('APP_URL') }}/assets/uploads/61653249915e4_1634021961.svg",
    "order_id": "{{$order->id??''}}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
	"callback_url": "{{ env('APP_URL') }}callback/?order_id={{$order->id??''}}",
	"callback_method": "get",
	"max_count":4,
    "prefill": {
         "name": "{{$Cart_total_sum->ship_to_name}}",
        "email": "{{$Cart_total_sum->ship_to_email}}",
        "contact": "{{$Cart_total_sum->ship_to_phone}}"
    },
    "notes": {
        "address": ""
    },
    "theme": {
        "color": "#292D2F"
    },
	
	 "modal": {
        "ondismiss": function(){
			
			//alert("Hi");
            console.log('Checkout form closed');
        }
    }
	
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}


window.onload = function(){
    document.getElementById('rzp-button1').click();
};


</script>




@endpush


