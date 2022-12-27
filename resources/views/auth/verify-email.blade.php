@extends('frontend.layout.template')
@section('body-content')

<div role="main" class="main shop py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-4 text-sm text-gray-600">
                    <p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another. <strong>Until You verified your email address, you are not allowed to manage your profile.</strong></p>
              </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div class="form-group">
                    <button type="submit" class="btn btn-info">Resend Verification Email</button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-info">Log Out</button>
            </form>
        </div>
      </div>
     </div>
  </div>
</div>
@endsection

