@extends('layouts.app')

@section('content')
    <h1>Admin panel</h1><br>

    <h4>user list :</h4>
    @foreach($users as $user)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Id : {{ $user->id }}</div>
                        <div class="card-body">
                            <div class="form-group">
                                <p> Role : {{ $user->role }} <br> Firstname : {{ $user->firstname }} Lastname : {{ $user->lastname }} registration date : {{ $user->created_at }}</p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('show.profile', ['id' => $user->id])  }}" class="btn btn-info" role="button">View profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <br>
    @endforeach

    @endsection