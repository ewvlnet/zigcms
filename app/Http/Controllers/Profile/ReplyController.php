<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public $perPage = 12;

    public function index()
    {
        $replies = Reply::query()->with(['comment', 'user'])->orderBy('updated_at', 'DESC')->paginate($this->perPage);
        return view('profile.reply.index', compact('replies'));
    }

    /**
     * Change status form specified resource.
     */
    public function publish(Reply $reply)
    {
        $reply->status = ($reply->status == 'B') ? 'A' : 'B';
        $reply->save();
        return redirect()->route('profile.replies.index')->withSuccess(__('Content successfully changed'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reply $reply)
    {
        $reply->delete();
        return redirect()->route('profile.replies.index')->withSuccess(__('Content deleted successfully'));
    }
}
