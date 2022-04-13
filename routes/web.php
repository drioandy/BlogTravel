<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

//Admin
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'getDashboard'])->name('dashboard');
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'getDashboard'])->name('dashboard');
    //Category
    Route::prefix('category')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminController::class, 'categoryList'])->name('category.index');
        Route::get('/create', [\App\Http\Controllers\AdminController::class, 'createCategory'])->name('category.create');
        Route::post('/create', [\App\Http\Controllers\AdminController::class, 'storeCategory'])->name('category.store');
        Route::get('/edit/{urlKey}', [\App\Http\Controllers\AdminController::class, 'editCategory'])->name('category.edit');
        Route::put('/update/{urlKey}', [\App\Http\Controllers\AdminController::class, 'updateCategory'])->name('category.update');
        Route::delete('/delete/{urlKey}', [\App\Http\Controllers\AdminController::class, 'deleteCategory'])->name('category.delete');
    });
    Route::prefix('post')->group(function () {
        Route::get('/approve', [App\Http\Controllers\AdminController::class, 'getPostListApprove'])->name('post.approve');
        Route::get('/waiting', [App\Http\Controllers\AdminController::class, 'getPostListWait'])->name('post.wait');
        Route::get('/reject', [App\Http\Controllers\AdminController::class, 'getPostListReject'])->name('post.reject');
        Route::get('change-status/{id}', 'App\Http\Controllers\PostController@changeStatus')->name('post.changeStatus');
        Route::delete('/delete/{urlKey}', [\App\Http\Controllers\AdminController::class, 'deletePost'])->name('post.delete');
        Route::post('/restore/{urlKey}', [App\Http\Controllers\AdminController::class, 'restorePost'])->name('post.restore');
        Route::get('/create', [\App\Http\Controllers\AdminController::class, 'createPost'])->name('post.create');
        Route::post('/create', [\App\Http\Controllers\AdminController::class, 'storePost'])->name('post.store');
        Route::get('/edit/{urlKey}', [\App\Http\Controllers\AdminController::class, 'editPost'])->name('post.edit');
        Route::put('/update/{urlKey}', [\App\Http\Controllers\AdminController::class, 'updatePost'])->name('post.update');
        Route::get('/detail/{urlKey}', [\App\Http\Controllers\AdminController::class, 'getPostDetail'])->name('post.view');
    });
    Route::prefix('account')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'accountList'])->name('account.index');
        Route::get('/create', [\App\Http\Controllers\AdminController::class, 'createAccount'])->name('account.create');
        Route::post('/create', [\App\Http\Controllers\AdminController::class, 'storeAccount'])->name('account.store');
        Route::get('/edit/{urlKey}', [\App\Http\Controllers\AdminController::class, 'editAccount'])->name('account.edit');
        Route::post('/update/{urlKey}', [\App\Http\Controllers\AdminController::class, 'updateAccount'])->name('account.update');
        Route::delete('/delete/{urlKey}', [\App\Http\Controllers\AdminController::class, 'deleteAccount'])->name('account.delete');
        Route::prefix('user')->group(function () {
            Route::get('/', [\App\Http\Controllers\AdminController::class, 'accountList'])->name('account.user.index');
            Route::get('/create', [\App\Http\Controllers\AdminController::class, 'createAccount'])->name('account.user.create');
            Route::post('/create', [\App\Http\Controllers\AdminController::class, 'storeAccount'])->name('account.user.store');
            Route::get('/edit/{urlKey}', [\App\Http\Controllers\AdminController::class, 'editAccount'])->name('account.user.edit');
            Route::post('/update/{urlKey}', [\App\Http\Controllers\AdminController::class, 'updateAccount'])->name('account.user.update');
            Route::delete('/delete/{urlKey}', [\App\Http\Controllers\AdminController::class, 'deleteAccount'])->name('account.user.delete');
        });
    });
    Route::prefix('comment')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminController::class, 'commentList'])->name('comment.index');
        Route::delete('/delete/{urlKey}', [\App\Http\Controllers\AdminController::class, 'deleteComment'])->name('comment.delete');
    });
    Route::prefix('role')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'getRoleList'])->name('role.index');
        Route::get('/create', [\App\Http\Controllers\AdminController::class, 'createRole'])->name('role.create');
        Route::post('/store', [\App\Http\Controllers\AdminController::class, 'storeRole'])->name('role.store');
        Route::get('/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editRole'])->name('role.edit');
        Route::post('/update/{id}', [\App\Http\Controllers\AdminController::class, 'updateRole'])->name('role.update');
        Route::delete('/delete/{id}', [\App\Http\Controllers\AdminController::class, 'deleteRole'])->name('role.delete');

    });
    Route::prefix('contact')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminController::class, 'contactList'])->name('contact.index');
        Route::delete('/delete/{urlKey}', [\App\Http\Controllers\AdminController::class, 'deleteContact'])->name('contact.delete');
    });

    Route::get('/profile/{urlKey}',[\App\Http\Controllers\AdminController::class,'editProfile'])->name('admin.profile');
});

//Client

Route::get('/', [ClientController::class, 'index'])->name('home');

//CRUD Post
Route::get('/new', [ClientController::class, 'createPost'])->middleware('auth')->name('post.new');
Route::post('/save', [ClientController::class, 'savePost'])->middleware('auth')->name('post.save');
Route::get('/edit/{urlKey}', [ClientController::class, 'editPost'])->middleware('auth')->name('post.edit');
Route::post('/update/{urlKey}', [ClientController::class, 'updatePost'])->middleware('auth')->name('post.update');

// Get Post By User
Route::get('/my-post/{urlKey}', [ClientController::class, 'getPostsByUser'])->middleware('auth')->name('post.user');
Route::get('/draft/{urlKey}', [ClientController::class, 'getPostsDraftByUser'])->middleware('auth')->name('post.draft');
Route::get('/private/{urlKey}', [ClientController::class, 'getPostsPrivateByUser'])->middleware('auth')->name('post.private');
Route::get('/publish/{urlKey}', [ClientController::class, 'getPostsPublishByUser'])->middleware('auth')->name('post.publish');
Route::get('/reject/{urlKey}', [ClientController::class, 'getPostsRejectByUser'])->middleware('auth')->name('post.isReject');
Route::get('/collections/{urlKey}', [ClientController::class, 'getCollections'])->middleware('auth')->name('post.collections');

//BookMark
Route::get('/mark/{urlKey}', [ClientController::class, 'setBookMark'])->name('post.mark');

//Comment
Route::post('/comment', [ClientController::class, 'storeComment'])->name('comment.store');

//Post Publish
Route::get('/posts', [ClientController::class, 'getPosts'])->name('post.all');
Route::get('/post/{urlKey}', [ClientController::class, 'detailPost'])->name('post.detail');
Route::get('/category/{urlKey}', [ClientController::class, 'getPostsByCategory'])->name('post.category');

//Profile
Route::get('/profile/{urlKey}', [ClientController::class, 'getProfile'])->middleware('auth')->name('profile');
Route::get('/profile-edit/{urlKey}', [ClientController::class, 'editProfile'])->middleware('auth')->name('profile.edit');
Route::post('/profile-edit/{urlKey}', [ClientController::class, 'updateProfile'])->middleware('auth')->name('profile.update');

//Contact
Route::get('/contact', [ClientController::class, 'contact'])->name('contact');
Route::post('/contact', [ClientController::class, 'storeContact'])->name('contact.store');




