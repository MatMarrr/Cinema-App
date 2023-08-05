@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <div class="loginContainer">
        <form class="loginForm" action="{{route('auth.login')}}" method="POST">
            @csrf
            @if(session()->has('loginStatus'))
                {{session()->get('loginStatus')}}
            @endif
            <input type="text" name="login" value="{{old('login')}}" placeholder="enter login">
            @error('login')
            <p>{{$message}}</p>
            @enderror
            <input type="password" name="password" placeholder="enter password">
            @error('password')
            <p>{{$message}}</p>
            @enderror
            <button type="submit">Login</button>
        </form>
    </div>
@endsection
