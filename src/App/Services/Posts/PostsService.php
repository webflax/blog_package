<?php
namespace Webflaxco\Blog\App\Services\Posts;

class PostsService
{
    protected $rules = [
        'title'=>['required'],
        'summary'=>['required'],
        'published_at'=>['required'],
        'published'=>['required'],
        'content'=>['required'],
    ];
}

?>
