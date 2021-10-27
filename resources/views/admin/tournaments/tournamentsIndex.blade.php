@extends('layouts.adminLayout')

@section('content')


    <!-- add new tournament -->
    <div class="events-header">
        <div onclick="location.href='/dodaj-turnir'" class="add-new-event">
            <i class="fas fa-plus"></i>
        </div>
    </div>


    <div class="events-container">

        @foreach ($tournaments as $tournament)

            <div onclick="location.href='/turnir/{{ $tournament->id }}'" class="card event-card" id="tournamentCard"
                style="width: 50%;">
                <img class="card-img-top" src="/images/tournaments/covers/{{ $tournament->image }}" alt="Card image cap">
                <div class="card-body">

                    <!-- NAME -->

                    <div class="centered-header">
                        <p class="tournament-name">{{ $tournament->name }}</p>
                    </div>


                </div>
            </div>

        @endforeach

    </div>




@endsection
