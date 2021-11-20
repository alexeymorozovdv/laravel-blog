<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Http\Response;

class PostController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::getAllWithPaginate('no'),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param $categoryId
     * @param Post $post
     * @return Application|Factory|View
     */
    public function show($categoryId, Post $post)
    {
        $post->comments_count = $post->comments()->count();

        return view('posts.show', [
            'post' => $post
        ]);
    }

}
