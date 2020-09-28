<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FriendController;
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
Route::get('/post/{id}', [PostController::class, 'getById'])->middleware(['auth:sanctum', 'verified']);

Route::get('/postUpdate/{id}', [PostController::class, 'edit'])->middleware(['auth:sanctum', 'verified']);
Route::post('/postUpdate/{id}', [PostController::class, 'update']);
Route::get('/delete/{id}', [PostController::class, 'destroy']);
// like route
// Route::post('/create_like', [LikeController::class, 'create']);
// Route::post('/create_dislike', [LikeController::class, 'store']);
Route::post('/like', [LikeController::class, 'index'])->middleware(['auth:sanctum', 'verified']);
// add friend 
Route::post('/showuser', [UserController::class, 'show_notYetFriends']);
// for search user
Route::post('/search_user', [UserController::class, 'search_user']);
Route::post('/search_post', [PostController::class, 'search_post']);

Route::get('/showFriends', [FriendController::class, 'index']);
Route::get('/add_friend/{user_id}', [FriendController::class, 'addFriend']);
// comments
Route::post('/comment', [CommentController::class, 'index'])->middleware(['auth:sanctum', 'verified']);
// Route::get('/show/{username}',[CommentController::class,'show'])->middleware(['auth:sanctum', 'verified']);
//search post
Route::post('/showpost', [PostController::class, 'showpost'])->middleware(['auth:sanctum', 'verified']);
Route::get('/updateProfile', [UserController::class, 'edit'])->middleware(['auth:sanctum', 'verified']);
Route::post('/updateProfile', [UserController::class, 'update'])->middleware(['auth:sanctum', 'verified']);
Route::get('/home', [PostController::class, 'getAllowedPosts'])->middleware(['auth:sanctum', 'verified']);
