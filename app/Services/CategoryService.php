<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryService
{

    public function getByWeek()
    {
        $items = DB::table('categories')
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();
        return $items;
    }
    public function getListAll()
    {
        $categories = Category::all();
        return $categories;
    }

    public function getList($request)
    {
        $keyword = $request['keyword'];
        if (isset($keyword)) {
            $categories = Category::where('name', 'like', '%' . $keyword . '%')->paginate(10);
            return $categories;
        }
        $categories = Category::paginate(10);
        return $categories;
    }

    public function getDetailByUrlKey($urlKey)
    {
        $category = Category::where('url_key', $urlKey)->first();
        if(!$category){
            return abort(404);

        }
        return  $category;
    }

    public function store($data)
    {

        $data->url_key = $this->getUrlKeyByField($data->name);

        $categoryData = [
            'name' => $data->name,
            'description' => $data->description,
            'url_key' => $data->url_key,
        ];

        $category = Category::create($categoryData);
        return $category;
    }

    public function edit($urlKey)
    {
        $category = Category::where('url_key', $urlKey)->first();
        if (!$category) {
            return abort(404);
        }
        return $category;
    }

    public function update($request, $urlKey)
    {
        $category = Category::where('url_key', $urlKey)->first();
        if (!$category) {
            return abort(404);
        }

        $request->url_key = $this->getUrlKeyByField($request->name);

        $categoryData = [
            'name' => $request->name,
            'description' => $request->description,
            'url_key' => $request->url_key,
        ];
        $category->update($categoryData);
        return $category;
    }

    public function delete($urlKey)
    {
        $category = Category::where('url_key', $urlKey)->first();
        if (!$category) {
            return abort(404);
        }
        $posts = Post::withTrashed()->where('category_id',$category->id)->get();
        foreach ($posts as $post){
            $post->forceDelete();
        }
        $category->delete();
    }

    public function getUrlKeyByField($field)
    {
        $milliseconds = round(microtime(true) * 1000);
        $urlKey = $milliseconds . "-" . str_slug($field, '-');
        return $urlKey;
    }

    public function getPostsByCate($urlKey, $perPage)
    {
        $category = Category::where('url_key', $urlKey)->first();
        if (!$category) {
            return abort(404);
        }
        $posts = Post::where('is_publish', 2)->where('status', 1)->where('category_id', $category->id)->paginate($perPage);

        foreach ($posts as $post) {
            $post->thumbnail = '/storage/image/posts/thumbnail/' . $post->thumbnail;
            if (Auth::check()) {
                $post->bookmark = $post->bookmark->where('user_id', Auth::user()->id)->first();
            }

        }
        return $posts;
    }
}
