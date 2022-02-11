@extends('student.template')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h5>{{ __('Phone Verification') }}</h5></div>

                <div class="card-body">

                     @include("student.errors")            

<div class="row">

    <div class="col-md-6">

<form class="d-inline" role="form" method="POST" action="{{ route('verify.phone_code_submit') }}">
                           @csrf

                            <div class="form-group">
                                <label for="code" class="col-md-6 control-label">Enter Four digits code</label>

                                <div class="col-md-6">
                                    <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}" required autofocus>

                                    @if ($errors->has('code'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        {{ __('Click here to verification') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>

<div class="col-md-6">
                    <div class="mt-0 text-sm text-gray-600 flex items-center justify-between" >
                

                     <label for="code" class="col-md-12 control-label">Didn't receive an OTP/Expired Time (One Time Password) ?</label>
                    </div>


                              <div class="mt-1 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.otpsend') }}">
                @csrf
<div class="form-group">
 <div class="col-md-8">
                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autofocus>

                </div>
                 
</div>

                     <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        {{ __('Resend Verification Code') }}
                                    </button>
                                </div>
                            </div>

               
            </form>

         <!--    <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Logout') }}
                </button>
            </form> -->
        </div>

 </div>

  </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
