<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Post\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//Public Routs
Route::post('/register', [AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

// Protected Routes
Route::group(['middleware'=>['auth:sanctum']], function () {

    //User
    Route::get('/user',[AuthController::class,'user']);
    Route::put('/user',[AuthController::class,'update']);
    Route::post('/logout',[AuthController::class,'logout']);

    //Post
    Route::get('/posts',[PostController::class,'index']);  // get user posts
    Route::post('/posts',[PostController::class, 'store']); // create post
    Route::put('/posts/{id}',[PostController::class,'update']); // update post
    Route::delete('/post/{id}/destroy', [PostController::class, 'destroy']); // delete post
});
