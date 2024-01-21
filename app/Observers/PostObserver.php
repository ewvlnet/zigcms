<?php

namespace App\Observers;

use App\Models\Post;

class PostObserver
{
    /**
     * Handle the Post "creating" event.
     */
    public function creating(Post $post): void
    {
        $post->slug = str_slug($post->title);
        $post->title = ucwords($post->title);
    }

    /**
     * Handle the Post "updating" event.
     */
    public function updating(Post $post): void
    {
        $post->slug = str_slug($post->title);
        $post->title = ucwords($post->title);
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleting(Post $post): void
    {
        //
    }
}
