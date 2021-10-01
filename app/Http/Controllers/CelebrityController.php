<?php

namespace App\Http\Controllers;

use App\Models\Celebrity;
use Illuminate\Http\Request;

class CelebrityController extends Controller
{

    /// FOR TESTING. DELETE LATER UPON TESTING COMPLETION OR MERGING WITH LIBRO BRANCH
    public function show(Celebrity $celebrity)
    {

        $celebrity->load('movies');
        return view('test', compact('celebrity'));//->with($celebrities);
    }
}
