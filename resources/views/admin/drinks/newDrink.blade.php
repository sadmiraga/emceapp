@extends("layouts.adminLayout")

@section('admin-title')
    <h2 class="admin-header">{{ 'Dodaj pijaco' }}</h2>
@endsection

@section('content')


    <div class="card">

        <!-- head -->
        <div class="card-header">
            {{ 'Dodaj Pijačo' }}
        </div>


        {!! Form::open(['url' => '/dodaj-pijaco-exe', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        @csrf
        <div class="card-body">


            <!-- DRINK NAME -->
            <div class="form-group">
                <div class="form-input">
                    <input required class="form-control" name="drinkName" placeholder="Vnesite ime pijače">
                </div>
            </div>

            <!-- CODE -->
            <div class="form-group">
                <div class="form-input">
                    <input required class="form-control" name="drinkCode" placeholder="Vnesite šifro pijače">
                </div>
            </div>

            <!-- ENME -->
            <div class="form-group">
                <select class="form-control" onchange="packingSizeDisplay();" id="enme" name="enme"
                    aria-label="Default select example">
                    <option value="0" selected disabled>Merna enota</option>
                    <option value="KG"> Kilogram </option>
                    <option value="KOM"> Kos </option>
                    <option value="LIT"> Liter </option>
                </select>
            </div>


            <script>
                function packingSizeDisplay() {
                    var packingSize = document.getElementById("packingSize");
                    var value = document.getElementById("enme").value;

                    if (value == "LIT") {
                        packingSize.style.display = "block";
                        packingSize.required = true;
                    } else {
                        packingSize.style.display = "none";
                        packingSize.required = false;
                    }
                }
            </script>

            <!-- PACKING SIZE -->
            <div class="form-group">
                <input required type="number" step=".1" name="packingSize" id="packingSize" class="form-control"
                    placeholder="Vnesite velikost embelaže">
            </div>



            <!-- DRINK PRICE -->
            <div class="input-group mb-3">
                <input required type="number" step=".01" name="drinkPrice" class="form-control"
                    placeholder="Vnesite ceno pijače">
                <div class="input-group-append">
                    <span class="input-group-text">€</span>
                </div>
            </div>

            <!-- DRINK CATEGORY -->
            <div class="form-group">
                <select class="form-control" name="category_id" aria-label="Default select example">
                    <option value="0" selected disabled>Izberi kategorijo pijače</option>
                    @foreach ($drinkCategories as $drinkCategory)
                        <option value="{{ $drinkCategory->id }}"> {{ $drinkCategory->categoryName }} </option>
                    @endforeach
                </select>
            </div>

            <!-- DRINK WEIGHTABLE CHECKBOX -->
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" checked id="weightableCheckbox" name="weightableCheckbox"
                        class="custom-control-input" onchange="enableWeight();">
                    <label class="custom-control-label" for="weightableCheckbox">Za tehtati</label>
                </div>
            </div>


            <!-- DRINK PACKING WEIGHT -->
            <div class="input-group mb-3" id="drink-packing-weight-div">

                <input type="number" step=".01" name="packingWeight" id="packingWeight" class="form-control"
                    placeholder="Vnesite težo embelaže">

                <div class="input-group-append">
                    <span class="input-group-text">Kg</span>
                </div>

            </div>



            <!-- DISPLAY ON MENU -->
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" checked id="displayOnMenuCheckbox" name="displayOnMenuCheckbox"
                        class="custom-control-input">
                    <label class="custom-control-label" for="displayOnMenuCheckbox">Prikazi na meniju</label>
                </div>
            </div>




            <!-- SUBMIT -->
            <div class="form-group">
                <button class="btn btn-success" type="submit">Dodaj</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection
