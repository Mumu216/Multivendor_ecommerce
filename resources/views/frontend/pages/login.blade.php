@extends('frontend.layout.template')

@section('body-content')

<div role="main" class="main shop py-4">

  <div class="container">

    <div class="row">
        <div class="col">
            <div class="featured-boxes">
                <div class="row">
                    <div class="col-md-6">
                        <div class="featured-box featured-box-primary text-left mt-2">
                            <div class="box-content">
                                <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">I'm a Returning Customer</h4>
                                {{-- Customer Login Form --}}
                                <form action="{{ route('login.store') }}" id="frmSignIn" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col">
                                            <label class="font-weight-bold text-dark text-2">E-mail Address</label>
                                            <input type="text" value="{{ old('email') }}" name="email" class="form-control form-control-lg" required="required">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col">
                                            {{-- <a class="float-right" href="#">(Lost Password?)</a> --}}
                                            <label class="font-weight-bold text-dark text-2">Password</label>
                                            <input type="password" value="{{ old('password') }}" name="password"  class="form-control form-control-lg" required="required">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-lg-6">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="rememberme">
                                                <label class="custom-control-label text-2" for="rememberme">Remember Me</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <input type="submit" value="Login" class="btn btn-primary float-right" data-loading-text="Loading...">
                                        </div>
                                    </div>
                                </form>

                                {{-- Customer Login End --}}


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="featured-box featured-box-primary text-left mt-2">
                            <div class="box-content">
                                <h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Register An Account</h4>
                                {{-- Customer SignUp Form Start --}}
                                <form action="{{ route('register.store') }}" id="frmSignUp" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-lg-6">
                                            <label class="font-weight-bold text-dark text-2">Full Name</label>
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-lg" required="required">
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label class="font-weight-bold text-dark text-2">E-mail Address</label>
                                            <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" required="required">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-lg-6">
                                            <label class="font-weight-bold text-dark text-2">Password</label>
                                            <input type="password" name="password"  class="form-control form-control-lg">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label class="font-weight-bold text-dark text-2">Re-enter Password</label>
                                            <input type="password" name="password_confirmation" class="form-control form-control-lg">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-lg-9">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="terms">
                                                <label class="custom-control-label text-2" for="terms">I have read and agree to the <a href="#">terms of service</a></label>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <input type="submit" value="Register" class="btn btn-primary float-right" data-loading-text="Loading...">
                                        </div>
                                    </div>
                                </form>
                                {{-- Customer SignUp Form End --}}

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

 </div>

</div>
@endsection
