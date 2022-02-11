                <div class="shipping-details mt-3">
                  <div class="row border-top border-bottom pt-3">
                    <div class="col-sm-6 pr-sm-0">

					@php  
					use App\Models\Shipping_Rates;
					if(session()->get('appcurrency')=="USD"){
					$shipping_rates=Shipping_Rates::select('level','starting_price','ending_price')->where('level','Free')->where('country','!=','India')->get()->first();
					}	 
					else{
					$shipping_rates=Shipping_Rates::select('level','starting_price','ending_price')->where('level','Free')->where('country','India')->get()->first();
					}

		 
			
					
                     			  
				@endphp			  
				@if(session()->get('appcurrency')=="INR")	  
				<p class="small">	FREE Shipping Across India for orders above {{session()->get('appcurrency')}} {{$shipping_rates->ending_price??1000}}</p>
				@else

				<p class="small">	FREE Shipping for orders above {{session()->get('appcurrency')}} {{$shipping_rates->ending_price??225}}</p>
				@endif
					  
				
                      <p class="small">PAY Securely via PayPal, Debit & Credit Cards</p>
                    </div>
                    <div class="col-sm-6">
                      <p class="small mb-0"><b>Shipping Times:</b> 7 working days in India.</p>
                      <p class="small">Upto 14 working days for International.</p>
                    </div>
                  </div>
                </div>