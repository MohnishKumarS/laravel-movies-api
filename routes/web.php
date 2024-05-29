<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\TvShowController;

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

// Route::get('/', function () {
//     return view('index');
// });
// Route::get('/show', function () {
//     return view('show');
// });

Route::get('/',[MoviesController::class,'index']);
Route::get('/movies',[MoviesController::class,'allmovies']);
Route::get('/movies/{movieID}',[MoviesController::class,'show']);

Route::get('/person',[PersonController::class,'index']);
Route::get('/person/page/{pageNo?}',[PersonController::class,'index']);
Route::get('/person/{id}',[PersonController::class,'show'])->name('actor.show');


Route::get('/tv',[TvShowController::class,'index']);
Route::get('/tvshow/{id}',[TvShowController::class,'show'])->name('tv.show');
