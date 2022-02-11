@if($recently_viewed->count()>0)
<section>
<div class="container pl-0 pr-0">
<h3 class="pl-3">New Arrivals</h3>
<div class="newarrivals-slider mt-4">	
@include('frontend.products_strips',$recently_viewed)
</div>		
<div class="shopnow-container text-center mt-3">
<a href="{{url('newarrivals')}}" class="shopnow-btn">SHOP NOW</a>
</div>
</div>
</section>	
@endif