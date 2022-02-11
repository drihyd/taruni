@php			
use App\Models\Products;

@endphp

<div id="fetching_data">

  <div class="row" id="post_data">
	
			@if($Products)
				
			@foreach($Products as $product)
		
			
			
			
			
			
			
		<div class="col-sm-4 col-6 pl-sm-1 pr-sm-1">
		
<div class="product-wrapper">




@include('frontend.cardpanel',['Products' => $Products,'product' => $product])


          
</div>
</div>
			
		
              
			  
			  @php
			  $is_header_product_search=$is_header_product_search??'';
			  @endphp
			 
			  @if($loop->last)
				  </div> 
			  
			  
			  
			  <div class="row">
			   <div class="col-sm-12">
			   
			   @if($is_header_product_search!='yes')
				   <!--
				  	<div id="load_more" class="text-center">
				<button type="button" name="load_more_button" class="btn btn-brand form-control  text-center" data-id="{{$product->id}}" id="load_more_button">Load More...</button>
				</div>
				-->
				@endif
				</div>
				</div>
				
				 <div class="row">
			  @endif
			
			  @endforeach
			  
			
				@else
					
				
		
		
		@endif
		
			  
              </div>
			  
			  
            </div>