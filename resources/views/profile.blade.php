@extends('layouts.app')

@section('title')
    Profile
@endsection

@section('content')
    <div class="flex w-full h-100 justify-center items-center flex-col">
        @if(session()->has('searchStatus'))
            <p class="mt-2 text-center text-md text-gray-500">  {{session()->get('searchStatus')}}</p>
        @endif
        <h1>Profile of user with id = {{$user->id}}</h1>
        <form class="flex items-center" action="{{ route('search')}}" method="POST">
            @csrf
            <p class="whitespace-nowrap text-center text-sm text-gray-500 mr-2 w-full">Search by</p>
            <select name="search_by" class="mr-4 pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                <option value="name" selected>Name</option>
                <option value="email">Email</option>
            </select>
            <input type="text" name="search_param" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block min-w-md sm:text-sm border-gray-300 rounded-md mr-3">
            <input type="submit" value="Search" class="hover:scale-105 hover:cursor-pointer transition duration-300 ease-in-out inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        </form>
    </div>
@endsection
