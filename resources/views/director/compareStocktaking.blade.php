@extends('layouts.adminLayout')
@section('content')


    <h2 class="thin-heading">Primerjaj popis ({{ $stocktaking->start . ' ' . $user->firstName . ' ' . $user->lastName }})
    </h2>

    <div class="card-body compare-container">
        {!! Form::open(['url' => '/primerjaj-popis-exe', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        @csrf

        <label>Izberite excel mapo iz programa</label>
        <input type="file" required name="excelFile">

        <input type="hidden" name="stocktakingID" value="{{ $stocktaking->id }}">

        <input type="submit" value="PRIMERJAJ" class="btn btn-success">


        {!! Form::close() !!}
    </div>


@endsection
