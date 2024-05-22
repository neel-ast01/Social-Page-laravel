<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Notification;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comment = Comment::with('user')->get();
        return $comment;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'post_id' => 'required|exists:posts,id',
                'content' => 'required|string',
                'parent_id' => 'nullable|exists:comments,id',
            ]);

            $comment = new Comment([
                'user_id' => Auth::id(),
                'post_id' => $request->post_id,
                'parent_id' => $request->parent_id ?? null,
                'content' => $request->content,
            ]);
            $comment->save();


            return response()->json($comment->load(['user', 'replies' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }]));
        } catch (\Exception $e) {
            Log::error('Error storing comment: ' . $e->getMessage());
            Log::error('Request Data: ', $request->all());
            Log::info('Request Content: ' . $request->content);
            return response()->json(['error' => 'Error storing comment'], 500);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
