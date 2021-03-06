
@php			
use App\Models\Products;
@endphp

<section class="stats-section" style="font-size:12px!important;">
<div class="paddingleftright" >

		
		<div class="row">
		<div class="col-md-6" style="margin-left:-10px;"> 
		<div class="card" >
		<div class="card-body p-3">
		<p><strong>Order No.</strong>: # {{$orders_data->order_number??''}}<br>	   
		<strong>Order Placed On: </strong>{{ \Carbon\Carbon::parse($orders_data->from_date??'')->format('d M Y')}}<br>
		<strong>Current Status: </strong><span class="badge @if($orders_data->order_status=='cancelled' || $orders_data->order_status=='cancelled-refund-pending' || $orders_data->order_status=='cancelled-refunded') badge-danger @else badge-success @endif">{{Str::title($orders_data->order_status)??''}}</span><br>
		</p>
		</div>
		</div>
		</div>
		
		
		<div class="col-md-6">
		<div class="card" >
		<div class="card-body p-3">
	
	
	@if(auth()->user()->role==1)
			<a href="{{url('admin/orders/today?filter=orders&value='.Crypt::encryptString('all'))}}" class="btn btn-brand btn-sm"><span class="glyphicon glyphicon-chevron-left"></span> Back to orders</a>
			@else
			<a href="{{URL('myorders')}}" class="btn btn-brand btn-sm"><span class="glyphicon glyphicon-chevron-left"></span> Back to orders</a>
			@endif
			&nbsp; 
			<a target="new" href="{{ route('admin.order.invoice', ['order_number' => Crypt::encryptString($orders_data->order_number??'') ] ) }}" class="btn btn-danger btn-sm">Generate Invoice</a>
	
	
		</div>
		</div>
		</div>
		
		</div>
              
        





<div class="row">
          

          <!-- <div class="col-sm-4">
		  
            <div class="edit-form">
              <h2>Customer Info</h2>
              <p>Name: <br>
                 Email: <a href="mailto:33347"></a><br>
                 Gender: <br>
                 Age: <br>
              </p>
            </div>
          </div> -->
          
          <div class="col-sm-6 mb-1 p-1">
            <div class="card" >
                  <div class="card-body p-3">
            <div class="edit-form">
              <h4>Shipping Address</h4>
              <p> 
				{{Str::title($orders_data->ship_to_name??'')}}<br>
				<a href="mailto:{{$orders_data->ship_to_email??''}}">{{Str::title($orders_data->ship_to_email??'')}}</a><br>
				{{Str::title($orders_data->ship_to_phone??'')}}<br>
				{{Str::title($orders_data->ship_to_address??'')}}<br>
				{{Str::title($orders_data->ship_to_city??'')}} - {{Str::title($orders_data->ship_to_postalcode??'')}}<br>
				{{Str::title($orders_data->ship_to_state??'')}}, {{Str::title($orders_data->ship_to_country??'')}}
			  </p>
            </div>
          </div>
        </div>
          </div>
          
          <div class="col-sm-6 mb-1 p-1">
            <div class="card" >
                  <div class="card-body p-3">
            <div class="edit-form">
              <h4>Billing Address</h4>
             <p> 
				{{Str::title($orders_data->bill_to_name??'')}}<br>
				<a href="mailto:{{$orders_data->ship_to_email??''}}">{{Str::title($orders_data->bill_to_email??'')}}</a><br>
				{{Str::title($orders_data->bill_to_phone??'')}}<br>
				{{Str::title($orders_data->bill_to_address??'')}}<br>
				{{Str::title($orders_data->bill_to_city??'')}} - {{Str::title($orders_data->bill_to_postalcode??'')}}<br>
				{{Str::title($orders_data->bill_to_state??'')}}, {{Str::title($orders_data->bill_to_country??'')}}
			  </p>
            </div>
            </div>
            </div>            
          </div>

        </div>


        
		
		
		
		
		<div class="row">

          <div class="col-sm-6 p-1">
            <div class="card" >
                  <div class="card-body p-3">
            <div class="edit-form">
              <h4>Payment Info</h4>
              <p>
				Payment Mode: {{Str::title($orders_data->gateway_name??'')}}<br>
				Payment Status: {{Str::title($orders_data->payment_status??'')}}<br>      
				Transaction Message:<br>
				Payment ID:{{$payment_data->payment_id??""}}<br>
			  </p>
            </div>
          </div>
        </div>
          </div>
          
          <div class="col-sm-6 p-1">
            <div class="card" >
                  <div class="card-body p-3">
            <div class="edit-form">
              <h4>Order Status</h4>
             
              <p>
					Order ID: {{$orders_data->order_number??''}}<br>
					Cart ID: {{$orders_data->cart_id??''}}<br>
					Ordered On: {{ \Carbon\Carbon::parse($orders_data->from_date??'')->format('d M Y')}}<br>
					Total Amount: INR {{$orders_data->grand_total??''}}/-<br>
					No. of Items: {{$orders_data->total_items??''}} 

              </p>
             

             @if(auth()->user()->role==1)
              <p style="display:inline-block; margin-right: 5px;">Order Status: </p>
				
					<form action="{{ route('admin.order.status', ['order_number' => Crypt::encryptString($orders_data->order_number??'') ] ) }}" method="post" accept-charset="utf-8" style="display: inline-block">  
					@csrf
					<select name="orderStatus" required="">                 
					<option value="placed" @if($orders_data->order_status=='placed') selected @else @endif>Placed</option>                 
					<option value="processing" @if($orders_data->order_status=='processing') selected @else @endif>Processing</option>                   
					<option value="dispatched" @if($orders_data->order_status=='dispatched') selected @else @endif>Dispatched</option>                 
					<option value="hold" @if($orders_data->order_status=='hold') selected @else @endif>On Hold</option>
					<option value="cancelled" @if($orders_data->order_status=='cancelled') selected @else @endif>Cancelled</option>                 
					<option value="delivered" @if($orders_data->order_status=='delivered') selected @else @endif>Delivered</option>                 
					<option value="cancelled-refund-pending" @if($orders_data->order_status=='cancelled-refund-pending') selected @else @endif>Cancelled - Refund Pending</option>                 
					<option value="cancelled-refunded" @if($orders_data->order_status=='cancelled-refunded') selected @else @endif>Cencelled - Refunded</option>
					</select>
					<button type="submit" class="btn btn-danger btn-sm" style="padding: 0 5px;font-size: 12px;">Update</button>            
					</form>

              <p></p>

              @endif

            
              <!--
              <p style="display:inline-block; margin-right: 5px;">Tracking Number: 
                </p><form action="https://www.taruni.in/manage/orders/tracking_num_update/12350" method="post" accept-charset="utf-8" style="display: inline-block" _lpchecked="1">                  <input type="text" name="tracking_number" id="tracking_number" style="display inline-block;">
                  <button type="submit" class="" style="padding: 0 5px;font-size: 12px;">Update</button>
                </form>
				-->
           

  


              <br>
              <!--<p><a href="https://www.taruni.in/manage/orders/print_invoice/12350" class="btn btn-xs btn-warning">Generate Invoice</a></p>-->
            </div>  
            </div>
            </div>          
          </div>
          
        </div>
		
		
        
        <div class="row" style="font-size:12px!important;">
            <div class="col-sm-12">
                <h4>Order Items</h4>
                <div class="card" >
                  <div class="card-body p-2">
                <div class="table-responsive">
                    <table class="table" style="font-size:12px!important;">
                        <thead>
                            <tr>
                                <th class="text-align-center" width="50px">S.No.</th>
                                <th width="30px"></th>
                                <th >Product Details</th>
                                <th width="100px"></th>
                                <th  class="text-align-right">Unit Price</th>
                                <th width="100px"></th>
                                <th  width="100px"  class="text-align-right">Qty</th>
                                <th  class="text-align-right">Net Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order_items as $item)
                            <tr>
                                <td class="text-align-right">{{$loop->iteration??''}}</td>
                                <td><img src="{{ URL('/public/'.Products::is_photo_exist($item->pcode,1,$item->product_upload_path??'','thumbnails')) }}" width="70px"></td>
                                <td>{{Str::ucfirst($item->pname??'')}}<br> SKU Code: {{$item->sku_code??''}} | Size: {{strtoupper($item->item_size)??''}}</td>
                                <td></td>
                                <td class="product-price" align="right">
                  {{$item->unit_price??''}}.00                                  
                </td>
                                <td></td>
                                <td class="text-align-right" width="100px">{{$item->qty??''}}</td>
                                <td class="text-align-right">{{$item->price??''}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tr>
                            
                            <td colspan="6" style="text-align:right;"><strong>Total</strong></td>
                            
                            <td class="total-num">{{$order_items->sum('qty')}} items</td>
                            
                            <td class="total-sum" style="text-align: right"><strong>INR {{$order_items->sum('price')}}.00</strong></td>
                            
                          </tr>


                          
                          
                          <tr>
                            
                            <td colspan="6" style="text-align:right;"><strong>Total Weight</strong></td>
                            <td class="toal-num">1.5 KG(s)</td>
                            
                            <td class="total-sum" style="text-align: right"></td>
                            
                          </tr>
                          <tr>
                            
                            <td colspan="6" style="text-align:right;"><strong>Total Shipping Cost for Hyder</strong></td>
                            <td class="toal-num"></td>
                            
                            <td class="total-sum" style="text-align: right"><strong>INR 0.00</strong></td>
                            
                          </tr>
                          
                          
                          
                          
                          
                          
                          
                          <tr>
                            
                            <td colspan="6" style="text-align:right;"><strong>Tax for Hyder</strong></td>
                            <td class="toal-num">0 %</td>
                            
                            <td class="total-sum" style="text-align: right"><strong>INR 0.00</strong></td>
                            
                          </tr>
                        </tbody>
                        <tfoot>
                          
                          <tr>
                            
                            <td colspan="6" style="text-align:right;"><strong>Grand Total</strong></td>
                            <td class="toal-num"></td>
                            <td class="total-sum" style="text-align: right">INR {{$order_items->sum('price')}}</td>
                            
                          </tr>
                          
                        </tfoot>
                        
                    </table>
                </div>
            </div>
                </div>
                <!-- ./responsive-table -->
            </div>
        </div>
                                
            </div> <!-- ./account-details-area -->
			
			</section>
			
