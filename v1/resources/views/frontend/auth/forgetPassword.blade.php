@extends('frontend.template_v1')
@section('title', 'Reset Password')
@section('content')



 <section class="info sec-login">
      <div class="container">
          
          
    
<form  action="{{ route('forget.password.post') }}" method="POST" role="form" id="forgotform" data-parsley-validate>
           
       <div class="container">
        <div class="row justify-content-center">
              <div class="col-md-5 card bg-bright border-0">
              <div class="row p-4 pl-sm-5 pr-sm-5">
                <div class="col-md-12 align-self-center">
                    
                    <h2 class="form-title text-center mb-3">Reset Password</h2>
                    
              <div class="form-wrap mt-4">

                <label for="log-email">Enter your email id</label>
                <div class="form-group">
                  <input name="email" type="email" class="form-control form-control-sm" id="log-email" value="" placeholder="Email" required data-parsley-type="email">
                  
                </div>

                <button type="submit" class="btn btn-brand btn-block mt-4 mb-4">Reset Password</button>
                
              </div>
              </div>
			  
			  <p><strong><span style="color:#ff0000">&#x2a;</span>Please also check your spam folder for the reset password email, If you have not received in your mailbox.</strong></p>
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