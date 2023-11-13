<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToppageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\UnregisteredController;
use App\Http\Controllers\NewaccountController;
use App\Http\Controllers\AccountUpdateController;
use App\Http\Controllers\MailadressUpdateController;
use App\Http\Controllers\NicknameUpdateController;
use App\Http\Controllers\PasswordUpdateController;
use App\Http\Controllers\PostlistController;
use App\Http\Controllers\PostditailController;
use App\Http\Controllers\NewpostController;
use App\Http\Controllers\PostDeleteController;
use App\Http\Controllers\PostUpdateController;
use App\Http\Controllers\CommentDeleteController;
use App\Http\Controllers\CommentUpdateController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SendmailUnregisteredController;
use App\Http\Controllers\RegisteredController;
use App\Http\Controllers\AccountGotController;
use App\Http\Controllers\SendmailUpdateController;
use App\Http\Controllers\MailadressUpdatedController;
use App\Http\Controllers\LinkTimeupController;


Route::get('/', function () // 接続テスト用
{
    return view('welcome');
});


Route::get('/top', [ToppageController::class, '__invoke']); // トップページ

Route::get('/login', [LoginController::class, '__invoke'])->name('login'); // ログインページ

Route::get('/mypage', [MypageController::class, '__invoke'])->name('mypage'); // マイページ

Route::get('/unregistered', [UnregisteredController::class, '__invoke'])->name('unregistered'); // 仮登録ページ

Route::get('/newaccount', [NewaccountController::class, '__invoke'])->name('newaccount'); // 新規アカウント登録ページ

Route::get('/accouunt_update', [AccountUpdateController::class, '__invoke'])->name('accouunt_update'); // アカウント情報更新ページ

Route::get('/mailadress_update', [MailadressUpdateController::class, '__invoke'])->name('mailadress_update'); // ログインID更新ページ

Route::get('/nickname_update', [NicknameUpdateController::class, '__invoke'])->name('nickname_update'); // ニックネーム変更ページ

Route::get('/password_update', [PasswordUpdateController::class, '__invoke'])->name('password_update'); // パスワード変更ページ

Route::get('/postlist', [PostlistController::class, '__invoke'])->name('postlist'); // 投稿一覧ページ

Route::get('/postditail', [PostditailController::class, '__invoke'])->name('postditail'); // 投稿詳細ページ

Route::get('/newpost', [NewpostController::class, '__invoke'])->name('newpost'); // 新規投稿ページ

Route::get('/post_delete', [PostDeleteController::class, '__invoke'])->name('post_delete'); // 投稿削除ページ

Route::get('/post_update', [PostUpdateController::class, '__invoke'])->name('post_update'); // 投稿編集ページ

Route::get('/comment_delete', [CommentDeleteController::class, '__invoke'])->name('comment_delete'); // コメント削除ページ

Route::get('/comment_update', [CommentUpdateController::class, '__invoke'])->name('comment_update'); // コメント編集ページ


Route::get('/logout', [LogoutController::class, '__invoke'])->name('logout'); // ログアウト完了

Route::get('/sendmail_unregistered', [SendmailUnregisteredController::class, '__invoke'])->name('sendmail_unregistered'); // 仮登録メール送信完了

Route::get('/registered', [RegisteredController::class, '__invoke'])->name('registered'); // 仮登録完了

Route::get('/accouunt_got', [AccountGotController::class, '__invoke'])->name('accouunt_got'); // アカウント登録完了

Route::get('/sendmail_update', [SendmailUpdateController::class, '__invoke'])->name('sendmail_update'); // ログインID更新メール送信完了

Route::get('/mailadress_updated', [MailadressUpdatedController::class, '__invoke'])->name('mailadress_updated'); // ログインID更新完了

Route::get('/link_timeup', [LinkTimeupController::class, '__invoke'])->name('link_timeup'); // リンクの有効期限切れ
