<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FilmController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('auth.login');
Route::post('/login', [AuthController::class, 'attemptLogin'])->name('auth.attempt');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('films/search', [FilmController::class, 'search'])->name('films.search');
Route::post('films/autocomplete', [FilmController::class, 'autocomplete'])->name('films.autocomplete');
Route::resource('films', FilmController::class);

