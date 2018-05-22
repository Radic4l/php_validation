@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit my Project</div>

                    <div class="card-body">

                        {{ Form::open(array('route' => 'update.project')) }}
                        <div class="form-group">
                            {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
                            {!! Form::text('nom', $project->nom, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description:', ['class' => 'control-label']) !!}
                            {!! Form::textarea('descriptif', $project->descriptif, ['class' => 'form-control']) !!}
                        </div>

                        {!! Form::submit('Update project', ['class' => 'btn btn-primary']) !!}
                        <button class="btn btn-info" onclick="history.go(-1);">Back</button>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop