@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <main>
        <h1>Home Page</h1>
        @if(Auth::check())
            <h3>Welcome {{ Auth::user()->name }}</h3>
            <h3>Your role: {{ Auth::user()->role->role_name }}</h3>
            <button><a href="{{ route('auth.logout') }}">Logout</a></button>
            @if(Auth::user()->role->role_name === 'admin')
                <button>Manage Users</button>
            @endif
        @else
            <button><a href="{{ route('login') }}">Login</a></button>
            <button><a href="{{ route('register') }}">Register</a></button>
        @endif
    </main>
@endsection
