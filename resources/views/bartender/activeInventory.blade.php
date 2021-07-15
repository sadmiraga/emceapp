@extends('layouts.adminLayout')


@section('content')


    @if ($started_bool == false)
        <div class="custom-container" id="start-stocklisting">
            <button onclick="location.href='/zacni-popis'" id="zacni-popis-button"
                class="btn btn-success btn-circle btn-sm">Začni Popis</button>
        </div>
    @else




        <div class="input-group mb-3"> <input type="text" class="form-control">
            <div class="input-group-append"><button class="btn btn-primary"><i class="fa fa-search"></i></button>
            </div>
        </div>



        <div class="drinks-container">

            @foreach ($drinks as $drink)

                <div class="card drink-card">
                    <div class="drink-header">
                        {{ $drink->name }}
                    </div>

                    <div class="card-body drink-body">

                        <!-- KOLICINA -->
                        <div class="drink-quanitity">

                            <div class="name">
                                <span>Kos</span>
                            </div>

                            <div class="drink-input">
                                <input type="text" name="drink-quantity" class="drink-input-field">
                            </div>

                            <div class="drink-button">
                                <button class="btn btn-success">Ok</button>
                            </div>


                        </div>

                        @if ($drink->weightable == true)
                            <div class="drink-weight">

                                <div class="name">
                                    <span>Teza</span>
                                </div>

                                <div class="drink-input">
                                    <input type="text" name="drink-weight" class="drink-input-field">
                                </div>

                                <div class="drink-button">
                                    <button class="btn btn-success">Ok</button>
                                </div>

                            </div>
                        @endif
                    </div>
                </div>

            @endforeach

        </div>

    @endif
@endsection
