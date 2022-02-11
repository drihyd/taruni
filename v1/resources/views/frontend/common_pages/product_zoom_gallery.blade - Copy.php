@php			
use App\Models\Products;
@endphp


@if($Products)				
@foreach ($Products as $product)
@foreach ($product->images as $pimg)		
@if($loop->first)
<div class="show1" href="{{env('BASE_URL').$product->pcode.'_'.$loop->iteration.'.jpg'}}">
<img src="{{ URL('/public/'.Products::is_photo_exist($product->pcode,$loop->iteration,$product->product_upload_path,'large')) }}" id="show-img">
</div>
@else
@endif  
@endforeach			  
@endforeach			  
@else			  
@endif
<div class="small-img">
<img src="{{ URL::to('assets/images/online_icon_right@2x.png') }}" class="icon-left" alt="" id="prev-img">
<div class="small-container">
<div id="small-img-roll">
@if($Products)				
@foreach ($Products as $product)
@foreach ($product->images as $pimg)		
<img src="{{env('BASE_URL').$product->pcode.'_'.$loop->iteration.'.jpg'}}" class="show-small-img" alt="">			
@endforeach			  
@endforeach			  
@else			  
@endif

@if($Products)				
@foreach ($Products as $product)
@foreach ($product->images as $pimg)	
@if($loop->last)	
<img src="{{env('BASE_URL').$product->pcode.'_dp.jpg'}}" class="show-small-img" alt="">	
@else
@endif  		
@endforeach			  
@endforeach			  
@else			  
@endif
</div>
</div>
<img src="{{ URL::to('assets/images/online_icon_right@2x.png') }}" class="icon-right" alt="" id="next-img">
</div>