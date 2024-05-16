<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $like = Like::create([
            'user_id' => auth()->id(),
            'post_id' => $request->post_id,
        ]);

        $likeCount = Like::where('post_id', $request->post_id)->count();

        return response()->json(['success' => true, 'like_count' => $likeCount, 'like' => $like]);
    }


    public function unlike(Request $request)
    {
        $like = Like::where('user_id', auth()->id())
            ->where('post_id', $request->post_id)
            ->first();

        if ($like) {
            $like->delete();
        }

        $likeCount = Like::where('post_id', $request->post_id)->count();

        return response()->json(['success' => true, 'like_count' => $likeCount]);
    }
}
