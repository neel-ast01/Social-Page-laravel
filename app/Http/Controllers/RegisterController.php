<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('authentication.register');
    }

    public function register(RegisterRequest $request)
    {
        $validatedData = $request->validated();

        $user = new User();
        $user->username = $validatedData['username'];
        $user->fullName = $validatedData['fullName'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);

        // Check if a profile picture was uploaded
        // if ($request->hasFile('profile_picture')) {
        //     $profilePicturePath = $request->file('profile_picture')->store('public/assets');
        //     $user->profile_picture = $profilePicturePath;
        // }

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $originalName = $file->getClientOriginalName();
            $file->move(public_path('assests'), $originalName);
            $user->profile_picture = $originalName;
        }

        // if ($request->hasFile('profile_picture')) {
        //     $file = $request->file('profile_picture');
        //     $fileName = $file->getClientOriginalName();
        //    
        //     $user->file = $fileName;
        // }



        $user->save();

        return redirect()->route('posts.index')->with('success', 'User registered successfully');
    }
}
