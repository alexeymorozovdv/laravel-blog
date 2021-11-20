<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\UserController as AdminUserConrtoller;
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

Auth::routes();

// Categories
//Route::get('{category:slug}', [PostController::class, 'show'])->name('categories.show');

// Posts
Route::get('posts', [PostController::class, 'index'])->name('posts.index');
Route::get('categories/{category:slug}/{post:slug}', [PostController::class, 'show'])->name('posts.show');

// Comments
//Route::resource('category.posts.comments', PostController::class)
//    ->names('comments');
//
//// Users
Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('user/{user}/edit', [PostController::class, 'edit'])->name('users.edit');
Route::post('user/{user}', [PostController::class, 'update'])->name('users.update');


// Admin panel of the blog
Route::prefix('admin')->group(function () {
    // Admin Categories
    Route::resource('categories', AdminCategoryController::class)
        ->except(['destroy', 'show'])
        ->names('admin.categories');

    // Admin Posts
    Route::resource('posts', AdminPostController::class)
        ->except(['show'])
        ->names('admin.posts');

    Route::get('posts/restore/{id}', [AdminPostController::class, 'restore'])
        ->name('admin.posts.restore');

    // Admin Users
    Route::resource('users', AdminUserConrtoller::class)
        ->only(['index', 'edit', 'update'])
        ->names('admin.users');

    // Admin Comments
    Route::resource('comments', CommentController::class)
        ->only(['edit', 'update', 'destroy'])
        ->names('admin.comments');
});
