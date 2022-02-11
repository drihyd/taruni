@php
use App\Models\Cart;
use App\Models\Cart_details;
if(Auth::Guest() || Auth::user()){		
$Cart_total_sum=Cart::select('total_amount','discount_coupon','grand_total','total_shipping_fee')->where('id',session()->get('cart'))->first();
$Cart_details_count=Cart_details::select('*')->where('cart_id',session()->get('cart'))->count();
$used_coupons=DB::table('used_coupons')
			->where('cart_id', session()->get('cart'))
			->first();
}
@endphp

 <div id="price-area" class="table-responsive cart-container">
                        <table class="table cart-table price-table">
                        <thead>
                        <tr>
                        <th>Price Details </th>
                        <th class="text-right">{{session()->get('appcurrency')}} </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <td class="heading">Cart Total ( {{$Cart_details_count}} Items)</td>
                        <td class="info">{{ $Cart_total_sum->total_amount??0 }}</td>
                        </tr>                        
                        <tr>
							 <td class="heading" colspan=2>
								<form id="coupon_form" action="{{route('apply.coupon')}}" method="post" style="display:unset;">
										@csrf																				
										<input name="coupon_code" id="coupon_code" type="text" class="form-control input-sm mb-3" placeholder="Enter Coupon code" value="">
										<br>
										<button  style="font-size: 10px;" class="btn btn-danger btn-sm" type="submit" style="padding: 0.10rem 0.2rem;" title="Apply coupon" alt="Apply coupon">Apply</button> 						
								</form>													
							</td>                    
                        </tr>
                        <!--<tr style="padding:0;margin:0;">-->
                        <!--<td colspan="2" style="padding:0;margin:0;">-->
                        <!--<form id="coupon_form" method="post">-->
                        <!--<div class="collapse" id="collapseCoupon">-->
                        <!--<div class="couponToggle">-->
                        <!--<div class="input-group">													-->
                        <!--<input name="coupon_code" type="text" class="form-control input-sm" placeholder="Enter your code..">-->
                        <!--<span class="input-group-btn">-->
                        <!--<button class="btn btn-sm" type="submit">Apply</button>-->
                        <!--</span>													-->
                        <!--</div>	-->
                        <!--</div>	-->
                        <!--</div>-->
                        <!--</form>	-->
                        <!--</td>	-->
                        <!--</tr>-->
						
						@php
						$total_shipping_fee=$Cart_total_sum->total_shipping_fee??'';
						$discount_coupon=$Cart_total_sum->discount_coupon??'';
						@endphp
						@if($total_shipping_fee)
                        <tr>
                        <td class="heading">Shipping Charges</td>
                        <td class="info" align="right">{{$Cart_total_sum->total_shipping_fee??''}}</td>
                        </tr>
						@else
						@endif
                       
						@if($discount_coupon)
						<tr>
                        <td class="heading">Discount on <strong><i>{{$used_coupons->coupon_code??''}}</i></strong> coupon</td>
                        <td class="info">{{$Cart_total_sum->discount_coupon}}/-
						
						&nbsp;&nbsp;<form id="coupon_form" action="{{route('apply.coupon.remove')}}" method="post" style="display:unset;">
									@csrf 
									<button  class="btn btn-danger btn-sm " type="submit" style="padding: 0.10rem 0.2rem;" title="Remove coupon" alt="Remove coupon"> <i class="fas fa-trash float-right" style="font-size: 10px;"></i></button>                                
									</form>
						</td>
                        </tr>	
					
						@endif
                        </tbody>
						<tfoot>
                        <tr>
                        <td class="heading">Grand Total</td>
                        <td class="info" align="right">{{$Cart_total_sum->grand_total??0}}</td>                        
                        </tr>
                        </tfoot>
                        </table>						
                        <p class="note text-center mt-3 mb-0">Need Help? <a href="{{ URL('/help')}}">Contact Us</a></p>
</div>