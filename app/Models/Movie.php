<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'release_year'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_movie');
    }
}