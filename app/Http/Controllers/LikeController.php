<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Notification;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        try {

            $postId = $request->input('postid');
            $user = Auth::user();

            $like = Like::where('user_id', $user->id)->where('post_id', $postId)->first();

            if ($like) {
                $like->delete();
                Post::where('id', $postId)->decrement('like_count');
                
            } else {
                Like::create(['user_id' => $user->id, 'post_id' => $postId]);
                Post::where('id', $postId)->increment('like_count');
            }


            $likeCount = Like::where('post_id', $postId)->count();

            return response()->json(['success' => true, 'likeCount' => $likeCount]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
