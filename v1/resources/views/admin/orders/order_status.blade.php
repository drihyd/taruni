
@include('admin.errors')
					<form action="{{ route(\GetRolecode::_getRolecode(Auth::user()->role??'').'.order.status', ['order_number' => Crypt::encryptString($orders_data->order_number??'') ] ) }}" method="post" accept-charset="utf-8" style="display: inline-block">  
					@csrf
					<label for="ddlPassport">Order Status</label>
					<select name="orderStatus" required="" id="ddlPassport">                 
					<option value="placed" @if($orders_data->order_status=='placed') selected @else @endif>Placed</option>                 
					<option value="processing" @if($orders_data->order_status=='processing') selected @else @endif>Processing</option>                   
					<option value="dispatched" @if($orders_data->order_status=='dispatched') selected @else @endif>Dispatched</option>                 
					<option value="hold" @if($orders_data->order_status=='hold') selected @else @endif>On Hold</option>
					<option value="cancelled" @if($orders_data->order_status=='cancelled') selected @else @endif>Cancelled</option>                 
					<option value="delivered" @if($orders_data->order_status=='delivered') selected @else @endif>Delivered</option>                 
					<option value="cancelled-refund-pending" @if($orders_data->order_status=='cancelled-refund-pending') selected @else @endif>Cancelled - Refund Pending</option>                 
					<option value="cancelled-refunded" @if($orders_data->order_status=='cancelled-refunded') selected @else @endif>Cencelled - Refunded</option>
					</select>
					<div id="dvcancelled">
            <div class="form-group">
        			<label for="CategorySlug">Remarks<span class="text-red"style="color: red;">*</span></label>
        			<textarea rows="3" class="form-control form-control-sm" id="remarks" name="remarks" >{{old('remarks')}}</textarea>
      			</div>
      			<div class="form-group">
        			<label for="CategoryDesc">Cancelled Date<span class="text-red"style="color: red;"></span></label>
        			<input type="date" class="form-control form-control-sm" id="cancelled_date" name="cancelled_date"   value="{{old('cancelled_date')}}">
      			</div>
          </div>
          <div id="dvPassport" >
          	<div class="">
      			<div class="form-group" >
        			<label for="CategorySlug">Shipped By<span class="text-red"style="color: red;">*</span></label>
        			<select  class="form-control form-control-sm" name="shipped_by" id="">
          		<option value="">-- Pick One --</option>
          		<option value="FedEx">FedEx Tracking</option> 
          		<option value="AWB Logistics" >AWB Logistics</option> 
          		<option value="DTDC" >DTDC</option> 
          		<option value="By Hand" >By Hand</option> 
        			</select>
     			 	</div>
      			<div class="form-group">
        			<label for="CategorySlug">Tracking Number<span class="text-red"style="color: red;">*</span></label>
        			<input type="text" class="form-control form-control-sm" id="shipped_traking_no" name="shipped_traking_no"  value="{{old('shipped_traking_no')}}" data-parsley-pattern="/^[a-z0-9]+([-_\s]{1}[a-z0-9]+)*$/i">
      			</div>
            <div class="form-group">
        			<label for="CategoryDesc">Shipping Date<span class="text-red"style="color: red;"></span></label>
        			<input type="date" class="form-control form-control-sm" id="shipping_to_date" name="shipping_to_date"   value="{{old('shipping_to_date')}}">
      			</div>
      		</div>
      		</div>
					<button type="submit" class="btn btn-danger btn-sm" style="padding: 0 5px;font-size: 12px;">Update</button>            
					</form>
              <p></p>