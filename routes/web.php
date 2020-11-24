<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [PostController::class, 'index']);
Route::get('/home', [PostController::class, 'index']) -> name('home');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // show new post form
    Route::get('new-post', [PostController::class, 'create']);
    // save new post
    Route::post('new-post', [PostController::class, 'store']);
    // edit post form
    Route::get('edit/{slug}', [PostController::class, 'edit']);
    // update post
    Route::post('update', [PostController::class, 'update']);
    // delete post
    Route::get('delete/{id}', [PostController::class, 'destroy']);
    // display user's all posts
    Route::get('my-all-posts', [UserController::class, 'user_posts_all']);
    // display user's drafts
    Route::get('my-drafts', [UserController::class, 'user_posts_draft']);
    Route::post('comment/delete/{id}', [CommentController::class, 'destroy']);

});

Route::get('/{slug}', [PostController::class, 'show'])->where('slug', '[A-Za-z0-9-_]+')->name('post');
Route::get('user/{id}', [UserController::class, 'profile'])->where('id', '[0-9]+');
Route::get('user/{id}/posts',  [UserController::class, 'user_posts'])->where('id', '[0-9]+');
Route::post('comment/add', [CommentController::class, 'store']);
