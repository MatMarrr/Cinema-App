@extends('layouts.app')

@section('title')
    Manage users
@endsection

@section('content')
    <div class="manageUsersContainer">
        <Table class="users">
            <tr>
                <td>
                    <h3>Name</h3>
                </td>
                <td>
                    <h3>Role</h3>
                </td>
                <td>
                    <h3>Manage</h3>
                </td>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>
                        {{$user->name}}
                    </td>
                    <td>
                        {{$user->role->role_name}}
                    </td>
                    <td>
                        <button
                            @if($user->login == Auth::user()->login)
                                disabled
                            @endif
                        >
                            Edit
                        </button>
                    </td>
                </tr>

            @endforeach
        </Table>
        <button><a href="{{ route('dashboard') }}">Go back</a></button>
    </div>
@endsection
