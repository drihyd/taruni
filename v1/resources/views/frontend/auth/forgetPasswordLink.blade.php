@extends('frontend.template_v1')
@section('title', 'My Account')
@section('content')



 <section class="info sec-login">
      <div class="container">
          
          
    
<form action="{{ route('reset.password.post') }}" method="POST" data-parsley-validate>
                          @csrf
                          <input type="hidden" name="token" value="{{ $token }}">
           
       <div class="container">
        <div class="row justify-content-center">
              <div class="col-md-5 card bg-bright border-0">
              <div class="row p-4 pl-sm-5 pr-sm-5">
                <div class="col-md-12 align-self-center">
                    
                    <h2 class="form-title text-center mb-3">Reset Password</h2>
                    
              <div class="form-wrap mt-4">

                <label for="log-email">Enter Email</label>
                <div class="form-group">
                <input type="text" id="email_address" class="form-control" name="email" required autofocus value="{{ $email??''}}" readonly>

                  <span class="valid-feedback">Looks good!</span>
                  <span class="invalid-feedback">Please enter Email ID</span>
                </div>
                <label for="log-email">Password</label>
                <div class="form-group pass_show">
                  <input type="password" class="form-control" name="password" id="pass" value=""  required data-parsley-required-message="Please enter password"> 
                </div>
                <label for="log-email">Confirm Password</label>
                <div class="form-group pass_show">
                  <input type="password" class="form-control" name="password_confirmation" value="" data-parsley-equalto="#pass" required data-parsley-required-message="Please enter a correct password"> 
                </div>

                <button type="submit" class="btn btn-brand btn-block mt-4 mb-4">Reset Password</button>
				
				
                  <div class="row m-0 justify-content-between mt-3">
                  <span class="text-small"><a href="{{ route('forget.password.get')}}" class="cta"><u>Resend Reset Password?</u></a></span>
				   
                  <span class="text-small"><a href="{{ URL('/registration')}}" class="cta"><u>Create an Account?</u></a></span>
				  <span class="text-small"><a href="{{ route('resend.activation.link')}}" class="cta"><u>Resend  Activation link?</u></a></span>
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
   $('#forgotform').parsley();
 </script> 
 @endpush