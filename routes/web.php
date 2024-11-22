<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MovieController::class, 'index'])->name('movies.index');
Route::get('/create', [MovieController::class, 'create'])->name('movies.create');
Route::post('/create', [MovieController::class, 'store'])->name('movies.store');
Route::get('/edit/{id}', [MovieController::class, 'edit'])->name('movies.edit');
Route::put('/update/{id}', [MovieController::class, 'update'])->name('movies.update');
Route::delete('/delete/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');
Route::get('/detail/{id}', [MovieController::class, 'detail'])->name('movies.detail');
Route::get('/search', [MovieController::class, 'search'])->name('search');