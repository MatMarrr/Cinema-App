<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToGoogle(): \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
            $google_user = Socialite::driver('google')->stateless()->user();
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

}
