<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () // 接続テスト用
{
    return view('welcome');
});


Route::get('/top', function () // トップページ
{
    return view('toppage');
});

Route::get('/login', function () // ログインページ
{
    return view('login');
});

Route::get('/mypage', function () // マイページ
{
    return view('mypage');
});

Route::get('/unregistered', function () // 仮登録ページ
{
    return view('unregistered');
});

Route::get('/newaccount', function () // 新規アカウント登録ページ
{
    return view('newaccount');
});

Route::get('/accouunt_update', function () // アカウント情報更新ページ
{
    return view('accouuntUpdate');
});

Route::get('/mailadress_update', function () // ログインID更新ページ
{
    return view('mailadressUpdate');
});

Route::get('/nickname_update', function () // ニックネーム変更ページ
{
    return view('nicknameUpdate');
});

Route::get('/password_update', function () // パスワード変更ページ
{
    return view('passwordUpdate');
});

Route::get('/postlist', function () // 投稿一覧ページ
{
    return view('postlist');
});

Route::get('/postditail', function () // 投稿詳細ページ
{
    return view('postditail');
});

Route::get('/newpost', function () // 新規投稿ページ
{
    return view('newpost');
});

Route::get('/post_delete', function () // 投稿削除ページ
{
    return view('postDelete');
});

Route::get('/post_update', function () // 投稿編集ページ
{
    return view('postUpdate');
});

Route::get('/comment_delete', function () // コメント削除ページ
{
    return view('commentDelete');
});

Route::get('/comment_update', function () // コメント編集ページ
{
    return view('commentUpdate');
});


Route::get('/logout', function () // ログアウト完了
{
    return view('logout');
});

Route::get('/sendmail_unregistered', function () // 仮登録メール送信完了
{
    return view('sendmail_unregistered');
});

Route::get('/registered', function () // 仮登録完了
{
    return view('registered');
});

Route::get('/accouunt_got', function () // アカウント登録完了
{
    return view('accouuntGot');
});

Route::get('/sendmail_update', function () // ログインID更新メール送信完了
{
    return view('sendmail_update');
});

Route::get('/mailadress_updated', function () // ログインID更新完了
{
    return view('mailadressUpdated');
});

Route::get('/link_timeup', function () // リンクの有効期限切れ
{
    return view('linkTimeUp');
});
