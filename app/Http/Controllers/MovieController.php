<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        return Movie::with('genres')->get()->map(function ($movie) {
            return [
                'id' => $movie->id,
                'title' => $movie->title,
                'release_year' => $movie->release_year,
                'genres' => $movie->genres->pluck('name')->values(),
            ];
        });
    }

    public function show($id)
    {
        $movie = Movie::with('genres')->findOrFail($id);
        return [
            'id' => $movie->id,
            'title' => $movie->title,
            'release_year' => $movie->release_year,
            'genres' => $movie->genres->pluck('name')->values(),
        ];
    }

    public function store(Request $request)
    {
        $movie = Movie::create($request->only(['title', 'release_year']));
        if ($request->has('genre_ids')) {
            $movie->genres()->sync($request->genre_ids);
        }

        return [
            'id' => $movie->id,
            'title' => $movie->title,
            'release_year' => $movie->release_year,
            'genres' => $movie->genres->pluck('name')->values(),
        ];
    }

    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($request->only(['title', 'release_year']));
        if ($request->has('genre_ids')) {
            $movie->genres()->sync($request->genre_ids);
        }

        return [
            'id' => $movie->id,
            'title' => $movie->title,
            'release_year' => $movie->release_year,
            'genres' => $movie->genres->pluck('name')->values(),
        ];
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->genres()->detach();
        $movie->delete();

        return response()->json(['message' => 'Movie deleted']);
    }
}