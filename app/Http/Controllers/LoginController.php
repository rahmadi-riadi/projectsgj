<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers; // Pastikan mengimpor trait ini
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Sesuaikan dengan model User yang digunakan
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    use AuthenticatesUsers; // Gunakan trait AuthenticatesUsers

    protected $redirectTo = RouteServiceProvider::HOME; // Sesuaikan dengan path redirect setelah login

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Menentukan field yang digunakan sebagai username
    public function username()
    {
        return 'email'; // Defaultnya adalah 'email', sesuaikan sesuai kebutuhan
    }

    // Setelah autentikasi berhasil
    protected function authenticated(Request $request, $user)
    {
        if ($user->isAdmin()) {
            return redirect()->route('admin.index'); // Redirect admin ke halaman admin
        }

        return redirect()->route('home'); // Redirect pengguna biasa ke halaman home
    }
}
