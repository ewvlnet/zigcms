<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public $perPage = 12;

    public function index()
    {
        $comments = Comment::query()->with(['post', 'user'])->orderBy('updated_at', 'DESC')->paginate($this->perPage);
        return view('profile.comment.index', compact('comments'));
    }

    public function commentReplies($id)
    {
        $replies = Reply::query()->with(['comment', 'user'])->where('comment_id', $id)->latest()->paginate($this->perPage);
        return view('profile.reply.index', compact('replies'));
    }

    /**
     * Change status form specified resource.
     */
    public function publish(Comment $comment)
    {
        $comment->status = ($comment->status == 'B') ? 'A' : 'B';
        $comment->save();
        return redirect()->route('profile.comments.index')->withSuccess(__('Content successfully changed'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('profile.comments.index')->withSuccess(__('Content deleted successfully'));
    }

}
