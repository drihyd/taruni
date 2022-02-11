@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
			<section class="stats-section">
            <div class="paddingleftright custom-tabs ">
                <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <!-- <a class="nav-item nav-link active" id="nav-recent-tab" data-toggle="tab" href="#nav-recent" role="tab" aria-controls="nav-recent" aria-selected="true">Today's Orders</a>
                  <a class="nav-item nav-link" id="nav-todays-tab" data-toggle="tab" href="#nav-todays" role="tab" aria-controls="nav-todays" aria-selected="false">Recent Orders</a>
                  <a class="nav-item nav-link" id="nav-monthly-tab" data-toggle="tab" href="#nav-monthly" role="tab" aria-controls="nav-monthly" aria-selected="false">Monthly</a> -->

                  <a href="{{url('finance/payments/today?filter='.$filter_type.'&value='.Crypt::encryptString($filter_value))}}" class="nav-item nav-link {{ (request()->is('finance/payments/today?filter='.$filter_type.'&value='.Crypt::encryptString($filter_value))) ? 'active' : '' }}">Today's {{$pageTitle??''}}</a>
                  <a href="{{url('finance/payments/recent?filter='.$filter_type.'&value='.Crypt::encryptString($filter_value))}}" class="nav-item nav-link {{ (request()->is('finance/payments/recent?filter='.$filter_type.'&value='.Crypt::encryptString($filter_value))) ? 'active' : '' }}">Recent {{$pageTitle??''}}</a>
                  <a href="{{url('finance/payments/monthly?filter='.$filter_type.'&value='.Crypt::encryptString($filter_value))}}" class="nav-item nav-link {{ (request()->is('finance/payments/monthly?filter='.$filter_type.'&value='.Crypt::encryptString($filter_value))) ? 'active' : '' }}">Monthly {{$pageTitle??''}}</a>

                </div>
              </nav>
            </div> 
				<div class="tab-content paddingleftright pt-5 pb-5" id="nav-tabContent">
				<div class="tab-pane fade show active" id="nav-recent" role="tabpanel" aria-labelledby="nav-recent-tab">
				@if(request()->is('finance/payments/monthly'))
				<form class="form-inline">
				<div class="form-group mb-2">
				<label for="from_date" >From Date</label>
				<input type="date" class="form-control mx-sm-3" id="from_date"  name="from_date" value="{{Carbon\Carbon::now()->format('Y-m-01')}}">
				</div>
				<div class="form-group mx-sm-3 mb-2">
				<label for="to_date" >To Date</label>
				<input type="date" class="form-control mx-sm-3" id="to_date"  name="to_date" value="{{Carbon\Carbon::now()->format('Y-m-t')}}">
				</div>
				
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
				
				<button type="button" class="btn btn-brand mb-2" id="monthly">Go</button>
				</form>
				@else

				@endif
                <table  class="table  payments-data-table table-hover table-bordered" style="width:100%">
                  <thead>
                      <tr>
					  <th>S.No.</th>
					  <th>Order No.</th>
                        <th>Raz.Order ID</th>                       
                        <th>Payment ID</th>                       
                        <th>Entity</th>                                             
                        <th>Email</th>
						<th>Phone</th>
						<th>Currency</th>
						<th style="text-align:right!important;">Order Amount</th>
						<th style="text-align:right!important;">Paid Amount</th>
                        <th>Payment Method</th>
                        <th>Payment Status</th> 
						<th>Payment Date</th>						
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
	
	
		</tr>
	</tfoot>
              </table>
              </div>
            </div>
			</section>
@endsection

@push('scripts')

<script type="text/javascript">
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
          url: "{{ route('finance.payments') }}",
          data: function (data) {
            
			
		
	
		
		if(from_date==""){
			from_date={{Carbon\Carbon::now()->format('Y-m-d')}};
		}
		else{
			var from_date = $('#from_date').val();
		}
		
		
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
		 {
			 "title": "Serial",
      "render": function(data, type, full, meta) {
        return i++;
      }
    },
			{data: 'order_number', name: 'order_number', orderable: true, searchable: true},
            {data: 'order_id', name: 'order_id', orderable: true, searchable: true},           
            {data: 'payment_id', name: 'payment_id', orderable: true, searchable: true},           
            {data: 'entity', name: 'entity', orderable: true, searchable: true},                      
            {data: 'email', name: 'email',searchable: true},
            {data: 'phone', name: 'email',searchable: true},
            {data: 'currency', name: 'currency',searchable: true},
            {data: 'order_amount', name: 'currency',searchable: true},
            {data: 'paid_amount', name: 'currency',searchable: true},
            {data: 'method', name: 'method',searchable: false},
            {data: 'status', name: 'status',searchable: false},
			 {data: 'payment_date', name: 'payment_date' ,orderable: true, searchable: true},
        ]
    });
     
	 
	 
	 $('#monthly').click(function(){
     table.draw();
  });
	 
	 


    
  });
</script>

@endpush