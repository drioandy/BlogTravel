<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentService
{

    public function getByWeek()
    {
        $items = DB::table('comments')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        return $items;
    }
    public function getUrlKeyByField($field)
    {
        $milliseconds = round(microtime(true) * 1000);
        $urlKey = 'comment-' . str_slug($field, '-') . "-" . $milliseconds;
        return $urlKey;
    }
//    public function getListAll()
//    {
//        $categories = Category::all();
//        return $categories;
//    }
//
    public function getList($request)
    {
        $keyword = $request['keyword'];
        if (isset($keyword)) {
            $comments = Comment::where('content', 'like', '%' . $keyword . '%')->paginate(10);
            return $comments;
        }
        $comments = Comment::paginate(10);
        return $comments;
    }

    public function store($data)
    {
        $data->url_key = $this->getUrlKeyByField(User::find($data->user_id)->user_name);
        $commentData = [
            'content' => $data->content,
            'post_id' => $data->post_id,
            'user_id' => $data->user_id,
            'parent_id' => $data->parent_id,
            'url_key' => $data->url_key
        ];

        $comment = Comment::create($commentData);
        return $comment;
    }

//    public function edit($urlKey)
//    {
//        $category = Category::where('url_key', $urlKey)->first();
//        if (!$category) {
//            return abort(404);
//        }
//        return $category;
//    }
//
//    public function update($request, $urlKey)
//    {
//        $category = Category::where('url_key', $urlKey)->first();
//        if (!$category) {
//            return abort(404);
//        }
//
//        $request->url_key = $this->getUrlKeyByField($request->name);
//
//        $categoryData = [
//            'name' => $request->name,
//            'description' => $request->description,
//            'url_key' => $request->url_key,
//        ];
//        $category->update($categoryData);
//        return $category;
//    }
//
    public function delete($urlKey)
    {
        $comment = Comment::where('url_key', $urlKey)->first();
        if (!$comment) {
            return abort(404);
        }
        $comment->delete();
    }
//
//    public function getUrlKeyByField($field)
//    {
//        $milliseconds = round(microtime(true) * 1000);
//        $urlKey = $milliseconds . "-" . str_slug($field, '-');
//        return $urlKey;
//    }
//
//    public function getPostsByCate($urlKey, $perPage)
//    {
//        $category = Category::where('url_key', $urlKey)->first();
//        if (!$category) {
//            return abort(404);
//        }
//        $posts = Post::where('is_publish', 2)->where('status', 1)->where('category_id', $category->id)->paginate(3);
//
//        foreach ($posts as $post) {
//            $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;
//            if (Auth::check()) {
//                $post->bookmark = $post->bookmark->where('user_id', Auth::user()->id)->first();
//            }
//
//        }
//        return $posts;
//    }
}
