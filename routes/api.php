<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\Like\LikeController;
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
    Route::get('/posts/{id}',[PostController::class,'show']); // get single post
    Route::put('/posts/{id}',[PostController::class,'update']); // update post
    Route::delete('/post/{id}/destroy', [PostController::class, 'destroy']); // delete post

    //Comment
    Route::get('/posts/{id}/comments',[CommentController::class,'index']); // all comments of a post
    Route::post('/posts/{id}/comments',[CommentController::class,'store']); // create comment on a post
    Route::put('/comments/{id}',[CommentController::class,'update']); // update a comment
    Route::delete('/comments/{id}',[CommentController::class,'destroy']); // delete a comment

    //Like
    Route::post('/posts/{id}/likes',[LikeController::class,'likeOrUnlike']); // like or dislike back a post

});
