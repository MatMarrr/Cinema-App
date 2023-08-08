@extends('layouts.app')

@section('title')
    Create user
@endsection

@section('content')
    <form class="max-w-lg mt-[3rem] mx-auto sm:px-6 lg:px-8" method="POST" action="{{route('admin.create.user')}}">
        @csrf
        @method('POST')
        <p class="text-xl mb-5">Add user</p>
        <label for="name" class="block mt-2 text-sm font-medium text-gray-700">Name</label>
        <div class="mt-1">
            <input type="text" name="name" id="name" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Choose name for the user...">
            @error('name')
            <p class="mt-2 text-center text-sm text-gray-500">{{$message}}</p>
            @enderror
        </div>
        <label for="login" class="block mt-2 text-sm font-medium text-gray-700">Login</label>
        <div class="mt-1">
            <input type="text" name="login" id="login" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Choose login for the user...">
            @error('login')
            <p class="mt-2 text-center text-sm text-gray-500">{{$message}}</p>
            @enderror
        </div>
        <label for="email" class="block mt-2 text-sm font-medium text-gray-700">E-mail</label>
        <div class="mt-1">
            <input type="text" name="email" id="email" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Choose email for the user...">
            @error('email')
            <p class="mt-2 text-center text-sm text-gray-500">{{$message}}</p>
            @enderror
        </div>
        <label for="password" class="block mt-2 text-sm font-medium text-gray-700">Password</label>
        <div class="mt-1">
            <input type="password" name="password" id="password" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Choose password for the user...">
            @error('password')
            <p class="mt-2 text-center text-sm text-gray-500">{{$message}}</p>
            @enderror
        </div>
        <label for="role_id" class="block text-sm font-medium text-gray-700">Role</label>
        <select id="role_id" name="role_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            <option class="text-gray-400" selected disabled>Select a role for the user</option>
            @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->role_name}}</option>
            @endforeach
        </select>
        @error('role_id')
        <p class="mt-2 text-center text-sm text-gray-500">{{$message}}</p>
        @enderror
        <div class="w-full flex justify-between">
            <button type="button" class="hover:scale-105 transition duration-300 ease-in-out inline-flex items-center mt-3 px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><a href="{{ route('admin.manage.users') }}">Go back</a></button>
            <button type="submit" class="hover:scale-105 transition duration-300 ease-in-out inline-flex items-center mt-3 px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create user</button>
        </div>

    </form>
@endsection
