<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model {

    protected $fillable = [
        'score',
        'user_id',
        'movie_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function movie(){
        return $this->belongsTo('App\Movie');
    }

}
