<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $posts = $user->posts;
        // $friends = User::where('id', '!=', Auth::id())->take(5)->get();
        // return $user;
        // return view('profiles.profile');
        return view('profiles.profile', compact('user', 'posts'));
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
        $user = User::findOrFail($id);

        // dd($request);
        $user->fullName = $request->input('fullName');
        $user->bio = $request->input('bio');
        $user->profile_link = $request->input('profile_link');

        if ($request->hasFile('profile_picture')) {
            // Upload new profile picture
            $profilePicture = $request->file('profile_picture');

            $originalName = $profilePicture->getClientOriginalName();
            $profilePicture->move(public_path('assests'), $originalName);
            $user->profile_picture = $originalName;
        }

        $user->save();

        return response()->json(['success' => true, 'user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
