@extends('app')
@section('content')

    <h1>Register a new movie</h1>

    <hr>

    {!! Form::open(['url' => 'movie']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title: ') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Description') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category', 'Category') !!}
            {!! Form::select('category' ,array('Sci-fi' => 'Sci-fi','Comedy' => 'Comedy', 'Drama' => 'Drama', 'Terror' => 'Terror'), 'Category', ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Register Movie', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}

@stop