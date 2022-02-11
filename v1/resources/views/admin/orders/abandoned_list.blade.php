@extends('admin.template_v1')
@section('content')
@include('admin.pagetitle')
@include('admin.alerts')
@include('admin.errors')			
            <div class="paddingleftright pt-2 pb-5" >
            	
   <p >
   <h4 class="card card-body bg-warning">Please check Razorpay Order Id in the below-abandoned cart items before the move is in order.</h4>
   
   <img src="https://i.imgur.com/PaT3KIT.png" width=200/>
   </p>
   
                <table id="orders-table" class="table customdatatable" style="width:100%">
                  <thead>
                      <tr>
                      	<th>S.No.</th>             
                        <th>Shipper Info</th>
                        <th>Total Items</th>
                        <th>Total Amount</th>
                        <th>Status</th>
						<th>Cart Id</th>
						<th>Razorpay OrderId</th>
                        <th>Created Date</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  	 @foreach($abandoned_data as $abandoned)
                      <tr >
                      	<td>{{$loop->iteration??''}}</td>
                       
					<td>
					<strong>{{Str::ucfirst($abandoned->ship_to_name)??''}}</strong>
					<br>					
					{{$abandoned->ship_to_email??''}}
					<br>
					{{$abandoned->ship_to_phone??''}}	
				
					</td>
                          <td>{{$abandoned->total_items??''}}</td>                          
                          <td>{{$abandoned->grand_total??''}}</td>
                          <td>{{Str::ucfirst($abandoned->order_status??'')}}</td>
						  <td>{{$abandoned->id??''}}</td>
						  
              <td><a href="#" class="addAttr" data-toggle="modal" data-target="#exampleModalCenter" data-id="{{$abandoned->id}}" data-orderid="{{$abandoned->order_id??''}}" title="Update a New Order ID"><u class="text text-danger"><b>{{$abandoned->order_id??''}}</b></u></a></td>
              <td>{{date('d M, Y', strtotime($abandoned->updated_at??''))}}</td>
              
                          <td><a title="Move to as Order" alt="Move to as Order" target="" onclick="return confirm('Are you sure, Make this cart as an order?')" href="{{URL('/admin-move-cart-as-order/'.$abandoned->order_id)}}"><button type="button" class="btn btn-sm btn-warning">Move to as Order</button></a></td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
            </div>
            <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header alert alert-danger">
        <h4 class="modal-title " id="exampleModalCenterTitle">Update a New Order ID</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('admin/update_order_id') }}" method="POST" id="companydata">
          <input type="hidden" name="orderid" id="orderid" value="">
          <input type="hidden" name="id" id="id" value="">
          @csrf
          <div class="form-group">
            <label>Order ID</label>
            <input type="text" value="" id="order_no" name="order_no" class="form-control col-sm-6" required="required">
          </div>
          <button type="submit" class="btn btn-danger btn-sm" id="submit">Update</button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        
      </div>
      
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script>
    $('.addAttr').click(function() {
    var id = $(this).data('id');      
    var orderid = $(this).data('orderid'); 

    $('#id').val(id);  
    $('#orderid').val(orderid);
    $('#order_no').val(orderid);
    } );
 </script>
@endpush