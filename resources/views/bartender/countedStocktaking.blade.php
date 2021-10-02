@extends('layouts.adminLayout')

<script>
    function countedStocktakingSearch() {
        var query = document.getElementById("search-input-counted-stocktaking").value;

        window.location.href = "/counted-stocktaking-search/" + query;
    }
</script>

@section('content')


    <!-- SEARCH -->
    <div class="input-group mb-3">
        <!-- reset -->
        <button onclick="location.href='/prestete-pijace'" class="btn btn-warning"><i class="fa fa-close"></i></button>

        <input type="text" id="search-input-counted-stocktaking" class="form-control">

        <div class="input-group-append">
            <button onclick="countedStocktakingSearch()" class="btn btn-primary"><i class="fa fa-search"></i></button>
        </div>
    </div>

    <!-- ALERT MESSAGES -->
    <x-alert-component />

    <div class="row confirm-cancel-container">
        <button onclick="location.href='/oddaj-popis'" class="btn btn-danger">Preklici popis</button>
        <button onclick="location.href='/oddaj-popis'" class="btn btn-success">Oddaj popis</button>
    </div>

    <div class="drinks-container">

        @foreach ($drinks as $drink)

            <div class="card drink-card">
                <div class="drink-header">
                    {{ $drink->drinkName }}
                </div>

                <div class="card-body drink-body">

                    <!-- KOLICINA -->
                    @if (!is_null($drink->drinkQuantity))
                        <div class="drink-quanitity">

                            <div class="name">
                                <span>Kos: {{ $drink->drinkQuantity }}</span>
                            </div>

                            <div class="drink-input">
                                <input type="number" id="quantity-{{ $drink->drinkID }}" name="drink-quantity"
                                    class="form-control drink-input-field">
                            </div>

                            <div class="drink-button">
                                <button onclick="submitQuantity({{ $drink->drinkID }})"
                                    class="btn btn-success">Dodaj</button>
                            </div>
                        </div>
                    @endif



                    @if (!is_null($drink->drinkWeight) and $drink->drinkWeight != 0)

                        <div class="drink-weight">

                            <div class="name">
                                <span>Teza: {{ $drink->drinkWeight }} kg</span>
                            </div>

                            <div class="drink-input">
                                <input type="number" step="0.001" id="weight-{{ $drink->drinkID }}" name="drink-weight"
                                    class="form-control drink-input-field">
                            </div>

                            <div class="drink-button">
                                <button onclick="submitWeight({{ $drink->drinkID }})"
                                    class="btn btn-success">Dodaj</button>
                            </div>

                        </div>
                    @endif

                </div>
            </div>

        @endforeach

    </div>


@endsection
