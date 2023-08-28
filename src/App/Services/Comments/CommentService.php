<?php
namespace Webflaxco\Blog\App\Services\Comments;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Webflaxco\Blog\App\Models\BlogComment;

class CommentService
{
    protected $rules = [
        'content' => ['required', 'min:10', 'max:191'],
        'rate' => ['required', 'integer', 'min:0.5', 'max:5'],
        'email' => [!Auth::check() ? 'required' : ''],
        'alias' => [!Auth::check() ? 'required' : ''],
        'blog_post_id' => ['required'],
        'replay_to' => [],
    ];

    protected BlogComment $blogComment;

    public function get(string $id)
    {
        $this->blogComment = BlogComment::find($id);
        return $this;
    }

    public function create(Request $request)
    {
        $data = $request->validate($this->rules);

        $created = BlogComment::create($data);

        return $created;
    }

    public function update(Request $request)
    {
        if ($this->blogComment instanceof BlogComment) {
            $data = $request->validate($this->rules);
            $updated = $this->blogComment->update($data);

            return $updated;
        }
    }

    public function delete()
    {
        if ($this->blogComment instanceof BlogComment)
            return $this->blogComment->delete();
        else
            return null;
    }

    public function show()
    {
        return $this->blogComment;
    }

    public function all()
    {
        return BlogComment::all();
    }
}

?>
