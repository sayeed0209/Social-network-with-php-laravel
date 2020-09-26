<?php

use App\Http\Controllers\LikeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

//si la session esta activa te hace un redirect a home si no lo esta te enseña la vista de welcome
Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    } else {
        return view('welcome');
    }
});

// Route::get('/profile',[PostController::class,'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('layouts.home');
})->name('home');



//profile

Route::get('/profile', function () {
    return redirect('/profile/' . auth()->user()->name);
})->middleware(['auth:sanctum', 'verified']);


Route::get('/profile/{username}', [PostController::class, 'getByUsername'])->middleware(['auth:sanctum', 'verified']);
Route::post('/home/{username}', [PostController::class, 'store'])->middleware(['auth:sanctum', 'verified']);
Route::get('/postUpdate/{id}', [PostController::class, 'edit'])->middleware(['auth:sanctum', 'verified']);
Route::post('/postUpdate/{id}', [PostController::class, 'update']);
Route::get('/delete/{id}', [PostController::class, 'destroy']);
// like route
Route::post('/create_like', [LikeController::class, 'create']);
Route::post('/create_dislike', [LikeController::class, 'store']);
// Route::post('/create_like', function(){
//     echo 'like';
// });
// Route::post('/create_dislike', function(){
//     echo 'dislike';
// });
// profile update bio

Route::get('/updateProfile', [UserController::class, 'edit'])->middleware(['auth:sanctum', 'verified']);
Route::post('/updateProfile', [UserController::class, 'update'])->middleware(['auth:sanctum', 'verified']);
