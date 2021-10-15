<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Celebrity;
use Illuminate\Http\Request;

class CelebrityController extends Controller
{
    public function index()
    {
        return view('celebrities.index', [
            'celebrities' => Celebrity::orderBy('name', 'asc')->paginate(20)
        ]);
    }

    public function show(Celebrity $celebrity)
    {
        $celebrity->load('movies');
        return view('celebrities.show', compact('celebrity'));
    }

    public function create()
    {
        $movies = Movie::select('id', 'title')->get();

        return view('celebrities.create')->with(['movies' => $movies]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:1'],
            'dob' => ['required', 'date'],
            'nationality' => ['required', 'string', 'min:1'],
            'bio' => ['required', 'string', 'max:500'],
            'poster' => ['required', 'string', 'min:16'],
            'movies' => ['required', 'array'],
        ]);

        $celebrity = Celebrity::create([
            'name' => $request->input('name'),
            'dob' => $request->input('dob'),
            'nationality' => $request->input('nationality'),
            'bio' => $request->input('bio'),
            'poster' => $request->input('poster'),
        ]);

        $movies = $request->input('movies');

        $celebrity->movies()->sync($movies);

        return redirect()->route('celebrities.index')->with('success', 'Celebrity added');

    }

    public function edit(Celebrity $celebrity)
    {
        $movies = Movie::select('id', 'title')->get();
        return view('celebrities.edit', compact('celebrity'))->with(['movies' => $movies]);
    }

    public function update(Request $request, Celebrity $celebrity)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:1'],
            'dob' => ['required', 'date'],
            'nationality' => ['required', 'string', 'min:1'],
            'bio' => ['required', 'string', 'max:500'],
            'poster' => ['required', 'string', 'min:16'],
            'movies' => ['required', 'array'],
        ]);

        $celebrity->update([
            'name'=> $request->input('name'),
            'dob'=> $request->input('dob'),
            'nationality'=> $request->input('nationality'),
            'bio'=> $request->input('bio'),
            'poster'=> $request->input('poster')
        ]);

        $movies = $request->input('movies');

        $celebrity->movies()->sync($movies);

        return redirect()->route('celebrities.show', $celebrity)->with('success', 'Celebrity added');
    }

    public function destroy(Celebrity $celebrity)
    {
        $celebrity->delete();

        return redirect()->route('celebrities.index')->with('success', 'Celebrity successfully deleted');
    }
}
