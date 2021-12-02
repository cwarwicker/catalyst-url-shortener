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
<div id="page-container" class="container-fluid">
    <div class="header">
        <a href="{{ url('/') }}"><img src="{{ URL('/img/logo.svg') }}"></a>
    </div>
    @yield('content')

    <footer>
        <div class="container-fluid">
            <div class="d-flex justify-content-center">
                <div>
                    <div class="footer-logo"><img alt="Catalyst IT" src="{{ URL('/img/logo.svg') }}"></div>
                    <p>First Floor,<br>
                        36 Frederick Place,<br>
                        Brighton <span class="postal-code">BN1 4EA</span>, United Kingdom</p>
                    <p>
                    <a href="mailto:info@catalyst-eu.net" class="spamspan">info@catalyst-eu.net</a><br><a href="tel:+44 1273 929 450">+44 (0) 1273 929450</a></p>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <p>Copyright © 2019–2021 Catalyst IT Europe. All Rights Reserved</p>
            </div>
        </div>
    </footer>

</div>

</body>
</html>
