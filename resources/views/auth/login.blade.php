@extends('layouts.app')

@section('title')
    Login
@endsection

{{--@section('content')--}}
{{--    <div class="loginContainer">--}}
{{--        <form class="loginForm" action="{{route('auth.login')}}" method="POST">--}}
{{--            @csrf--}}
{{--            @if(session()->has('loginStatus'))--}}
{{--                {{session()->get('loginStatus')}}--}}
{{--            @endif--}}
{{--            <input type="text" name="login" value="{{old('login')}}" placeholder="enter login">--}}
{{--            @error('login')--}}
{{--            <p>{{$message}}</p>--}}
{{--            @enderror--}}
{{--            <input type="password" name="password" placeholder="enter password">--}}
{{--            @error('password')--}}
{{--            <p>{{$message}}</p>--}}
{{--            @enderror--}}
{{--            <button type="submit">Login</button>--}}
{{--        </form>--}}
{{--    </div>--}}
@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                 alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your
                account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{route('auth.login')}}" method="POST">
                @csrf
                @if(session()->has('loginStatus'))
                    {{session()->get('loginStatus')}}
                @endif
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Login</label>
                    <div class="mt-2">
                        <input id="email" name="login" type="text" placeholder="Enter login..." required
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('login')
                    <p>{{$message}}</p>
                    @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        <div class="text-sm">
                            <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password"
                               placeholder="Enter password..." required
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>

                    @error('password')
                    <p class="mt-2 text-center text-sm text-gray-500">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Sign in
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
