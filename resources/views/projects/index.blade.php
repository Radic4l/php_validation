@extends('layouts.app')

@section('content')

    @foreach($projects as $project)
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