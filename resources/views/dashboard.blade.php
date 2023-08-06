@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="dashboardContent">
        <h1>Dashboard Page</h1>
        <h3>Welcome {{ Auth::user()->name }}</h3>
        <h3>Your role: {{ Auth::user()->role->role_name }}</h3>
        <button><a href="{{ route('auth.logout') }}">Logout</a></button>
        @if(Auth::user()->role->role_name === 'admin')
            <button><a href="{{ route('admin.manage.users') }}">Manage Users</a></button>
        @endif
    </div>
@endsection
