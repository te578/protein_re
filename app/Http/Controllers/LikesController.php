<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Post;

class LikesController extends Controller
{
    public function toggleLike(Request $request)
    {
        $user_id = auth()->id(); // ログインユーザーのIDを取得
        $post_id = $request->post_id;

        $existing_like = Like::where('user_id', $user_id)->where('post_id', $post_id)->first();

        if ($existing_like) {
            // いいねが既に存在する場合は削除（いいねを解除）
            $existing_like->delete();
            $status = 'unliked';
        } else {
            // いいねが存在しない場合は追加（いいねを登録）
            Like::create([
                'user_id' => $user_id,
                'post_id' => $post_id,
            ]);
            $status = 'liked';
        }

        // ポストのいいね数を取得してレスポンスに含める
        $likes_count = Post::where('id', $post_id)->value('likes_count');

        return response()->json([
            'status' => $status,
            'likes_count' => $likes_count,
        ]);
    }
}

