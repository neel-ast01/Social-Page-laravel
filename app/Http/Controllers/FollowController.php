<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FollowController extends Controller
{
    public function follow(Request $request)
    {
        try {
            $userToFollow = User::findOrFail($request->user_id);

            // Check if already following to prevent duplicate follows
            if (!Auth::user()->isFollowing($userToFollow)) {
                Auth::user()->follow($userToFollow);
            }

            return response()->json(['status' => 'success', 'message' => 'User followed successfully', 'user' => $userToFollow]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function unfollow(Request $request)
    {
        try {
            $userToUnfollow = User::findOrFail($request->user_id);

            // Check if the authenticated user is following the user to unfollow
            if (Auth::user()->isFollowing($userToUnfollow)) {
                // If following, unfollow the user
                Auth::user()->unfollow($userToUnfollow);

                return response()->json(['status' => 'success', 'message' => 'User unfollowed successfully', 'user' => $userToUnfollow]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
