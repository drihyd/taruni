<div class="card" >
                  <div class="card-body p-3">
            <div class="edit-form">
              @if($orders_data->order_status=='dispatched')
              <h4>Shipping By</h4>
              <p>
				Shipped By: {{Str::title($order_status->shipped_by??'')}}<br>
				Shipping Traking No: {{Str::title($order_status->shipped_traking_no??'')}}<br>
				Shipping Date:{{ \Carbon\Carbon::parse($order_status->shipping_to_date??'')->format('d M Y')}}<br>
			  </p>
        @else

        @endif
            </div>
          </div>
        </div>