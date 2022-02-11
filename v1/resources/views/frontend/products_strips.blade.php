@if($recently_viewed)
@foreach($recently_viewed as $product)
<div>                        
<div class="look-wrapper product-wrapper">     
@include('frontend.cardpanel',['Products' => $recently_viewed,'product' => $product])
</div>
</div>
@endforeach
@else
@endif