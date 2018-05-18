@extends('layouts.app')

@section('content')

        <div  class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ $project->nom }}</div>
                        <div class="card-body">
                            <div class="form-group">
                                <p> description : {{ $project->descriptif }}</p>
                                <br>
                                <br>
                                <p>Auteur : </p> {{ $project->getUserAuteur()}} <br>
                                <p>Date de Création : </p> {{ $project->created_at }}
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-info" onclick="history.go(-1);">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection