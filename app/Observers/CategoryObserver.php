<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
    /**
     * Handle the Category "creating" event.
     */
    public function creating(Category $category)
    {
        $category->slug = str_slug($category->name);
    }

    /**
     * Handle the Category "updating" event.
     */
    public function updating(Category $category)
    {
        $category->slug = str_slug($category->name);
    }
}
