@extends('layouts.layouts')

@section('content')
    <style>
        .search-home {
            background: url(https://cdn-icons-png.flaticon.com/512/3031/3031293.png);
            background-color: white;
            background-position: 97% 50%;
            background-size: 8%;
            background-repeat: no-repeat;
            padding-left: 5px;
            font-size: 16px;
        }
    </style>
    <div class="flex flex-col md:flex-row items-start justify-between w-full">
        <div class="p-8 rounded-2xl flex flex-col my-auto ml-1 md:ml-16">
            <h1 class="mx-auto text-4xl font-bold mb-2 text-white">Get your part time job today</h1>
            <form action="#">
                <input type="search" name="search-home" id="search-home" placeholder="Search for Part Time Job Here..."
                    class="w-80 rounded-lg search-home">
            </form>
            <a href="/explore">
                <button
                    class="p-3 text-white shadow-xl drop-shadow-xl rounded-lg mt-3 bg-indigo-700 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 transition ease-in-out">
                    Or explore all jobs
                </button>
            </a>
        </div>
        <div class="my-auto mr-20 flex flex-row">
            <object data="/images/assets/a-woman-looking-for-a-job-on-website.svg" type="image/svg+xml"
                class="w-80 mx-auto ml-12 md:ml-0 -mt-32 md:mt-0"></object>
            <object data="/images/assets/undraw_videographer_re_11sb.svg" type="image/svg+xml"
                class="hidden md:flex w-44 -scale-x-100"></object>
            <object data="/images/assets/undraw_barista_re_fm8w.svg" type="image/svg+xml"
                class="hidden md:flex w-44"></object>
        </div>
    </div>
@endsection
