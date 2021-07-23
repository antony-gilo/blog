<?php

use App\Http\Controllers\AdminCategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminRedirect;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\AdminMediaController;
use App\Http\Controllers\AdminCommentController;
use App\Http\Controllers\CommentReplyController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::middleware(['admin'])->group(function () {
    Route::resource('/admin/users', AdminUserController::class);
    Route::get('/admin/home', [AdminRedirect::class, 'index'])->name('admin.home');
    Route::resource('/admin/posts', AdminPostsController::class);
    Route::resource('/admin/categories', AdminCategoryController::class);
    Route::resource('/admin/media', AdminMediaController::class);
    Route::resource('/admin/comments', AdminCommentController::class);
    Route::resource('/admin/comment/replies', CommentReplyController::class);
});

Route::post('/login/custom', [CustomLoginController::class, 'login'])->name('custom.login');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminRedirect::class, 'index'])->name('admin.index');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/posts/{id}', [AdminPostsController::class, 'post'])->name('home.blog');
});
