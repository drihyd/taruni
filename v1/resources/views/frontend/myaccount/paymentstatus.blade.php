<div class="card" >
                  <div class="card-body p-3">
            <div class="edit-form">
              <h4>Payment Info</h4>
              <p>
				Payment Mode: {{Str::title($orders_data->gateway_name??'')}}<br>
				Payment Status: {{Str::title($orders_data->payment_status??'')}}<br>
				Payment ID: {{$payment_data->payment_id??""}}<br>
				Razorpay Order ID: <span class="text text-info">{{$orders_data->order_id??""}}</span><br>
			  </p>
        @if($orders_data->order_status=='dispatched')
              <h4>Shipping By</h4>
              <p>
        Shipped By: {{Str::title($order_status->shipped_by??'')}}<br>
        Shipping Traking No: {{Str::title($order_status->shipped_traking_no??'')}}<br>
        Shipping Date:{{ \Carbon\Carbon::parse($order_status->shipping_to_date??'')->format('d M Y')}}<br>
        </p>
        @elseif($orders_data->order_status=='cancelled')
          <h4>Cancellation Remarks</h4>
              <p>
        Remarks: {{Str::title($order_status->remarks??'')}}<br>
        Cancellation Date:{{ \Carbon\Carbon::parse($order_status->cancelled_date??'')->format('d M Y')}}<br>
        </p>
        @else

        @endif
            </div>
          </div>
        </div>