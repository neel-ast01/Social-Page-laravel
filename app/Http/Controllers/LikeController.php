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
            } else {
                Like::create(['user_id' => $user->id, 'post_id' => $postId]);

                // Get the post owner
                $post = Post::findOrFail($postId);
                $user_id = Auth::user();


                // Create a notification for the post owner
                Notification::create([
                    'user_id' => $user_id->id,
                    'post_id' => $postId,
                    'type' => 'like'
                ]);
            }


            $likeCount = Like::where('post_id', $postId)->count();

            return response()->json(['success' => true, 'likeCount' => $likeCount]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    // public function unlike(Request $request)
    // {
    //     $post = Post::findOrFail($request->postid);
    //     $user = Auth::user();

    //     $like = Like::where('user_id', $user->id)->where('post_id', $post->id)->first();
    //     if ($like) {
    //         $like->delete();
    //         $post->likes--;
    //         $post->save();
    //     }

    //     return response()->json(['likes' => $post->likes]);
    // }
}
