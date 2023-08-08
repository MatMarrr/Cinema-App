<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class AuthService
{
    public function loginUserWithGoogle(): RedirectResponse
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $findGoogleUser = User::where('google_id', $google_user->id)->first();

            if ($findGoogleUser) {
                Auth::login($findGoogleUser);
                return redirect()->route('dashboard');
            } else {

                $user = User::create([
                    'google_id' => $google_user->id,
                    'name' => $google_user->name,
                    'email' => $google_user->email,
                    'account_type' => 1,
                ]);

                if ($user) {
                    Auth::login($user);
                    return redirect()->route('dashboard');
                } else {
                    return back()->with('googleLoginStatus', 'Something went wrong, please try again');
                }
            }

        } catch (InvalidStateException $e) {
            return redirect('/login')->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function loginUser(LoginRequest $request): RedirectResponse
    {
        $user = $request->only('login', 'password');

        if (Auth::attempt($user)) {
            return redirect()->route('dashboard');
        } else {
            return back()->with('loginStatus', 'wrong username or password');
        }
    }

    public function registerUser(RegisterRequest $request): RedirectResponse
    {
        $user = User::create([
            'name' => $request->name,
            'login' => $request->login,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($user) {
            return redirect()->route('login');
        } else {
            return back()->with('registerStatus', 'Something went wrong');
        }
    }

    public function logoutUser(): RedirectResponse{
        session()->flush();
        Auth::logout();
        return redirect()->route('home');
    }
}
