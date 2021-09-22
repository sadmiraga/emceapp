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
        <input type="text" id="search-input-counted-stocktaking" class="form-control">

        <div class="input-group-append">
            <button onclick="countedStocktakingSearch()" class="btn btn-primary"><i class="fa fa-search"></i></button>
        </div>
    </div>

    <!-- success message -->
    @if (session()->has('successMessage'))
        <div style="text-align:center;" class="alert alert-success">
            {{ session()->get('successMessage') }}
        </div>
    @endif

    <!-- error message -->
    @if (session()->has('errorMessage'))
        <div style="text-align:center;" class="alert alert-danger">
            {{ session()->get('errorMessage') }}
        </div>
    @endif

    <button class="btn btn-success">Oddaj popis</button>

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
