@extends('admin.template_v1')
@section('content')
<div class="paddingleftright pt-2 pb-5" >
<div id="account-details-area">
      <div class="row justify-content-between">
        <div class="col-auto">
          <h3>Order Details</h3>
          @if(auth()->user()->role==0)
          <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('./')}}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{url('myorders')}}">My Orders</a></li>
    <li class="breadcrumb-item active" aria-current="page">Order Details</li>
  </ol>
</nav>
@else

@endif
      </div>
      <div class="col-auto">
      <a href="{{url(\GetRolecode::_getRolecode(Auth::user()->role??'').'/orders/today?filter=orders&value='.Crypt::encryptString('all'))}}" class="btn btn-brand btn-sm"><span class="glyphicon glyphicon-chevron-left"></span> Back to orders</a>
      <a target="new" href="{{ route(\GetRolecode::_getRolecode(Auth::user()->role??'').'.order.invoice', ['order_number' => Crypt::encryptString($orders_data->order_number??'') ] ) }}" class="btn btn-danger btn-sm">Generate Invoice</a>
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
          Total Amount: {{$orders_data->currency}} {{number_format($orders_data->grand_total??'', 2, '.', ',')}}<br>
          Total Quantity: {{$orders_data->total_items??''}} 
            @include('admin.orders.order_status')
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
</div> 
@endsection

@push('scripts')

<script type="text/javascript">
	$(document).ready(function(){
      $("#dvPassport").hide();
          $("#dvcancelled").hide();
        $("#ddlPassport").on("load",function () {
          
            if ($(this).val() == "dispatched") {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
            }
            if ($(this).val() == "cancelled") {
                $("#dvcancelled").show();
            } else {
                $("#dvcancelled").hide();
            }
      
        });
        $( "#ddlPassport" ).on( "change", function() { 

  
       $( "#ddlPassport" ).attr(':checked');
        if($("option[value='dispatched']").is(":checked")){
          $("#dvPassport").show();
          $("#dvPassport").find('.form-control').attr('required', 'required');
        } else {
            $("#dvPassport").hide();
          $("#dvPassport").find('.form-control').removeAttr('required', 'required');
            
        }
        if($("option[value='cancelled']").is(":checked")){
          $("#dvcancelled").show();
          $("#dvcancelled").find('.form-control').attr('required', 'required');
        } else {
            $("#dvcancelled").hide();
          $("#dvcancelled").find('.form-control').removeAttr('required', 'required');

        }
    });

    });
</script>

@endpush