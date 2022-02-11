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
                  <h2 class="smaller section-title">My Profile</h2>
                  <div class="card" >
                  <div class="card-body p-3">
                  <form method="POST" class="Addnewblog" action="{{ url('myprofile/update') }}" enctype="multipart/form-data" data-parsley-validate>
                    @csrf
                    <input type="hidden" name="id" value="{{$users_data->id}}">
                      <div class="form-wrap">
                        <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
              <label for="firstname">First Name<span style="color: red">*</span></label>
              <input type="text" name="firstname" id="firstname" class="form-control" value="{{old('firstname',$users_data->firstname??'')}}" data-parsley-pattern="/^[a-z0-9]+([-_\s]{1}[a-z0-9]+)*$/i" required="required">
            </div>
            <div class="form-group">
              <label for="lastname">Lastname<span style="color: red">*</span></label>
              <input type="text" name="lastname" id="lastname" class="form-control" value="{{old('lastname',$users_data->lastname??'')}}" data-parsley-pattern="/^[a-z0-9]+([-_\s]{1}[a-z0-9]+)*$/i" required="required">
            </div>
            <div class="form-group">
              <label for="phone">Phone<span style="color: red">*</span></label>
              <input type="tel" name="phone" id="mobile" class="form-control" value="{{old('phone',$users_data->phone??'')}}" required="required">
            </div>
            
            <div class="form-group">
              <label for="country">Country<span style="color: red">*</span></label>
               @include('masters.countries', ['default' =>$users_data->country??''])
            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
              <label for="state">State<span style="color: red">*</span></label>
              <input type="text" name="state" id="state" class="form-control" value="{{old('state',$users_data->state??'')}}" required="required">
            </div>
            
            <div class="form-group">
              <label for="city">City<span style="color: red">*</span></label>
              <input type="text" name="city" id="city" class="form-control" value="{{old('city',$users_data->city??'')}}" required="required">
            </div>
            
            <div class="form-group">
              <label for="phone">Address<span style="color: red">*</span></label>
              <textarea name="address" id="address" class="form-control" required="required">{{old('address',$users_data->address??'')}}</textarea>
            </div>
            <div class="form-group">
<label>Profile Picture</label>
<input type="file" name="profile" class="file-input" >
</div>
<div class="form-group">
@if(isset($users_data->profile) && $users_data->profile)
<img src="{{ asset('assets/uploads/' . $users_data->profile) }}" width="100" />
@else             
@endif
</div>
                          </div>
                          <div class="col-sm-12">
                              
                            <button type="submit" class="btn btn-brand mt-2">Update</button>
                          </div>
                        </div>
                      </div> 
                  </form>

                    

                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
  </section>
    @endsection

   