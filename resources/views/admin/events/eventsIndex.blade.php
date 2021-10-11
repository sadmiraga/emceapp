@extends('layouts.adminLayout')

@section('content')


    <div class="events-header">
        <div onclick="location.href='/dodaj-dogodek'" class="add-new-event">
            <i class="fas fa-plus"></i>
        </div>
    </div>

    <div class="events-container">

        @foreach ($events as $event)
            <div class="card event-card" style="width: 50%;">
                <img class="card-img-top" src="/images/events/{{ $event->eventPicture }}" alt="Card image cap">
                <div class="card-body">

                    <!-- NAME -->
                    <div class="centered-header">
                        <p>{{ $event->eventName }}</p>
                    </div>

                    <!-- DATE -->
                    <div class="row event-row-info">
                        <p><i class="far fa-calendar-alt"></i> Datum</p>
                        <p>{{ $event->eventDate }}</p>
                    </div>

                    <!-- TIME -->
                    <div class="row event-row-info">
                        <p><i class="far fa-clock"></i> Čas</p>
                        <p>{{ $event->eventTime }}</p>
                    </div>

                    <!-- LOCATION -->
                    <div class="row event-row-info">
                        <p><i class="fas fa-map-marker-alt"></i> Lokacija</p>
                        <p>{{ $event->eventLocation }}</p>
                    </div>

                    <!-- TICKET -->
                    <div class="row event-row-info">
                        <p><i class="fas fa-ticket-alt"></i> Vstopnina</p>
                        <p>{{ $event->ticketPrice . '€' }}</p>
                    </div>

                    <div class="row confirm-cancel-container" style="margin-bottom:0px;">
                        <button class="btn btn-primary" onclick="location.href='/uredi-dogodek/{{ $event->id }}'">
                            Uredi
                        </button>

                        <button onclick="location.href='/izbrisi-dogodek/{{ $event->id }}'" class="btn btn-danger">
                            Izbrisi
                        </button>
                    </div>

                    <!-- DESCRIPTION -->
                    <div class="admin-event-description">
                        <p>OPIS</p>
                        <p>{{ $event->eventDescription }}</p>
                    </div>



                </div>
            </div>
        @endforeach

    </div>




@endsection
