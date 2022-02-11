@php			
use App\Models\Products;

$first_sku_code=DB::table('skus')->select('sku_code')
->where('product_id',$Products[0]->pid??0)
->where("cat_id",$Products[0]->cat_id??0)
->get()->first();
$str_sku = $first_sku_code->sku_code??'';
$skucode=preg_replace('~ *-.*~', '', $str_sku);
@endphp



@if(isset($Products[0]->images) && ($Products[0]->images->count()>0))







@if($Products)				
@foreach ($Products as $product)
@php
@endphp
@foreach ($product->images as $pimg)		
@if($loop->first)
<div class="show1" href="{{ URL('/public/'.Products::is_photo_exist($skucode,($loop->iteration+1),$product->product_upload_path,'large')) }}">
<img src="{{ URL('/public/'.Products::is_photo_exist($skucode,($loop->iteration+1),$product->product_upload_path,'large')) }}" id="show-img" alt="{{$product->pname??''}}" title="{{$product->pname??''}}">
</div>
@else
@endif  
@endforeach			  
@endforeach			  
@else			  
@endif
<div class="small-img">
<img src="{{ URL::to('assets/images/online_icon_right@2x.png') }}" class="icon-left"  id="prev-img">
<div class="small-container">
<div id="small-img-roll">
@if($Products)				
@foreach ($Products as $product)
@foreach ($product->images as $pimg)	

	@if(!$loop->first)
<img src="{{ URL('/public/'.Products::is_photo_exist($skucode,($loop->iteration),$product->product_upload_path,'large')) }}" class="show-small-img" alt="{{$product->pname??''}}" title="{{$product->pname??''}}">
@else			  
@endif

@endforeach			  
@endforeach			  
@else			  
@endif

@if($Products)				
@foreach ($Products as $product)
@foreach ($product->images as $pimg)	
@if($loop->last)	
<!--<img src="{{ URL('/public/'.Products::is_photo_exist($skucode,$loop->last,$product->product_upload_path,'large')) }}" class="show-small-img" alt="{{$product->pname??''}}" title="{{$product->pname??''}}">	-->
@else
@endif  		
@endforeach			  
@endforeach			  
@else			  
@endif
<!--
<a href="#" data-toggle="modal" data-target="#ProductVideoModal">
<img style="border: 1px solid rgb(149, 27, 37); padding: 2px; margin-left: 5px;" src="https://imgur.com/yMMi7hv.png" class="show-small-img img-border" alt="now">
</a>
-->
</div>
</div>
<img src="{{ URL::to('assets/images/online_icon_right@2x.png') }}" class="icon-right"  id="next-img">
</div>


@else
<div class="show1" href="{{ URL('/public/'.Products::is_photo_exist('',1,'','large')) }}">
<img src="{{ URL('/public/'.Products::is_photo_exist('',1,'','large')) }}" id="show-img" alt="" title="">
</div>
@endif




<!-- Product Video Modal -->
<div class="modal fade" id="ProductVideoModal" tabindex="-1" role="dialog" aria-labelledby="ProductVideoModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="iframe-video-wrapper">
        <iframe width="100%" height="500" src="https://www.youtube.com/embed/arvnmkXrbps" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>
