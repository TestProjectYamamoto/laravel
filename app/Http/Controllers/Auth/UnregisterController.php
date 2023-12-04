<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InsertUnregisteredsModel;
use App\Models\Unregistereds;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class UnregisterController extends Controller
{
    public function showUnregistrationForm(): View
    {
        return view('auth.unregister');
    }

    public function tryRegist(Request $request): View|RedirectResponse
    {
        $mailadress = $request->input('email');

        $valid = validator(['email' => $mailadress], ['email' => 'required|email:dns']);

        if ($valid->passes()) // 正常なメアドなら、
        {
            $insert = new InsertUnregisteredsModel;

            $existence = Unregistereds::where('mailadress', $mailadress)->first();
            $valid0or1 = Unregistereds::select('valid')->where('mailadress', '=', $mailadress)->get();

            if ($existence) // 登録済みだった場合の処理
            {
                if ($valid0or1 === 0) // validが0だった場合
                {
                    $valid->errors()->add('email', 'このメールアドレスは使用できません。');
                    return back()->withInput()->withErrors($valid);
                }

                $insert->totalUnregist($mailadress);

                session()->put('guestId', $mailadress);
                $request->session()->reflash();

                return view('sendmailUnregistered');
            }

            $insert->totalUnregist($mailadress);

            DB::beginTransaction();
            try {
                Unregistereds::insert([
                    'mailadress' => $mailadress,
                    'valid' => 1
                ]);
                DB::commit();
            } catch (\Throwable $e) {
                DB::rollback();
                $error_code = $e->getMessage();
                $error_message = $error_code === '1000' ? '登録更新処理に失敗しました。' : '不明なエラーです。';
                return response()->json(['error' => $error_message], 500);
            }

            session()->put('guestId', $mailadress);
            $request->session()->reflash();

            return view('sendmailUnregistered');
        }

        //エラー表示の処理
        $valid->errors()->add('email', 'このメールアドレスは使用できません。');
        return back()->withInput()->withErrors($valid);
    }
}
