<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::getAllWithPaginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.posts.create', [
            'post' => new Post,
            'categoryList' => Category::getForSelect()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return RedirectResponse
     */
    public function store(PostRequest $request): RedirectResponse
    {
        // TODO: Refactor this later
        $post = (new Post())->create($request->all());

        if ($post) {
            return redirect()
                ->route('admin.posts.edit', $post->id)
                ->with(['success' => 'Post has been successfully created!']);
        } else {
            return back()
                ->withErrors(['msg' => "Save Error"])
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        return view('admin.posts.edit', [
            'post' => Post::withTrashed()->find($id),
            'categoryList' => Category::getForSelect()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        // TODO: Refactor this later

//        dd($request->all());

        if (empty($post)) {
            return back()
                ->withErrors(['msg' => "Record id=[{$post->id}] not found"])
                ->withInput();
        } elseif ($post) {
            $post->update($request->all());

            return redirect()
                ->route('admin.posts.edit', $post->id)
                ->with(['success' => 'Successfully updated!']);
        } else {
            return back()
                ->withErrors(['msg' => "Save error"])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        if ($post->deleted_at) {
            $post->forceDelete();
        } else {
            $post->delete();
        }

        return back()->with(['success' => 'Successfully deleted!']);
    }

    /**
     * Restore the soft-deleted post
     *
     * @return RedirectResponse()
     */
    public function restore($id): RedirectResponse
    {
        Post::withTrashed()->find($id)->restore();

        return back()->with(['success' => 'Successfully restored!']);;
    }
}
