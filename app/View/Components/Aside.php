<?php

namespace App\View\Components;

use App\Models\{Category, Post, Tag};
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Aside extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $posts = Post::select('title', 'slug')->take(9)->orderBy('created_at', 'DESC')->get();
        $categories = Category::select('name', 'slug')->take(9)->orderBy('name', 'ASC')->get();
        $tags = Tag::select('name', 'slug')->take(9)->orderBy('name', 'ASC')->get();
        return view('layouts.aside', compact('posts', 'categories', 'tags'));
    }
}
