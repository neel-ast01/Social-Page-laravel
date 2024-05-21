<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $userId = Auth::id();

        // Retrieve notifications for posts owned by the authenticated user
        $notifications = Notification::with('user', 'post')
            ->whereHas('post', function ($query) use ($userId) {
                $query->where('user_id', $userId);
            })
            ->where('type', 'like') // Only consider notifications for likes
            ->orderBy('created_at', 'desc')
            ->get();
        // return $notifications;
        // $friends = User::where('id', '!=', Auth::id())->take(5)->get();
        return view('notification.notification', compact('notifications'));
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
        //
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
