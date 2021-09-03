<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\DocBlock\Tag;

class MovieController extends Controller
{
    public function index() //print all data in Moives database
    {
        return view('movies.index', [
            'movies' => Movie::all()
        ]);
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
        // similar to return view('movies.show', $movie=>movie);
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        Movie::create($request->validate([
            'title' => ['required', 'string', 'min:1'],
            ])
        );
        return redirect()->route('movies.index')->with('success', 'Movie added');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie successfully deleted');
    }

}
