<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Celebrity;
use Illuminate\Http\Request;

class CelebrityController extends Controller
{
    public function index() //print all data in Celebrity database
    {
        return view('celebrities.index', [
            'celebrities' => Celebrity::orderBy('name', 'asc')->paginate(20)
        ]);
    }

    public function show(Celebrity $celebrity)
    {
        return view('celebrities.show', compact('celebrity'));
    }

    public function create()
    {
        return view('celebrities.create');
    }

    public function store(Request $request)
    {   
        Celebrity::create($request->validate([
            'name' => ['required', 'string', 'min:1'],
            'dob' => ['required', 'date'],
            'nationality' => ['required', 'string', 'min:4'],
            'bio' => ['required', 'string'],
        ]));

        return redirect()->route('celebrities.index')->with('success', 'Celebrity added');

    }

    public function edit(Celebrity $celebrity)
    {
        return view('celebrities.edit', compact('celebrity'));
    }

    public function update(Request $request, Celebrity $celebrity)
    {
        $celebrity->update($request->validate([
            'name' => ['required', 'string', 'min:1'],
            'dob' => ['required', 'date'],
            'nationality' => ['required', 'string', 'min:4'],
            'bio' => ['required', 'string'],
        ]));
        
        return redirect()->route('celebrities.show', $celebrity)->with('success', 'Celebrity added');
    }

    public function destroy(Celebrity $celebrity)
    {
        $celebrity->delete();

        return redirect()->route('celebrities.index')->with('success', 'Celebrity successfully deleted');
    }

}
