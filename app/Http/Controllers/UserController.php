<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('post')) {

            $validated = $request->validate([
                'email' => 'required',
                'password' => 'required'
            ]);

            if (Auth::attempt($validated)) {
                $request->session()->regenerate();

                return redirect()->intended('/home')->with('masuk', 'Welcome Back!');
            }
            return back()->with('error', 'Akun atau Username salah');
        }
        return view('dashboard.login');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
