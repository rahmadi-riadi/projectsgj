<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Route;

class LoginGoogleController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     */
    public function googlepage()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     */
    public function googlecallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $googleUser->id)->orWhere('email', $googleUser->email)->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended('reservasi/form');
            } else {
                $newUser = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => bcrypt('123456dummy') // Menggunakan bcrypt untuk hashing password
                ]);

                Auth::login($newUser);
                return redirect()->intended('reservasi/form');
            }
        } catch (Exception $e) {
            // Log the error for debugging
            \Log::error('Google login error: ' . $e->getMessage());
            return redirect('/login')->with('error', 'Login dengan Google gagal, silakan coba lagi.');
        }
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if (Route::has('admin.index')) {
            return redirect()->route('admin.index');
        } else {
            return redirect('/'); // Redirect ke halaman utama atau halaman login
        }
    }
}

