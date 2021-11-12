@extends('layouts.adminLayout')

@section('content')



    <div class="card new-event-container">

        <!-- head -->
        <div class="card-header">
            {{ 'Dodaj turnir' }}
        </div>


        {!! Form::open(['url' => '/dodaj-turnir-exe', 'method' => 'post', 'enctype' => 'multipart/form-data', 'files' => 'true']) !!}
        @csrf
        <div class="card-body">


            <div class="form-group">
                <input class="form-control" name="name" required placeholder="Vnesite ime turnira">
            </div>

            <div class="form-group">
                <input class="form-control" name="prize" required placeholder="Nagrada">
            </div>

            <div class="form-group" style="margin-bottom: 5%;">
                <label for="file-upload">Slika nagrade</label><br>
                <input id="file-upload" required type="file" name="prizeImage" />
            </div>



            <div class="form-group">
                <label class="input-silent-label" for="tournamentDate">Začetek turnira</label>
                <input name="tournamentDate" id="tournamentDate" required class="form-control" type="date">
            </div>

            <div class="form-group">
                <input name="tournamentTime" required class="form-control" type="time">
            </div>


            <div class="form-group" style="margin-bottom: 5%;">
                <label for="file-upload">Naslovna slika turnira</label><br>
                <input id="file-upload" required type="file" name="coverImage" />
            </div>


            <!-- SUBMIT -->
            <div class="form-group d-flex justify-content-center">
                <button class="btn btn-success" type="submit">Dodaj</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>


@endsection
