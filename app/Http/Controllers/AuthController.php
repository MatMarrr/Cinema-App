<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            return redirect()->route('login');
        } else {
            return back()->with('registerStatus', 'Something went wrong');
        }
    }

    public function login(LoginRequest $request)
    {
        $user = $request->only('login', 'password');

        if (Auth::attempt($user)) {
            return redirect()->route('home');
        } else {
            return back()->with('loginStatus', 'wrong username or password');
        }
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect()->route('home');
    }
}
