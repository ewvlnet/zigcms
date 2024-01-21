<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public $perPage = 12;

    public function __construct()
    {
        $this->middleware('can:pages', ['only' => ['index']]);
        $this->middleware('can:pages_create', ['only' => ['create']]);
        $this->middleware('can:pages_update', ['only' => ['edit']]);
        $this->middleware('can:pages_read', ['only' => ['show']]);
        $this->middleware('can:pages_delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::query()->orderBy('updated_at', 'DESC')->paginate($this->perPage);
        return view('profile.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('profile.page.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PageRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        Page::create($data);

        return redirect()->route('profile.pages.index')->withSuccess(__('Content created successfully'));
    }

    /**
     * Display the specified resource.
     */
    //public function show(Page $page){}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        $categories = Category::all();
        return view('profile.page.edit', compact('page', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PageRequest $request, Page $page)
    {
        $data = $request->all();
        $page->update($data);

        return redirect()->route('profile.pages.index')->withSuccess(__('Content successfully changed'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('profile.pages.index')->withSuccess(__('Content deleted successfully'));
    }
}
