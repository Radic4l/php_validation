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
                            <button class="btn btn-info" onclick="history.go(-1);">Back</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection