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
//passing to chat-qns
//hanges with respect to navbar and pag
Route::get('/upload', [\App\Http\Controllers\SalesController::class, 'index']);
Route::post('/upload', [\App\Http\Controllers\SalesController::class, 'upload']);
Route::get('/batch', [\App\Http\Controllers\SalesController::class, 'batch']);
Auth::routes();

// line added

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', function () {
//     return view('admin.pages.index');
// });
Route::get('/home', [App\Http\Controllers\QuestionController::class, 'postques'])->name('postques');
Route::get('/postques', [App\Http\Controllers\QuestionController::class, 'postques'])->name('postques');