<!DOCTYPE html>
<html lang="en">

<head>
    <title>Zay Shop eCommerce HTML CSS Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/templatemo.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/custom.css')}}">
     <link rel="stylesheet" href="{{ asset('node_modules/leaflet/dist/leaflet.css') }}" />
    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/fontawesome.min.css')}}">
     <!--toaster--!>
   <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-confirm.min.css') }}">
    <!--

TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <!-- Start Top Nav -->
   @include('frontend.layout.partials.nav')
    <!-- Close Top Nav -->


    <!-- Header -->
   @include('frontend.layout.partials.header')
    <!-- Close Header -->

    <!-- Modal -->
  @include('frontend.layout.partials.modle')
    <section class="content">

    <div class="container-fluid">
    @yield('content')
    </div>



    <!-- Start Footer -->
    @include('frontend.layout.partials.footer')
<!-- Start javascript -->


    @include('frontend.layout.partials.script')

