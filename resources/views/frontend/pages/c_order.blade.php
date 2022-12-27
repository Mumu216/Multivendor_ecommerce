@extends('frontend.layout.template')
@section('body-content')

   <div class="py-md-5">
    <div class="cart-section">
        <div class="container">
            <div class="row py-md-5">
                <div class="col-12 text-center">
                    <h1 class="mb-md-4" style="color:rgb(28, 102, 28) font-weight: bold">Order Place Successfully</h1>
                    <p style="color: green">Your Order is Confirmed. You will get a Order Confirmation Message or get a Order Confirmation Phone Call Soon to Our Call Center.  </p>
                    <a href="{{ url('/') }}" class="btn btn-success px-5" style="background-color: green">Select Your Product</a>
                </div>
            </div>
        </div>
    </div>

@endsection
