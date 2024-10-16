<?php

use App\Http\Controllers\FilmsController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/allfilms',[FilmsController::class,'getallfilms'])->name('films');
Route::get('/singlefilm/{id}',[FilmsController::class,'getonefilm'])->name('getonefilm');
Route::get('/deletefilm/{id}',[FilmsController::class,'deletefilm'])->name('deletefilm');
Route::get('/addfilm',[FilmsController::class,'addfilm'])->name('addfilm');
Route::post('insertfilm',[FilmsController::class,'insertfilm'])->name('insertfilm');
Route::get('/editfilm/{id}',[FilmsController::class,'editfilm'])->name('editfilm');
Route::post('/updatefilm/{id}',[FilmsController::class,'updatefilm'])->name('updatefilm');