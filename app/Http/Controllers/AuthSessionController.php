<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthSessionController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('users.index');
        } else {
            $users = User::all(['name', 'lastname', 'email']);

            return view('auth.login', compact('users'));
        }
    }

    public function login(Request $request)
    {
        $user = User::select(['email'])->where('email', $request->user)->first();
        $credentials = ['email' => $user->email, 'password' => '12345678'];

        if (!Auth::attempt($credentials, true)) {
            dd("Wrong");
            throw ValidationException::withMessages([
                'email' => 'Non existing email'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('users/dashboard')->with('status', 'Logged in');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.index')->with('status', 'Logged out');
    }
}
