<?php
namespace Webflaxco\Blog\App\Services\Categories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Webflaxco\Blog\App\Models\BlogCategory;

class CategoryService
{
    protected $rules = [
        'title' => ['required'],
        'description' => [],
        'parent_id' => [],
    ];

    protected BlogCategory $blogCategory;

    public function get(string $id)
    {
        $this->blogCategory = BlogCategory::find($id);
        return $this;
    }

    public function create(Request $request)
    {
        $data = $request->validate($this->rules);

        $created = BlogCategory::create($data);

        return $created;
    }

    public function update(Request $request)
    {
        if ($this->blogCategory instanceof BlogCategory) {
            $data = $request->validate($this->rules);
            $updated = $this->blogCategory->update($data);

            return $updated;
        }
    }

    public function delete()
    {
        if ($this->blogCategory instanceof BlogCategory)
            return $this->blogCategory->delete();
        else
            return null;
    }

    public function show()
    {
        return $this->blogCategory;
    }

    public function all()
    {
        return BlogCategory::all();
    }
}

?>
