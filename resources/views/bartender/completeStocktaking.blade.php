@extends('layouts.adminLayout')

@section('content')



    @if ($drinks->count() > 0)
        <div class="card complete-stocktaking-card">
            <div class="card-header complete-stocktaking-header">
                Za naslenje pijače niste vnesli vse vrednosti, v popis bo se avtomatsko vnesla vrednost 0 za vse
                vrednosti pijac ki jih niste vnesli.
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($drinks as $drink)
                    <li class="list-group-item stocktaking-uncounted">{{ $drink->drinkName }}</li>
                @endforeach
                <li class="list-group-item stocktaking-actions">
                    <button onclick="location.href='/aktivni-popis'" class="btn btn-danger card-button">Prekliči oddajo
                        popisa</button>
                    <button onclick="location.href='/potrdi-popis'" class="btn btn-success card-button">Potrdi oddajo
                        popisa</button>
                </li>
            </ul>
        </div>
    @else
        <div style="display: flex;justify-content: center; margin-top: 10%;">
            <button onclick=" location.href='/potrdi-popis'" class="  btn btn-success">Potrdi oddajo
                popisa</button>
        </div>
    @endif

@endsection
