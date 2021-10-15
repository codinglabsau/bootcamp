<?php

use App\Http\Controllers\CelebrityController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MovieController::class, 'index'])->name('welcome'); //@TODO add a homepage

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //movie
    Route::get('movies/create', [MovieController::class, 'create'])->name('movies.create');

    Route::get('movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');

    Route::delete('movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');

});

// Movie
Route::get('movies', [MovieController::class, 'index'])->name('movies.index');

Route::get('movies/{movie}', [MovieController::class, 'show'])->name('movies.show');

Route::post('movies', [MovieController::class, 'store'])->name('movies.store');

Route::put('movies/{movie}', [MovieController::class, 'update'])->name('movies.update');

// Genre
Route::get('genre/{genre}', [GenreController::class, 'show'])->name('genres.show');

//ROUTE FOR TESTING. DELETE LATER OR UPON MERGE
Route::get('test/{celebrity}', [CelebrityController::class, 'show'])->name('test');

// Route::get(' ', function(){
//     return view('home');
// })->name('homepage');

require __DIR__.'/auth.php';
