<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class CategoryController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('blog.admin.categories.index', [
            'categories' => BlogCategory::getAllWithPaginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $category = new BlogCategory();
        $categoryList = BlogCategory::getForSelect();

        return view('blog.admin.categories.create',
            compact('category', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BlogCategoryCreateRequest $request
     * @return RedirectResponse
     */
    public function store(BlogCategoryCreateRequest $request): RedirectResponse
    {
        // TODO: Refactor this later
        $category = (new BlogCategory())->create($request->all());

        if ($category) {
            return redirect()
                ->route('blog.admin.categories.edit', $category->id)
                ->with(['success' => 'Successfully saved!']);
        } else {
            return back()
                ->withErrors(['msg' => "Save Error"])
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BlogCategory $category
     * @return Application|Factory|View
     */
    public function edit(BlogCategory $category)
    {
        return view('blog.admin.categories.edit', [
            'category' => $category,
            'categoryList' => BlogCategory::getForSelect()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BlogCategoryUpdateRequest $request
     * @param BlogCategory $category
     * @return RedirectResponse
     */
    public function update(BlogCategoryUpdateRequest $request, BlogCategory $category): RedirectResponse
    {
        // TODO: Refactor this later

        if (empty($category)) {
            return back()
                ->withErrors(['msg' => "Record id=[{$category->id}] not found"])
                ->withInput();
        } elseif ($category) {
            $category->update($request->all());

            return redirect()
                ->route('blog.admin.categories.edit', $category->id)
                ->with(['success' => 'Successfully updated!']);
        } else {
            return back()
                ->withErrors(['msg' => "Save error"])
                ->withInput();
        }
    }
}
