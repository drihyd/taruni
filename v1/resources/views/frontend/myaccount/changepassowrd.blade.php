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
                  <h2 class="smaller section-title">Change Password</h2>
                  

                    
                  <div class="row">
                    
                      <div class="col-md-8">
                        <div class="card" >
                  <div class="card-body p-3">
                    @include('frontend.alerts')
                    @include('frontend.errors')
                        <form action="{{url('change_password/store')}}"  method="post" accept-charset="utf-8" id="changepasswordform" data-parsley-validate>
  @csrf
                      <div class="form-wrap">
                        <!-- <div class="form-group">
            <label for="currentPass">Current Password</label>
            <input type="password" name="current_password" id="currentPass" class="form-control" value="">
          </div> -->
          <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" name="new_password" class="form-control" id="pass" value=""  required data-parsley-required-message="Please enter password">
          </div>
          <div class="form-group">
            <label for="pass">Confirm New Password</label>
            <input type="password" name="new_confirm_password" class="form-control" value="" data-parsley-equalto="#pass" required data-parsley-required-message="Please enter a correct password">
          </div>
            <button type="submit" class="btn btn-brand mt-2">Update</button>
                      </div>
                      <!-- <div class="col-sm-6">
                        
                        
                      </div> -->

                    </form>
                  </div>
                </div>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
  </section>
    @endsection

    @push('scripts')
<script>
   $('#changepasswordform').parsley();
 </script> 
 @endpush