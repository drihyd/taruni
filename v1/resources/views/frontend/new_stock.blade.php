@extends('frontend.template_v1')
@section('title', $pageTitle)
@section('content')
<section>
<div class="container pl-sm-0">	
 {{ Breadcrumbs::render('newarrivals', 'New Arrivals') }}  
<h2 class="smaller margin-top-30">{{$pageTitle}}</h2>
</div>  
<div class="row">        
<div class="col-sm-12">		  
<div class="products-grid clearfix" id="products-area">			
@include('frontend.product_card')
</div>
</div>
</div>
</div>
</section>	
@endsection
