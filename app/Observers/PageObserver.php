<?php

namespace App\Observers;

use App\Models\Page;

class PageObserver
{
    /**
     * Handle the Page "creating" event.
     */
    public function creating(Page $page): void
    {
        $page->slug = str_slug($page->title);
        $page->title = ucwords($page->title);
    }

    /**
     * Handle the Page "updating" event.
     */
    public function updating(Page $page): void
    {
        $page->slug = str_slug($page->title);
        $page->title = ucwords($page->title);
    }

    /**
     * Handle the Page "deleting" event.
     */
    public function deleting(Page $page): void
    {
        //
    }

}
