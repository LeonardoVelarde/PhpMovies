<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model {

    protected $fillable = [
        'content',
        'movie_id',
        'user_id'
    ];

    public function movies()
    {
        return $this->belongsTo('App\Movie');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

}
