<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
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

Route::resource('posts', PostController::class)
    ->scoped(['post' => 'slug'])
    ->names('posts');

// Admin panel of the blog
Route::prefix('admin')->group( function () {
    Route::resource('categories', CategoryController::class)
        ->except(['destroy', 'show'])
        ->names('admin.categories');

    Route::resource('posts', AdminPostController::class)
        ->except(['show'])
        ->names('admin.posts');
});
