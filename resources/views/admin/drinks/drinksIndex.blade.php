@extends("layouts.adminLayout")

@section('admin-title')
    <h2 class="admin-header">pijace</h2>
@endsection

@section('content')

    <div class="container" id="drinks-index-container">

        <!-- SEARCH -->
        <div class="form-group new-drink-form">
            <div onclick="location.href='/dodaj-pijaco'" class="add-new-drink-button">
                <i class="fas fa-plus"></i>
            </div>
            <input id="myInput" class="form-control" type="text" placeholder="Iskanje..">
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

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
                                <div onclick="location.href='/uredi-pijaco/{{ $drink->id }}'" class="add-new-event">
                                    <i class="fas fa-cog"></i>
                                </div>


                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



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
