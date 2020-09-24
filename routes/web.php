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

// Route::get('/', function () {
//     return view('welcome');
// });

//si la session esta activa te hace un redirect a home si no lo esta te enseña la vista de welcome
Route::get('/', function () {
    if(Auth::check()) {
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

Route::get('/profile',function(){
    return redirect('/profile/'. auth()->user()->name);
})->middleware(['auth:sanctum', 'verified']);


Route::get('/profile/{username}',[PostController::class,'getByUsername'])->middleware(['auth:sanctum', 'verified']);
<<<<<<< HEAD
Route::post('/profile/{username}',[PostController::class,'store'])->middleware(['auth:sanctum', 'verified']);
=======
Route::post('/home/{username}',[PostController::class,'store'])->middleware(['auth:sanctum', 'verified']);
>>>>>>> 21bfe1533f35cce0fb8e94aecb805c7893af739e

// profile update bio

Route::get('/updateProfile',[PostController::class,'updateBio'])->middleware(['auth:sanctum', 'verified']);

