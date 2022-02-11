@extends('frontend.template_v1')
@section('title', "Checkout")
@section('content')
@php
use App\Models\Cart;
$Cart_Info=Cart::select('ship_to_name','ship_to_email','ship_to_phone','ship_to_alt_phone','ship_to_address','ship_to_city','ship_to_state','ship_to_country','ship_to_postalcode')->where('id',session()->get('cart'))->where('order_status','hold')->first();
$array_name_string = preg_split('#\s+#', $Cart_Info->ship_to_name??'', 2);

$address_count=DB::table('addresses')
->where("user_id",Auth::user()->id??0)
->where("addtype",'shipping')
->get()->first();


@endphp 
    <section style="padding-top: 30px;">
        <div class="container">
            <h3>Shipping Details</h3>
            <div class="row">
                <div class="col-sm-8">
				
				<p>Add more addresses from your account dashboard. Please <a href="{{URL::to('/myaddresses')}}">Click Here</a></p>
				@if($address_count)
				<button type="button" class="btn btn-sm btn-danger discountmodal-btn mb-3" data-toggle="modal" data-target="#discountModal">Choose your address</button>
				@endif
				
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="cart-container">
                     <form  action="{{ route('register.checkout') }}" method="POST" role="form" data-parsley-validate id="checkoutform">
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
                            <input name="pincode" type="text" class="form-control" id="pincode" value="{{$address_data->pincode??$Cart_Info->ship_to_postalcode??''}}" placeholder="Postal code" required>
                          </div>
                    </div>
                </div>
                <label for="log-email">Full Address</label>
                        <div class="form-group">
                            <textarea name="address" class="form-control"  rows="3">{{$address_data->address??$Cart_Info->ship_to_address??''}}</textarea>
                          </div>
              </div>
			   <button type="submit" class="btn btn-dark btn-block">Confirm</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                     @include('frontend.cart_summary')
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-sm-8">
                    <div class="cart-action-box">
                        <a href="{{ URL('/products')}}" class="btn btn-custom btn-curved btn-wide btn-white">
                            <span class="glyphicon glyphicon-heart"></span> Select More
                        </a>
                    </div>
					<!--
                    <div class="cart-action-box right">
                        <a href="{{ URL('/checkout_review')}}" class="btn btn-custom btn-curved btn-wide btn-brand"> 
                        
                        </a>
					
                        <small class="tip">Tip: Shop for USD175 &amp; above to avail free shipping</small>
                    </div>-->
                </div> <!-- ./col -->
            </div>
            
        </div>
    </section>
	
	
	
	
	                    
                     <!--Modal Launch Button-->

<!--Division for Modal-->
<div id="discountModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!--Modal Content-->
        <div class="modal-content">
            <!-- Modal Header-->
            <div class="modal-header">
                <h4 class="modal-title">Pick shipping address</h4>
                <!--Close/Cross Button--> <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div> <!-- Modal Body-->
            <div class="modal-body">
                <div class="row">
                    <!--Gift Icon-->
                
                    <!--Modal Text-->
                    <div class="col-12">
					
					
@php
$addresses=DB::table('addresses')
->where("user_id",Auth::user()->id??0)
->where("addtype",'shipping')
->get();
@endphp


@foreach($addresses as $key=>$value)


<form  action="{{ route('address.auto.filling',['address'=>Crypt::encryptString($value->id)]) }}" method="POST" role="form" data-parsley-validate id="checkoutform">
@csrf
<input type="submit"  class="btn btn-brand btn-sm" value="{{Str::ucfirst($value->address_title) }}">
</form>

<br>

@endforeach
						
						
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	
	
@endsection
@push('scripts')
<script>
   $('#checkoutform').parsley();
 </script> 
 @endpush
 
 
 