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

Route::get('/', function(){
    return view('home');
})->name('welcome');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['admin'])->group(function () {
    Route::get('celebrities/create', [CelebrityController::class, 'create'])->name('celebrities.create');
    Route::post('celebrities', [CelebrityController::class, 'store'])->name('celebrities.store');
    Route::get('celebrities/{celebrity}/edit', [CelebrityController::class, 'edit'])->name('celebrities.edit');
    Route::put('celebrities/{celebrity}', [CelebrityController::class, 'update'])->name('celebrities.update');
    Route::delete('celebrities/{celebrity}', [CelebrityController::class, 'destroy'])->name('celebrities.destroy');

    //movie
    Route::get('movies/create', [MovieController::class, 'create'])->name('movies.create');
    Route::get('movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');
    Route::post('movies', [MovieController::class, 'store'])->name('movies.store');
    Route::put('movies/{movie}', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');
});

Route::get('movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('movies/{movie}', [MovieController::class, 'show'])->name('movies.show');
Route::get('celebrities', [CelebrityController::class, 'index'])->name('celebrities.index');
Route::get('celebrities/{celebrity}', [CelebrityController::class, 'show'])->name('celebrities.show');

// Genre
Route::get('genre/{genre}', [GenreController::class, 'show'])->name('genres.show');

//ROUTE FOR TESTING. DELETE LATER OR UPON MERGE
Route::get('test/{celebrity}', [CelebrityController::class, 'show'])->name('test');

// Route::get(' ', function(){
//     return view('home');
// })->name('homepage');

require __DIR__.'/auth.php';
