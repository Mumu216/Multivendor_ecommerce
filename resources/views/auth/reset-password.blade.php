@extends('layouts.auth-layout')
@section('admin-layout')

         <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
            <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
              <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">
                  <span class="tx-normal">[</span>Conform <span class="tx-info">Password</span>
                  <span class="tx-normal">]</span>
            </div>
              <div class="tx-center mg-b-30">The Admin Page for Confirm Password</div>
              <x-auth-session-status class="mb-4" :status="session('status')" />
              <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="form-control" type="password" name="password" required />
            </div>

            <div class="form-grpup">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-info btn-block">Reset Password</button>
            </div>

        </form>
    </div>
</div>
@endsection

