@extends('layouts.adminLayout')

@section('content')




    <div class="card">

        <!-- head -->
        <div class="card-header">
            {{ $user->firstName . ' ' . $user->lastName }}
        </div>


        {!! Form::open(['url' => '/editUserExe', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        <!-- body -->
        <div class="card-body">
            <div class="form-group">
                <select class="form-control" name="type_id" aria-label="Default select example">
                    @foreach ($userTypes as $userType)
                        <option @if ($userType->id == $user->type_id) selected @endif value="{{ $userType->id }}">{{ $userType->userType }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <div class="type-description">
                    {{ $userType->userType }}
                </div>
            </div>

            <input type="hidden" value="{{ $user->id }}" name="userID">

            <!-- submit -->
            <div class="form-group">
                <button class="btn btn-success" type="submit">Shrani</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>






@endsection
