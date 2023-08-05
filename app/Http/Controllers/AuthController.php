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
    public function registerPage()
    {
        return view('auth.register');
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'login' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'login' => $request->login,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            return back()->with('registerStatus', 'You are successfully registered');
        } else {
            return back()->with('registerStatus', 'Something went wrong');
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string|min:6'
        ]);

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
