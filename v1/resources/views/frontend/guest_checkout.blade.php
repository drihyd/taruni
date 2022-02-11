@extends('frontend.template_v1')
@section('title', "Guest Checkout")
@section('content')
@php
$Cart_Info='';
$array_name_string ='';
$address_count='';
@endphp 
    <section style="padding-top: 30px;">
        <div class="container">
		
		
		<h3>Guest Checkout</h3>	
		  <div class="row">
                <div class="col-sm-8 mt-2">
				<h6 class="text text-danger"><u>Important notes:</u></h6>
				<p>1. Guest does not have any right to see the history of orders.<br>				
				   2. All the process between you and the guest will be via email/phone.<br>	
				   3. He/She do not have right to track any order or see activities till he/she become a real user.<br>
				   4. An Order Confirmation mail will send to the shipping email id.
				</p>
				
				</div>
			</div>
		
		
		
           
            <div class="row">
                <div class="col-sm-8 mt-2">
			
				 <h6 class="text text-danger">Shipping Details</h6>		
				
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="cart-container">
                     <form  action="{{ route('post.guest.checkout') }}" method="POST" role="form" data-parsley-validate id="checkoutform">
					 @csrf
                                    <div class="form-wrap">
                
                        <label for="log-email">Firstname</label>
                        <div class="form-group">
                            <input name="firstname" type="text" class="form-control" id="firstname" value="{{$address_data->firstname??$array_name_string[0]??''}}" placeholder="Firstname" required>
                          </div>     
						  <label for="log-email">Lastname</label>
                        <div class="form-group">
                            <input name="lastname" type="text" class="form-control" id="lastname" value="{{$address_data->lastname??$array_name_string[1]??''}}" placeholder="Lastname" required>
                          </div>
                <div class="row">
                  <div class="col">
                <label for="log-email">Enter Email</label>
                <div class="form-group">
                  <input type="email" name="email" class="form-control" id="log-email" value="{{$address_data->email??$Cart_Info->ship_to_email??''}}" placeholder="Email" required>
                  <span class="valid-feedback">Looks good!</span>
                  <span class="invalid-feedback"> choose a username.</span>
                </div>
                </div>
                <div class="col">
                <label for="log-email">Mobile</label>
                <div class="form-group">
                  <input type="tel" name="mobile" class="form-control" id="mobile" value="{{$address_data->phone??$Cart_Info->ship_to_phone??''}}" placeholder="Mobile" required>
                  <span class="valid-feedback">Looks good!</span>
                  <span class="invalid-feedback"> choose a username.</span>
                </div>
                </div>

                </div>



                <div class="row">
                    <div class="col">
                        <label for="log-email">Country</label>
                        <div class="form-group">
                            @include('masters.countries', ['default' =>$address_data->country??$Cart_Info->ship_to_country??'','is_required'=>"yes"])
                          </div>
                    </div>
                    <div class="col">
                        <label for="log-email">State</label>
                        <div class="form-group">
                            <input name="state"  type="text" class="form-control" id="state" value="{{$address_data->state??$Cart_Info->ship_to_state??''}}" placeholder="State" required>
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="log-email">City</label>
                        <div class="form-group">
                            <input name="city" type="text" class="form-control" id="city" value="{{$address_data->city??$Cart_Info->ship_to_city??''}}" placeholder="City" required>
                          </div>
                    </div>
                    <div class="col">
                        <label for="log-email">Postal Code</label>
                        <div class="form-group">
                            <input name="pincode" type="number" class="form-control" id="pincode" value="{{$address_data->pincode??$Cart_Info->ship_to_postalcode??''}}" placeholder="Postal code" required data-parsley-length="[3, 10]">
                          </div>
                    </div>
                </div>
                <label for="log-email">Full Address</label>
                        <div class="form-group">
                            <textarea name="address" class="form-control"  rows="3">{{$address_data->address??$Cart_Info->ship_to_address??''}}</textarea>
                          </div>
              </div>
			   <button type="submit" class="btn btn-dark btn-block">Confirm</button>
			   
			   
			   <input name="guestcheckout" id="guestcheckout" type="hidden"  value="checkoutasguest" >
			   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                     @include('frontend.cart_summary')
                </div>
            </div>
            
  
			
			
            
        </div>
    </section>
	
	


	

@push('scripts')
<script>
   $('#checkoutform').parsley();
 </script> 
 @endpush
 @endsection
 
 