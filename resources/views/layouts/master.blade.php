<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Project flyer</title>

    <link rel="stylesheet" href="{{ asset('css/libs.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
    @yield('styles')
</head>

<body>

@include('partials.nav')

<div class="container">
    @yield('content')
</div>


<script src="{{ asset('js/libs.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

@include('partials.flash')

@yield('footer-scripts')
</body>
</html>