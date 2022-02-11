@extends('frontend.template_v1')
@section('title', "Checkout Review")
@section('content')

   <section style="padding-top: 30px;">
        @if ($basicCart_details->count()==0)
			<div class="container">
			
				<div class="row">
					<div class="col-sm-12 text-center">
						<h3>Review Order</h3>
					
					<div id="products-area" style="min-height: 30px;">
						
						<div class="text-align-center padding-bottom-30">
							<h2 class="smaller">Cart Empty</h2>
							<p>Oops! Seems like your closet is empty.<br>Add your favorite outfits now, buy them later.</p>
							<a href="{{ URL('/')}}" class="btn btn-custom btn-curved btn-brand btn-wide btn-sm btn-no-margin">Continue Shopping</a>
						</div>
						
					</div> <!-- ./products-area -->
					
			
					</div>
				</div>
			</div>
		@else
        <div class="container">
		<h3>Review Order</h3>
            <div class="row">
			
                <div class="col-sm-8">
				
                    @include('frontend.cart_items')
                </div>
				
                <div class="col-sm-4">				
                    @include('frontend.cart_summary')						
             				
	
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-sm-8">
                    <div class="cart-action-box">
                        <a href="{{ URL('/checkout')}}" class="btn btn-custom btn-curved btn-wide btn-white">
                            <span class="glyphicon glyphicon-heart"></span> Shipping
                        </a>
                    </div>
                    <div class="cart-action-box right">
                        <a href="{{ URL('/payment') }}" class="btn btn-custom btn-curved btn-wide btn-brand"> 
                        Proceed to payments
                        </a>
                    </div>
                </div> <!-- ./col -->
                <div class="col-sm-4">
					@include('frontend.cart_shipped')                   
                  
                </div>
            </div>
			
			@endif
            
        </div>
    </section>
@endsection