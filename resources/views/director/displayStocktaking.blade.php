@extends('layouts.adminLayout')


@section('admin-title')
    <h2 class="admin-header stocktaking-details">
        {{ $user->firstName . ' ' . $user->lastName . ' (' . date('d-m-Y', strtotime($stocktaking->start)) . ')' }}</h2>
@endsection

@section('content')

    <div class="stocktaking-functions-table">

        <div class="function-button">
            <i onclick="location.href='/tiskaj-popis/{{ $stocktaking->id }}'" class="fas fa-print"></i>
        </div>

        <div class="function-button">
            <i class="fas fa-exchange-alt"></i>
        </div>

        <div class="form-group search-function">
            <input class="form-control" type="text" id="stocktaking-drink-name" onkeyup="searchStocktakingDrinks()"
                placeholder="Search for names..">
        </div>
    </div>



    <table class="table table-striped" id="archive-stocktaking-table">
        <tr>
            <th scope="col">Ime pijace</th>
            <th scope="col">Stevilo kosov</th>
            <th scope="col">Ostatek</th>
        </tr>

        @foreach ($stocktakingDrinks as $drink)
            <tr>
                <td>{{ $drink->drinkName }}</td>
                <td>{{ $drink->drinkQuantity }}</td>
                <td>{{ $drink->drinkWeight }}</td>
            </tr>
        @endforeach

    </table>





@endsection
