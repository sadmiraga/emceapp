@extends("layouts.adminLayout")


@section('content')


    <div class="container-fluid">

        <div class="row" id="menus-container">

            @foreach ($drinkCategories as $drinkCategory)
                <div onclick="location.href='/uredi-meni/{{ $drinkCategory->id }}'" class="card" id="menu-card">
                    <div class="card-body">
                        {{ $drinkCategory->categoryName . ' Meni' }}

                    </div>
                </div>
            @endforeach

        </div>
    </div>


@endsection
