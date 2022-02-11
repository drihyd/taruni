@extends('frontend.template_v1')
@section('title', 'My Account')
@section('content')



 <section class="info sec-login">
      <div class="container">
          
          
    
<form  action="{{ route('register.login') }}" method="POST" role="form" id="loginform" data-parsley-validate>
           
       <div class="container">
        <div class="row justify-content-center">
              <div class="col-md-5 card bg-bright border-0">
              <div class="row p-4 pl-sm-5 pr-sm-5">
                <div class="col-md-12 align-self-center">
                    
                    <h2 class="form-title text-center mb-3">Login</h2>
                    
                    @include('frontend.common_pages.social')
                    
                    
              <div class="form-wrap mt-4">

                <label for="log-email">Enter Email<span style="color: red">*</span></label>
                <div class="form-group">
                  <input name="email" type="email" class="form-control form-control-sm" id="log-email" value="" placeholder="Email" required value="{{old('email')}}" data-parsley-type="email">
                </div>

                <label for="log-email">Enter Password<span style="color: red">*</span></label>
                <div class="form-group pass_show">
                  <input name="password" type="password" class="form-control form-control-sm" id="log-password" value="" placeholder="Password" required>
                </div>

                <button type="submit" class="btn btn-brand btn-block mt-4 mb-4">Log in to Continue</button>
				
				
								@if(Auth::Guest())
				@include('frontend.common_pages.checkoutasaguest')
				@endif
				
				
                <div class="row m-0 justify-content-between mt-3">
                  <span class="text-small"><a href="{{ route('forget.password.get')}}" class="cta"><u>Reset Password?</u></a></span>
				   
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
   $('#loginform').parsley();
 </script> 
 @endpush