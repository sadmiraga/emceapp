@extends("layouts.adminLayout")


@section('content')


    {!! Form::open(['url' => '/spremeni-banner', 'method' => 'post', 'enctype' => 'multipart/form-data', 'files' => 'true']) !!}

    {!! Form::close() !!}



    <div class="image-container">
        <div class="image-sub-container">
            <img id="menu-cover" src="https://i.pinimg.com/originals/38/b6/06/38b60656850e6d1948eb0280ed2388a8.png"
                alt="Snow" style="width:100%" class="img-fluid">
            <button class="btn"><i class="fa fa-edit"></i></button>
        </div>
    </div>









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
