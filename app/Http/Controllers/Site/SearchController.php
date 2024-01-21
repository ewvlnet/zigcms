<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public $perPage = 12;

    public function index(Request $request)
    {
        $filters = $request->only('filter');

        $posts = Post::where(function ($query) use ($request) {
            if ($request->filter) {
                $query->where('title', 'LIKE', "%{$request->filter}%")->orWhere('body', 'LIKE', "%{$request->filter}%")
                    ->where('status', 'P');
            }
        })->with(['category', 'user', 'files'])->latest()->paginate($this->perPage);

        return view('site.search', compact('posts', 'filters'));
    }
}
