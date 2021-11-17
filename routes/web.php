<?php

use App\Http\Controllers\Blog\Admin\CategoryController;
use App\Http\Controllers\Blog\PostController;
use App\Http\Controllers\HomeController;
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
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('blog')->group( function () {
    Route::resource('posts', PostController::class)
        ->scoped(['post' => 'slug'])
        ->names('blog.posts');
});

// Admin's panel of the blog
Route::prefix('admin/blog')->group( function () {
    Route::resource('categories', CategoryController::class)
        ->except(['destroy', 'show'])
        ->names('blog.admin.categories');
});
