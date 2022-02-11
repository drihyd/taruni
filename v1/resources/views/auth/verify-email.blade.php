@extends('student.template')
@section('content')
 @include("student.errors")


<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
               
       

                
            </div>
        </div>
    </div>
</div>




        <div class="mb-2 mt-4 text-sm text-gray-600" style="margin-top: -60px;">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? ') }}
        </div>

        <!-- If you didn\'t receive the email, .we will gladly send you another -->

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
         <!--    <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit" class="btn btn-danger loginbtn">
                        {{ __('Resend Verification Email') }}
                    </x-jet-button>
                </div>
            </form> -->

         <!--    <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Logout') }}
                </button>
            </form> -->
        </div>

@endsection