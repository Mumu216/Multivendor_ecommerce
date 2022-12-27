@extends('layouts.auth-layout')
@section('admin-layout')

        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form action="{{ route('register') }}"  method="POST">
            @csrf

            <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

            <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white rounded shadow-base">
              <div class="signin-logo tx-center tx-28 tx-bold tx-inverse">
                <span class="tx-normal">[</span> Admin <span class="tx-info">Register</span>
                <span class="tx-normal">]</span></div>
            <div class="tx-center mg-b-40">The Admin Template For Perfectionist</div>

            <div class="form-group">
               <label for="name">Full Name</label>
               <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="Enter Your Fullname"  required autofocus>
            </div>

            <div class="form-group">
               <label for="email">Email</label>
                <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter Your Fullname" required>
            </div>

            <div class="form-group">
               <label for="password">Password</label>
               <input type="password" id="password" class="form-control" name="password" placeholder="Enter Your Password"  required autocomplete="new-password" >
            </div>

            <div class="form-group">
               <label for="password_confirmation">Re-Type Password</label>
               <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"  placeholder="Re-Type Your Password" required>
            </div>

            <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
            <button type="submit" class="btn btn-info btn-block">Sign Up</button>

            <div class="mg-t-40 tx-center">Already a member? <a href="{{ route('login') }}" class="tx-info">Sign In</a></div>
            </div>
            </div>
    </form>

@endsection

