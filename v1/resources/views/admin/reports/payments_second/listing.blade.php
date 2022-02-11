@extends('admin.template_v1')
@section('content')

@include('admin.pagetitle')
		<section class="pt-0 pb-0">
            <div class="paddingleftright custom-tabs ">
                <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <!-- <a class="nav-item nav-link active" id="nav-recent-tab" data-toggle="tab" href="#nav-recent" role="tab" aria-controls="nav-recent" aria-selected="true">Today's Orders</a>
                  <a class="nav-item nav-link" id="nav-todays-tab" data-toggle="tab" href="#nav-todays" role="tab" aria-controls="nav-todays" aria-selected="false">Recent Orders</a>
                  <a class="nav-item nav-link" id="nav-monthly-tab" data-toggle="tab" href="#nav-monthly" role="tab" aria-controls="nav-monthly" aria-selected="false">Monthly</a> -->

                  <a href="{{url('admin/account_report_second/today?filter='.$filter_type.'&value='.Crypt::encryptString($filter_value))}}" class="nav-item nav-link {{ (request()->segment(3) == 'today') ? 'active' : '' }}">Today's (Report 2) </a>
                  <a href="{{url('admin/account_report_second/recent?filter='.$filter_type.'&value='.Crypt::encryptString($filter_value))}}" class="nav-item nav-link {{ (request()->segment(3) == 'recent') ? 'active' : '' }}">Recent(30 days) (Report 2)</a>
                  <a href="{{url('admin/account_report_second/monthly?filter='.$filter_type.'&value='.Crypt::encryptString($filter_value))}}" class="nav-item nav-link {{ (request()->segment(3) == 'monthly') ? 'active' : '' }}">Monthly Export data (Report 2)</a>

                </div>
              </nav>
            </div> 
				<div class="tab-content paddingleftright pt-5 pb-5" id="nav-tabContent">
				<div class="tab-pane fade show active" id="nav-recent" role="tabpanel" aria-labelledby="nav-recent-tab">
				@if(request()->is('admin/account_report_second/monthly'))
					 <div class="card mb-4 border-0 data-filter-card">
                  <div class="card-body">
				<form class="form-inline">
				<div class="form-group mb-2">
				<label for="from_date" >From Date</label>
				<input type="date" class="form-control mx-sm-3" id="from_date"  name="from_date" value="{{Carbon\Carbon::now()->format('Y-m-01')}}">
				</div>
				<div class="form-group mx-sm-3 mb-2">
				<label for="to_date" >To Date</label>
				<input type="date" class="form-control mx-sm-3" id="to_date"  name="to_date" value="{{Carbon\Carbon::now()->format('Y-m-t')}}">
				</div>
				
				<!--
				<div class="form-group mx-sm-4 mb-2">
				<label for="to_date" >Status</label>
					<select class="form-control" id="payment_status"  name="payment_status">
					<option value="">--All--</option>
					<option value="captured">Success</option>
					<option value="created">Intiated</option>
					<option value="failed">Failed</option>
					</select>
				</div>
				
								<div class="form-group mx-sm-4 mb-2">
				<label for="to_date" >Currency</label>
					<select class="form-control" id="payment_currency"  name="payment_currency">
					<option value="">--All--</option>
					<option value="INR">INR</option>
					<option value="USD">USD</option>
			
					</select>
				</div>
				-->
				
				<button type="button" class="btn btn-brand mb-2" id="monthly">Go</button>
				
				  </div>
                </div>
				</form>
				<p class="text text-danger"><strong>Export data depends on the date above filter.</strong></p>
				
				
								<form class="form-inline form_export" action="{{route('admin.report.export.second')}}">
				
				<input type="submit" class="btn btn-sm btn-danger submitBtn" id="btn_form_export"  title="Export Products" alt="Export Products" value="Export Data"></input>
				
				<input type="hidden" name="fd" id="fd" />
				<input type="hidden" name="td" id="td" />
				<input type="hidden" name="cat" id="cat" value="{{Crypt::encryptString(1)}}"/>
				
				</form>
				
				@else

				@endif
				
				
				
                <br> <br>
				<table  class="table table-bordered payments-data-table" style="width:100%;font-size:12px;!important;">
                  <thead>
                      <tr>				
					    <th>Order ID</th>
                        <th>Grand Total</th>  
						<th>Bill Amount USD</th>						
						<th>Bill Amount INR</th>						
                        <th>Items</th>                       
                        <th>KG</th>
						<th>Ship Name</th>
						<th>Payment</th>
						<th>Date</th>
						<th>Ship To</th>
                        <th>Status</th>
                        <th>Tracking</th> 
						<th>Email</th>					
						<th>Phone No.</th>				
						<th>Shipping Charges</th>			
						<th>Net Amount</th>			
						<th>Action</th>			
						<th>Payment ID</th>	
						<th>Transations ID</th>						
                      </tr>
                  </thead>
                  <tbody>
                    
                      
                  </tbody>
				  
				  <tfoot align="left">
		<tr>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
	
	
		</tr>
	</tfoot>
              </table>
              </div>
            </div>
			</section>
@endsection

@push('scripts')

<script type="text/javascript">


$( "#btn_form_export" ).click(function() {
	
	var from_date=$('#from_date').val();
	$('#fd').val(from_date);
	
	var to_date=$('#to_date').val();
	$('#td').val(to_date);
 $( "#form_export" ).submit();
});

  $(function () {
    
	
	var i = 1;
    var table = $('.payments-data-table').DataTable({
		
		
		
		
"footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // converting to interger to find total
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // computing column Total of the complete result 
            var monTotal = api
                .column( 8 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
	    var tueTotal = api
                .column( 9 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
            var wedTotal = api
                .column( 3 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
	     var thuTotal = api
                .column( 4 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
				
	     var friTotal = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
			
				
            // Update footer by showing the total with the reference of the column index 
	    $( api.column( 7 ).footer() ).html('Total');
            $( api.column( 8 ).footer() ).html(monTotal);
            $( api.column( 9 ).footer() ).html(tueTotal);
            $( api.column( 3 ).footer() ).html(wedTotal);
            $( api.column( 4 ).footer() ).html(thuTotal);
            $( api.column( 5 ).footer() ).html(friTotal);
        },
		
		
		
		
		
		
		
		
		
		

      lengthMenu: [[50, 100, 150, -1], [50, 100, 150, "All"]],
    
        processing: true,
        serverSide: true,
        

         ajax: {
          url: "{{ route('admin.account.report.second') }}",
          data: function (data) {
            
			
		
	var from_date=$('#from_date').val();
		
		if(from_date==""){
			from_date={{Carbon\Carbon::now()->format('Y-m-d')}};
		}
		else{
			var from_date = $('#from_date').val();
		}
		
		var to_date=$('#to_date').val();
		if(to_date==""){
			to_date={{Carbon\Carbon::now()->format('Y-m-d')}};
		}
		else{
			var to_date = $('#to_date').val();
		}		
		
		if(payment_status==""){
			payment_status="";
		}
		else{
			var payment_status = $('#payment_status').val();
		}		
		if(payment_currency==""){
			payment_currency="";
		}
		else{
			var payment_currency = $('#payment_currency').val();
		}
		
		

		data.calender_type ="{{$type}}";
		data.searchByFromdate = from_date;
		data.searchByTodate = to_date;
		data.searchByStatus = payment_status;
		data.searchByCurrency = payment_currency;
		data.filter_type ="{{$filter_type}}";
		data.filter_value ="{{$filter_value}}";

            }
        },
        columns: [

			{data: 'order_number', name: 'order_number', orderable: true, searchable: true},
            {data: 'grand_total', name: 'grand_total', orderable: true, searchable: true},           
            {data: 'usdcurrency', name: 'usdcurrency', orderable: true, searchable: true},           
            {data: 'inrcurrency', name: 'inrcurrency', orderable: true, searchable: true},           
            {data: 'total_items', name: 'total_items', orderable: true, searchable: true},           
            {data: 'inkg', name: 'inkg', orderable: true, searchable: true},                      
            {data: 'shippername', name: 'shippername',orderable: true, searchable: true},
            {data: 'payment', name: 'payment',orderable: true, searchable: true},
            {data: 'paymentdate', name: 'paymentdate',orderable: true, searchable: true},
            {data: 'shipto', name: 'shipto',orderable: true, searchable: true},
            {data: 'status', name: 'status',orderable: true, searchable: true},
            {data: 'tracking', name: 'tracking',orderable: true, searchable: true},
            {data: 'Email', name: 'Email',orderable: true, searchable: true},
            {data: 'Phone', name: 'Phone',orderable: true, searchable: true},
			{data: 'shipping_charges', name: 'shipping_charges' ,orderable: true, searchable: true},
			{data: 'netamount', name: 'netamount' ,orderable: true, searchable: true},
			{data: 'Action', name: 'Action' ,orderable: true, searchable: true},
			{data: 'payment_id', name: 'payment_id' ,orderable: true, searchable: true},
			{data: 'razorpay_order_id', name: 'razorpay_order_id' ,orderable: true, searchable: true},

			
        ]
    });
     
	 
	 
	 $('#monthly').click(function(){
     table.draw();
  });
	 
	 


    
  });
</script>

@endpush