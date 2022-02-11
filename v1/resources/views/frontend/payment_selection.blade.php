@extends('frontend.template_v1')
@section('title', "Payment Selection")
@section('content')
 
    <section style="padding-top: 30px;">
        <div class="container">
            <h3>Payment Option</h3>
            <div class="row">
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="cart-container">
        <form  method="post" action="{{ route('payment.selected')}}">
		 @csrf  
          <div class="form-frame" style="color: #6f6f72;">
                
<!--				
            <div class="radio">
              <label>
                <input type="radio" name="paymentMode" id="paymentMode-ebs" value="epay-ebs">
              <b>EBS Payment Gateway</b><br>(Credit Cards / Debit Cards / UPI / Net Banking / Wallets)
              </label>
            </div>
			-->
            
              
              <div class="radio">
              <label>
                <input type="radio" name="paymentMode" id="paymentMode-razorpay" value="epay-razorpay" checked>
                <b>Razorpay Payment Gateway</b><br>(Credit Cards / Debit Cards / UPI / Net Banking / Wallets)
              </label>
            </div>
            
			<!--
            <div class="radio">
              <label>
                <input type="radio" name="paymentMode" id="paymentMode-paypal" value="epay-paypal">     
              <b> PayPal</b>
              </label>
            </div>
			-->
                      </div>

        
      <input type="submit" name="paymentproceed" class="btn btn-custom btn-curved btn-wide btn-brand" value="Confirm Order"> 
                            </div>
                        </div>
                    </div>
					
					
					
					
					
					<div class="row col-md-12 mt-4">
			   
			   <h4>Instruction to PayPal account holders in the next payment gateway page</h4>
			   </div>
			   	
			<div class="row">
			
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body p-0">
						<p class="p-2">Step 1</p>
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
			
			
			
			
		
			
			
			
            
            <div class="row mt-5">
			
			
                <div class="col-sm-8">
				
				<!--
                    <div class="cart-action-box">
                        <a href="{{ URL('/products')}}" class="btn btn-custom btn-curved btn-wide btn-white">
                            <span class="glyphicon glyphicon-heart"></span> Shipping
                        </a>
                    </div>
					-->
                    <div class="cart-action-box right">
                       
                        
              
                    </div>
                </div> 
				
				
				<!-- ./col -->
                <div class="col-sm-4">
                @include('frontend.cart_shipped')  
                </div>
            </div>
			
			   </form>
			   
			   
			   
            
        </div>
    </section>
@endsection