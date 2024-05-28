<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            // Check if the user exists by Google ID
            $user = User::where('google_id', $google_user->getId())->first();

            if (!$user) {
                // Check if the user exists by email
                $user = User::where('email', $google_user->getEmail())->first();

                if (!$user) {
                    // Generate a username if Google nickname is not available
                    $username = $google_user->getNickname() ?: $this->generateUsername($google_user->getName());

                    // Create a new user
                    $new_user = User::create([
                        'fullName' => $google_user->getName(),
                        'email' => $google_user->getEmail(),
                        'username' => $username,
                        'profile_picture' => $google_user->getAvatar(),
                        'google_id' => $google_user->getId(),
                    ]);

                    Auth::login($new_user);
                } else {
                    // Update the user's Google ID if the email exists but not the Google ID
                    $user->update(['google_id' => $google_user->getId()]);
                    Auth::login($user);
                }
            } else {
                Auth::login($user);
            }

            return redirect()->intended('/');
        } catch (\Exception $e) {
            Log::error('Google Login Error: ' . $e->getMessage());
            return redirect('/')->with('error', 'Something went wrong! ' . $e->getMessage());
        }
    }


    // public function callbackGoogle()
    // {
    //     try {
    //         $google_user = Socialite::driver('google')->user();
    //         // dd($google_user);

    //         $user = User::where('google_id', $google_user->getId())->first();

    //         if (!$user) {
    //             $username = $google_user->getNickname() ?: $this->generateUsername($google_user->getName());

    //             $new_user = User::create([
    //                 'fullName' => $google_user->getName(),
    //                 'email' => $google_user->getEmail(),
    //                 'username' => $username,
    //                 'profile_picture' => $google_user->getAvatar(),
    //                 'google_id' => $google_user->getId(),

    //             ]);

    //             Auth::login($new_user);

    //             return redirect()->intended('/');
    //         } else {
    //             Auth::login($user);
    //             return redirect()->intended('/');
    //         }
    //     } catch (\Exception $e) {
    //         Log::info($e->getMessage());
    //         dd('Something Went wrong!' . $e->getMessage());
    //     }
    // }

    protected function generateUsername($fullName)
    {
        // Remove spaces and make lowercase
        $username = strtolower(preg_replace('/\s+/', '', $fullName)); // "Good Boy" becomes "goodboy"

        // Append a random number to ensure uniqueness
        $username .= rand(100, 999); // Example: "goodboy" becomes "goodboy123"

        // Optionally, check for uniqueness in the database and regenerate if necessary
        while (User::where('username', $username)->exists()) {
            $username = strtolower(preg_replace('/\s+/', '', $fullName));
            $username .= rand(100, 999);
        }

        return $username;
    }
}
