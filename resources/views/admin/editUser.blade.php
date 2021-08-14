@extends('layouts.adminLayout')

@section('content')




    <div class="card custom-user-card">

        <!-- head -->
        <div class="card-header">
            {{ $user->firstName . ' ' . $user->lastName }}
        </div>


        {!! Form::open(['url' => '/editUserExe', 'method' => 'post', 'enctype' => 'multipart/form-data']) !!}
        <!-- body -->
        <div class="card-body">
            <div class="form-group">
                <select class="form-control" name="type_id" id="typeID" aria-label="Default select example">
                    @foreach ($userTypes as $userType)
                        <option @if ($userType->id == $user->type_id) selected @endif value="{{ $userType->id }}">{{ $userType->userType }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <div class="type-description">
                    <p id="description-container">
                        {{ $selectedUserType->description }}
                    </p>
                </div>
            </div>

            <input type="hidden" value="{{ $user->id }}" name="userID">

            <!-- submit -->
            <div class="form-group">
                <button class="btn btn-success fullwidth" type="submit">Shrani</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>


    <script>
        //dynamic oblika field
        $('#typeID').change(function() {
            $("#description-container").empty();

            var typeID = $(this).val();

            $.ajax({
                type: "GET",
                url: "{{ url('getDescription') }}?typeID=" + typeID,
                success: function(res) {
                    if (res) {

                        $.each(res, function(key, value) {

                            $("#description-container").append(value);
                        });

                    } else {
                        $("#description-container").empty();
                    }
                }
            });

        });
    </script>






@endsection
