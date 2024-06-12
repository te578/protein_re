<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Cloudinary;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index(Post $post)
    {
        
            //   $postsData = [];
            // foreach($post as $post){
            //     $postData = [
            //         'label' => $post->title,
            //         'data' => [$post->fat, $post->protein, $post->carbohydrates],
            //         'backgroundColor' => [
            //             'rgba(255, 99, 132, 0.2)', // 脂質の色
            //             'rgba(54, 162, 235, 0.2)', // タンパク質の色
            //             'rgba(75, 192, 192, 0.2)' // 炭水化物の色
            //         ],
            //         'borderColor' => [
            //             'rgba(255, 99, 132, 1)', // 脂質の境界線色
            //             'rgba(54, 162, 235, 1)', // タンパク質の境界線色
            //             'rgba(75, 192, 192, 1)' // 炭水化物の境界線色
            //         ],
            //         'borderWidth' => 1
            //     ];
            //     array_push($postsData, $postData);
            // }'postsData' => $postsData

   
  return view('posts.index')->with(['posts' => $post->paginate(10), ]);//'posts'はindexの中の$postsを表している
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
        $posts = $posts->where('user_id', $user->id)->get(); // ユーザーの投稿を取得
        //$follow_count = $user->follows->count();
        
        // フォローしている人の数
        $followingsCount = $user->followingsCount(); 
        // フォロワーの数
        $followersCount = $user->followersCount();
                
        
        return view('posts.mypage',compact('user', 'posts','followingsCount', 'followersCount' ));//['user' => $user, 'posts' => $posts]でもいい
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }


    public function userpage(User $user)
    {    
        $posts = $user->posts()->get();//$userの中に指定したIDが入っている、posts()はリレーションから指定のpostsテーブルを取ってきている()
        return view('posts.userpage')->with(['user' => $user, 'posts' => $posts]);
    }
    
    public function search()
    {
        return view('posts.search');
    }
    
    
    
    public function searching(Request $request,Post $posts)
    {
         $keyword = $request->input('keyword');

        $query = Post::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('body', 'LIKE', "%{$keyword}%");
        }
 
        $posts = $query->get();

        return view('posts.search', compact('posts','keyword'));
    }


















    }

