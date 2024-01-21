<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public $perPage = 12;

    public function __construct()
    {
        $this->middleware('can:tags', ['only' => ['index']]);
        $this->middleware('can:tags_create', ['only' => ['create']]);
        $this->middleware('can:tags_update', ['only' => ['edit']]);
        $this->middleware('can:tags_read', ['only' => ['show']]);
        $this->middleware('can:tags_delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::query()->orderBy('updated_at', 'DESC')->paginate($this->perPage);
        return view('profile.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TagRequest $request)
    {
        $data = $request->all();
        Tag::create($data);

        return redirect()->route('profile.tags.index')->withSuccess(__('Content created successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('profile.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $data = $request->all();
        $tag->update($data);

        return redirect()->route('profile.tags.index')->withSuccess(__('Content successfully changed'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('profile.tags.index')->withSuccess(__('Content deleted successfully'));
    }
}
