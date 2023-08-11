<?php

namespace App\Http\Controllers;

use App\Models\AccountType;
use App\Models\Invitation;
use App\Models\Role;
use App\Models\User;
use App\Services\AdminService;
use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\AdminUpdateUserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.manage_users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.add_user', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $request, AdminService $adminService)
    {
        return $adminService->createUser($request);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $user_id)
    {
        $user = User::find($user_id);
        return view('profile', compact('user'));
    }

    public function searchForFriends(Request $request)
    {
        $search_by = $request->search_by;
        $search_param = '%' . $request->search_param . '%';

        if (in_array($search_by, ['name', 'email'])) {
            $users = User::where($search_by, 'LIKE', $search_param)->get();
            return view('search', compact('users'));
        } else {
            return redirect()->route('profile')->with('searchStatus', 'There was an error while searching for user');
        }
    }

    public function inviteUserToFriends(Request $request)
    {
        $invite = Invitation::create([
            'sender_id' => Auth::user()->id,
            'receiver_id' => $request->friend_id
        ]);

        if ($invite) {
            return redirect()->route('profile', ['user_id'=> Auth::user()->id]);
        } else {
            return redirect()->route('profile', ['user_id'=> Auth::user()->id]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $user_id)
    {
        $user = User::find($user_id);
        $roles = Role::all();
        return view('admin.edit_user', compact('user', 'roles', 'user_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUpdateUserRequest $request, string $user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return redirect()->route('admin.manage.users')->with('updateUserStatus', 'There is no user with choosen id');
        }

        try {
            $user->update([
                'name' => $request->name,
                'login' => $request->login,
                'email' => $request->email,
                'role_id' => $request->role_id,
            ]);

            return redirect()->route('admin.manage.users')->with('updateUserStatus', 'Succesfully updated an user');
        } catch (\Exception $e) {
            return redirect()->route('admin.manage.users')->with('updateUserStatus', $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteUserModal(string $user_id)
    {
        $user_name = User::find($user_id)->name;
        return back()->with(['showDeleteUserModal' => true, 'user_id' => $user_id, 'user_name' => $user_name]);
    }

    public function destroy(string $user_id)
    {
        $user = User::find($user_id);
        if ($user) {
            $user->delete();
            return redirect()->route('admin.manage.users')->with('deleteUserStatus', 'Succesfully deleted user');
        } else {
            return redirect()->route('admin.manage.users')->with('deleteUserStatus', 'User not found or there was a problem while deleting the user');
        }
    }
}
