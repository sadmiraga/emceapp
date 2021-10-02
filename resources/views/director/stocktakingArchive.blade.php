@extends('layouts.adminLayout')

@section('content')


    <div class="table-responsive ">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Kelner</th>
                    <th scope="col">Zacetek</th>
                    <th scope="col">Konec</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($stocktakings as $stocktaking)

                    @if ($stocktaking->completed == true)
                        <tr class="stocktaking-table-row" onclick="location.href='/ogled-popisa/{{ $stocktaking->id }}'">
                        @else
                        <tr class="stocktaking-table-row unclickable">
                    @endif

                    <!-- bartender -->
                    <td>{{ $stocktaking->firstName . ' ' . $stocktaking->lastName }}</td>

                    <!-- stocktaking start -->
                    <td class="stocktaking-timestamp">
                        <p class="formated-timestamp">{{ date('d-m-Y', strtotime($stocktaking->start)) }}</p>
                        <p class="formated-timestamp">{{ date('H:i', strtotime($stocktaking->start)) }} </p>
                    </td>

                    <!-- stocktaking  end -->
                    <td>
                        <p class="formated-timestamp">{{ date('d-m-Y', strtotime($stocktaking->end)) }}</p>
                        <p class="formated-timestamp">{{ date('H:i', strtotime($stocktaking->end)) }} </p>
                    </td>

                    <!-- completed  -->
                    @if ($stocktaking->completed == true)

                        <td><i class="fa fa-check-circle"></i></td>
                    @elseif($stocktaking->completed == false)
                        <td><i class="fas fa-user-clock"></i></td>

                    @endif

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
