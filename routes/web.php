<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Profile\{CategoryController,
    CommentController,
    CommentIfController,
    FileController,
    PageController,
    PermissionController,
    PostController,
    ProfileController,
    ReplyController,
    ReplyIfController,
    SettingsController,
    StartController,
    TagController,
    UserController,
    UserMyDataController
};

use App\Http\Controllers\Site\{
    AboutController,
    AuthorController,
    CategoryController as SiteCategoryController,
    HomeController,
    InstallController,
    SearchController,
    ShowController,
    TagController as SiteTagController,
};

/*--================================
   PROFILE ROUTES
=================================--*/
Route::prefix('account')
    ->middleware(['web', 'auth', 'verified'])
    ->name('profile.')
    ->group(function () {

        Route::resource('/categories', CategoryController::class)->except(['show']);

        Route::resource('/comments', CommentController::class)->only(['index', 'destroy']);
        Route::get('/comments/{comment}/publish', [CommentController::class, 'publish'])->name('comments.publish')->can('comments_publish');
        Route::get('/comments/{id}/replies', [CommentController::class, 'commentReplies'])->name('comments.replies')->can('replies');

        Route::resource('/pages', PageController::class)->except(['show']);
        Route::resource('/permissions', PermissionController::class)->except(['show']);

        Route::resource('/posts', PostController::class)->except(['show']);
        Route::get('/posts/{post}/publish', [PostController::class, 'publish'])->name('posts.publish')->can('posts_publish');

        Route::resource('/profiles', ProfileController::class)->except(['show']);

        Route::resource('/replies', ReplyController::class)->only(['index', 'destroy']);
        Route::get('/replies/{reply}/publish', [ReplyController::class, 'publish'])->name('replies.publish')->can('replies_publish');

        Route::resource('/tags', TagController::class)->except(['show']);

        Route::resource('/users', UserController::class)->except(['show']);
        Route::get('/users/{user}/publish', [UserController::class, 'publish'])->name('users.publish');

        Route::get('/posts/comments/{id}', [CommentIfController::class, 'index'])->name('posts.comments.index');
        Route::get('/posts/comments/{comment}/id/{id}/page/{page}/publish', [CommentIfController::class, 'publish'])->name('posts.comments.publish')->can('comments_publish');
        Route::delete('/posts/comments/{comment}/id/{id}', [CommentIfController::class, 'destroy'])->name('posts.comments.destroy')->can('comments_delete');

        Route::get('/posts/replies/{id}', [ReplyIfController::class, 'index'])->name('posts.replies.index');
        Route::get('/posts/replies/{reply}/id/{id}/page/{page}/publish', [ReplyIfController::class, 'publish'])->name('posts.replies.publish')->can('replies_publish');
        Route::delete('/posts/replies/{reply}/id/{id}', [ReplyIfController::class, 'destroy'])->name('posts.replies.destroy')->can('replies_delete');

        Route::post('files/{id}/model/{model}/type/{type}', [FileController::class, 'store'])->name('files.store');
        Route::delete('files/{file}', [FileController::class, 'destroy'])->name('files.destroy');

        Route::put('/mydata/{user}', [UserMyDataController::class, 'update'])->name('mydata.update');
        Route::get('/mydata/{user}/edit', [UserMyDataController::class, 'edit'])->name('mydata.edit');

        Route::get('/start', [StartController::class, 'index'])->name('start');
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    });


/*--================================
   SITE ROUTES
=================================--*/
Route::prefix('')
    ->middleware(['web'])
    ->group(function () {
        Route::get('/post/{slug}', [ShowController::class, 'show'])->name('site.show');
        Route::get('/author/{slug}', [AuthorController::class, 'show'])->name('site.author');
        Route::get('/categories', [SiteCategoryController::class, 'index'])->name('site.categories');
        Route::get('/category/{slug}', [SiteCategoryController::class, 'show'])->name('site.category');
        Route::get('/tags', [SiteTagController::class, 'index'])->name('site.tags');
        Route::get('/tag/{slug}', [SiteTagController::class, 'show'])->name('site.tag');
        Route::get('/search', [SearchController::class, 'index'])->name('site.search');
        Route::post('/search', [SearchController::class, 'index'])->name('site.search.filters');
        Route::get('/install', [InstallController::class, 'index'])->name('site.install');
        Route::get('/about', [AboutController::class, 'index'])->name('site.about');
        Route::get('/', [HomeController::class, 'index'])->name('site.home');
    });

require __DIR__ . '/auth.php';
