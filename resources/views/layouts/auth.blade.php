<!doctype html>
<html lang="{{ config('app.locale') }}" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Internship Application - Login Page </title>

    <link rel="stylesheet" href="{{ asset('assets/general/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/general/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/general/css/line-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/splitting.css') }}">

    @stack('style-lib')
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    @stack('style')
</head>

<body>



    @yield('content')

    <script src="{{ asset('assets/general/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/general/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.js') }}"></script>

    @include('partials.notify')
    @stack('script-lib')

    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/splitting.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @stack('script')

</body>

</html>
