<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model {

	protected $fillable = [
        'title',
        'description',
        'category'
    ];

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

}
