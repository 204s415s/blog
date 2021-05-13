<?php

namespace App\Http\Controllers; //PostController.phpはここにあるよ！

use App\Post; //作成したPostモデルクラスを使うよ！
use App\Fav;
use App\User;
use App\Http\Requests\PostRequest; //作成したリクエストクラスを使うよ！
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller {
	/**
	* Post一覧を表示する
	* 
	* @param：引数 Post Postモデル
	* @return array Postモデルリスト
	* Postテーブルの配列を返す、といった感じ　なのか？
	*/
	//記事一覧画面
	public function index(Post $post, Request $request) {
		$query = Post::query();
		$keyword = $request->input('keyword');
		if(!empty($keyword)) {
			$query->where('title', 'like', '%' . $keyword . '%');
		} else{
			$query;
		}
		$posts = $query->orderBy('updated_at', 'DESC')->paginate(10);
		$user = Auth::user();
		return view('index', compact('posts', 'keyword', 'user'));
	}
	
	//お気に入りした記事を表示するよ
	public function favorite(Fav $fav) {
		$query = Fav::query();
		$user = Auth::id();
		$query->where('user_id', '=', $user);
		$fav = $query->get();
		return view('post.favs')->with(['favs' => $fav]);
	}
	
	/**
	* 特定IDのpostを表示する
	*
	* @params：引数 Object Post // 引数の$postはid=1のPostインスタンス
	* @return Reposnse post view
	*/

	//記事詳細画面
	public function show(Post $post) {
		$user = Auth::user();
    	return view('post.show')->with(['post' => $post, 'user' => $user]);
	}
	
	//記事作成画面
	public function create() {
		return view('post.create');
	}
	
	//入力されたデータをDBに送り、詳細画面にリダイレクトをする
	public function store(Post $post, PostRequest $request)	{
    	$input = $request['post'];
	    $post->fill($input);
	    $post->user_id = Auth::id();
	    $post->save();
    	return redirect('/posts/' . $post->id);
	}
	
	//記事の編集画面を出すよ
	public function edit(Post $post){
		return view('post.edit')->with(['post' => $post]);
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
		return redirect('/posts');
	}
	
	
}
	
?>
	