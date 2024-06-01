<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Cloudinary;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
   return view('posts.index')->with(['posts' => $post->paginate(10)]);//'posts'はindexの中の$postsを表している
   //$post->get()はpostsテーブルからデータを取ってきているここの$postはインスタンスであり
   //(Post $post)を引数にして自動的にとってきている
    }
    
    public function show(Post $post)
    {
    return view('posts.show')->with(['post' => $post]);

    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function store(PostRequest $request, Post $post)//PostRequsetは入力内容にルールを作れる、
    //これが成功したときに以下が実行される
    {
    //cloudinaryへ画像を送信し、画像のURLを$image_urlに代入している
   
    $user_id = Auth::id();//現在認証しているユーザーからIDを取る
    $post->user_id = $user_id;//user_idを受け取る処理ここで$postにuser_idを渡している
    //
    
      
     $input = $request['post'];//name=post[]のなかの値フォームから送信されたデータのうち
    if($request->file('post.image_url')){
     $image_url = Cloudinary::upload($request->file('post.image_url')->getRealPath())->getSecurePath();
    $input += ['image_url' => $image_url];
     $input['image_url'] = $image_url;
    }
    
    $post->fill($input)->save();//name="post[]" の中に含まれる全ての値を $input 変数に格納しています。
        return redirect('/posts/' . $post->id);//「指定されたURLに移動してください」
    }
    
    public function mypage(Post $posts)
    {
        $user = Auth::user(); // ログインしているユーザーを取得
        $posts = Post::where('user_id', $user->id)->get(); // ユーザーの投稿を取得

        return view('posts.mypage',compact('user', 'posts'));//['user' => $user, 'posts' => $posts]でもいい
    }
    
    public function delete(Post $post)
    {
    $post->delete();
        return redirect('/');
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' =>$post]);
    }

    }

