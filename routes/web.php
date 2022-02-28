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
////passing to chat-qns
////hanges with respect to navbar and pag
//Route::get('/upload', [\App\Http\Controllers\SalesController::class, 'index']);
//Route::post('/upload', [\App\Http\Controllers\SalesController::class, 'upload']);
//Route::get('/batch', [\App\Http\Controllers\SalesController::class, 'batch']);


Auth::routes();


//this will load the chat bot screen
Route::get('chatbot', function () {
    return view('chatbot');
});



//chatbot uses the '/botman' end point for communications.
Route::match(['get', 'post'], '/botman', 'App\Http\Controllers\BotManController@handle');


Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function (){
    Route::get('/home', [App\Http\Controllers\QuestionController::class, 'postques'])->name('postques');
    Route::get('/postques', [App\Http\Controllers\QuestionController::class, 'postques'])->name('postques');
    Route::post('store', [App\Http\Controllers\QuestionController::class, 'store']);
});

Route::get('/home', function (){
    return "to user";
});