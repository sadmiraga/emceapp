@extends('layouts.adminLayout')

@section('admin-title')
    <h2 class="admin-header">Preštete pijače</h2>
@endsection

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

    <!-- back to top button -->
    <a id="back-to-top-button"></a>

    <div class="row confirm-cancel-container" style="justify-content:flex-end !important;">

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
                                <button onclick="submitAdditionalQuantity({{ $drink->drinkID }})" class="btn btn-success">
                                    <i class="fas fa-plus"></i>
                                </button>
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
                                <button onclick="submitAdditionalWeight({{ $drink->drinkID }})" class="btn btn-success">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>

                        </div>
                    @endif

                </div>
            </div>

        @endforeach

    </div>


@endsection
