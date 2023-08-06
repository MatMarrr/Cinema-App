@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <main>
        <p class="text-3xl font-bold underline">
            Hello world!
        </p>
        <h1>Home Page</h1>
        @if(!Auth::check())
            <button><a href="{{ route('login') }}">Login</a></button>
            <button><a href="{{ route('register') }}">Register</a></button>
        @endif
    </main>
@endsection
