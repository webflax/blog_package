<?php

namespace Webflaxco\Blog\App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTags extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    /**
     * Communication with Posts that has this tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(BlogPost::class, 'blog_post_blog_tag');
    }
}
