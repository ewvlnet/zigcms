<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use App\Models\{Category, Page, Permission, Post, Profile, Tag, User};
use App\Observers\{CategoryObserver,
    PageObserver,
    PermissionObserver,
    PostObserver,
    ProfileObserver,
    TagObserver,
    UserObserver
};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Category::observe(CategoryObserver::class);
        Page::observe(PageObserver::class);
        Permission::observe(PermissionObserver::class);
        Post::observe(PostObserver::class);
        Profile::observe(ProfileObserver::class);
        Tag::observe(TagObserver::class);
        User::observe(UserObserver::class);

        /**
         * Use Bootstrap5 pagination style
         */
        Paginator::useBootstrapFive();
    }
}
