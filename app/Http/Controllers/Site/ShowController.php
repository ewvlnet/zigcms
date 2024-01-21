<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('status', 'P')->with(['category', 'tags', 'user.files', 'files'])->first();
        return view('site.show', compact('post'));
    }
}
