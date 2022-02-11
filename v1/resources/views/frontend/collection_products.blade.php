@extends('frontend.template_v1')
@section('title', $pageTitle)
@section('content')
<section>
<div class="container pl-sm-0">	  
<h2 class="smaller margin-top-30">{{$pageTitle}}</h2>
</div>  
<div class="row">        
<div class="col-sm-12">	
@if($Products->count()>0)	  
<div class="products-grid clearfix" id="products-area">			
@include('frontend.product_card')
</div>

@else
<p>Not found data</p>

@endif
</div>
</div>
</div>
</section>	
@endsection

	

		
