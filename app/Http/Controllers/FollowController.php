<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
   
    
    
    
     public function follow(User $user)
    {
        $currentUser = Auth::user(); // フォローする側のユーザー（ユーザーA）
        if ($currentUser->id !== $user->id && !$currentUser->following()->where('followed_user_id', $user->id)->exists()) {
            $currentUser->following()->attach($user->id); // フォローされる側のユーザー（ユーザーB）のIDを追加
        }

        return back();
    }

    public function unfollow(User $user)
    {
        $currentUser = Auth::user(); // フォローを解除する側のユーザー（ユーザーA）
        if ($currentUser->id !== $user->id && $currentUser->following()->where('followed_user_id', $user->id)->exists()) {
            $currentUser->following()->detach($user->id); // フォローされる側のユーザー（ユーザーB）のIDを削除
        }

        return back();
    }
    
    
    
    // public function followa(User $user)
    // {
    //     auth()->user()->followings()->attach($user->id);
    //     return back();
    // }

    // public function unfollowa(User $user)
    // {
    //     auth()->user()->followings()->detach($user->id);
    //     return back();
    // }
}
