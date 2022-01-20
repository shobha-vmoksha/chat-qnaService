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
    return redirect('/login');
});
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});


Route::get('/upload', [\App\Http\Controllers\SalesController::class, 'index']);
Route::post('/upload', [\App\Http\Controllers\SalesController::class, 'upload']);
Route::get('/batch', [\App\Http\Controllers\SalesController::class, 'batch']);
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('admin.pages.index');
});
Route::get('/home', [App\Http\Controllers\QuestionController::class, 'index'])->name('home');

Route::get('/add', [App\Http\Controllers\QuestionController::class, 'add'])->name('add');

Route::post('/question.store',[App\Http\Controllers\QuestionController::class,'store']);

Route::get('/viewquestion/{id}', [App\Http\Controllers\QuestionController::class, 'viewquestion'])->name('viewquestion');



Route::get('/postquestion', [App\Http\Controllers\QuestionController::class, 'postquestion'])->name('home');