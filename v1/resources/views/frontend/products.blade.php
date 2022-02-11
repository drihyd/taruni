@extends('frontend.template_v1')
@section('title', $pageTitle)
@section('content')
<section>
      <div class="container pl-sm-0">
	  
	  
	  
	  
	   {{ Breadcrumbs::render('single_category',$Breadcrum_Categories->name,$Breadcrum_Categories) }}
<!--
      	<div class="breadcrumbs">
				    <ul class="items">
				        <li class="item home"><a href="{{url('./')}}" title="Go to Home Page"><i class="fas fa-home"></i></a></li>
				        <li class="item category"><a href="#" title="">Women</a></li>
				        <li class="item category-active">@yield('title')</li>
				    </ul>
				</div>
				
				-->

	  
	  <h2 class="smaller margin-top-30">{{$pageTitle}}</h2>
	  
	  
	
		
    </div>

	
	  
	  
        <div class="row">
          <div class="col-sm-2">
		  
		  
		   @include('frontend.common_pages.products_filters')
		  
		  
             
              
          </div>
          <div class="col-sm-10">
		  
		  	<div class="products-grid clearfix with-filter-product-card" id="products-area">
			
			
			
				@include('frontend.product_card')
			
          
			
			 </div>
			 
			 
			 @if($Categories)
				 
		
				 
			 <h2 class="smaller margin-top-30">{{$pageTitle??''}}</h2>
				 
			 <p>{{$Categories[0]->desc??''}}</p>
			@endif
			
          </div>
        </div>
		
	
		
		
		
		
      </div>
    </section>
	
@endsection


@push('scripts')
<script>
var _token = $('input[name="_token"]').val();
load_data('', _token);
</script>




@endpush

	

		
