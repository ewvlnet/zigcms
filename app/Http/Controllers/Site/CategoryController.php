<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public $perPage = 12;

    public function index()
    {
        $categories = Category::orderBy('name', 'ASC')->paginate($this->perPage);
        return view('site.categories', compact('categories'));
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $posts = Post::where('category_id', $category->id)->where('status', 'P')->with(['category', 'user', 'files'])->orderBy('updated_at', 'DESC')->paginate($this->perPage);
        return view('site.category', compact('category', 'posts'));
    }

}
