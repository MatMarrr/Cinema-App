<nav class="w-full flex px-8 p-4 border-b-2">
    <div class="flex gap-10 justify-center items-center">
        <div>
            <a href="{{ route('home') }}" class="flex items-center gap-4">
                <img src="{{ asset('icons/movie_icon.svg') }}" alt="Movie icon" class="w-12">
                <p class="text-2xl">Cinema App</p>
            </a>
        </div>
        <div>
            <a href="{{ route('home') }}" class="text-xl">
                @if(!Auth::check())
                    Home
                @else
                    Dashboard
                @endif
            </a>


        </div>
    </div>

    <div class="ml-auto flex gap-6">
        @if(!Auth::check())
            <button type="button"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <a href="{{ route('login') }}">Login</a>
            </button>
            <button type="button"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <a href="{{ route('register') }}">Register</a>
            </button>
        @else
            @if(Auth::user()->role->role_name === 'admin')
                <button type="button"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <a href="{{ route('admin.manage.users') }}">Manage Users</a>
                </button>
            @endif
            <button type="button"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <a href="{{ route('auth.logout') }}">Logout</a>
            </button>
        @endif
    </div>
</nav>
