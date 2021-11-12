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
    <script src="{{ asset('js/admin/alert.js') }}" defer></script>


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

        <div class="eighty" style="margin-top:5%;">
            <x-alert-component />
        </div>

        <h2 class="thin-header">Prijava na turnir</h2>

        <div class="tournament-application-container">

            {!! Form::open(['url' => '/prijavi-ekipi-exe', 'method' => 'post', 'enctype' => 'multipart/form-data', 'files' => 'true']) !!}
            @csrf

            <input class="form-control custom-tournament-input" placeholder="Naziv ekipe" name="teamName" required>

            <input class="form-control custom-tournament-input" placeholder="Član 1 (ime in priimek)" name="member1"
                required>

            <input class="form-control custom-tournament-input" placeholder="Član 2 (ime in priimek)" name="member2"
                required>

            <input class="form-control custom-tournament-input" placeholder="Kontaktna številka" name="number" required>

            <input type="hidden" value="{{ $tournament->id }}" name="tournamentID">

            <input type="submit" value="PRIJAVA" class="btn btn-success tournament-button">

            {!! Form::close() !!}

        </div>

        <h2 class="thin-header" style="margin-bottom: 0px !important;">nagrada</h2>
        <h4 class="below-header">{{ $tournament->prize }}</h4>

        <div class="prize-container">
            <img class="prize-image" src="/images/tournaments/prizes/{{ $tournament->prizeImage }}">
        </div>



        <x-Footer />

</body>

</html>
