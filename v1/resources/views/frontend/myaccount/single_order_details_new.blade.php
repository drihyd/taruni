<div id="account-details-area">
      <div class="row justify-content-between">
        <div class="col-auto">
          <h3>Order Details</h3>
          @include('frontend.myaccount.myorders_breadcrump')
      </div>
      <div class="col-auto">
          
      <a target="new" href="{{ route('admin.order.invoice', ['order_number' => Crypt::encryptString($orders_data->order_number??'') ] ) }}" class="btn btn-danger btn-sm">Print Invoice</a>
      </div>
    </div>
      <div class="row m-0 mycards">
        <div class="col-sm-6 p-1">
          <div class="card" >
                  <div class="card-body p-3">
            <div class="edit-form">
              <h4>Order Status</h4>
             
              <p>
          <b>Order ID:</b> #{{$orders_data->order_number??''}}<br>
          Ordered On: {{ \Carbon\Carbon::parse($orders_data->from_date??'')->format('d M Y')}}<br>
          Order Status: <span class="badge @if($orders_data->order_status=='cancelled' || $orders_data->order_status=='cancelled-refund-pending' || $orders_data->order_status=='cancelled-refunded') badge-danger @else badge-success @endif">{{ucwords($orders_data->order_status??'')}}</span><br>
          Total Amount: {{$orders_data->currency??''}} {{number_format($orders_data->grand_total??'', 2, '.', ',')}}<br>
          Total Quantity: {{$orders_data->total_items??''}} 

              </p>    
              <br>
            </div>  
            </div>
            </div>
        </div>
        <div class="col-sm-6 p-1">
          @include('frontend.myaccount.paymentstatus')
        </div>
        <div class="col-sm-6 p-1">
          @include('frontend.myaccount.shippingdetails')
        </div>
        <div class="col-sm-6 p-1">
          @include('frontend.myaccount.billingdetails')
        </div> 
      </div>
      @include('frontend.myaccount.ordersitems_table')
    </div>