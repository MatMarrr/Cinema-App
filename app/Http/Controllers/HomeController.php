<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function home()
    {
        return view('home');
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
