<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public $perPage = 12;

    public function __construct()
    {
        $this->middleware('can:categories', ['only' => ['index']]);
        $this->middleware('can:categories_create', ['only' => ['create']]);
        $this->middleware('can:categories_update', ['only' => ['edit']]);
        $this->middleware('can:categories_read', ['only' => ['show']]);
        $this->middleware('can:categories_delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::query()->orderBy('updated_at', 'DESC')->paginate($this->perPage);
        return view('profile.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        Category::create($data);

        return redirect()->route('profile.categories.index')->withSuccess(__('Content created successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('profile.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->all();
        $category->update($data);

        return redirect()->route('profile.categories.index')->withSuccess(__('Content successfully changed'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('profile.categories.index')->withSuccess(__('Content deleted successfully'));
    }
}
