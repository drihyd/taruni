@extends('frontend.template_v1')
@section('title', 'My Account')
@section('content')
 <section class="info sec-login">
      <div class="container">
    
<form  action="{{ route('register.customer') }}" method="POST" role="form" id="registrationform" data-parsley-validate>
           
       <div class="container">
        <div class="row justify-content-center">
              <div class="col-md-5 card bg-bright border-0">
              <div class="row p-4">
                <div class="col-md-12 align-self-center">
                    
                <h2 class="form-title text-center">Signup</h2>
              @include('frontend.common_pages.social')
              
              <div class="form-wrap mt-4">
                <div class="row">
                    <div class="col">
                        <label for="log-email">Firstname<span style="color: red">*</span></label>
                        <div class="form-group">
                <input name="firstname" type="text" class="form-control form-control-sm" value="{{old('firstname')}}"  placeholder="Firstname" required="required" data-parsley-pattern="/^[a-z0-9]+([-_\s]{1}[a-z0-9]+)*$/i">
                          </div>
                    </div>
                    <div class="col">
                        <label for="log-email">Lastname<span style="color: red">*</span></label>
                        <div class="form-group">
                            <input name="lastname" type="text" class="form-control form-control-sm"   placeholder="Lastname" value="{{old('lastname')}}" required="required" data-parsley-pattern="/^[a-z0-9]+([-_\s]{1}[a-z0-9]+)*$/i">
                          </div>
                    </div>
                </div>
                <label for="log-email">Enter Email<span style="color: red">*</span></label>
                <div class="form-group">
                  <input name="email" type="email" class="form-control form-control-sm" value="{{old('email')}}"  placeholder="Email" required="required" data-parsley-type="email">
                  
                </div>

                <label for="log-email">Enter Password<span style="color: red">*</span></label>
                <div class="form-group pass_show">
                  <input name="password" type="password" class="form-control form-control-sm"  pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 6 characters' : ''); if(this.checkValidity()) form.cpassword.pattern = this.value;" placeholder="Password" required>
                </div>

                <label for="log-email">Confirm Password<span style="color: red">*</span></label>
                <div class="form-group pass_show">
                  <input name="cpassword" type="password" class="form-control form-control-sm" pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" placeholder="Confirm Password" required>
                </div>

                <div class="row">
                    <div class="col">
                        <label for="log-email">Select Gender<span style="color: red">*</span></label>
                        <div class="form-group">
                            <select class="form-control form-control-sm custom-select" name="gender"  required="required">
                                <option value="">Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                          </div>
                    </div>
                    <div class="col">
                        <label for="log-email">Mobile number<span style="color: red">*</span></label>
                        <div class="form-group">
                            
                            <input  type="number" name="mobile" id="mobile" class="form-control form-control-sm intl-tel-input"  placeholder="Phone" required value="{{old('mobile')}}" data-parsley-type="integer">
                          </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-brand btn-block mt-4 mb-4">Sign up to Continue</button>
                <div class="row m-0 justify-content-center mt-3">
				<p><i><span style="color:#ff0000">&#x2a;</span>After registration, you will get activation link to activate your account for further communication with us.</i></p>
				<p><strong><span style="color:#ff0000">&#x2a;</span>Please also check your spam folder for the activation email, If you have not received in your mailbox.</strong></p>
                  <span class="text-small text-right">
                    <a href="{{ URL('customer-signin')}}" class="cta">Already have an account? <u>Sign In!</u></a></span>
                </div>
              </div>
              </div>
              </div>
</div>
            </div>
      </div>
      @csrf
          </form>
        
      </div>
    </section>

@endsection

@push('scripts')
<script>
   $('#registrationform').parsley();
 </script> 
 @endpush