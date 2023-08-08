@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="flex w-full h-100 justify-center items-center flex-col">
        <h1>Dashboard Page</h1>
        <h3>Welcome {{ Auth::user()->name }}</h3>
        <h3>Your role: {{ Auth::user()->role->role_name }}</h3>
    </div>
@endsection
