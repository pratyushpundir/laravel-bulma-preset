<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta-tags')

    <title>{{ title_case(env('APP_NAME', 'Laravel')) }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @include('shared.bulma-nav')

    <main class="content" style="margin-bottom: 0; overflow: auto;">
        @yield('content')
    </main>

    <div id="env-indicator" class="{{ env('APP_ENV') }}"></div>
</div>

<!-- Scripts -->
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
