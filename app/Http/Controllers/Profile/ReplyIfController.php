<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyIfController extends Controller
{
    public $perPage = 5;

    public function index($id)
    {
        $replies = Reply::query()->where('comment_id', $id)->latest()->paginate($this->perPage);
        return view('profile.reply.indexif', compact('replies', 'id'));
    }

    /**
     * Change status form specified resource.
     */
    public function publish(Reply $reply, $id, $page = 1)
    {
        $reply->status = ($reply->status == 'B') ? 'A' : 'B';
        $reply->save();
        return redirect()->route('profile.posts.replies.index', [$id, 'page' => $page])->withSuccess(__('Content successfully changed'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reply $reply, $id)
    {
        $reply->delete();
        return redirect()->route('profile.posts.replies.index', $id)->withSuccess(__('Content deleted successfully'));
    }
}
