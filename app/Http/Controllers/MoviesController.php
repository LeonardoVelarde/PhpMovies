<?php namespace App\Http\Controllers;

use App\Movie;
use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Http\Requests\StoreMovieRequest;

class MoviesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$movies = Movie::all();
        return view('movies.index', compact('movies'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('movies.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(StoreMovieRequest $request)
	{
		$input = $request::all();
        Movie::create($input);
        return redirect('movie');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$movie = Movie::findOrFail($id);
        $reviews = $movie->reviews;
        $ratings = $movie->ratings;
        $sum = 0;
        if($ratings->count() > 0)
        {
            foreach ($ratings as $rating)
            {
                $sum = $sum + (int)$rating->score;
            }
            $sum = $sum / $ratings->count();
        }
        else
        {
            $sum = 0;
        }
        return view('movies.show')->with(['movie' => $movie, 'reviews' => $reviews, 'rating' => $sum]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $movie = Movie::findOrFail($id);
        return view('movies.edit', compact('movie'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, StoreMovieRequest $request)
	{
        $movie = Movie::findOrFail($id);
        $input = $request::all();
        $movie->update($input);
        return redirect('movie');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Movie::destroy($id);
        return redirect('movie');
	}

}
