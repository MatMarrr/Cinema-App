<nav class="w-full flex px-8 p-4 border-b-2">
    <div class="flex gap-10 justify-center items-center">
        <div>
            <a href="{{ route('home') }}" class="flex items-center gap-6">
                <img src="{{ asset('icons/LightModeLogo.png') }}" alt="Movie icon" class="w-20">
                <p class="text-2xl">Movie Mates</p>
            </a>
        </div>
        <div>

            <a href="{{ route('home') }}" class="text-xl mr-10">
                @if(!Auth::check())
                    Home
                @else
                    Dashboard
                @endif
            </a>

            @if(Auth::check())
                <a href="{{ route('profile', ['user_id' => Auth::User()->id]) }}" class="text-xl  mr-10">
                    Profile
                </a>
            @endif

        </div>
    </div>

    <div class="ml-auto flex gap-6 items-center">
        @if(!Auth::check())
            <button type="button"
                    class="hover:scale-105 transition duration-300 ease-in-out inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <a href="{{ route('login') }}">Login</a>
            </button>
            <button type="button"
                    class="hover:scale-105 transition duration-300 ease-in-out inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <a href="{{ route('register') }}">Register</a>
            </button>
        @else
            @if(Auth::user()->role->role_name === 'admin')
                <button type="button"
                        class="hover:scale-105 transition duration-300 ease-in-out inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <a href="{{ route('admin.manage.users') }}">Manage Users</a>
                </button>
            @endif
            <button type="button"
                    class="hover:scale-105 transition duration-300 ease-in-out inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <a href="{{ route('auth.logout') }}">Logout</a>
            </button>
        @endif
    </div>
</nav>
