@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <div class="registerContainer">
        <form class="registerForm" action="{{route('auth.register')}}" method="POST">
            @csrf
            @if(session()->has('registerStatus'))
                {{session()->get('registerStatus')}}
            @endif
            <input type="text" name="name" value="{{old('name')}}" placeholder="choose your name">
            @error('name')
            <p>{{$message}}</p>
            @enderror
            <input type="text" name="login" value="{{old('login')}}" placeholder="choose your login">
            @error('login')
            <p>{{$message}}</p>
            @enderror
            <input type="text" name="email" value="{{old('email')}}" placeholder="enter your email">
            @error('email')
            <p>{{$message}}</p>
            @enderror
            <input type="password" name="password" placeholder="choose your password">
            @error('password')
            <p>{{$message}}</p>
            @enderror
            <button type="submit">Register</button>
        </form>
    </div>
@endsection
