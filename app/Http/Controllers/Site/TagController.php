<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public $perPage = 12;

    public function index()
    {
        $tags = Tag::orderBy('name', 'ASC')->paginate($this->perPage);
        return view('site.tags', compact('tags'));
    }

    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        $posts = $tag->posts()->where('status', 'P')->with(['category', 'user', 'files'])->orderBy('updated_at', 'DESC')->paginate($this->perPage);
        return view('site.tag', compact('tag', 'posts'));
    }
}
