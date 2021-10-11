@extends("layouts.adminLayout")

@section('admin-title')
    <h2 class="admin-header">{{ 'Uredi ' . $categoryName . ' meni' }}</h2>

@endsection

@section('content')

    <div class="container-fluid">

        <div class="row" id="menus-container">

            @foreach ($drinks as $drink)
                <div class="card" id="menu-drink">
                    <div class="card-body">

                        <div onclick="location.href='/spremeni-pozicijo/down/{{ $drink->drink_id }}/{{ $drink->category_id }}'"
                            id="down-arrows" class="arrows-container">
                            <i class="fa fa-arrow-down"></i>
                        </div>

                        <span class="menu-drink-name">{{ $drink->name }}</span>


                        <div onclick="location.href='/spremeni-pozicijo/up/{{ $drink->drink_id }}/{{ $drink->category_id }}'"
                            id="up-arrows" class="arrows-container">
                            <i class="fa fa-arrow-up"></i>
                        </div>


                    </div>
                </div>
            @endforeach

        </div>
    </div>



@endsection
