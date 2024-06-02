<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function follow(User $user)
    {
        auth()->user()->followings()->attach($user->id);
        return back();
    }

    public function unfollow(User $user)
    {
        auth()->user()->followings()->detach($user->id);
        return back();
    }
}
