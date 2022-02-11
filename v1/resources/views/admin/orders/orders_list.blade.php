@extends('admin.template_v1')
@section('content')

@include('admin.pagetitle')
			<section class="pt-0 pb-0">
			
			
            <div class="paddingleftright custom-tabs ">
			
			
			<div class="row">
			<div class="col-md-12">			
			<h6 class='text text-danger'>Please use following <span class='text text-info'>Order Id: order_XXXXXXXXXX</span> for verification in razorpay/paypal accounts dashboard.</h6>
			</div>
			</div>
			
                <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                

                  <a href="{{url(\GetRolecode::_getRolecode(Auth::user()->role??'').'/orders/today?filter='.$filter_type.'&value='.Crypt::encryptString($filter_value))}}" class="nav-item nav-link {{ (request()->segment(3) == 'today') ? 'active' : '' }}">Today's {{$pageTitle??''}} </a>
                  <a href="{{url(\GetRolecode::_getRolecode(Auth::user()->role??'').'/orders/recent?filter='.$filter_type.'&value='.Crypt::encryptString($filter_value))}}" class="nav-item nav-link {{ (request()->segment(3) == 'recent') ? 'active' : '' }}">Recent(30 days) {{$pageTitle??''}}</a>
                  <a href="{{url(\GetRolecode::_getRolecode(Auth::user()->role??'').'/orders/monthly?filter='.$filter_type.'&value='.Crypt::encryptString($filter_value))}}" class="nav-item nav-link {{ (request()->segment(3) == 'monthly') ? 'active' : '' }}">Monthly {{$pageTitle??''}}(Month wise)</a>

                </div>
              </nav>
            </div> 
            <div class="tab-content paddingleftright pt-5 pb-5" id="nav-tabContent">
              <div class="tab-pane fade show active" id="nav-recent" role="tabpanel" aria-labelledby="nav-recent-tab">
               
                <div class="card mb-4 border-0 data-filter-card">
                  <div class="card-body">
                    <form class="form-inline mb-0">
					
						@if(request()->is(\GetRolecode::_getRolecode(Auth::user()->role??'').'/orders/monthly'))
						<div class="form-group mb-2">
						<label for="from_date" >From Date</label>
						<input type="date" class="form-control form-control-sm mx-sm-3" id="from_date"  name="from_date" value="{{Carbon\Carbon::now()->format('Y-m-01')}}">
						</div>

						<div class="form-group mx-sm-3 mb-2">
						<label for="to_date" >To Date</label>
						<input type="date" class="form-control form-control-sm mx-sm-3" id="to_date"  name="to_date" value="{{Carbon\Carbon::now()->format('Y-m-t')}}">
						</div>
						@else

						@endif

					<div class="form-group mx-sm-3 mb-2">
                      <label for="to_date" >Search by value(Email,Phone,Name and Order Number)</label>
                      <input type="text" class="form-control form-control-sm mx-sm-3" id="serchbystring"  name="serchbystring" value="">
                    </div>
					
                    <button type="button" class="btn btn-brand mb-2" id="monthly">Go</button>
					&nbsp;&nbsp;
					<a href="{{url()->full()}}" id="reset1" name="reset1"><u>Reset</u></a>
                  </form>
                  </div>
                </div>
  
              <div class="table-responsive">
                <table  class="table table-bordered orders-data-table" style="width:100%;font-size:13px;!important;">
                  <thead>
                      <tr>
                        <th>Order No.</th>
                        <th>Order Date</th>
                        <th >Ship To</th>
                        <th>Customer</th>
                        <th>Products</th>                 
                        <th>Payments</th>						
                        <th>Tracking Number</th>
                        <th >Status</th>
                        <th >Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    
                      
                  </tbody>
              </table>
            </div>
              </div>
            </div>
			</section>
@endsection

@push('scripts')

<script type="text/javascript">
  $(function () {
    
    var table = $('.orders-data-table').DataTable({
      lengthMenu: [[50, 100, 150, -1], [50, 100, 150, "All"]],
    
        processing: true,
        serverSide: true,
		searching: false,
        

         ajax: {
          url: "{{ route(\GetRolecode::_getRolecode(Auth::user()->role??'').'.orders') }}",
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
		
		var serchbystring = $('#serchbystring').val();

		data.calender_type ="{{$type}}";
		data.searchByFromdate = from_date;
		data.searchByTodate = to_date;
		data.serchbystring = serchbystring;

    data.filter_type ="{{$filter_type}}";
    data.filter_value ="{{$filter_value}}";

            }
        },
        columns: [
            {data: 'order_no', name: 'order_no', orderable: true, searchable: true},
            {data: 'order_date', name: 'order_date' ,orderable: true, searchable: true},
            {data: 'ship_to_country', name: 'ship_to_country',searchable: true},
            {data: 'ship_to_details', name: 'ship_to_details',searchable: false},
            {data: 'total_items', name: 'total_items',searchable: false},      
            {data: 'payments', name: 'payments',searchable: false},            
            {data: 'tracking_number', name: 'tracking_number',searchable: false},
            {data: 'status', name: 'status',searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
     
	 
	 
	 $('#monthly').click(function(){
     table.draw();
  });
	 
	 


    
  });
</script>

@endpush