<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Asap:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>

</head>
<body>
<div class="container-fluid">
    <div class="header">
        <a href="{{ url('/') }}"><img src="{{ URL('/img/logo.png') }}"></a>
    </div>
    @yield('content')
</div>
</body>
</html>
