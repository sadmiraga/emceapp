@extends("layouts.adminLayout")


@section('content')

    <div class="card">

        <!-- head -->
        <div class="card-header">
            {{ "Urejanje '" . $drink->name . "'" }}
        </div>


        {!! Form::open(['url' => '/uredi-pijaco-exe', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        <!-- body -->
        <div class="card-body">

            <input type="hidden" value="{{ $drink->id }}" name="drinkID">


            <!-- DRINK NAME -->
            <div class="form-group">
                <div class="form-input">
                    <input required class="form-control" name="drinkName" placeholder="Vnesite ime pijače"
                        value="{{ $drink->name }}">
                </div>
            </div>


            <!-- DRINK PRICE -->
            <div class="input-group mb-3">
                <input required type="number" step=".01" name="drinkPrice" class="form-control"
                    value="{{ $drink->price }}" placeholder="Vnesite ceno pijače">
                <div class="input-group-append">
                    <span class="input-group-text">€</span>
                </div>
            </div>

            <!-- DRINK CATEGORY -->
            <div class="form-group">
                <select class="form-control" name="category_id" aria-label="Default select example">
                    <option value="0" selected disabled>Izberi kategorijo pijače</option>
                    @foreach ($drinkCategories as $drinkCategory)

                        @if ($drink->category_id == $drinkCategory->id)
                            <option selected value="{{ $drinkCategory->id }}"> {{ $drinkCategory->categoryName }}
                            </option>
                        @else
                            <option value="{{ $drinkCategory->id }}"> {{ $drinkCategory->categoryName }} </option>
                        @endif


                    @endforeach
                </select>
            </div>

            <!-- DRINK WEIGHTABLE CHECKBOX -->
            <div class="form-group">
                <div class="custom-control custom-switch">

                    @if (is_null($drink->packing_weight))
                        <input type="checkbox" id="weightableCheckbox" name="weightableCheckbox"
                            class="custom-control-input" onchange="enableWeight();">
                    @else
                        <input type="checkbox" checked id="weightableCheckbox" name="weightableCheckbox"
                            class="custom-control-input" onchange="enableWeight();">
                    @endif

                    <label class="custom-control-label" for="weightableCheckbox">Za tehtati</label>
                </div>
            </div>


            <!-- DRINK PACKING WEIGHT -->
            @if (is_null($drink->packing_weight))
                <div style="display:none;" class="input-group mb-3" id="drink-packing-weight-div">
                @else
                    <div class="input-group mb-3" id="drink-packing-weight-div">
            @endif

            <input type="number" step=".01" name="packingWeight" id="packingWeight" value="{{ $drink->packing_weight }}"
                class="form-control" placeholder="Vnesite težo embelaže">

            <div class="input-group-append">
                <span class="input-group-text">Kg</span>
            </div>

        </div>





        <!-- SUBMIT -->
        <div class="form-group">
            <button class="btn btn-success" type="submit">Shrani</button>
        </div>
    </div>
    {!! Form::close() !!}
    </div>

@endsection
