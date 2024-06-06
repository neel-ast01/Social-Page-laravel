<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $posts = Post::with('user')
            ->where('is_archive', 0)
            ->orderBy('created_at', 'desc')
            ->get();
        // return $posts->comments;
        return view('home', compact('posts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $request->validate([
                'post_data' => 'required',
                'post_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $post = new Post();

            $post->descrip = $request->input('post_data');

            if ($request->hasFile('post_img')) {
                $file = $request->file('post_img');

                $fileName = $file->getClientOriginalName();
                $file->move(public_path('assests/posts'), $fileName);
                $post->post_image = $fileName;
            }

            $post->user_id = auth()->user()->id;
            $post->save();
            $likeCount = Like::where('post_id', $post->id)->count();
            $commentCount = Comment::where('post_id', $post->id)->count();

            $user = $post->user;
            // return $post;

            return response()->json(['success' => true, 'post' => $post, 'user' => $user, 'likecount' => $likeCount, 'commentCount' => $commentCount]);
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response()->json(['success' => false]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'post_data' => 'required|string|max:255',
                'post_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $post = Post::findOrFail($id);
            // return $post;
            $post->descrip = $request->input('post_data');

            Log::info('Request data: ' . json_encode($request->all()));
            if ($request->hasFile('post_img')) {
                $file = $request->file('post_img');
                Log::info('File received: ' . $file->getClientOriginalName());
                $fileName = $file->getClientOriginalName();
                Log::info('File moved to directory: ' . public_path('assets/posts') . '/' . $fileName);
                $file->move(public_path('assests/posts'), $fileName);
                $post->post_image = $fileName;
            }

            $post->save();
            // $post->update($request->all());

            // Check if the image is updated or not
            $imageUpdated = $post->wasChanged('post_image');

            // Log success
            Log::info('Post updated successfully.');
            Log::info($imageUpdated);

            return response()->json(['success' => true, 'post' => $post, 'image_updated' => $imageUpdated]);
        } catch (Exception $e) {
            // Log error
            Log::error('Error updating post: ' . $e->getMessage());

            return response()->json(['success' => false, 'error' => 'An error occurred while updating the post.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        // return $post;

        if ($post) {
            $post->delete();
            return response()->json(['status' => 'success', 'message' => 'Post deleted successfully.']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Post not found.']);
        }
    }

    public function archive($id)
    {
        $post = Post::findOrFail($id);
        $post->is_archive = 1;
        $post->save();

        return response()->json(['status' => 'success', 'message' => 'Post archived successfully.']);
    }

    public function unarchive($id)
    {
        $post = Post::findOrFail($id);
        $post->is_archive = 0;
        $post->save();

        return response()->json(['status' => 'success', 'message' => 'Post unarchived successfully.']);
    }

    public function toggleArchive(Request $request, Post $post)
    {
        $post->is_archive = $request->input('is_archive');
        $success = $post->save();

        return response()->json(['success' => $success]);
    }
}
