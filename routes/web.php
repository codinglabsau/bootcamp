<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('celebrities', [CelebrityController::class, 'index'])->name('celebrities.index');

Route::middleware(['admin'])->group(function () {
    Route::get('celebrities/create', [CelebrityController::class, 'create'])->name('celebrities.create');
});

Route::get('celebrities/{celebrity}/edit', [CelebrityController::class, 'edit'])->name('celebrities.edit');

Route::get('celebrities/{celebrity}', [CelebrityController::class, 'show'])->name('celebrities.show');

Route::post('celebrities', [CelebrityController::class, 'store'])->name('celebrities.store');

Route::put('celebrities/{celebrity}', [CelebrityController::class, 'update'])->name('celebrities.update');

Route::delete('celebrities/{celebrity}', [CelebrityController::class, 'destroy'])->name('celebrities.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');




require __DIR__.'/auth.php';
