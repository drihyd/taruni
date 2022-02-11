@php			
use App\Models\Products;
$first_sku_code=DB::table('skus')->select('sku_code')
->where('product_id',$product->pid??0)
->where("cat_id",$product->cat_id??0)
->get()->first();
$str_sku = $first_sku_code->sku_code??'';
$skucode=preg_replace('~ *-.*~', '', $str_sku);
@endphp


@if($Products)	

	
@foreach($product->firstsize as $key=>$pimg)
@if($loop->first)
<a href="{{ROUTE('product.sku.prices',['slug'=>$product->slug,'size'=>$pimg])}}" alt="{{Str::ucfirst($product->name)}}" title="{{Str::ucfirst($product->name)}}">
@else
@endif
@endforeach	
@else
@endif
<div class="text-center product-img product-bg-img" style="background: url({{ URL('/public/'.Products::is_photo_exist($skucode,1,$product->product_upload_path,'large')) }}) center center no-repeat;">

<div class="sizes-available-bar">
<p><span class="title">Sizes available: </span>
@if($Products)				
@foreach ($product->sizes as $pimg)
{{Str::upper(str_replace('_', '-',trim($pimg->variant_value)))}} 
@endforeach	
@else
@endif
</p>
</div>
</div>
<p class="text-black mt-3">


@if(isset($product->psaleprice))
	<span class="old-sale-price"><b>{{session()->get('appcurrency')}} {{$product->pprice}}</b></span>
<span class="new-sale-price"><b>{{session()->get('appcurrency')}} {{$product->psaleprice}}</b></span>
<span class="card-product-code float-right small">{{$skucode??''}}</span>

@else

<span class="new-sale-price"><b>{{session()->get('appcurrency')}} {{$product->pprice}}</b></span>
<span class="card-product-code float-right small">{{$skucode??''}}</span>
@endif

</p>
<p class="small">{{Str::ucfirst($product->name)}} </p>
</a>
<div class="cartwish-select">
@if($Products)				
@foreach ($product->firstsize as $key=>$pimg)
@if($loop->first)
<a href="{{ROUTE('product.sku.prices',['slug'=>$product->slug,'size'=>$pimg])}}"><i class="fas fa-shopping-cart float-left"></i></a>
@else
@endif
@endforeach	
@else
@endif
<a href="{{ route('wishlist.store', Crypt::encryptString($product->id))}}"><i class="fas fa-heart float-right"></i></a>
</div> 