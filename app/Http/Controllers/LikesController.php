<?php namespace App\Http\Controllers;

use App\Like;
use App\Review;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

class LikesController extends Controller {

    function like(Request $request){
        $input = $request::all();
        Like::create($input);
        $movie_id = Review::find($input['review_id'])->movie_id;
        return redirect('movie/' . (string)$movie_id);
    }

    function dislike(Request $request){
        $input = $request::all();
        $movie_id = Review::find($input['review_id'])->movie_id;
        Like::destroy($input['id']);
        return redirect('movie/' . (string)$movie_id);
    }

}
