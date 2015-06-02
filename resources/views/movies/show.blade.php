@extends('app')
@section('content')

    <h1>{{ $movie->title }}</h1>
    <div class="body">
        {{ $movie->description }}
        <br><br>
        <strong>Rating: </strong>{{ $rating }}
    </div>

    <br><br>

    {!! Form::open(array('route' => array('movie.destroy', $movie->id), 'method' => 'delete')) !!}
    <button type="submit" class="btn btn-danger">Delete movie</button>
    {!! Form::close() !!}

    <br><br>
    <div class="review-container">
        <h3>Reviews</h3>
        <br>
        @unless(is_null($reviews))
            @foreach($reviews as $review)
                <strong style="display: inline;">
                    &nbsp;&nbsp;&nbsp;&nbsp;{{ $review->content }}
                </strong>
                - {{($review->user == null) ? 'NA' : $review->user->email}}
                <br><br>
            @endforeach
        @endif

        {!! Form::open(['url' => 'review']) !!}
        <div class="form-group">
            {!! Form::label('review', 'New review:') !!}
            {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
        </div>

        {!! Form::hidden('movie_id', $movie->id) !!}
        {!! Form::hidden('user_id', Auth::id()) !!}

        <div class="form-group">
            {!! Form::submit('Add Review', ['class' => 'btn btn-primary form-control']) !!}
        </div>
        {!! Form::close() !!}
    </div>

@stop