<?php

namespace Webflaxco\Blog\Providers;

use Illuminate\Cache\TagSet;
use Illuminate\Support\ServiceProvider;
use Webflaxco\Blog\App\Services\Categories\CategoryService;
use Webflaxco\Blog\App\Services\Posts\PostsService;
use Webflaxco\Blog\App\Services\Tags\TagService;
use Webflaxco\Blog\Facades\Comment;

class BlogProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('post', function ($app) {
            return new PostsService();
        });

        $this->app->singleton('category', function ($app) {
            return new CategoryService();
        });

        $this->app->singleton('comment', function ($app) {
            return new Comment();
        });

        $this->app->singleton('tag', function ($app) {
            return new TagService();
        });

        $dir = __DIR__ . "../database/migrations/";
        $this->loadMigrationsFrom([
            $dir . "2023_08_28_074132_create_blog_posts_table.php",
            $dir . "2023_08_28_074140_create_blog_comments_table.php",
            $dir . "2023_08_28_074147_create_blog_categories_table.php",
            $dir . "2023_08_28_074154_create_blog_tags_table.php",
            $dir . "2023_08_28_074500_create_blog_post_metas_table.php",
        ]);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
