<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    public function index()
    {
        return Genre::all();
    }

    public function show($id)
    {
        $genre = Genre::with('movies')->findOrFail($id);
        return [
            'id' => $genre->id,
            'name' => $genre->name,
            'movies' => $genre->movies->map(function ($movie) {
                return [
                    'id' => $movie->id,
                    'title' => $movie->title,
                ];
            }),
        ];
    }
}
