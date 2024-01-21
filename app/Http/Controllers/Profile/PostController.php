<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public $perPage = 12;

    public function __construct()
    {
        $this->middleware('can:posts', ['only' => ['index']]);
        $this->middleware('can:posts_create', ['only' => ['create']]);
        $this->middleware('can:posts_update', ['only' => ['edit']]);
        $this->middleware('can:posts_read', ['only' => ['show']]);
        $this->middleware('can:posts_delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile = auth()->user()->profiles->pluck('name')->implode(', ');
        $posts = Post::query()->with(['user.files'])->orderBy('updated_at', 'DESC')->paginate($this->perPage);
        return view('profile.post.index', compact('posts', 'profile'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('profile.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        $newPost = Post::create($data);
        $newPost->tags()->attach($data['tags']);

        return redirect()->route('profile.posts.index')->withSuccess(__('Content created successfully'));
    }

    /**
     * Display the specified resource.
     */
    //public function show(Post $post){}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $profile = auth()->user()->profiles->pluck('name')->implode(', ');

        if ($profile == 'Editor' || $profile == 'Administrator') {
            //Can edit any posts
        } else {
            //Can only edit your own posts
            $this->authorize('owner', $post);
        }

        $categories = Category::all();
        $tags = Tag::all();
        //$comments = Comment::query()->where('post_id', $post->id)->latest()->paginate(12);

        return view('profile.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->all();
        $post->update($data);
        $post->tags()->sync($request->tags);

        return redirect()->route('profile.posts.index')->withSuccess(__('Content successfully changed'));
    }

    /**
     * Change status form specified resource.
     */
    public function publish(Post $post)
    {
        //$this->authorize('owner', $post);
        $post->status = ($post->status == 'D') ? 'P' : 'D';
        $post->save();

        return redirect()->route('profile.posts.index')->withSuccess(__('Content successfully changed'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('profile.posts.index')->withSuccess(__('Content deleted successfully'));
    }
}
