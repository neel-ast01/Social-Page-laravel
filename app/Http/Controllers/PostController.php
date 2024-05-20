<?php

namespace App\Http\Controllers;

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
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();


        // $friends = Auth::user()->follows;
        $friends = User::where('id', '!=', Auth::id())
            ->whereDoesntHave('followers', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->get();

        // return view('index', compact('potentialFriends', 'friends'));
        // $friends = User::where('id', '!=', Auth::id())->take(5)->get();
        return view('home', compact('posts', 'user', 'friends'));
        // return $posts;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // $post = Post::findOrFail($request->postid);
        // $user = Auth::user();

        // $like = Like::where('user_id', $user->id)->where('post_id', $post->id)->first();

        // if ($like) {
        //     $like->delete();
        //     $post->likes--;
        // } else {
        //     $like = new Like();
        //     $like->user_id = $user->id;
        //     $like->post_id = $post->id;
        //     $like->save();
        //     $post->likes++;
        // }

        // $post->save();

        // return response()->json(['likes' => $post->likes]);
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
            $user = $post->user;
            // return $post;

            return response()->json(['success' => true, 'post' => $post, 'user' => $user]);
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

        $request->validate([
            'post_data' => 'required|string|max:255',
            'post_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = Post::findOrFail($id);
        // return $post;
        $post->descrip = $request->input('post_data');

        if ($request->hasFile('post_img')) {
            $file = $request->file('post_img');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('assests/posts'), $fileName);
            $post->post_image = $fileName;
        }




        $post->save();
        // $post->update($request->all());



        return response()->json(['success' => true, 'post' => $post]);
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
}
