<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('main/images/new_logo.png') }}" type="image/png" />
    <link rel="shortcut icon" href="{{ asset('main/images/new_logo.png') }}" type="image/png" />
    <title>{{ config('app.name', 'Oazri') }}</title>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet"> --}}

    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/vendors/font-awesome.css') }}">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/vendors/slick-theme.css') }}">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/vendors/animate.css') }}">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/vendors/themify-icons.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('main/owl/owl.carousel.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main/owl/owl.theme.default.min.css') }}">
    

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/vendors/bootstrap.css') }}">

    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/timber.css') }}">
    <style>
         .btn.dropdown-toggle:hover ,.btn:hover {
            background-color: none;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/changes.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main/node_modules/@mdi/font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/css/swiper-bundle.min.css') }}"/>
     @if(app()->getLocale() == 'ar') 
    <link rel="stylesheet" href="{{ asset('main/css/ar.css') }}">
    @endif
    
    @livewireStyles
</head>
<body id="theme-digital-mart-password-1" class="{{ LaravelLocalization::getCurrentLocaleDirection() }} disable_menutoggle left_sidebar false header_style_2  
theme-digital-mart-password-1   template-index @if(app()->getLocale() == 'ar') overflow-x  @endif" style="transform: none;">
    @include('main/partials/head')
    @yield('content')
    @include('main/partials/footer')
    @include('main/partials/scr')
    
</body>
</html>
