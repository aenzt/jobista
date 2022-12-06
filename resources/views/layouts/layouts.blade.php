<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | JOBISTA</title>
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex flex-col w-auto min-h-screen">
        <nav
            class="flex flex-row p-4 items-center justify-between bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 drop-shadow-2xl w-full">
            <div>
                <p class="text-white text-2xl font-semibold">JOBISTA</p>
            </div>
            <div class="font-normal hidden md:flex text-white">
                <a href="/"
                    class="text-lg mx-3 px-4 py-2 rounded-full transition-all {{ $title == 'Home' ? 'bg-indigo-500 text-white' : 'hover:text-white hover:bg-indigo-400' }}">Home</a>
                <a href="/explore"
                    class="text-lg mx-3 px-4 py-2 rounded-full transition-all {{ $title == 'Explore Jobs' ? 'bg-indigo-500 text-white' : 'hover:text-white hover:bg-indigo-400' }}">Explore</a>
                @if (Auth::user())
                    <a href="/savedjobs"
                        class="text-lg mx-3 px-4 py-2 rounded-full transition-all {{ $title == 'Saved Jobs' ? 'bg-indigo-500 text-white' : 'hover:text-white hover:bg-indigo-400' }}">Saved
                        Jobs</a>
                    <a href="/appliedjobs"
                        class="text-lg mx-3 px-4 py-2 rounded-full transition-all {{ $title == 'Applied Jobs' ? 'bg-indigo-500 text-white' : 'hover:text-white hover:bg-indigo-400' }}">Applied
                        Jobs</a>
                    <button id="dropdownDefault" data-dropdown-toggle="dropdown"
                        class="text-white mx-3 bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-md px-4 py-2.5 text-center inline-flex items-center"
                        type="button">{{ Auth::user()->name }}<svg class="ml-2 w-4 h-4" aria-hidden="true"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
                        <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownDefault">
                            <li>
                                <a href="/profile" class="block py-2 px-4 hover:bg-gray-100">Profile</a>
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="block py-2 px-4 hover:bg-gray-100 w-full text-left">
                                        Sign Out
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @elseif (Auth::guard('web_company')->user())
                    <a href="/company"
                        class="text-lg mx-3 px-4 py-2 rounded-full transition-all {{ $title == 'Company' ? 'bg-indigo-500 text-white' : 'hover:text-white hover:bg-indigo-400' }}">Company
                        Management</a>
                    <form action="/company/logout" method="post">
                        @csrf
                        <button type="submit" class="text-lg mx-3 px-5 py-2 bg-gray-700 text-white rounded-full">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="/login" class="text-lg mx-3 px-5 py-2 bg-gray-700 text-white rounded-full">Sign In</a>
                @endif
            </div>
            <div class="flex md:hidden">
                <button id="dropdownDefault" data-dropdown-toggle="dropdown-2"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center"
                    type="button"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg></button>
                <!-- Dropdown menu -->
                <div id="dropdown-2" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
                    <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownDefault">
                        <li>
                            <a href="/" class="block py-2 px-4 hover:bg-gray-100">Home</a>
                        </li>
                        <li>
                            <a href="/explore" class="block py-2 px-4 hover:bg-gray-100">Explore</a>
                        </li>
                        @if (Auth::user())
                            <li>
                                <a href="/savedjobs" class="block py-2 px-4 hover:bg-gray-100">Saved
                                    Jobs</a>
                            </li>
                            <li>
                                <a href="/appliedjobs" class="block py-2 px-4 hover:bg-gray-100">Applied
                                    Jobs</a>
                            </li>
                            <li>
                                <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar"
                                    class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto">{{ Auth::user()->name }}
                                    <svg class="w-4 h-4 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg></button>
                                <!-- Dropdown menu -->
                                <div id="dropdownNavbar"
                                    class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded shadow w-44 :bg-gray-700 :divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                                        <li>
                                            <a href="/profile" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                                        </li>
                                    </ul>
                                    <div class="py-1">
                                        <form action="/logout" method="post">
                                            @csrf
                                            <button type="submit" class="block py-2 px-4 hover:bg-gray-100">
                                                Logout
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @elseif (Auth::guard('web_company')->user())
                            <li>
                                <a href="/company" class="block py-2 px-4 hover:bg-gray-100">Company
                                    Management</a>
                            </li>
                            <form action="/company/logout" method="post">
                                @csrf
                                <button type="submit" class="block py-2 px-4 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        @else
                            <li>
                                <a href="/login" class="block py-2 px-4 hover:bg-gray-100">Sign
                                    In</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="bg-cover grow bg-center bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 flex">
            @yield('content')
        </div>
        <footer
            class="flex flex-col md:flex-row p-6 z-10 items-center justify-between relative bottom-0 w-full text-white bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400">
            <div class="font-semibold text-2xl">JOBISTA</div>
            <div class="text-center">Made with ❤️ by Kelompok Jobista<br>©️2022</div>
            <div class="font-semibold text-2xl flex flex-row">
                <div class="mx-3">
                    <a href="https://twitter.com/jobista">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="currentColor" class="text-white">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                    </a>
                </div>
                <div class="mx-3">
                    <a href="https://instagram.com/jobista">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="currentColor" class="text-white">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                </div>
                <div class="mx-3">
                    <a href="mailto:contact@jobista.com">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="currentColor" class="text-white">
                            <path
                                d="M0 3v18h24v-18h-24zm6.623 7.929l-4.623 5.712v-9.458l4.623 3.746zm-4.141-5.929h19.035l-9.517 7.713-9.518-7.713zm5.694 7.188l3.824 3.099 3.83-3.104 5.612 6.817h-18.779l5.513-6.812zm9.208-1.264l4.616-3.741v9.348l-4.616-5.607z" />
                        </svg>
                    </a>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
</body>

</html>
