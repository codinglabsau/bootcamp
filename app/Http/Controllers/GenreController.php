<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    //
    public function show(Genre $genre)
    {
        $genre->load('movies');
        return view('genre.show', compact('genre'));
    }

    public function create()
    {
        return view('genres.create');
    }

    public function store(Request $request)
    {
        Genre::create(
            $request->validate([
            'type' => ['required', 'string', 'min:3'],
            ]));

        return redirect()->route('genres.index')->with('success', 'New movie has been added to the website');

    }

    public function destroy(Genre $genre)
    {
        $genre->delete();

        return redirect()->route('genres.index')->with('success', 'Selected movie has been removed from website');
    }
}
