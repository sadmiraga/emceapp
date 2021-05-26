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

        <div class="sidebar">

            <div class="sidebarContainer">

                <button><i class="fa fa-bars"></i></button>
                <img src="images/logos/emceLogo.jpg" class="sidebarLogo" width="200">
            </div>
            <i class="fas fa-bars"></i>
            <ul>
                <li>Popisi</li>
                <li>Kelnerji</li>
                <li>Pijače</li>
                <li>Kategorije pijač</li>
            </ul>

        </div>


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>
