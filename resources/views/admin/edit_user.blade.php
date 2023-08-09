@extends('layouts.app')

@section('title')
    Manage users
@endsection

@section('content')

    <div class="max-w-7xl mt-[3rem] mx-auto sm:px-6 lg:px-8">
        <div class="w-full flex justify-between items-center mb-4">
            <p class="text-lg ml-4">Users</p>
            @if(session()->has('addUserStatus'))
                <p class="mt-2 text-center text-md text-gray-500">  {{session()->get('addUserStatus')}}</p>
            @endif
            <button type="button"
                    class="hover:scale-105 transition duration-300 ease-in-out inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <a href="{{ route('admin.manage.users') }}">Go back</a>
            </button>
        </div>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">

                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>

                                @if($user->account->account_type_name == 'app account')
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Login
                                    </th>
                                @endif

                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Password
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Role
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>

                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <form action="{{ route('admin.update.user', ['user_id'=>$user->id]) }}" method="POST">
                                @csrf
                                <tr>

                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        <div class="mt-1">
                                            <input type="text" name="name" id="name"
                                                   class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                   value="{{$user->name}}"
                                            >
                                        </div>
                                    </td>

                                    @if($user->account->account_type_name == 'app account')
                                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <div class="mt-1">
                                                <input type="text" name="login" id="login"
                                                       class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                       value="{{$user->login}}"
                                                >
                                            </div>
                                        </td>
                                    @endif

                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        <div class="mt-1">
                                            <input type="email" name="email" id="email"
                                                   class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                                                   value="{{$user->email}}"
                                            >
                                        </div>
                                    </td>

                                    <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        <button type="button"
                                                class="hover:scale-105 transition duration-300 ease-in-out inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            <a href="#">Request password reset</a>
                                        </button>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <select id="role_id" name="role_id"
                                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                            @foreach($roles as $role)
                                                @if($user->role_id == $role->id)
                                                    <option selected value="{{$role->id}}">{{$role->role_name}}</option>
                                                @else
                                                    <option value="{{$role->id}}">{{$role->role_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <button type="submit"
                                                class="text-indigo-600 hover:text-indigo-900 border-none bg-transparent">
                                            Save
                                        </button>
                                    </td>

                                </tr>
                            </form>
                            </tbody>
                        </table>
                    </div>
                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="mt-2 text-center text-md text-gray-500">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
