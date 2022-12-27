<!doctype html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DreamStore BD -     Hot Offer
</title>
    <meta name="description"
          content="">
    <meta property="og:site_name" content="DreamStore BD">
    <meta property="og:image" content="">
    <meta property="og:title" content="DreamStore BD">
    <meta property="og:description"
          content="">
    <meta property="og:url" content="">
    <meta property="og:type" content="e-commerce">
    <meta name="twitter:title" content="DreamStore BD">
    <meta name="twitter:description"
          content="">




    <link rel="shortcut icon" href="">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,600,600i,700,700i,800,800i&display=swap" rel="stylesheet">

    <link href="frontEnd/plugins/font-awesome/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">

     {{-- @foreach($settings as $settings)
     <link rel="icon" type="image/x-icon" href="{{ asset('backend/img/'. $settings->favicon)  }}">
     {!! $settings->fb_pixel ?? null !!}
    @endforeach --}}





</head>
<body>
<div class="main-wrapper">
	@include('frontend.includes.header')
	@yield('body-content')



    @include('frontend.includes.footer')


</div>

<script src="{{asset('js/sweetalert.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</body>
</html>
