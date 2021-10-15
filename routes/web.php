<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CelebrityController;

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

// Celebrities

Route::get('celebrities', [CelebrityController::class, 'index'])->name('celebrities.index');

Route::middleware(['admin'])->group(function () {
    Route::get('celebrities/create', [CelebrityController::class, 'create'])->name('celebrities.create');
    Route::get('celebrities/{celebrity}/edit', [CelebrityController::class, 'edit'])->name('celebrities.edit');
    Route::put('celebrities/{celebrity}', [CelebrityController::class, 'update'])->name('celebrities.update');
    Route::delete('celebrities/{celebrity}', [CelebrityController::class, 'destroy'])->name('celebrities.destroy');
});

Route::get('celebrities/{celebrity}', [CelebrityController::class, 'show'])->name('celebrities.show');

Route::post('celebrities', [CelebrityController::class, 'store'])->name('celebrities.store');

// Genre
Route::get('genre/{genre}', [GenreController::class, 'show'])->name('genres.show');

//ROUTE FOR TESTING. DELETE LATER OR UPON MERGE
Route::get('test/{celebrity}', [CelebrityController::class, 'show'])->name('test');

// Route::get(' ', function(){
//     return view('home');
// })->name('homepage');

require __DIR__.'/auth.php';
