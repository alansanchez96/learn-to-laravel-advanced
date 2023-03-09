<nav class="bg-transparent border-gray-200 px-2 sm:px-4 py-2.5 rounded">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="/" class="flex items-center">
            <span class="self-center text-xl font-semibold whitespace-nowrap hover:text-blue-700">
                Laravel Application
            </span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
        @auth
            @include('components.notify')
        @endauth
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-300 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-gray-300">
                <li>
                    <a href="/"
                        class="block py-2 pl-3 pr-4 {{ request()->is('/') ? 'text-blue-700' : 'text-gray-700' }} rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0"
                        aria-current="page">Home</a>
                </li>
                @auth
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <a onclick="this.closest('form').submit()"
                                class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 cursor-pointer">LogOut</a>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="{{ route('login.view') }}"
                            class="block py-2 pl-3 pr-4 {{ request()->is('login') ? 'text-blue-700' : 'text-gray-700' }} rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register.view') }}"
                            class="block py-2 pl-3 pr-4 {{ request()->is('register') ? 'text-blue-700' : 'text-gray-700' }} rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
