<?php

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

Route::get('/', [\App\Http\Controllers\MainController::class, 'main'])->name('main');
Route::post('/', [\App\Http\Controllers\MainController::class, 'shorten'])->name('do');
Route::get('/{code}', [\App\Http\Controllers\MainController::class, 'go'])->name('go');
Route::post('/{code}', [\App\Http\Controllers\MainController::class, 'auth'])->name('auth');
