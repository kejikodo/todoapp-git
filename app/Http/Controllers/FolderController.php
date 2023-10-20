<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\User;
use App\Http\Requests\CreateFolder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
    public function showCreateForm()
    {
        return view('folders/create');
    }

    public function create(CreateFolder $request)
    {
        // フォルダモデルのインスタンスを作成する
        $folder = new Folder();
        // タイトルに入力値を代入する
        $folder->title = $request->title;

        // Auth::user() からユーザーを取得
        $user = Auth::user();

        // ユーザーにフォルダを関連付けて保存
        $user->folders()->save($folder);

        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);

    }

}
