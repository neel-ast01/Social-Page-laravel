<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ArchiveController extends Controller
{
    public function archive(Request $request)
    {
        try {
            // Find the post
            $post = Post::findOrFail($request->input('postid'));

            // Toggle the is_archive value
            $post->is_archive = !$post->is_archive;
            $post->save();

            return response()->json(['success' => true, 'is_archive' => $post->is_archive]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Log error
            Log::error('Post not found with ID ' . $request->input('postid') . ': ' . $e->getMessage());

            return response()->json(['success' => false, 'message' => 'Post not found'], 404);
        } catch (\Exception $e) {
            // Log error
            Log::error('Error toggling archive status for post with ID ' . $request->input('postid') . ': ' . $e->getMessage());

            return response()->json(['success' => false, 'message' => 'Error toggling archive status'], 500);
        }
    }

    public function index()
    {
        $archivedPosts = Post::with('user')
            ->where('is_archive', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('archive.archive', compact('archivedPosts'));
    }

    public function showHidePost(Request $request)
    {
        try {
            $post = Post::findOrFail($request->input('postid'));

            // Toggle the is_archive value
            $post->is_archive = !$post->is_archive;
            $post->save();

            return response()->json(['success' => true, 'is_archive' => $post->is_archive]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
