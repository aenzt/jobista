<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>

<body>
    <nav class="flex flex-row justify-between p-4 items-center bg-gray-800 text-white">
        <div>
            <h1 class="text-2xl font-semibold">Jobista</h1>
        </div>
        <div class="flex flex-row items-center">
            <h1 class="text-xl mx-3"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-7 h-7 inline">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                </svg>
                {{ Auth::guard('web_company')->user()->name }}</h1>
            <form action="/company/logout" method="post">
                @csrf
                <button type="submit"
                    class="text-lg bg-gray-600 p-2 rounded text-white flex hover:scale-110 hover:-translate-y-1 hover:bg-gray-500 transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="inline w-5 h-7 mx-1">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                    </svg>
                    Logout
                </button>
            </form>
        </div>
    </nav>
    <div class="flex flex-row">
        <aside class="w-64" aria-label="Sidebar">
            <div class="overflow-y-auto py-4 px-3 bg-gray-800 min-h-screen">
                <ul class="space-y-2">
                    <li>
                        <a href="/company"
                            class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700 {{ $title == 'Company Dashboard' ? 'bg-blue-500' : '' }}">
                            <svg aria-hidden="true" class="w-6 h-6 transition duration-75 text-white"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <div class="w-full flex flex-col bg-gray-100">
            @yield('content')
        </div>
    </div>
    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
</body>

</html>
