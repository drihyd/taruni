@php			
use App\Models\Products;
$checking_outstock_newprices=0;
@endphp

<div class="card">
                        <div class="card-body p-0">
                            <div class="cart-container">
                                <table class="table cart-table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">ITEMS ({{$basicCart_details->count()??0}})</th>
                                            <th>QUANTITY</th>
                                            <th></th>
                                            <th class="text-right">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
									 @foreach($basicCart_details as $item)
									 
									 
									 
									 @php									 
                                        $str_sku = $item->sku_code??'';
                                        $skucode=preg_replace('~ *-.*~', '', $str_sku);
									 @endphp
                                        <tr>
                                            <td class="product-image-td">
											<a href="{{ROUTE('product.sku.prices',['slug'=>$item->slug,'size'=>Str::upper(str_replace('_', '-',trim($item->item_size)))])}}">
                                            <img src="{{ URL('/public/'.Products::is_photo_exist($skucode,1,$item->product_upload_path,'thumbnails')) }}" alt="{{Str::ucfirst($item->pname)}}" title="{{Str::ucfirst($item->pname)}}">
                                            </a>
											</td>
                                            <td class="product-details-td" id="cart-item-1">
											<a href="{{ROUTE('product.sku.prices',['slug'=>$item->slug,'size'=>Str::upper(str_replace('_', '-',trim($item->item_size)))])}}">
                                            <h3 class="product-title">{{Str::ucfirst($item->pname)}} {{$skucode}}</h3>
											</a>
                                            <p class="detail-item">
                                            <span class="heading">Size:</span>
                                            <span class="info"> {{Str::upper(str_replace('_', '-',trim($item->item_size)))}}</span>
                                            </p>
                                            <p class="detail-item">
                                            <span class="heading">Alteration:</span>
                                            <span class="info">{{Str::ucfirst($item->alter_sleeves??'No')}}</span>
                                            </p>
                                            <div class="actions">
											
											@if($item->pstock==0)
												
											@php
											$checking_outstock_newprices=1;
											@endphp
											
											<h4 class="blink_me" style="display:inline-block;">Out of stock</h4>
												<p><small>Please remove item before check out your order.</small></p>
											@else											
											@endif	
										
										
										
@if($item->on_sale=="Yes" || $item->on_sale=="yes")	

@if($item->psaleprice!=$item->unit_price)											
<a href="{{ route('update.cartnew.prices')}}" alt="Click on button to update new prices." title="Click on button to update new prices.">
<h4 class="blink_me" style="display:inline-block;">Fetch new price/Currency Changed ({{$item->pprice}})</h4>
</a>

@php
$checking_outstock_newprices=1;
@endphp

@else											
@endif											

@else										
@if($item->pprice!=$item->unit_price)											
<a href="{{ route('update.cartnew.prices')}}" alt="Click on button to update new prices." title="Click on button to update new prices.">
<h4 class="blink_me" style="display:inline-block;">Fetch new price/Currency Changed ({{$item->pprice}})</h4>
</a>
@php
$checking_outstock_newprices=1;
@endphp

@else											
@endif


@endif
										
                @if($item->pstock!=0 && $item->pprice==$item->unit_price)
                <a href="{{ROUTE('product.sku.prices',['slug'=>$item->slug,'size'=>Str::upper(str_replace('_', '-',trim($item->item_size)))])}}" class="action-item cart-item-view-details">View Details</a>
                @else	
                <a href="{{ROUTE('product.sku.prices',['slug'=>$item->slug,'size'=>Str::upper(str_replace('_', '-',trim($item->item_size)))])}}" class="action-item cart-item-view-details">View Details</a>												
                @endif
											
                                            
											<a  href="{{ route('wishlist.store', Crypt::encryptString($item->pid))}}"><i class="fas fa-heart float-right"></i></a>
                                            <a href="{{ route('checkout.cart.remove',Crypt::encryptString($item->itemid))}}" class="align-right">
                                            <div class="action-item cart-item-remove" id="cart-item-id">Remove</div>											
                                            </a>
											
											@if($item->alter_dress=="yes")								
                                            <span class="prod-alt-link">
										
										@if(!empty($item->alterations) || !empty($item->sleeve_json)) 
										<a style="color:green;" href="#" id="editalternations" data-toggle="modal" data-target='#' data-id="{{ $item->itemid }}"><span class="symb">✂</span>Make Alterations</a>
										@else
										<a href="#" id="editalternations" data-toggle="modal" data-target='#' data-id="{{ $item->itemid }}"><span class="symb">✂</span>Make Alterations</a>	
										@endif
										</span>
											@else
											@endif
											
											
											
											
                                            </div>		
                                            </td>
                                            <td>
											
											@if($item->pstock==0)

											{{$item->itemqty}}
											@else
											<input type="number" name="quantity" value="{{$item->itemqty}}" class="form-control cartqty" min="1" max="{{$item->pstock}}" required="" onchange="update_cart({{$item->itemid}},this.value,{{$item->unit_price}},{{$item->skuid}},{{$item->shipping_weight}})">
											@endif
                                            </td>
                                            <td>
                                            
                                            </td>
                                            <td class="product-price-td">
                                            <p class="price price-shown">{{session()->get('appcurrency')}} {{$item->itemprice}}</p>
											
											
                                            </td>
                                            </tr>											
											@endforeach
                                           
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
@php
session()->put('disablecheck',$checking_outstock_newprices);				
@endphp              
                    
