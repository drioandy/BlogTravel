<?php

namespace App\Services;

use App\Models\Bookmark;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class BookmarkService
{
    public function getListAll()
    {
        $bookmarks = Bookmark::all();
        return $bookmarks;
    }

    public function getMark($urlKey, $userId)
    {

    }
    public function setMark($urlKey, $userId)
    {
        $post = Post::where('url_key', $urlKey)->where('is_publish', 2)->where('status', 1)->first();
        if (!$post) {


        }

        $bookmark = Bookmark::where('post_id', $post->id)->where('user_id', Auth::user()->id)->first();
        if ($bookmark) {
            $bookmark->delete();
            return $message = ['title' => 'The post has been deleted from your collection', 'status' => 1];
        } else {
            $bookmarkData = [
                'post_id' => $post->id,
                'user_id' => Auth::user()->id,
            ];
//          dd($bookmarkData);
            $bookmark = Bookmark::create($bookmarkData);

            return $message = ['title' => 'The Post has been add to your collection', 'status' => 0];
        }
    }

//    public function store($data)
//    {
//
//        $data->url_key = $this->getUrlKeyByField($data->name);
//
//        $categoryData = [
//            'name' => $data->name,
//            'description' => $data->description,
//            'url_key' => $data->url_key,
//        ];
//
//        $category = Category::create($categoryData);
//        return $category;
//    }
//
//    public function delete($urlKey)
//    {
//        $category = Category::where('url_key', $urlKey)->first();
//        if (!$category) {
//            return abort(404);
//        }
//        $category->delete();
//    }
//
//    public function getUrlKeyByField($field)
//    {
//        $milliseconds = round(microtime(true) * 1000);
//        $urlKey = $milliseconds . "-" . str_slug($field, '-');
//        return $urlKey;
//    }


}
