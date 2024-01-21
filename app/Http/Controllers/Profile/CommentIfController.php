<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentIfController extends Controller
{
    public $perPage = 5;

    public function index($id)
    {
        $comments = Comment::query()->where('post_id', $id)->latest()->paginate($this->perPage);
        return view('profile.comment.indexif', compact('comments', 'id'));
    }

    /**
     * Change status form specified resource.
     */
    public function publish(Comment $comment, $id, $page = 1)
    {
        $comment->status = ($comment->status == 'B') ? 'A' : 'B';
        $comment->save();
        return redirect()->route('profile.posts.comments.index', [$id, 'page' => $page])->withSuccess(__('Content successfully changed'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment, $id)
    {
        $comment->delete();
        return redirect()->route('profile.posts.comments.index', $id)->withSuccess(__('Content deleted successfully'));
    }
}
