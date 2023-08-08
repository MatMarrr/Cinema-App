<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CreateUserRequest;

class AdminService
{
    public function createUser(CreateUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'login' => $request->login,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => $request->role_id,
        ]);

        if ($user) {
            return redirect()->route('admin.manage.users')->with('addUserStatus', 'Added the user');
        } else {
            return redirect()->route('admin.manage.users')->with('addUserStatus', 'The user could not be added due to an error');
        }
    }
}
