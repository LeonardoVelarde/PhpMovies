@extends('app')
@section('content')
    <h1>Edit Movie</h1>
    {!! Form::model($movie, ['method'=>'PATCH', 'action' => ['MoviesController@update', $movie->id]]) !!}
    {!! Form::label('name','Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
    <br>
    {!! Form::label('category', 'Category') !!}
    {!! Form::select('category' ,array('Sci-fi' => 'Sci-fi','Comedy' => 'Comedy', 'Drama' => 'Drama', 'Terror' => 'Terror'), 'Category', ['class' => 'form-control']) !!}
    <br>
    {!! Form::label('name','Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    <br><br>
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@stop