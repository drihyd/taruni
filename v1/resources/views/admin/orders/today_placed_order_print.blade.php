
@extends('frontend.template_v1')
@section('title', "Order Print")
@section('content')




@foreach($orders_data as $order)



<style>
		body {
			padding:0;
			max-width: 1000px;
			margin: 0 auto;			
			color: #333;
			
		}
		
		table, table.table {
			margin: 15px 0;
		}
		
		
		
		.table.half-tds td, .table.half-tds th {
			width: 50%;
		}
		
	
		
		.table>tbody+tbody {
			//border: none;
		}
		
		.align-right {
			text-align: right;
		}
		
		.table>thead>tr>th,
		.table>tbody>tr>th,
		.table>tfoot>tr>th,
		.table>thead>tr>td,
		.table>tbody>tr>td,
		.table>tfoot>tr>td {
			padding: 0px;
		}
		
		th.right-algn {
			text-align: right;
		}
		
		td.heading, th.heading {
			font-weight: bold;
		}
		
		.bold {
			font-weight: bold;
		}
		
		article {
			page-break-after: always;
			padding-top: 60px;
			padding-bottom: 60px;
			border-bottom: 1px dashed #000;
		}
		
		.logo {
			margin: 15px 0 30px;
		}
		
		hr {
			margin: 9px 0;
			display: none;
		}
		
		h2.heading {
			
			font-weight: bold;
			margin: 0;
		}
		
	table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px!important;
}
		
	</style>
	
	<article>
		<img src="https://imgur.com/FhYBPkk.png" width="200" class="logo">		
		<table class="table half-tds" style="font-size:14px!important;">
			
			<thead>
				<tr>
					<th>
						<strong>Order ID: </strong> {{$order->order_number??''}}
					</th>
					<th class="right-align">
						<strong>Placed On: </strong>{{\Carbon\Carbon::parse($order->created_at??'')->format('d-m-Y') }}
					</th>
				</tr>
			</thead>
		
		</table>
		<hr>
		<table class="table half-tds" style="font-size:14px!important;">
						
			<tbody>
				
		
				
				<tr>
					<td class="heading">Total Amount</td>
					<td>{{$order->currency??''}} {{$order->grand_total??''}}</td>
				</tr>
				
				<tr>
					<td class="heading">Payment Status</td>
					<td>{{ucfirst(trans($order->payment_status??''))}}</td>
				</tr>


				<tr>
					<td class="heading">Payment Mode</td>
					<td>{{ucfirst(trans($order->payment_mode??''))}}</td>
				</tr>

			
			</tbody>
		
		</table>
		<hr>
		
		<table class="table half-tds" style="font-size:14px!important;" >
			<thead>
				<tr>
					<th class="heading">Shipping Address</th>
					<th class="heading">Billing Address</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{ucfirst(trans($order->ship_to_name??''))}}</td>
					<td>{{ucfirst(trans($order->bill_to_name??''))}}</td>
				</tr>
				<tr>
					<td>
						{{$order->ship_to_email??''}}<br>
						{{$order->ship_to_phone??''}}<br>

					</td>
					<td>
					{{$order->bill_to_email??''}}
					<br>
					{{$order->bill_to_phone??''}}</td>
				</tr>
				<tr>
					<td>{{$order->bill_to_address??''}}</td>
					<td>{{$order->ship_to_address??''}}</td>
				</tr>
				<tr>
					<td>{{$order->ship_to_city??''}},{{$order->ship_to_state??''}}, {{$order->ship_to_country??''}}</td>
					<td>{{$order->bill_to_city??''}},{{$order->bill_to_state??''}}, {{$order->bill_to_country??''}}</td>
				</tr>
				<tr>
					<td>{{$order->ship_to_postalcode??''}}</td>
					<td>{{$order->bill_to_postalcode??''}}</td>
				</tr>
			</tbody>
		</table>
		<hr>
		
		
		
		
		
		
		
		
		
		<table class="table" style="font-size:14px!important;">
				<tr>
					<th class="heading" valign="top">S. No.</th>
					<th class="heading">Product</th>
					<th class="heading align-right">Price ({{$order->currency??''}})</th>
			
			@if($order->currency=="USD")
				<th class="heading align-right">Price (INR)</th>
			@else				
			@endif
					<th class="heading align-right">Qty.</th>
					<th class="heading align-right">Net Price ({{$order->currency??''}})</th>
				</tr>
			</thead>
			
			<tbody>
			
			



@foreach($order_items as $skuitem) 

				<tr>
					<td style="vertical-align: middle;">{{$loop->iteration}} </td>
					<td>
						SKU Code: {{$skuitem->sku_code}}<br>
						<strong>{{ucfirst(trans($skuitem->pdesc))}}</strong><br>
						Size: <strong>{{$skuitem->item_size}}</strong> | 
						{{$skuitem->currency}} <strong>{{$skuitem->unit_price}}</strong>
						
<span style="border-top:1px solid #000;display:block;margin-bottom:0px;padding-bottom:0px;">
Attach Sleeves:
<h4 style="margin-bottom:0px;padding-bottom:0px;">{{$skuitem->sleeve_json??''}}</h4>
</span>	
<span style="margin-top:0px;padding-top:0px;">						 
Alterations:
<h4 style="margin-top:0px;padding-top:0px;">{{$skuitem->alterations??''}}</h4>
</span>
						
					</td>
					<td align="right">
						{{$skuitem->unit_price}}
					</td>

	@if($order->currency=="USD")
				<td align="right">{{$skuitem->price*73.81*1}}</td>
			@else				
			@endif
					<td align="right">{{$skuitem->qty}}</td>
					<td align="right">{{$skuitem->price}}</td>
			
				</tr>





			
@endforeach
				
		
				<tr>
					<td colspan="3" align="right"> <strong>Total Items</strong></td>
				@if($order->currency=="USD")
				<td></td>
				@else				
				@endif
		
					<td align="right">{{$order->total_items??''}}</td>					
					<td align="right"><strong>{{$order->currency??''}} {{$order->total_amount??''}}</strong></td>
					
				</tr>
	
				

			
<tr align="right">
<td colspan="3"><strong>Discount</strong></td>	
	
				@if($order->currency=="USD")
				<td><strong>{{$order->discount_coupon*73.81*1}}</strong></td>
				@else				
				@endif
			<td></td>
<td align="right"><strong>{{$order->currency??''}} {{$order->discount_coupon??0}}</strong></td>
</tr>


<tr align="right">
<td colspan="3"><strong>Shipping Charges</strong></td>	
@if($order->currency=="USD")
				<td><strong>{{$order->total_shipping_fee*73.81*1}}</strong></td>
				@else				
				@endif
<td></td>					
<td align="right"><strong>{{$order->currency??''}} {{$order->total_shipping_fee??0}}</strong></td>
</tr>

				
				<tr align="right">
					<td colspan="3"><strong>Grand Total</strong></td>					
								@if($order->currency=="USD")
				<td><strong>{{$order->grand_total*73.81*1}}</strong></td>
				@else				
				@endif

				<td></td>
					<td align="right"><strong>{{$order->currency??''}} {{$order->grand_total??''}}</strong></td>
				</tr>

			</tbody>
			
			
			
			
		</table>
		
		

		
		    <div class="row hidden-print">
         <div class="col-sm-12">
            <button id="printInv"  onClick="window.print();" class="btn btn-danger btn-sm">Print Order</button> &nbsp; 
         </div>			
        </div>
	</article>

@endforeach
@endsection

@push('scripts')

 @endpush