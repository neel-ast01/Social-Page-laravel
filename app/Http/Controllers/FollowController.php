<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FollowController extends Controller
{
    public function follow(User $user)
    {
        $follower = Auth::user();

        if (!$follower->followings()->where('followed_id', $user->id)->exists()) {
            $follower->followings()->attach($user->id);
            return response()->json(['message' => 'Successfully followed user'], 200);
        }

        return response()->json(['message' => 'Already following this user'], 400);
    }


    public function unfollow(User $user)
    {
        $follower = Auth::user();

        if ($follower->followings()->where('followed_id', $user->id)->exists()) {
            $follower->followings()->detach($user->id);
            return response()->json(['message' => 'Successfully unfollowed user'], 200);
        }
        return response()->json(['message' => 'Not following this user'], 400);
    }
}
