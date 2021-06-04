@extends('layouts.adminLayout')

@section('content')

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ime</th>
                <th scope="col">Priimek</th>
                <th scope="col"> </th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->firstName }}</td>
                    <td>{{ $user->lastName }}</td>
                    <td>{{ $user->userType }}</td>
                    <td>
                        <button onclick="location.href='/uredi-zaposleni/{{ $user->id }}'"
                            class="btn btn-primary">Uredi</button>

                        <button class="btn btn-danger">Izbrši</button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>


@endsection
