<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function authenticate(Request $request){
        $credential = $request->validate([
           'email' => 'required|email',
           'password' => 'required'
        ]);

        if(Auth::attempt($credential)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login gagal, Email atau Password salah!');
   }

   public function logout(Request $request){

       Auth::logout();

       $request->session()->invalidate();

       $request->session()->regenerateToken();

       return redirect('/login');
   }
}
