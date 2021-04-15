<?php

namespace App\Http\Controllers; //PostController.phpはここにあるよ！

use App\Post; //作成したPostモデルクラスを使うよ！
use App\Http\Requests\PostRequest; //作成したリクエストクラスを使うよ！
use Illuminate\Http\Request;

class PostController extends Controller {
	/**
	* Post一覧を表示する
	* 
	* @param：引数 Post Postモデル
	* @return array Postモデルリスト
	* Postテーブルの配列を返す、といった感じ　なのか？
	*/
	//記事一覧画面
	public function index(Post $post) {
	    return view('index')->with(['posts' => $post->getPaginateByLimit()]);
	}
	
	/**
	* 特定IDのpostを表示する
	*
	* @params：引数 Object Post // 引数の$postはid=1のPostインスタンス
	* @return Reposnse post view
	*/

	//記事詳細画面
	public function show(Post $post) {
    	return view('show')->with(['post' => $post]);
	}
	
	//記事作成画面
	public function create() {
		return view('create');
	}
	
	//入力されたデータをDBに送り、詳細画面にリダイレクトをする
	public function store(Post $post, PostRequest $request)	{
    	$input = $request['post'];
	    $post->fill($input)->save();
    	return redirect('/posts/' . $post->id);
	}
	
	//記事の編集画面を出すよ
	public function edit(Post $post){
		return view('edit')->with(['post' => $post]);
	}
	
	//記事の編集をするよ
	public function update(Post $post, PostRequest $request) {
		$edit = $request['post'];
		$post->fill($edit)->save();
		return redirect('/posts/' . $post->id);
	}
	
	//記事の削除をするよ
	public function delete(Post $post) {
		$post->delete();
		return redirect('/');
	}
}
	
?>
	