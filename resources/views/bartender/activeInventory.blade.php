@extends('layouts.adminLayout')


@section('content')


    @if ($started_bool)
        <div class="custom-container" id="start-stocklisting">
            <button onclick="location.href='/zacni-popis'" id="zacni-popis-button"
                class="btn btn-success btn-circle btn-sm">Začni Popis</button>
        </div>
    @endif

@endsection
