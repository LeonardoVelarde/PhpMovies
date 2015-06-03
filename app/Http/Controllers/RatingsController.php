<?php namespace App\Http\Controllers;

use App\Rating;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

class RatingsController extends Controller {

	function store(Request $request){
        $input = $request::all();
        Rating::create($input);
        return view('movie.index');
    }

}
