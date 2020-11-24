<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="container pt-3">
            <div class="row">
                <h3>{{ config('app.name', 'Laravel') }}</h3>
                <div class="card w-100">
                    <div class="card-body">
                        <h3 class="card-title">@yield('title')</h3>
                        <p class="card-subtitle">@yield('title-meta')
                        </p>
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
