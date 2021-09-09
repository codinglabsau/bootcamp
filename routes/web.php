<?php


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

Route::get('/', function () {
    return view('welcome');
});

//
Route::get('movies', [MovieController::class, 'index'])->name('movies.index');

Route::get('movies/create', [MovieController::class, 'create'])->name('movies.create');

Route::get('movies/{movie}/edit', [MovieController::class, 'edit'])->name('movies.edit');

Route::get('movies/{movie}', [MovieController::class, 'show'])->name('movies.show');

Route::post('movies', [MovieController::class, 'store'])->name('movies.store');

Route::put('movies/{movie}', [MovieController::class, 'update'])->name('movies.update');

Route::delete('movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



require __DIR__.'/auth.php';
