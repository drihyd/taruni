@php			
use App\Models\Cart;
$Cart_Shipping_info = Cart::select('*')->where('id',session()->get('cart'))->where("carts.order_status",'=','hold')->latest()->first();
@endphp

<div id="price-area" class="table-responsive cart-container">
<table class="table cart-table price-table">
<thead>
<tr>
<th colspan="2">Shipping To </th>
</tr>
</thead>
</table> 
<p style="font-size: 12px;font-weight: 400; color: #6f6f72;">

{{$Cart_Shipping_info->ship_to_name??''}}<br>
{{$Cart_Shipping_info->ship_to_address??''}}<br>
{{$Cart_Shipping_info->ship_to_city??''}} - {{$Cart_Shipping_info->ship_to_state??''}}<br>
{{$Cart_Shipping_info->ship_to_country??''}} <br>
Pincode-{{$Cart_Shipping_info->ship_to_postalcode??''}}
<br>Phone: {{$Cart_Shipping_info->ship_to_phone??''}}
<br>Email: {{$Cart_Shipping_info->ship_to_email??''}}

</p>
 </div> 
