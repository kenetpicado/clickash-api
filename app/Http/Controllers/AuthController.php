<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(AuthenticateRequest $request)
    {
        if (Auth::attempt($request->only('username', 'password'), $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()
            ->withErrors([
                'password' => 'Contraseña incorrecta',
            ])
            ->onlyInput('password');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
