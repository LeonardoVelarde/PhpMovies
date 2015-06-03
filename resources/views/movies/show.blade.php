@extends('app')
@section('content')

    <h1>{{ $movie->title }}</h1>
    <div class="body">
        {{ $movie->description }}

        <br><br>
        <strong>Category: </strong>{{ $movie->category }}

        <br><br>
        <strong>Rating: </strong>{{ $rating }}
    </div>

    <br><br>

    {!! Form::open(array('route' => array('movie.destroy', $movie->id), 'method' => 'delete')) !!}
    <button type="submit" class="btn btn-danger">Delete movie</button><a href="{{ $movie->id }}/edit" style="display:inline;" class="btn btn-default">Edit</a>
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

                <div class="like">
                    <strong style="display: inline;">
                        &nbsp;&nbsp;&nbsp;&nbsp;Likes: {{ $review->likes->count() }}
                    </strong>

                    @if($review->likes->where('user_id', (string)Auth::id())->count() ==0)
                        {!! Form::open(['url' => 'like']) !!}
                        {!! Form::hidden('review_id', $review->id) !!}
                        {!! Form::hidden('user_id', Auth::id()) !!}
                        &nbsp;&nbsp;&nbsp;&nbsp;{!! Form::submit('Like', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    @else
                        {!! Form::open(['url' => 'dislike']) !!}
                        {!! Form::hidden('review_id', $review->id) !!}
                        {!! Form::hidden('id', $review->likes->where('user_id', (string)Auth::id())->first()['id'] ) !!}
                        &nbsp;&nbsp;&nbsp;&nbsp;{!! Form::submit('Dislike', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>

                <br><br>
            @endforeach
        @endunless

        {!! Form::open(['url' => 'review']) !!}
        {!! Form::close() !!}

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