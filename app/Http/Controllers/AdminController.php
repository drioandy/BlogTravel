<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UserPasswordRequest;
use App\Http\Requests\UserPasswordRequestRequest;
use App\Http\Requests\UserRequest;
use App\Services\ContactService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\RoleService;
use App\Services\CategoryService;
use App\Services\PostService;
use App\Services\CommentService;

class AdminController extends Controller
{
    protected $postService;
    protected $userService;
    protected $roleService;
    protected $categoryService;
    protected $commentService;
    protected $contactService;

    public function __construct(
        CategoryService $categoryService,
        PostService     $postService,
        UserService     $userService,
        RoleService     $roleService,
        CommentService  $commentService,
        ContactService  $contactService
    )
    {
        $this->categoryService = $categoryService;
        $this->postService = $postService;
        $this->userService = $userService;
        $this->roleService = $roleService;
        $this->commentService = $commentService;
        $this->contactService = $contactService;
    }

//    Dashboard
    public function getDashboard()
    {

        $posts = $this->postService->getByWeek();
        $postTotal = $posts->count();
        $contacts = $this->contactService->getByWeek();
        $contactTotal = $contacts->count();
        $comments = $this->commentService->getByWeek();
        $commentTotal = $comments->count();
        $users = $this->userService->getByWeek();
        $userTotal = $users->count();
        return view('admin.pages.dashboard')->with(['postTotal' => $postTotal, 'contactTotal' => $contactTotal, 'commentTotal' => $commentTotal, 'userTotal' => $userTotal]);
    }

    // Category
    public function categoryList(Request $request)
    {
        $categories = $this->categoryService->getList($request);
        return view('admin.pages.category.index')->with(['categories' => $categories]);
    }

    public function createCategory()
    {
        return view('admin.pages.category.create');
    }

    public function storeCategory(CategoryRequest $request)
    {
        $category = $this->categoryService->store($request);
        return redirect(route('category.edit', $category->url_key))->with(['message' => 'Create Category Successfully']);
    }

    public function editCategory($urlKey)
    {
        $category = $this->categoryService->edit($urlKey);
        return view('admin.pages.category.edit')->with(['category' => $category]);
    }

    public function updateCategory(CategoryRequest $request, $urlKey)
    {
        $category = $this->categoryService->update($request, $urlKey);
        return redirect(route('category.edit', $category->url_key))->with(['message' => 'Update Category Successfully']);
    }

    public function deleteCategory($urlKey)
    {
        $category = $this->categoryService->delete($urlKey);
        return redirect(route('category.index'))->with(['message' => 'Delete Category Successfully']);
    }

    //Post

    public function getPostListApprove(Request $request)
    {
        $posts = $this->postService->getPostsApprove($request);
        return view('admin.pages.post.approve')->with(['posts' => $posts]);
    }

    public function getPostListWait(Request $request)
    {
        $posts = $this->postService->getPostsWait($request);
        return view('admin.pages.post.wait')->with(['posts' => $posts]);
    }

    public function getPostListReject(Request $request)
    {
        $posts = $this->postService->getPostsReject($request);
        return view('admin.pages.post.reject')->with(['posts' => $posts]);
    }

//
//    public function createPost()
//    {
//        return view('admin.pages.category.create');
//    }
//
//    public function storePost(Request $request)
//    {
//        $category = $this->categoryService->store($request);
//        return redirect(route('category.edit', $category->url_key))->with(['message' => 'Create Category Successfully']);
//    }
//
//    public function editPost($urlKey)
//    {
//        $category = $this->categoryService->edit($urlKey);
//        return view('admin.pages.category.edit')->with(['category' => $category]);
//    }
//
//    public function updatePost(Request $request, $urlKey)
//    {
//        $category = $this->categoryService->update($request, $urlKey);
//        return redirect(route('category.edit', $category->url_key))->with(['message' => 'Update Category Successfully']);
//    }

    public function deletePost($urlKey)
    {
        $post = $this->postService->delete($urlKey);
        return back()->with(['message' => 'Post has been move to trash']);
    }

    public function restorePost($urlKey)
    {
        $post = $this->postService->restore($urlKey);
        return back()->with(['message' => 'Post has been restore']);
    }

    public function getPostDetail($urlKey)
    {
        $post = $this->postService->viewPostDetail($urlKey);
        return view('admin.pages.post.detail')->with(['post' => $post]);
    }

    // Account
    public function accountList(Request $request)
    {
        $perPage = 5;
        if (\Route::current()->getName() == 'account.index') {
            $roleId = 1;
            $title = 'Account Admin List';
            $url = 'account';
        } else {
            $roleId = 2;
            $title = 'Account User List';
            $url = 'account.user';
        }
        $accounts = $this->userService->getListUser($request, $roleId, $perPage);
        foreach ($accounts as $account) {
            $account->avatar = '/storage/image/users/avatar/' . $account->avatar;
        }
        return view('admin.pages.account.index')->with(['accounts' => $accounts, 'title' => $title, 'url' => $url]);
    }

    public function createAccount()
    {
        if (\Route::current()->getName() == 'account.create') {
            $roleId = 1;
            $title = 'Create Account Admin ';
            $url = 'account';

        } else {
            $roleId = 2;
            $title = 'Create Account User ';
            $url = 'account.user';
        }
        return view('admin.pages.account.create')->with(['title' => $title, 'url' => $url]);
    }

    public function storeAccount(UserPasswordRequest $request)
    {
        if (\Route::current()->getName() == 'account.store') {
            $roleId = 1;
            $title = 'Create Account Admin ';
            $url = 'account';
            $route = 'account.create';
        } else {
            $roleId = 2;
            $title = 'Create Account User ';
            $url = 'account.user';
            $route = 'account.user.create';

        }
        $account = $this->userService->storeAccount($request, $roleId);
        return redirect(route($route))->with(['message' => 'Create Account Successfully', 'title' => $title, 'url' => $url]);
    }

    public function editAccount($urlKey)
    {
        if (\Route::current()->getName() == 'account.edit') {
            $roleId = 1;
            $title = 'Edit Account Admin ';
            $url = 'account';
            $route = 'account.create';
        } else {
            $roleId = 2;
            $title = 'Edit Account User ';
            $url = 'account.user';
            $route = 'account.user.create';
        }
        $account = $this->userService->findAccount($urlKey);
        return view('admin.pages.account.edit')->with(['account' => $account, 'title' => $title, 'url' => $url]);
    }

    public function updateAccount(UserRequest $request, $urlKey)
    {
        if (\Route::current()->getName() == 'account.edit') {
            $roleId = 1;
            $title = 'Edit Account Admin ';
        } else {
            $roleId = 2;
            $title = 'Edit Account User ';
        }
        $account = $this->userService->updateUser($request, $urlKey);
        return redirect(route('account.edit', $account->url_key))->with(['message' => 'Update Account Successfully', 'title' => $title])->with('account', $account);
    }

    public function deleteAccount($urlKey)
    {
        $account = $this->userService->deleteUser($urlKey);
        return redirect(route('account.index'))->with('message', 'Delete Account Successfully');
    }

    // Comment
    public function commentList(Request $request)
    {
        $comments = $this->commentService->getList($request);
        return view('admin.pages.comment.index')->with(['comments' => $comments]);
    }

    public function deleteComment(Request $request, $urlKey)
    {
        $comments = $this->commentService->getList($request);
        $comment = $this->commentService->delete($urlKey);
        return redirect(route('comment.index'))->with(['message' => 'Detele Comment Successfully', 'comments' => $comments]);

    }

    // Role
    public function getRoleList()
    {
        $roles = $this->roleService->getRoleList();
        return view('admin.pages.role.index')->with('roles', $roles);
    }

    public function createRole()
    {
        return view('admin.pages.role.create');
    }

    public function storeRole(Request $request)
    {
        $role = $this->roleService->storeRole($request->all());
        if (!$role) {
            return redirect(route('role.create'))->with(['error' => 'Create Role Fail']);
        }
        return redirect(route('role.create'))->with(['message' => 'Create Role Successfully']);

    }

    public function editRole($id)
    {
        $role = $this->roleService->editRole($id);

        return view('admin.pages.role.edit')->with('role', $role);
    }

    public function updateRole(Request $request, $id)
    {
        $role = $this->roleService->updateRole($request->all(), $id);

        return redirect(route('role.edit', $role->id))->with(['role' => $role, 'message' => 'Update Role Successfully']);
    }

    public function deleteRole($id)
    {
        $this->roleService->deleteRole($id);
        return redirect(route('role.index'))->with(['message' => 'Delete Role Successfully']);
    }


//    Contact

    public function contactList(Request $request)
    {

        $contacts = $this->contactService->getList($request);
        return view('admin.pages.contact.index')->with(['contacts' => $contacts]);
    }

    public function deleteContact(Request $request, $id)
    {
        $contacts = $this->contactService->getList($request);
        $contact = $this->contactService->delete($id);
        return redirect(route('contact.index'))->with(['message' => 'Detele Contact Successfully', 'contacts' => $contacts]);

    }

    public function editProfile($urlKey)
    {
        $roleId = 1;
        $title = 'Edit Profile ';
        $url = 'account';
        $account = $this->userService->findAccount($urlKey);
        return view('admin.pages.account.edit')->with(['account' => $account, 'title' => $title, 'url' => $url]);
    }

    public function apiPostByWeek()
    {

        $data = $this->postService->getApiPostByWeek();

        return response()->json($data);
    }

    public function apiPostByCategory()
    {
        $data = $this->postService->getApiPostsByCategory();

        return response()->json($data);
    }

}
