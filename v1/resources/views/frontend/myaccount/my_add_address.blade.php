@extends('frontend.template_v1')
@section('title', 'My Account')
@section('content')
<section class="my-account-sec">
        <div class="container">
            <div class="row">
              <div class="col-sm-12">
          <div class="my-account-area">
            
            
@include('frontend.myaccount.mysidebar')
            
            <div id="account-details-area">
              
              <div id="account-menu-toggle" class="btn btn-custom btn-brand btn-sm"><span class="glyphicon glyphicon-menu-hamburger"></span> Menu</div>
              
                  <h2 class="smaller section-title">Add Address</h2>
                  
        
          <div class="width-80-desktop">
            <div class="card" >
    <div class="card-body p-3">
@if($address_data->id??'')
<form method="POST" class="Addnewblog" action="{{ url('myaddresses/update') }}" enctype="multipart/form-data" data-parsley-validate>
<input type="hidden" name="id" value="{{$address_data->id}}">
@else
<form action="{{url('myaddresses/store')}}" class="" method="post" accept-charset="utf-8" data-parsley-validate enctype="multipart/form-data">
  @endif
  @csrf
  <div class="row">
  <div class="col-sm-6">
  <div class="form-wrap">
  
        <div class="form-group">
              <label for="phone">Address Title<span style="color: red">*</span></label>
              <input type="tel" name="address_title" id="address_title" class="form-control" value="{{old('address_title',$address_data->address_title??'')}}" required="required">
            </div>
    <div class="form-group">
              <label for="firstname">First Name<span style="color: red">*</span></label>
              <input type="text" name="firstname" id="firstname" class="form-control" value="{{old('firstname',$address_data->firstname??'')}}" data-parsley-pattern="/^[a-z0-9]+([-_\s]{1}[a-z0-9]+)*$/i" required="required">
            </div>
            <div class="form-group">
              <label for="lastname">Last Name<span style="color: red">*</span></label>
              <input type="text" name="lastname" id="lastname" class="form-control" value="{{old('lastname',$address_data->lastname??'')}}" data-parsley-pattern="/^[a-z0-9]+([-_\s]{1}[a-z0-9]+)*$/i" required="required">
            </div>
            <div class="form-group">
              <label for="email">Email<span style="color: red">*</span></label>
              <input type="email" name="email" id="email" class="form-control" value="{{old('email',$address_data->email??'')}}" data-parsley-type="email" required="required">
            </div>
            <div class="form-group">
              <label for="phone">Phone<span style="color: red">*</span></label>
              <input type="tel" name="phone" id="mobile" class="form-control" value="{{old('phone',$address_data->phone??'')}}" required="required">
            </div>
      
            
            
            <div class="form-group">
            <label>Is Defualt<span style="color: red">*</span></label>&nbsp;&nbsp;
            <input type="radio" class="rdbtn"  name="is_default" value="Yes" required {{ old('is_default',$address_data->is_default??'') == 'Yes'? 'checked':''}}  />
                <label>Yes</label>
                <input type="radio" class="rdbtn" value="No"  name="is_default" required="" {{ old('is_default',$address_data->is_default??'') == 'No'? 'checked':''}} />
                  <label>No</label>
            
          </div>
          <div class="form-group">
            <label>Add Type<span style="color: red">*</span></label>&nbsp;&nbsp;
            <input type="radio" class="rdbtn"  name="addtype" value="shipping" required="required" {{ old('addtype',$address_data->addtype??'') == 'shipping'? 'checked':''}} />
                <label>Shipping</label>
                <input type="radio" class="rdbtn" value="billing"  name="addtype" required="required" {{ old('addtype',$address_data->addtype??'') == 'billing'? 'checked':''}}/>
                  <label>Billing</label>
            
          </div>
            <div class="form-group">
              <button type="submit" class="btn btn-brand mt-2">Update</button>
            </div>
          </div>
        </div>
            <div class="col-sm-6">
              <div class="form-wrap">
                <div class="form-group">
              <label for="country">Country<span style="color: red">*</span></label>
              
              @include('masters.countries', ['default' =>$address_data->country??''])
            </div>
            <div class="form-group">
              <label for="state">State<span style="color: red">*</span></label>
              <input type="text" name="state" id="state" class="form-control" value="{{old('state',$address_data->state??'')}}" required="required">
            </div>
            
            <div class="form-group">
              <label for="city">City<span style="color: red">*</span></label>
              <input type="text" name="city" id="city" class="form-control" value="{{old('city',$address_data->city??'')}}" required="required">
            </div>
            <div class="form-group">
              <label for="city">Pincode<span style="color: red">*</span></label>
              <input type="text" name="pincode" id="city" class="form-control" value="{{old('pincode',$address_data->pincode??'')}}" required="required">
            </div>
            
            <div class="form-group">
              <label for="phone">Address<span style="color: red">*</span></label>
              <textarea name="address" id="address" class="form-control" rows="3" required="required">{{old('address',$address_data->address??'')}}</textarea>
            </div>
          </div>
          </div>
        </div>
        </div>
        </div>
        </div>
          </form>
          <hr>
          </div> <!-- ./width-80-desktop -->
        </div>
      </div>
                                
            </div> <!-- ./account-details-area -->
        </div>
                
            </div>
        </div>
    </div></section>
    @endsection