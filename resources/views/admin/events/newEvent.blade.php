@extends('layouts.adminLayout')

@section('content')



    <div class="card new-event-container">

        <!-- head -->
        <div class="card-header">
            {{ 'Dodaj Dogodek' }}
        </div>


        {!! Form::open(['url' => '/dodaj-dogodek-exe', 'method' => 'post', 'enctype' => 'multipart/form-data', 'files' => 'true']) !!}
        @csrf
        <div class="card-body">


            <div class="form-group">
                <input class="form-control" name="eventName" required placeholder="Vnesite ime dogodka">
            </div>

            <div class="form-group">
                <input name="eventDate" required class="form-control" type="date">
            </div>

            <div class="form-group">
                <input name="eventTime" required class="form-control" type="time">
            </div>

            <div class="input-group mb-3">
                <input type="text" name="eventLocation" required class="form-control"
                    placeholder="Vnesite lokacijo dogodka">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-map-marked-alt"></i></span>
                </div>
            </div>


            <div class="form-group">
                <textarea class="form-control" name="eventDescription" placeholder="Vpišite opis dogodka"></textarea>
            </div>

            <div class="form-group" style="margin-bottom: 5%;">
                <label for="file-upload">Slika dogodka</label><br>
                <input id="file-upload" required type="file" name="eventPicture" />
            </div>



            <!-- Vstopnina -->
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" checked id="weightableCheckbox" name="ticketCheckbox"
                        class="custom-control-input" onchange="enableWeight();">
                    <label class="custom-control-label" for="weightableCheckbox">Vstopnina</label>
                </div>
            </div>


            <!-- DRINK PACKING WEIGHT -->
            <div class="input-group mb-3" id="drink-packing-weight-div">

                <input type="number" step=".1" name="ticketPrice" id="packingWeight" class="form-control"
                    placeholder="Vnesite ceno vstopnine">

                <div class="input-group-append">
                    <span class="input-group-text">€</span>
                </div>
            </div>






            <!-- SUBMIT -->
            <div class="form-group d-flex justify-content-center">
                <button class="btn btn-success" type="submit">Dodaj</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>


@endsection
