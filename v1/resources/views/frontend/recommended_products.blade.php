@if($Recomended_Products)
@foreach($Recomended_Products as $product)
<div>                        
<div class="look-wrapper product-wrapper">
@include('frontend.cardpanel',['Products' => $Recomended_Products,'product' => $product])
</div>
</div>
@endforeach
@else
@endif