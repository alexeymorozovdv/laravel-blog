<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
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

Auth::routes();

Route::resource('categories', PostController::class)
    ->scoped(['category' => 'slug'])
    ->names('categories');

Route::resource('category.posts', PostController::class)
    ->scoped(['post' => 'slug'])
    ->names('posts');

Route::resource('category.posts.comments', PostController::class)
    ->names('comments');

Route::resource('users', PostController::class)
    ->names('users');

// Admin panel of the blog
Route::prefix('admin')->group( function () {
    // Categories
    Route::resource('categories', CategoryController::class)
        ->except(['destroy', 'show'])
        ->names('admin.categories');

    // Posts
    Route::resource('posts', AdminPostController::class)
        ->except(['show'])
        ->names('admin.posts');

    Route::get('posts/restore/{id}', [AdminPostController::class, 'restore'])
        ->name('admin.posts.restore');

    // Users
    Route::resource('users', UserController::class)
        ->only(['index', 'edit', 'update'])
        ->names('admin.users');

    // Comments
    Route::resource('comments', CommentController::class)
        ->only(['edit', 'update', 'destroy'])
        ->names('admin.comments');
});
