<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
   return view('posts.index')->with(['posts' => $post->get()]);
    }
    
    public function show(Post $post)
    {
    return view('posts.show')->with(['post' => $post]);

    }
    public function create()
    {
    return view('posts.create');
    }
    public function store(PostRequest $request, Post $post)
    {
    $user_id = Auth::id();
    $post->user_id = $user_id;//user_idを受け取る処理
    
    $input = $request['post'];
    $post->fill($input)->save();
    
    return redirect('/posts/' . $post->id);
    }
}
