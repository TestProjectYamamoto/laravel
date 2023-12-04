<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Posts;
use App\Models\Comments;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;

class PostController extends Controller
{
    public function newpostView(): View
    {
        return view('newpost');
    }

    public function tryPost(Request $request): RedirectResponse|Response
    {
        $request->validate(
            [
                'title' => 'required|string|max:20',
                'sentence' => 'required|string|max:200',
            ],
            [
                'title.required' => 'The post-title field is required.',
                'title.max:20' => 'Please enter 1 to 20 characters.',
                'sentence.required' => 'The post-sentence field is required.',
                'sentence.max:200' => 'Please enter 1 to 200 characters.'
            ]);

        $uid = Auth::user()->uid;
        $postTitle = $request->input('title');
        $postSentence = $request->input('sentence');

        DB::beginTransaction();
        try
        {
            Posts::insert([
                'user_uid' => $uid,
                'title' => $postTitle,
                'sentence' => $postSentence,
                'valid' => 1
            ]);
            DB::commit();
        }
        catch (\Throwable $e)
        {
            DB::rollback();
            $error_code = $e->getMessage();
            $error_message = $error_code === '1000' ? '登録更新処理に失敗しました。' : '不明なエラーです。';
            return response()->json(['error' => $error_message], 500);
        }
        return redirect('home')->with('status', 'Post created successfully!');
    }

    public function postlistView(): View
    {
        Paginator::useBootstrap();
        $user = new Users;

        $posts = Posts::paginate(10);
        return view('postlist',[
            'postsData' => $posts,
            'userData' => $user
        ]);
    }

    public function trySearch(Request $request): View|RedirectResponse
    {
        $user = new Users;
        $query = Posts::query();
        $inputTitle = $request->input('searchTitle');
        $inputSentence = $request->input('searchSentence');

        if(!empty($inputTitle) && !empty($inputSentence)) // どっちも検索
        {
            $query->where('title', 'LIKE', "%{$inputTitle}%");
            $query->where('sentence', 'LIKE', "%{$inputSentence}%");
            $posts = $query->paginate(10);
            return view('postlist',[
                'postsData' => $posts,
                'userData' => $user
            ]);
        }
        if(!empty($inputTitle) && empty($inputSentence)) // タイトルだけ
        {
            $query->where('title', 'LIKE', "%{$inputTitle}%");
            $posts = $query->paginate(10);
            return view('postlist',[
                'postsData' => $posts,
                'userData' => $user
            ]);
        }
        if(empty($inputTitle) && !empty($inputSentence)) // 本文だけ
        {
            $query->where('sentence', 'LIKE', "%{$inputSentence}%");
            $posts = $query->paginate(10);
            return view('postlist',[
                'postsData' => $posts,
                'userData' => $user
            ]);
        }
        return redirect('/postlist'); // 未入力
    }

    public function postditailView(Request $request): View
    {
        Paginator::useBootstrap();
        $user = new Users;

        $id = $request->id;
        $posts = Posts::where('id', $id)->get();

        $query = Comments::query();
        $query->where('post_id', $id);
        $comments = $query->paginate(10);

        return view('postditail',[
            'commentsData' => $comments,
            'postData' => $posts,
            'userData' => $user
        ]);
    }

    public function updateView(Request $request): View
    {
        $post = new Posts;
        $postId = $request->input('postId');

        session()->put('postId', $postId);
        $request->session()->reflash();

        return view('postUpdate', ['postData' => $post]);
    }

    public function deleteView(Request $request): View
    {
        $post = new Posts;
        $postId = $request->input('postId');

        session()->put('postId', $postId);
        $request->session()->reflash();

        return view('postDelete', [
            'postData' => $post
        ]);
    }

    public function tryUpdate(Request $request): RedirectResponse|Response
    {
        $request->validate(
            [
                'title' => 'required|string|max:20',
                'sentence' => 'required|string|max:200',
            ],
            [
                'title.required' => 'The post-title field is required.',
                'title.max:20' => 'Please enter 1 to 20 characters.',
                'sentence.required' => 'The post-sentence field is required.',
                'sentence.max:200' => 'Please enter 1 to 200 characters.'
            ]);

        $id = $request->input('postId');
        $title = $request->input('title');
        $sentence = $request->input('sentence');

        DB::beginTransaction();
        try
        {
            Posts::where('id', $id)->update([
                'title' => $title,
                'sentence' => $sentence
            ]);
            DB::commit();
        }
        catch (\Throwable $e)
        {
            DB::rollback();
            $error_code = $e->getMessage();
            $error_message = $error_code === '1000' ? '登録更新処理に失敗しました。' : '不明なエラーです。';
            return response()->json(['error' => $error_message], 500);
        }
        return redirect('home')->with('status', 'Post updated successfully!');
    }

    public function tryDelete(Request $request): RedirectResponse
    {
        $id = $request->input('postId');

        Posts::where('id', $id)->update([
            'valid' => 0
        ]);

        return redirect('home')->with('status', 'Post deleted successfully!');
    }
}
