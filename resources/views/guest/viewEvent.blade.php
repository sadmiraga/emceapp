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


    <!-- FLICKITY -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>


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
            <img onclick="location.href='/'" id="menu-logo" src="/images/logos/emceLogo.jpg" alt="emce plac">
        </div>
    </div>




    <div class="event-header-image" style='background-image: url("/images/events/{{ $event->eventPicture }}");'>
    </div>


    <div class="centered-header event-heading">
        <p>{{ $event->eventName }}</p>
    </div>

    <!-- DATE -->
    <div class="row event-row-info guest-event-info-row">
        <p><i class="far fa-calendar-alt"></i> Datum</p>
        <p>{{ $event->eventDate }}</p>
    </div>

    <!-- TIME -->
    <div class="row event-row-info guest-event-info-row">
        <p><i class="far fa-clock"></i> Čas</p>
        <p>{{ $event->eventTime }}</p>
    </div>

    <!-- LOCATION -->
    <div class="row event-row-info guest-event-info-row">
        <p><i class="fas fa-map-marker-alt"></i> Lokacija</p>
        <p>{{ $event->eventLocation }}</p>
    </div>

    <!-- TICKET -->
    <div class="row event-row-info guest-event-info-row">
        <p><i class="fas fa-ticket-alt"></i> Vstopnina</p>
        <p>{{ $event->ticketPrice . '€' }}</p>
    </div>



    <x-Footer />

</body>

</html>
