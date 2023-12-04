<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UnregisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Models\Users;
use App\Models\Posts;

/* トップページ */
Route::get('/', function ()
{
    $totalUsers = Users::count();
    $totalPosts = Posts::count();
    return view('welcome',[
        'users' => $totalUsers,
        'posts' => $totalPosts
    ]);
})->name('welcome');

/* 認証系 */
Auth::routes();
Route::get('/unregistered', [UnregisterController::class, 'showUnregistrationForm'])->name('unregister');
Route::post('/unregistered', [UnregisterController::class, 'tryRegist']);

/* マイページ */
Route::get('/home', [HomeController::class, 'index'])->name('home');

/* 投稿系 */
Route::get('/newpost', [PostController::class, 'newpostView'])->name('newpost');
Route::post('newpost', [PostController::class, 'tryPost']);
Route::get('/postlist', [PostController::class, 'postlistView'])->name('postlist');
Route::post('searchPost', [PostController::class, 'trySearch'])->name('searchPost');
Route::get('/postditail{id}', [PostController::class, 'postditailView'])->name('postditail');
Route::post('/postUpdate', [PostController::class, 'updateView'])->name('postUpdateView');
Route::post('/updatePost', [PostController::class, 'tryUpdate'])->name('postUpdate');
Route::post('/postDelete', [PostController::class, 'deleteView'])->name('postDeleteView');
Route::post('deletePost', [PostController::class, 'tryDelete'])->name('postDelete');

/* コメント系 */
Route::post('newcomment', [CommentController::class, 'tryComment'])->name('newcomment');
Route::post('/commentUpdate', [CommentController::class, 'updateView'])->name('commentUpdateView');
Route::post('updateComment', [CommentController::class, 'tryUpdate'])->name('commentUpdate');
Route::post('/commentDelete', [CommentController::class, 'deleteView'])->name('commentDeleteView');
Route::post('deleteComment', [CommentController::class, 'tryDelete'])->name('commentDelete');
