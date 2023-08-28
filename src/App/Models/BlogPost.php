<?php

namespace Webflaxco\Blog\App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Webflaxco\Blog\Facades\Category;

class BlogPost extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'title',
        'summary',
        'published_at',
        'published',
        'content',
        'category'
    ];

    /**
     * Relation To Authroe
     * If you have a different guard, you can inherit from this class and change the author method, which is the method to communicate with the author.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Link to comments on this post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(BlogComment::class);
    }

    /**
     * Communication with categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function category()
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_category_blog_tag');
    }
    /**
     * Communication with tags
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(BlogTags::class, 'blog_post_blog_tag');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
