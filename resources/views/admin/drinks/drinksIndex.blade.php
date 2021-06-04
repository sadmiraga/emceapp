@extends("layouts.adminLayout")
@section('content')

    <button onclick="location.href='/dodaj-pijaco'" class="btn btn-success">Dodaj Pijačo</button>




    <div class="container">




        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Ime</th>
                    <th>Cena</th>
                    <th>Kategorija</th>
                    <th>Teža Embelaže</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($drinks as $drink)
                    <tr>
                        <td>{{ $drink->name }}</td>
                        <td>{{ $drink->price }}</td>
                        <td>{{ $drink->category_id }}</td>


                        @if (is_null($drink->packing_weight))
                            <td>{{ 'X' }} </td>
                        @else
                            <td>{{ $drink->packing_weight . ' Kg' }}</td>
                        @endif



                    </tr>
                @endforeach

            </tbody>
        </table>
        <!-- pages -->
        <div class="table-responsive mb-2">
            <div class="mx-auto">
                {{ $drinks->links('pagination::bootstrap-4') }}
            </div>
        </div>

    </div>

@endsection
