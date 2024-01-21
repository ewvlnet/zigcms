<?php

namespace App\Observers;

use App\Models\Tag;

class TagObserver
{
    /**
     * Handle the Tag "creating" event.
     */
    public function creating(Tag $tag)
    {
        $tag->slug = str_slug($tag->name);
    }

    /**
     * Handle the Tag "updating" event.
     */
    public function updating(Tag $tag)
    {
        $tag->slug = str_slug($tag->name);
    }
}
