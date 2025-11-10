<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\InertiaTest;

use function Termwind\render;

class InertiaTestController extends Controller
{
    public function index() {
        return Inertia::render('Inertia/Index', [
            'blogs' => InertiaTest::all()
        ]);
    }

    public function create() {
        return Inertia::render('Inertia/Create');
    }

    public function show($id) {
        // dd($id);
        return Inertia::render('Inertia/Show', 
        [
            'id' => $id,
            'blog' => InertiaTest::findOrFail($id)
        ]);
    }

    public function store(Request $request) {
        // バリデーションを設定
        $request->validate([
            'title' => ['required', 'max:20'],
            'content' => ['required'],
        ]);
        // モデルのインスタンス作成
        $inertiaTest = new InertiaTest();
        // title,contentを代入
        $inertiaTest->title = $request->title;
        $inertiaTest->content = $request->content;
        // セーブ
        $inertiaTest->save();
        // 戻る
        return to_route('inertia.index')
        ->with([
            'message' => '登録しました'
        ]);
    }

    public function delete($id) {

        $book = InertiaTest::findOrFail($id);
        $book->delete();

        return to_route('inertia.index')
        ->with([
            'message' => '削除しました'
        ]);
    }

}
