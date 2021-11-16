@extends('layouts.adminLayout')


<script>
    function activeStocktakingSearch() {
        var query = document.getElementById("search-input-active-stocktaking").value;

        window.location.href = "/active-stocktaking-search/" + query;
    }
</script>


@section('content')

        <!-- ALERT MESSAGES -->
        <x-alert-component />

    @if ($started_bool == false)
        <div class="custom-container" id="start-stocklisting">
            <button onclick="location.href='/zacni-popis'" id="zacni-popis-button"
                class="btn btn-success btn-circle btn-sm">Začni Popis</button>
        </div>
    @else



        <!-- SEARCH -->
        <div class="input-group mb-3">

            <!-- reset -->
            <button onclick="location.href='/aktivni-popis'" class="btn btn-warning"><i class="fa fa-close"></i></button>
            <input type="text" id="search-input-active-stocktaking" class="form-control">

            <div class="input-group-append">
                <button onclick="activeStocktakingSearch()" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </div>
        </div>



        <!-- back to top button -->
        <a id="back-to-top-button"></a>

        <div class="drinks-container">

            @foreach ($drinks as $drink)

                <div class="card drink-card">
                    <div class="drink-header">
                        {{ $drink->drinkName }}
                    </div>

                    <div class="card-body drink-body">

                        <!-- KOLICINA -->
                        @if (is_null($drink->drinkQuantity))
                            <div class="drink-quanitity">

                                <div class="name">
                                    <span>Kos</span>
                                </div>

                                <div class="drink-input">
                                    <input type="number" id="quantity-{{ $drink->drinkID }}" name="drink-quantity"
                                        class="form-control drink-input-field">
                                </div>

                                <div class="drink-button">
                                    <button onclick="submitQuantity({{ $drink->drinkID }})"
                                        class="btn btn-success">Ok</button>
                                </div>
                            </div>
                        @endif

                        @if (is_null($drink->drinkWeight))
                            <div class="drink-weight">

                                <div class="name">
                                    <span>Teza</span>
                                </div>

                                <div class="drink-input">
                                    <input type="number" step="0.001" id="weight-{{ $drink->drinkID }}"
                                        name="drink-weight" class="form-control drink-input-field">
                                </div>

                                <div class="drink-button">
                                    <button onclick="submitWeight({{ $drink->drinkID }})"
                                        class="btn btn-success">Ok</button>
                                </div>

                            </div>
                        @endif
                    </div>
                </div>

            @endforeach

        </div>



    @endif
@endsection
