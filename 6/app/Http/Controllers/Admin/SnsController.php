<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\posts;

class SnsController extends Controller
{
    public function add()
    {
        return view('admin.sns.index');
    }

    public function create(Request $request)
    {
        // Varidationを行う
        $this->validate($request, posts::$rules);
        $sns = new posts;
        $form = $request->all();
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // データベースに保存する
        $sns->fill($form);
        $sns->save();
        // admin/snsにリダイレクトする
        return redirect('admin/sns');
    }

    public function index(Request $request)
    {
        $posts = posts::orderBy('created_at', 'desc')->get(); // 投稿を新しいものから順に取得
        $user = Auth::user(); // 認証済みユーザー情報を取得
        return view('admin.sns.index', compact('posts', 'user'));
    }

    public function delete(Request $request)
    {
        // 該当するposts Modelを取得
        $sns = posts::find($request->id);
        // 削除する
        $sns->delete();
        return redirect('admin/sns');
    }  
}
