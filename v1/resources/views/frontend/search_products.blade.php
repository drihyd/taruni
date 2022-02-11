@extends('frontend.template_v1')
@section('title', $pageTitle)
@section('content')
<section>
<div class="container">
<h2 class="smaller margin-top-30">{{$pageTitle}}</h2>
<div class="row"> 
<div class="col-sm-12">		  
<div class="products-grid clearfix">			
@if($Products->count()>0)
@include('frontend.product_card')
@else
<p>No results matching your search</p>
@endif			
</div>			
</div>
</div>
</div>	  
</div>
</section>
@endsection