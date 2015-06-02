@extends('app')
@section('content')

    <h1>Movies</h1>

    @foreach($movies as $movie)
        <article>
            <h2>
                <a href="{{ action('MoviesController@show', [$movie->id]) }}">{{ $movie->title }}</a>
            </h2>
            <div class="body">{{ $movie->description }}</div>
        </article>
        <hr>
    @endforeach

    <br><br><br>
    <a href="{{ url('/movie/create') }}" class="btn btn-default">New Movie</a>

@stop