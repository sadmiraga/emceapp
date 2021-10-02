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
    <script src="{{ asset('js/admin/alert.js') }}" defer></script>
    <script src="{{ asset('js/admin/activeStocktaking.js') }}" defer></script>
    <script src="{{ asset('js/admin/countedStocktaking.js') }}" defer></script>

    @yield('js')

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1d264cf014.js" crossorigin="anonymous"></script>




    <!-- ajax and shit -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>



<body>

    <link rel="stylesheet" href="https://cdn.lineicons.com/2.0/LineIcons.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Vadodara:wght@300;500&display=swap" rel="stylesheet">

    <div class="container">
        <div class="header">
            <div class="header-logo">

                <img src="/images/logos/emceLogo.jpg" width="50%">


            </div>
            <div class="header-search">
                <button class="button-menu"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 385 385">
                        <path
                            d="M12 120.3h361a12 12 0 000-24H12a12 12 0 000 24zM373 180.5H12a12 12 0 000 24h361a12 12 0 000-24zM373 264.7H132.2a12 12 0 000 24H373a12 12 0 000-24z" />
                    </svg></button>

                <h2 id="admin-header">
                    @yield('admin-title')
                </h2>

            </div>
        </div>
        <div class="main">
            <div class="sidebar">
                <ul id="sidebar-items">

                    <li class="sidebar-menu-item">
                        <a href="/meni">
                            <i class="fa fa-list-alt" style="color:white;"></i>
                            <span class="sidebar-menu-item-text">Meni</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item">
                        <a href="/arhiv-popisov"><i class="fa fa-list-ul" style="color:white;"></i>
                            <span class="sidebar-menu-item-text">Popisi (Arhiv)</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item">
                        <a href="/zaposleni">
                            <i class="fa fa-users" style="color:white;"></i>
                            <span class="sidebar-menu-item-text">Zaposleni</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item">
                        <a href="/pijace">
                            <i class="fa fa-coffee" style="color:white;"></i>
                            <span class="sidebar-menu-item-text">Pijače</span>
                        </a>
                    </li>

                    <!-- @kelner -->
                    <li class="sidebar-menu-item">
                        <a href="/aktivni-popis">
                            <i class="fa fa-exclamation-triangle" style="color:white;"></i>
                            <span class="sidebar-menu-item-text">Popis</span>
                        </a>
                    </li>

                    <li class="sidebar-menu-item">
                        <a href="/prestete-pijace">

                            <i class="fa fa-check" style="color:white;"></i>
                            <span class="sidebar-menu-item-text">Prestete pijace</span>
                        </a>
                    </li>


                    <li class="sidebar-menu-item">
                        <a href="/odjava">

                            <i class="fa fa-sign-out" style="color:white;"></i>
                            <span class="sidebar-menu-item-text">Odjava</span>
                        </a>
                    </li>

                </ul>
            </div>
            <div class="page-content">
                @yield("content")
            </div>
        </div>
    </div>






</body>

</html>
