@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Register your
                account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-3" action="{{route('auth.register')}}" method="POST">
                @csrf

                @if(session()->has('loginStatus'))
                    <p class="mt-2 text-center text-md text-gray-500"> {{session()->get('loginStatus')}}</p>
                @endif

                <div>
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                    <div class="mt-2">
                        <input id="name" name="name" type="text" value="{{old('name')}}"
                               placeholder="Choose your name..." required
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>

                    @error('name')
                    <p class="mt-2 text-center text-sm text-gray-500">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label for="login" class="block text-sm font-medium leading-6 text-gray-900">Login</label>
                    <div class="mt-2">
                        <input id="login" name="login" type="text" value="{{old('login')}}"
                               placeholder="Choose your login..." required
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>

                    @error('login')
                    <p class="mt-2 text-center text-sm text-gray-500">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">E-mail</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="text" value="{{old('email')}}"
                               placeholder="Enter your e-mail..." required
                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>

                    @error('email')
                    <p class="mt-2 text-center text-sm text-gray-500">{{$message}}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
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
                    <input type="submit" value="Register"
                           class="hover:cursor-pointer hover:scale-105 transition duration-300 ease-in-out flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                </div>
                <p class="mt-10 text-center text-sm text-gray-500">
                    Already have an account?
                    <a href="{{ route('login') }}"
                       class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Login</a>
                </p>
            </form>

        </div>
    </div>
@endsection
