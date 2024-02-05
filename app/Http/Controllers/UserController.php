<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->user_id);

        //dd($user);

        return view('users.dashboard', compact('user'));
    }

    public function store(UserRequest $request)
    {
        $user = new User($request->validated());
        $user->password = bcrypt($user->password);
        $user->save();

        return redirect()->route('auth.index')->with('success', 'User created');
    }
}
