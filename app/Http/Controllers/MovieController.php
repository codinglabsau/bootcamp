<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Movie;
use Illuminate\Http\Request;

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
        $request->validate([
            'title' => ['required', 'string', 'min:3'],
            'release_date' => ['required', 'date'],
            'poster' => ['required', 'string', 'min:16'],
            'trailer' => ['required', 'string', 'min:16'],
            'blurb' => ['required', 'string']
        ]);

        Movie::create([
            'title' => request()->input('title'),
            'release_date' => Carbon::parse(request()->input('release_date'))->format('d-m-Y'),
            'poster' => request()->input('poster'),
            'trailer' => request()->input('trailer'),
            'blurb' => request()->input('trailer')
        ]);

        return redirect()->route('movies.index')->with('success', 'Movie added');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Movie successfully deleted');
    }

}
