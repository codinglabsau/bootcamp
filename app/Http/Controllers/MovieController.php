<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index() //print all data in Moives database
    {
        return view('movies.index', [
            'movies' => Movie::orderBy('title', 'ASC')
            ->orderBy('release_date', 'DESC')
            ->paginate(5)
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
        Movie::create([
            $request->validate([
            'title' => ['required', 'string', 'min:3'],
            'release_date' => ['required', 'date'],
            'poster' => ['required', 'string', 'min:16'],
            'trailer' => ['required', 'string', 'min:16'],
            'blurb' => ['required', 'string', 'max:500']
            ])
        ]);

        return redirect()->route('movies.index')->with('success', 'Movie added');

    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $movie->update($request->validate([
            'title' => ['required', 'string', 'min:3'],
            'release_date' => ['required', 'date'],
            'poster' => ['required', 'string', 'min:16'],
            'trailer' => ['required', 'string', 'min:16'],
            'blurb' => ['required', 'string', 'max:500']
        ]));
        return redirect()->route('movies.show', $movie)->with('success', 'Movie added');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie successfully deleted');
    }

}
