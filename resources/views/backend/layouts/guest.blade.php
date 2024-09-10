<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Star Cricket Club') }}</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/img/favicon.ico') }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}" />
    <link rel="icon" href="{{ asset('front/img/favicon.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('backend/css/kaiadmin.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/plugins.min.css') }}" />
</head>

<body>
    @yield('content')

    <!--   Core JS Files   -->
    <script src="{{ asset('backend/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/core/bootstrap.min.js') }}"></script>

</body>

</html>
