<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;

class LikesController extends Controller
{
   public function like(Request $request, $postId)
    {
        $user = $request->user();
        $post = Post::findOrFail($postId);

        if (!$post->isLikedBy($user)) {
            $post->likes()->create(['user_id' => $user->id]);
        }

        return back();
    }

    public function unlike(Request $request, $postId)
    {
        $user = $request->user();
        $post = Post::findOrFail($postId);

        $like = $post->likes()->where('user_id', $user->id)->first();
        if ($like) {
            $like->delete();
        }

        return back();
    }
    
  

}






