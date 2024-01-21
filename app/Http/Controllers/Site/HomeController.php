<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $perPage = 12;

    public function index()
    {
        $posts = Post::where('status', 'P')->with(['category', 'user', 'files'])->orderBy('updated_at', 'DESC')->paginate($this->perPage);
        return view('site.home', compact('posts'));
    }

}
