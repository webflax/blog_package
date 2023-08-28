<?php
namespace Webflaxco\Blog\App\Services\Tags;

use Illuminate\Http\Request;
use Webflaxco\Blog\App\Models\BlogTags;

class TagService
{
    protected $rules = [
        'title' => ['required'],
    ];

    protected BlogTags $blogTags;

    public function get(string $id)
    {
        $this->blogTags = BlogTags::find($id);
        return $this;
    }

    public function create(Request $request)
    {
        $data = $request->validate($this->rules);

        $created = BlogTags::create($data);

        return $created;
    }

    public function update(Request $request)
    {
        if ($this->blogTags instanceof BlogTags) {
            $data = $request->validate($this->rules);
            $updated = $this->blogTags->update($data);
            return $updated;
        }
    }

    public function delete()
    {
        if ($this->blogTags instanceof BlogTags)
            return $this->blogTags->delete();
        else
            return null;
    }

    public function show()
    {
        return $this->blogTags;
    }

    public function all()
    {
        return BlogTags::all();
    }
}

?>
