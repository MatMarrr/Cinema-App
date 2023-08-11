@extends('layouts.app')

@section('title')
    Login
@endsection

@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your
                account</h2>
        </div>

        <div class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm">

            <button
                class="px-4 w-full py-2 border flex justify-center gap-2 border-slate-200 rounded-lg text-slate-700 hover:border-slate-400 hover:text-slate-900 hover:shadow transition duration-150">
                <img class="w-6 h-6" src="https://www.svgrepo.com/show/475656/google-color.svg" loading="lazy"
                     alt="google logo">
                <span><a href="{{ route('auth.google') }}">Continue with Google</a></span>
            </button>


            <div class="w-full flex items-center justify-between pt-8">
                <hr class="w-full bg-gray-400">
                <p class="text-base font-medium leading-4 px-2.5 text-gray-400">OR</p>
                <hr class="w-full bg-gray-400  ">
            </div>

            <form class="space-y-6" action="{{route('auth.login')}}" method="POST">
                @csrf

                @if(session()->has('loginStatus'))
                    <p class="mt-2 text-center text-md text-gray-500">  {{session()->get('loginStatus')}}</p>
                @endif
                @if(session()->has('googleLoginStatus'))
                    <p class="mt-2 text-center text-md text-gray-500">  {{session()->get('googleLoginStatus')}}</p>
                @endif
                <div>
                    <label for="login" class="block text-sm font-medium leading-6 text-gray-900">Login</label>
                    <div class="mt-2">
                        <input id="login" name="login" type="text" placeholder="Enter login..." required
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
                    <input type="submit" value="Sign in"
                            class="hover:cursor-pointer hover:scale-105 transition duration-300 ease-in-out flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                </div>
                <p class="mt-10 text-center text-sm text-gray-500">
                    Don't have an account?
                    <a href="{{ route('register') }}"
                       class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Register</a>
                </p>
            </form>

        </div>
    </div>
@endsection
