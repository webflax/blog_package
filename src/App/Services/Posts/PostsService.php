<?php
namespace Webflaxco\Blog\App\Services\Posts;

use Illuminate\Http\Request;
use Webflaxco\Blog\App\Models\BlogPost;

class PostsService
{
    protected $rules = [
        'title' => ['required'],
        'summary' => ['required'],
        'published_at' => ['required'],
        'published' => ['required'],
        'content' => ['required'],
        'category' => ['required', 'array']
    ];

    protected BlogPost $blogPost;

    public function get($id)
    {
        $this->blogPost = BlogPost::findOrFail($id);
        return $this;
    }

    public function create(Request $request)
    {
        $data = $request->validate($this->rules);

        $created = BlogPost::create($data);

        $created->categories()->attach();

        return $created;
    }


    public function show()
    {
        return $this->blogPost;
    }

    public function update(Request $request)
    {
        $data = $request->validate($this->rules);

        if ($this->blogPost instanceof BlogPost)
            return $this->blogPost->update($data);
        else
            return false;
    }

    /**
     * delete the post
     *
     * @return bool|null
     */
    public function delete()
    {
        if ($this->blogPost instanceof BlogPost)
            return $this->blogPost->delete();
        else
            return null;
    }


    /**
     * get all of Posts
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function all()
    {
        return BlogPost::all();
    }

}

?>
