<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, AuthService $authService)
    {
        return $authService->registerUser($request);
    }

    public function login(LoginRequest $request, AuthService $authService)
    {
        return $authService->loginUser($request);
    }

    public function logout(AuthService $authService)
    {
        return $authService->logoutUser();
    }
}
