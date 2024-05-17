<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            // 'active' => 'login'
        ]);
    }



    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika berhasil login
            if (Auth::user()->isAdmin()) {
                // Jika pengguna adalah admin
                return redirect()->route('admin.index');
            } else {
                // Jika pengguna adalah pengguna biasa
                return redirect()->route('/');
            }
        } else {
            // Jika login gagal
            return back()->withErrors([
                'email' => 'email tidak cocok dengan database !',
            ]);
        }
    }


    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

