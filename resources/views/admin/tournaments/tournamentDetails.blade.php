@extends('layouts.adminLayout')

@section('content')


    <div class="tournament-buttons">
        <button onclick="location.href='/zakljuci-prijave/{{ $tournament->id }}'" class="btn btn-warning">Zakljuci
            prijave</button>
        <button class="btn btn-danger">Zakljuci turnir</button>
    </div>

    <!-- ALERT MESSAGES -->
    <x-alert-component />

    <h2 class="thin-header">Ekipe</h2>


    <div id="accordion">

        @foreach ($teams as $team)
            <div class="card team-card">

                <!-- header -->
                <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{ $loop->iteration }}"
                    aria-expanded="false" aria-controls="collapse{{ $loop->iteration }}">
                    <div>
                        <h5 class="teamName">
                            {{ $team->teamName }}
                        </h5>
                    </div>
                </a>

                <!-- collapse body -->
                <div id="collapse{{ $loop->iteration }}" class="collapse" aria-labelledby="headingTwo"
                    data-parent="#accordion">
                    <div class="card-body">
                        <p class="team-element">{{ $team->teamName }}</p>
                        <p class="team-element">{{ $team->member_1 }}</p>
                        <p class="team-element">{{ $team->member_2 }}</p>
                        <p class="team-element"><a
                                href="tel:{{ $team->contact_number }}">{{ $team->contact_number }}</a></p>
                        <button onclick="location.href=' /odjavi-ekipo/{{ $team->id }}'"
                            class="btn delete-team-button">Odjavi Ekipo</button>
                    </div>
                </div>
            </div>
        @endforeach

    </div>



@endsection
