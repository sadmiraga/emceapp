@extends("layouts.adminLayout")


@section('content')

    <img id="menu-cover" src="https://kunigunda.si/wp-content/uploads/2019/07/rsz_kuni1-1-800x534.jpg" class="img-fluid"
        alt="Responsive image">



    <div class="row">

        @foreach ($drinkCategories as $drinkCategory)
            <div class="card" style="width: 30%;margin-top:2%">
                <div class="card-body">
                    {{ $drinkCategory->categoryName . ' Meni' }}

                </div>
            </div>
        @endforeach
    </div>


@endsection
