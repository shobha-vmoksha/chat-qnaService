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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/upload', [\App\Http\Controllers\SalesController::class, 'index']);
Route::post('/upload', [\App\Http\Controllers\SalesController::class, 'upload']);
Route::get('/batch', [\App\Http\Controllers\SalesController::class, 'batch']);