<?php

namespace App\Http\Controllers;

use App\Models\Celebrity;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class MovieController extends Controller
{
    public function index() //print all data in Moives database
    {

        return view('movies.index', [
            'movies' => Movie::orderBy('title', 'ASC')
            ->orderBy('release_date', 'DESC')
            ->paginate(25)
        ]);

    }

    public function show(Movie $movie)
    {
        $movie->load(['celebrities', 'genres']);
        return view('movies.show', compact('movie'));
    }

    public function create()
    {
        $celebrities = Celebrity::select('id', 'name')->get();
        $genres = Genre::select('id', 'type')->get();
        return view('movies.create')->with(['celebrities' => $celebrities, 'genres'=>$genres]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'genres' => ['required', 'array'],
            'celebrities' => ['required', 'array'],
            'title' => ['required', 'string', 'min:3'],
            'release_date' => ['required', 'date'],
            'poster' => ['required', 'string', 'min:16'],
            'trailer' => ['required', 'string', 'min:16'],
            'blurb' => ['required', 'string', 'max:500'],
        ]);

        $movie = Movie::create([
            'title' => $request->input('title'),
            'release_date' => $request->input('release_date'),
            'poster' => $request->input('poster'),
            'trailer' => $request->input('trailer'),
            'blurb' => $request->input('blurb'),
        ]);

        $genres = $request->input('genres');
        $celebrities = $request->input('celebrities');

        $movie->genres()->syncWithoutDetaching($genres);
        $movie->celebrities()->syncWithoutDetaching($celebrities);

        return redirect()->route('movies.index')->with('success', 'New movie has been added to the website');

    }

    public function edit(Movie $movie)
    {
        $celebrities = Celebrity::select('id', 'name')->get();
        $genres = Genre::select('id', 'type')->get();
        return view('movies.edit', compact('movie'))->with(['celebrities' => $celebrities, 'genres'=>$genres]);
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'genres' => ['required', 'array'],
            'celebrities' => ['required', 'array'],
            'title' => ['required', 'string', 'min:3'],
            'release_date' => ['required', 'date'],
            'poster' => ['required', 'string', 'min:16'],
            'trailer' => ['required', 'string', 'min:16'],
            'blurb' => ['required', 'string', 'max:500'],
        ]);

        $movie->update([
            'title'=> $request->input('title'),
            'release_date'=> $request->input('release_date'),
            'poster'=> $request->input('poster'),
            'trailer'=> $request->input('trailer'),
            'blurb'=> $request->input('blurb')
        ]);

        $genres = $request->input('genres');
        $celebrities = $request->input('celebrities');

        $movie->genres()->sync($genres);
        $movie->celebrities()->sync($celebrities);

        return redirect()->route('movies.show', $movie)->with('success', 'Selected movie has been updated successfully');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Slected movie has been removed from website');
    }

}
