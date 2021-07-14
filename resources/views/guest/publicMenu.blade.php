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

    <!-- CUSTOM JS -->
    <script src="{{ asset('js/admin/sidebar.js') }}" defer></script>
    <script src="{{ asset('js/admin/drinks.js') }}" defer></script>
    @yield('js')


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- ajax and shit -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>



<body>

    <link rel="stylesheet" href="https://cdn.lineicons.com/2.0/LineIcons.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Vadodara:wght@300;500&display=swap" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <div class="menu-header-container">
        <div class="menu-header">
            <img id="menu-logo" src="/images/logos/emceLogo.jpg" alt="emce plac">
        </div>


        <nav class="vertical-align-middle scroll">

            @foreach ($drinkCategories as $drinkCategory)
                @if ($loop->first)
                    <li class="nav-item active-nav-item"><a href="">{{ $drinkCategory->categoryName }}</a></li>
                @else
                    <li class="nav-item"><a href="">{{ $drinkCategory->categoryName }}</a></li>
                @endif

            @endforeach
        </nav>
    </div>

    <div class="menu-body">

        @foreach ($drinks as $drink)
            <div class="menu-drink">
                {{ $drink->name }}
            </div>
        @endforeach
    </div>



</body>

</html>
