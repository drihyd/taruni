@extends('frontend.template_v1')
@section('title', "Cart")
@section('content')
 <section>
 
 

 

 
 
		@if ($basicCart_details->count()==0)
			<div class="container">
		<h3>Cart Items</h3>
				<div class="row">
					<div class="col-sm-12 text-center">
						
					
					<div id="products-area" style="min-height: 30px;">
						
						<div class="text-align-center padding-bottom-30">
							
							<p>Oops! Seems like your closet is empty.<br>Add your favorite outfits now, buy them later.</p>
							<a href="{{ URL('/')}}" class="btn btn-custom btn-curved btn-brand btn-wide btn-sm btn-no-margin">Continue Shopping</a>
						</div>
						
					</div> <!-- ./products-area -->
					
			
					</div>
				</div>
			</div>
		@else
        <div class="container">
	<h3>Cart Items</h3>
            <div class="row">			

                <div class="col-sm-8">
				 @include('frontend.cart_items')
                    
                </div>
				
                <div class="col-sm-4">				
                    @include('frontend.cart_summary')						
                    </div>					
					
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-sm-8">
				<!--
                    <div class="cart-action-box">
                        <a href="{{ URL('/wishlist')}}" class="btn btn-custom btn-curved btn-wide btn-white">
                            <span class="glyphicon glyphicon-heart"></span> Add from Wishlist
                        </a>
                    </div>
					-->



			@if(session()->get('disablecheck'))
			<p class="blink_me" disabled="disabled">Please click on above fetch new prices / Remove out of stock from the cart items.</p>							
			@else	
			<div class="cart-action-box right">							
			<a href="{{ URL('/checkout')}}" class="btn btn-custom btn-curved btn-wide btn-brand">Next</a>
			</div>						
			@endif
						

	
                </div> <!-- ./col -->
            </div>
			
			
			@endif
            
        </div>
    </section>
    	
	
	


					

	

	
@endsection