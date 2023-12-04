<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function tryComment(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'comment' => 'required|string|max:100'
            ],
            [
                'comment.required' => 'The comment field is required.',
                'comment.max:100' => 'Please enter 1 to 100 characters.'
            ]);

        $uid = Auth::user()->uid;
        $postId = $request->input('postId');
        $comment = $request->input('comment');

        DB::beginTransaction();
        try
        {
            Comments::insert([
                'user_uid' => $uid,
                'post_id' => $postId,
                'sentence' => $comment,
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
        return back();
    }

    public function updateView(Request $request): View
    {
        $comment = new Comments;
        $commentId = $request->input('commentId');

        session()->put('commentId', $commentId);
        $request->session()->reflash();

        return view('commentUpdate', [
            'commentData' => $comment
        ]);
    }

    public function deleteView(Request $request): View
    {
        $comment = new Comments;
        $commentId = $request->input('commentId');

        session()->put('commentId', $commentId);
        $request->session()->reflash();

        return view('commentDelete', [
            'commentData' => $comment
        ]);
    }

    public function tryUpdate(Request $request): RedirectResponse|Response
    {
        $id = $request->input('commentId');
        $sentence = $request->input('comment');

        DB::beginTransaction();
        try
        {
            Comments::where('id', $id)->update(['sentence' => $sentence]);
            DB::commit();
        }
        catch (\Throwable $e)
        {
            DB::rollback();
            $error_code = $e->getMessage();
            $error_message = $error_code === '1000' ? '登録更新処理に失敗しました。' : '不明なエラーです。';
            return response()->json(['error' => $error_message], 500);
        }
        return redirect('home')->with('status', 'Comment updated successfully!');
    }

    public function tryDelete(Request $request): RedirectResponse
    {
        $id = $request->input('commentId');

        Comments::where('id', $id)->update(['valid' => 0]);

        return redirect('home')->with('status', 'Comment deleted successfully!');
    }
}
