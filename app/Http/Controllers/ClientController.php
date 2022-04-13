<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\SavePostRequest;
use App\Services\BookmarkService;
use App\Services\CategoryService;
use App\Services\CommentService;
use App\Services\ContactService;
use App\Services\PostService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{

    protected $postService;
    protected $categoryService;
    protected $userService;
    protected $bookmarkService;
    protected $commentService;
    protected $contactService;

    public function __construct(
        PostService     $postService,
        CategoryService $categoryService,
        UserService     $userService,
        BookmarkService $bookmarkService,
        CommentService  $commentService,
        ContactService  $contactService
    )
    {

        $this->postService = $postService;
        $this->categoryService = $categoryService;
        $this->userService = $userService;
        $this->commentService = $commentService;
        $this->bookmarkService = $bookmarkService;
        $this->contactService = $contactService;
    }

    public function index(Request $request)
    {
        $perPage = 5;
        $categories = $this->categoryService->getListAll();
        $latestPost = $this->postService->getLatestPost($request);
        $posts = $this->postService->getPostsPaginate($request, $perPage);

        return view('client.pages.home', compact('latestPost', 'posts', 'categories'));
    }

    public function createPost()
    {
        $categories = $this->categoryService->getListAll();

        return view('client.pages.post.new')->with('categories', $categories);
    }

    public function savePost(SavePostRequest $request)
    {
        $categories = $this->categoryService->getListAll();

        $post = $this->postService->create($request);

        return redirect(route('post.new'))->with(['categories' => $categories, 'message' => 'Create Post Successfully. Please Wait Admin Approve Your Post']);
    }

    public function editPost($urlKey)
    {
        $userId = Auth::id();
        $categories = $this->categoryService->getListAll();

        $post = $this->postService->editPostByUser($urlKey, $userId);
        return view('client.pages.post.edit')->with(['post' => $post, 'categories' => $categories]);
    }

    public function updatePost(SavePostRequest $request, $urlKey)
    {
        $userId = Auth::id();
        $categories = $this->categoryService->getListAll();

        $post = $this->postService->updatePostByUser($request, $urlKey, $userId);

        return redirect(route('post.edit', $post->url_key))->with(['post' => $post, 'categories' => $categories, 'message' => 'Update Post Successfully. Please Wait Admin Approve Your Post']);
    }

    public function detailPost($urlKey)
    {
        $numRelatedPost = 2;
        $categories = $this->categoryService->getListAll();
        $post = $this->postService->detail($urlKey);

        $relatedPost = $this->postService->getPostsRelated($post->category->id, $post->id, $numRelatedPost);

        return view('client.pages.post.detail')->with(['post' => $post, 'categories' => $categories, 'relatedPost' => $relatedPost]);
    }

    public function getPosts(Request $request)
    {
        $perPage = 5;
        $categories = $this->categoryService->getListAll();
        $posts = $this->postService->getPostsPaginate($request, $perPage);
        return view('client.pages.post.post-by-category')->with(['categories' => $categories, 'posts' => $posts]);
    }

    public function getPostsByUser(Request $request, $urlKey)
    {
        $perPage = 5;
        $postsDraft = $this->postService->getPostsByUser($request, $perPage, $urlKey, 0);
        $postsPrivate = $this->postService->getPostsByUser($request, $perPage, $urlKey, 1);
        $postsPublish = $this->postService->getPostsByUser($request, $perPage, $urlKey, 2);
        return view('client.pages.post.my-post')->with(['postsDraft' => $postsDraft, 'postsPrivate' => $postsPrivate, 'postsPublish' => $postsPublish, 'title' => 'Private']);
    }

    public function getPostsDraftByUser(Request $request, $urlKey)
    {
        $perPage = 5;
        $postsDraft = $this->postService->getPostsByUser($request, $perPage, $urlKey, 0);
        return view('client.pages.post.my-post')->with(['posts' => $postsDraft, 'title' => 'Draft']);
    }

    public function getPostsPrivateByUser(Request $request, $urlKey)
    {
        $perPage = 5;
        $postsPrivate = $this->postService->getPostsByUser($request, $perPage, $urlKey, 1);
        return view('client.pages.post.my-post')->with(['posts' => $postsPrivate, 'title' => 'Private']);
    }

    public function getPostsPublishByUser(Request $request, $urlKey)
    {
        $perPage = 5;
        $postsPublish = $this->postService->getPostsByUser($request, $perPage, $urlKey, 2);
        return view('client.pages.post.my-post')->with(['posts' => $postsPublish, 'title' => 'Publish']);
    }

    public function getPostsRejectByUser(Request $request, $urlKey)
    {
        $perPage = 5;
        $postsPublish = $this->postService->getPostsByUserIsReject($request, $perPage, $urlKey, 2);
        return view('client.pages.post.my-post')->with(['posts' => $postsPublish, 'title' => 'Reject']);
    }

    public function getCollections($urlKey)
    {
        $perPage = 5;
        $posts = $this->postService->getPostCollection($urlKey, $perPage);
        return view('client.pages.post.collections')->with(['posts' => $posts, 'title' => 'Collections']);

    }

    public function getPostsByCategory(Request $request, $urlKey)
    {
        $perPage = 5;
        $category = $this->categoryService->getDetailByUrlKey($urlKey);
        $posts = $this->categoryService->getPostsByCate($urlKey, $perPage);
        $categories = $this->categoryService->getListAll();

        return view('client.pages.post.post-by-category')->with(['category' => $category,'categories' => $categories, 'posts' => $posts]);
    }

    // Profile

    public function getProfile($urlKey)
    {
//        $user = $this->userService()->getUser($id);
        return view('client.pages.profile.profile');
    }

    public function editProfile($urlKey)
    {
//        $user = $this->userService()->getUser($id);
        return view('client.pages.profile.edit');
    }

    public function updateProfile(Request $request, $urlKey)
    {
        $user = $this->userService->updateUser($request, $urlKey);


        return redirect(route('profile', $urlKey))->with('message', 'Update Successfully');
    }


    public function setBookMark($urlKey)
    {
        $userId = Auth::user()->id;
        $bookmark = $this->bookmarkService->setMark($urlKey, $userId);
        return back()->with('bookmark', $bookmark);
    }

    public function storeComment(Request $request)
    {
        $comment = $this->commentService->store($request);
        return back();
    }

    //Contact
    public function contact()
    {
        return view('client.pages.contact');
    }

    public function storeContact(ContactRequest $request)
    {
        $contact = $this->contactService->store($request);
        return redirect(route('contact'))->with(['message'=>'Send Message Successfully']);
    }
}
