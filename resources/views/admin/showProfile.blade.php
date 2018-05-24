@extends('layouts.app')

@section('content')

    <div  class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $profile->id }}</div>
                    <div class="card-body">
                        <div class="form-group">
                            <p>{{ $profile->lastname }}</p>
                            <br>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <p class="text-left">Auteur : {{ $profile->firstname}}</p><br>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-right">Date de Création : {{ $profile->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <button class="btn btn-info" onclick="history.go(-1);">Back</button>&nbsp;
                            {{ Form::open(array('route' => array('delete.user', $profile->id))) }}
                            {{ method_field('delete') }}
                            {!! Form::submit('Delete user', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center"><br><br>
        <h2>Projects de : {{ $profile->firstname}} {{ $profile->lastname }}</h2>
    </div><br><br>
        @foreach($profile->projects as $project)
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ $project->nom }}</div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <p> description : {{ $project->descriptif }} <br><br> auteur : {{ $project->getUserAuteur() }}</p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('show.project', ['id' => $project->id])  }}" class="btn btn-info" role="button">View project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
        @endforeach
@endsection