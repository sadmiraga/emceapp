@extends("layouts.adminLayout")
@section('content')

    <div class="container" id="drinks-index-container">

        <!-- SEARCH -->
        <div class="form-group">
            <input id="myInput" class="form-control" type="text" placeholder="Search..">
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Ime</th>
                        <th scope="col">Cena</th>
                        <th scope="col">Kategorija</th>
                        <th scope="col">Embelaža </th>
                        <th scope="col"># </th>

                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach ($drinks as $drink)
                        <tr>
                            <td>{{ $drink->name }}</td>
                            <td>{{ $drink->price . '€' }}</td>
                            <td>{{ $drink->categoryName }}</td>

                            @if (is_null($drink->packing_weight))
                                <td>{{ '#' }}</td>
                            @else
                                <td>{{ $drink->packing_weight . ' Kg' }}</td>
                            @endif

                            <td>
                                <!-- EDIT -->
                                <button onclick="location.href='/uredi-pijaco/{{ $drink->id }}'"
                                    class="btn btn-primary">Uredi</button>

                                <!-- DELETE -->
                                <button onclick="location.href='/izbrisi-pijaco/{{ $drink->id }}'"
                                    class="btn btn-danger">Izbrisi</button>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <button onclick="location.href='/dodaj-pijaco'" class="btn btn-success">Dodaj Pijačo</button>


    </div> <!-- end CONTAINER -->


    <!-- live search script -->
    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

    </script>

@endsection
