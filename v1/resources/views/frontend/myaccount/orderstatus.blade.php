<div class="card" >
                  <div class="card-body p-3">
            <div class="edit-form">
              <h4>Order Status</h4>
             
              <p>
					<b>Order ID:</b> #{{$orders_data->order_number??''}}<br>
					Ordered On: {{ \Carbon\Carbon::parse($orders_data->from_date??'')->format('d M Y')}}<br>
					Order Status: {{$orders_data->order_status??''}}<br>
					Total Amount: {{$orders_data->currency}} {{number_format($orders_data->grand_total??'', 2, '.', ',')}}<br>
					Total Quantity: {{$orders_data->total_items??''}} 

              </p>    
              <br>
            </div>  
            </div>
            </div>