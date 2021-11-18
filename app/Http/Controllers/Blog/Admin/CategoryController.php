<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
            'categories' => BlogCategory::query()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('blog.admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return string
     */
    public function store(Request $request)
    {
        dd(__METHOD__, $request->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit(BlogCategory $category)
    {
        $categoryList = BlogCategory::all();

        return view('blog.admin.categories.edit', compact(['category', 'categoryList']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BlogCategoryUpdateRequest $request
     * @param BlogCategory $category
     * @return RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(BlogCategoryUpdateRequest $request, BlogCategory $category)
    {
        if (empty($category)) {
            return back()
                ->withErrors(['msg' => "Record id=[{$category->id}] not found"])
                ->withInput();
        } elseif ($category) {
            $category->update($request->all());

            return redirect()
                ->route('blog.admin.categories.edit', $category->id)
                ->with(['success' => 'Successfully saved!']);
        } else {
            return back()
                ->withErrors(['msg' => "Save error"])
                ->withInput();
        }
    }

//        $data = $request->all();
//        $result = $item->fill($data)->save();

}
