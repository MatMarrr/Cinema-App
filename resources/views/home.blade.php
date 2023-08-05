@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <main>
        <h1>Home Page</h1>
        @if(Auth::check())
            <h3>Welcome {{ Auth::user()->name }}</h3>
            <button><a href="{{ route('auth.logout') }}">Logout</a></button>
        @else
            <button><a href="{{ route('login') }}">Login</a></button>
            <button><a href="{{ route('register') }}">Register</a></button>
        @endif
    </main>
@endsection
