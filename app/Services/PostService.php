<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostService
{

    public function getByWeek()
    {
        $items = DB::table('posts')
            ->where('is_publish',2)
            ->where('status',1)
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        return $items;
    }
    public function getUrlKeyByField($field)
    {
        $milliseconds = round(microtime(true) * 1000);
        $urlKey = $milliseconds . "-" . str_slug($field, '-');
        return $urlKey;
    }

    public function getPostsWait($request)
    {
        $keyword = $request['keyword'];
        if (isset($keyword)) {
            $posts = Post::where('title', 'like', '%' . $keyword . '%')->where('is_publish', 2)->where('status', 0)->paginate(10);
            foreach ($posts as $post) {
                $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;

            }
            return $posts;
        }

        $posts = Post::where('is_publish', 2)->where('status', 0)->paginate(10);
        foreach ($posts as $post) {
            $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;

        }
        return $posts;
    }

    public function getPostsApprove($request)
    {
        $keyword = $request['keyword'];
        if (isset($keyword)) {
            $posts = Post::where('title', 'like', '%' . $keyword . '%')->where('is_publish', 2)->where('status', 1)->paginate(10);
            foreach ($posts as $post) {
                $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;

            }
            return $posts;
        }

        $posts = Post::where('is_publish', 2)->where('status', 1)->paginate(10);
        foreach ($posts as $post) {
            $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;

        }
        return $posts;
    }

    public function getPostsReject($request)
    {
        $keyword = $request['keyword'];
        if (isset($keyword)) {
            $posts = Post::onlyTrashed()->where('title', 'like', '%' . $keyword . '%')->where('is_publish', 2)->whereIn('status', [0, 1])->paginate(10);
            foreach ($posts as $post) {
                $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;
            }
            return $posts;
        }

        $posts = Post::onlyTrashed()->where('is_publish', 2)->whereIn('status', [0, 1])->paginate(10);
        foreach ($posts as $post) {
            $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;
        }
        return $posts;
    }

    public function create($request)
    {
        if ($request->hasFile('thumbnail')) {
            $imageName = $request->file('thumbnail')->getClientOriginalName();
            $filename = pathinfo($imageName, PATHINFO_FILENAME);
            $extension = pathinfo($imageName, PATHINFO_EXTENSION);
            $thumbnailName = $filename . time() . '-' . $filename . '.' . $extension;
            $request->file('thumbnail')->storeAs('public/image/posts/thumbnail', $thumbnailName);
//            '/storage/image/posts/thumbnail/' .
            $thumbnail = $thumbnailName;
        } else {
            $thumbnail = 'default-image.png';
        }
        $postData = [
            'title' => $request->title,
            'content' => $request->content,
            'short_description' => $request->short_description,
            'is_publish' => $request->is_publish,
            'thumbnail' => $thumbnail,
            'url_key' => $this->getUrlKeyByField($request->title),
            'status' => 0,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,

        ];
        $post = Post::create($postData);
        return $post;
    }

    public function delete($urlKey)
    {
        $post = Post::where('url_key', $urlKey)->first();
        if (!$post) {
            return abort(404);
        }

        $post->delete();
    }

    public function restore($urlKey)
    {
        $post = Post::withTrashed()->where('url_key', $urlKey)->first();
        if (!$post) {
            return abort(404);
        }
        $post->restore();
    }


//    Client

    public function getPostsPaginate($request, $perPage)
    {
        $keyword = $request['keyword'];
        if (isset($keyword)) {
            $posts = Post::where('title', 'like', '%' . $keyword . '%')->where('is_publish', 2)->where('status', 1)->paginate($perPage);
            foreach ($posts as $post) {
                $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;
                if (Auth::check()) {
                    $post->bookmark = $post->bookmark->where('user_id', Auth::user()->id)->first();
                }
            }
            return $posts;
        }

        $posts = Post::where('is_publish', 2)->where('status', 1)->paginate($perPage);
        foreach ($posts as $post) {
            $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;
            $post->user->avatar = '/storage/image/users/avatar/' . $post->user->avatar;
            if (Auth::check()) {
                $post->bookmark = $post->bookmark->where('user_id', Auth::user()->id)->first();
            }
        }
        return $posts;


    }

    public function getPostsByUser($request, $perPage, $urlKey, $isPublish)
    {

        $user = User::where('url_key', $urlKey)->first();
        $keyword = $request['keyword'];
        if (isset($keyword)) {
            $posts = Post::where('title', 'like', '%' . $keyword . '%')->where('is_publish', $isPublish)->where('user_id', $user->id)->paginate($perPage);
            foreach ($posts as $post) {
                $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;

            }
            return $posts;
        }

        $posts = Post::where('user_id', $user->id)->where('is_publish', $isPublish)->paginate($perPage);
        foreach ($posts as $post) {
            $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;
        }
        return $posts;

    }

    public function getPostsByUserIsReject($request, $perPage, $urlKey, $isPublish)
    {
        $user = User::where('url_key', $urlKey)->first();
        $keyword = $request['keyword'];
        if (isset($keyword)) {
            $posts = Post::onlyTrashed()->where('title', 'like', '%' . $keyword . '%')->where('user_id', $user->id)->where('is_publish', 2)->whereIn('status', [0, 1])->paginate($perPage);
            foreach ($posts as $post) {
                $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;
            }
            return $posts;
        }

        $posts = Post::onlyTrashed()->where('is_publish', 2)->where('user_id', $user->id)->whereIn('status', [0, 1])->paginate($perPage);
        foreach ($posts as $post) {
            $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;
        }
        return $posts;
    }

    public function getPostCollection($urlKey, $perPage)
    {
        $user = User::where('url_key', $urlKey)->first();
        $posts = $user->getPostThroughBookMark($perPage);
        foreach ($posts as $post) {
            $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;
            if (Auth::check()) {
                $post->bookmark = $post->bookmark->where('user_id', Auth::user()->id)->first();
            }
        }
        return $posts;
    }

    public function getLatestPost($request)
    {
        $keyword = $request['keyword'];
        if (isset($keyword)) {
            $posts = Post::where('title', 'like', '%' . $keyword . '%')->where('is_publish', 2)->where('status', 1)->take(4)->get();
            foreach ($posts as $post) {
                $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;
                if (Auth::check()) {
                    $post->bookmark = $post->bookmark->where('user_id', Auth::user()->id)->first();
                }
            }
            return $posts;
        }

        $posts = Post::where('is_publish', 2)->where('status', 1)->orderBy('updated_at', 'DESC')->take(4)->get();
        foreach ($posts as $post) {
            $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;
            if (Auth::check()) {
                $post->bookmark = $post->bookmark->where('user_id', Auth::user()->id)->first();
            }
        }
        return $posts;
    }

    public function viewPostDetail($urlKey)
    {
        $post = Post::withTrashed()->where('url_key', $urlKey)->first();
        if (!$post) {
            return abort(404);
        }
        $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;
        $this->getCommentUrl($post->comments);
        return $post;
    }

    public function detail($urlKey)
    {
        $post = Post::where('url_key', $urlKey)->where('is_publish', 2)->where('status', 1)->first();
        if (!$post) {
            return abort(404);
        }
        if (Auth::check()) {
            $post->bookmark = $post->bookmark->where('user_id', Auth::user()->id)->first();
        }
        $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;
        $this->getCommentUrl($post->comments);
        return $post;
    }

    public function getPostsRelated($id, $postId, $total)
    {
        $category = Category::find($id);
        $postRelated = $category->posts->where('is_publish', 2)->where('status', 1)->where('id', '!=', $postId)->take($total);
        foreach ($postRelated as $post) {
            $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;
            if (Auth::check()) {
                $post->bookmark = $post->bookmark->where('user_id', Auth::user()->id)->first();
            }
        }
        return $postRelated;
    }

    public function editPostByUser($urlKey, $userId)
    {
        $post = Post::withTrashed()->where('url_key', $urlKey)->where('user_id', $userId)->first();
        if (!$post) {
            return abort(404);
        }
        $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;
        return $post;
    }

    public function updatePostByUser($request, $urlKey, $userId)
    {
        $post = Post::withTrashed()->where('url_key', $urlKey)->where('user_id', $userId)->first();
        $post->restore();
        if (!$post) {
            return abort(404);
        }

        if ($request->hasFile('thumbnail')) {
            $imageName = $request->file('thumbnail')->getClientOriginalName();
            $filename = pathinfo($imageName, PATHINFO_FILENAME);
            $extension = pathinfo($imageName, PATHINFO_EXTENSION);
            $thumbnailName = $filename . time() . '-' . $filename . '.' . $extension;
            $request->file('thumbnail')->storeAs('public/image/posts/thumbnail', $thumbnailName);
//            '/storage/image/posts/thumbnail/' .
            $thumbnail = $thumbnailName;
        } else {
            $thumbnail = $post->thumbnail;
        }
        $postData = [
            'title' => $request->title,
            'content' => $request->content,
            'short_description' => $request->short_description,
            'is_publish' => $request->is_publish,
            'thumbnail' => $thumbnail,
            'url_key' => $this->getUrlKeyByField($request->title),
            'status' => 0,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,

        ];
        $post->update($postData);
        $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;
        return $post;
    }

    public function getCommentUrl($comments)
    {
        foreach ($comments as $comment) {
            $comment->user->avatar = '/storage/image/users/avatar/' . $comment->user->avatar;
            $this->getCommentUrl($comment->replies);
        }
    }

    public function getApiPostByWeek()
    {
        $arrDayNames = [];
        for ($i = 0; $i < 7; $i++) {
            $now = Carbon::now();
            $arrDay[$i] = $now->subDay($i);
            $arrDayNames[$i] = $arrDay[$i]->format('D');
        }

        $arrDay = [];
        for ($i = 0; $i < 7; $i++) {
            $now = Carbon::now();
            $arrDay[$i] = $now->subDay($i);
        }

        $arrPostsData = [];
        foreach ($arrDay as $key => $item) {
            $model = Post::where('updated_at', '>=', $item->format('Y-m-d'). " 00:00:00")
                ->where('updated_at', '<=', $item->format('Y-m-d'). " 23:59:59")->where('is_publish', 2)->where('status',1)
                ->count();
            $arrPostsData[$key] = $model;
        }

        $data['label'] = $arrDayNames;
        $data['data'] = $arrPostsData;
        return $data;
    }

    public function getApiPostsByCategory()
    {
        $arrayCateName = [];
        $arrayTotalPost = [];
        $arrBackgroundColor = [];
        $cates = Category::all();
        $cates->load('posts');
        foreach ($cates as $key => $value) {
            $arrayCateName[]    = $value->name;
            $arrayTotalPost[]   = count($value->posts);
            $arrBackgroundColor[] = str_pad( dechex( mt_rand( 0, 127 ) ), 2, '0', STR_PAD_LEFT);
        }

        $data['label'] =   $arrayCateName;
        $data['data'] =   $arrayTotalPost;
        $data['backgroundColor'] = $arrBackgroundColor;
        return $data;
    }
}
