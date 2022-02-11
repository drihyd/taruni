@extends('student.template')
@section('content')

@include('student.errors')
  @include('student.alerts')


        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
<br><br>

            {{__('If you do not receive the reset password link within a few minutes, please check your Spam folder just in case the reset password email got delivered there instead of your inbox.
If so, select the reset password message and click Not Spam, which will allow future messages to get through. ')}}
        </div>

   



        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full form-control col-md-4" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4 ">
                <x-jet-button class="btn btn-primary">
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
 
@endsection