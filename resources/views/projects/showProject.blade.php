@extends('layouts.app')

@section('content')

        <div  class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ $project->nom }}</div>
                        <div class="card-body">
                            <div class="form-group">
                                <p>{{ $project->descriptif }}</p>
                                <br>
                                <br>

                                <div class="row">

                                <div class="col-md-6">
                                    <p class="text-left">Auteur : {{ $project->getUserAuteur()}}</p><br>
                                </div>

                                <div class="col-md-6">
                                    <p class="text-right">Date de Création : {{ $project->created_at }}</p>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <button class="btn btn-info" onclick="history.go(-1);">Back</button>
                                @if(Auth::user())
                                    @if(Auth::user()->id === $project->user_id)
                                        <a href="{{ route('edit.project', ['id' => $project->id])  }}" class="btn btn-dark" role="button">Edit project</a>
                                    {{ Form::open(array('route' => array('delete.project', $project->id))) }}
                                    {{ method_field('delete') }}
                                        {!! Form::submit('Delete project', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    @endif
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection