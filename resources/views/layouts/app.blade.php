<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('storage/app/public/profile/icon.png') }}" type="image/x-icon">
    <!-- Styles -->
    <link href="{{ asset('public/css/admin.css') }}" rel="stylesheet">
</head>
<body id="auth_wrapper">
    <div id="app">
       @yield('content')
       
    </div>
     <!-- Scripts -->
    <script src="{{ asset('public/js/admin.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    @yield('script')
</body>
</html>
