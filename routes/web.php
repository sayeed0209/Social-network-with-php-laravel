<?php

use App\Http\Controllers\PostController;
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
Route::get('/profile',function(){
    return redirect('/profile/'. auth()->user()->name);
})->middleware(['auth:sanctum', 'verified']);


Route::get('/profile/{username}',[PostController::class,'getByUsername'])->middleware(['auth:sanctum', 'verified']);
Route::post('/profile/{username}',[PostController::class,'store'])->middleware(['auth:sanctum', 'verified']);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
