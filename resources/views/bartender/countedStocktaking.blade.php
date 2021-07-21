@extends('layouts.adminLayout')


@section('content')






    <div class="input-group mb-3"> <input type="text" class="form-control">
        <div class="input-group-append"><button class="btn btn-primary"><i class="fa fa-search"></i></button>
        </div>
    </div>

    <button class="btn btn-success">Oddaj popis</button>

    <script>
        function submitQuantity(drinkID) {
            //var quantityValue

            var inputName = "quantity-" + drinkID;
            var quantityValue = document.getElementById(inputName).value;

            if (!quantityValue) {
                alert("nema vrijednosti");
            } else {
                var link = 'additional-add-quantity/' + drinkID + '/' + quantityValue;
                window.location.href = link;
            }
        }


        function submitWeight(drinkID) {
            var inputName = "weight-" + drinkID;
            var weightValue = document.getElementById(inputName).value;

            if (!weightValue) {
                alert("nema vrijednosti");
            } else {
                var link = 'additional-add-weight/' + drinkID + '/' + weightValue;
                window.location.href = link;
            }

        }
    </script>



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
