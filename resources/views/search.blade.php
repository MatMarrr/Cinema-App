@extends('layouts.app')

@section('title')
    Friends search
@endsection

@section('content')
    <div class="mt-10 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg max-w-4xl w-full mx-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Email
                </th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Invite friend</span>
                </th>
            </tr>

            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($users as $user)
                @if($user->id !=  Auth::user()->id)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                        {{$user->name}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{$user->email}}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        @if(!Auth::user()->hasInvited($user->id))
                        <form action="{{ url('/invite-user') }}" method="post">
                            @csrf
                            @method("POST")
                            <input type="hidden" name="friend_id" value="{{ $user->id }}">
                            <input value="Add friend" type="submit" class="hover:cursor-pointer text-indigo-600 hover:text-indigo-900 mr-8">
                        </form>
                        @else
                            <p class="text-indigo-600 hover:text-indigo-900 mr-8">Pending invite</p>
                        @endif
                    </td>
                </tr>
                @endif
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
