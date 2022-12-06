@extends('layouts.layouts')

@section('content')
    <div class="rounded flex flex-col align-middle items-center w-full my-10">
        @if (session('errors'))
            @foreach ($errors->all() as $error)
                <div id="alert-2" class="flex p-4 mb-4 mt-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                        {{ $error }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300"
                        data-dismiss-target="#alert-2" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endforeach
        @endif
        @if (session('success'))
            <div id="alert-3" class="flex p-4 mb-4 bg-green-100 rounded-lg" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-green-700" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium text-green-700">
                    {{ session('success') }}
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endif
        <div class="bg-gray-200 w-5/6 rounded-lg p-4 flex flex-col items-center">
            <div class="flex flex-col items-start">
                <h1 class="text-2xl font-bold text-center my-2">{{ $job->name }}</h1>
                <p class="my-2">{{ $job->description }}</p>
                <h2 class="text-lg font-bold my-2">Location: {{ $job->location }}</h2>
                <h2 class="text-lg font-bold my-2">Salary: {{ $job->salary }}</h2>
                <h2 class="text-lg font-bold my-2">Working Hours: {{ $job->working_hours }}</h2>
                <h2 class="text-lg font-bold my-2">Company Name: {{ $job->company->name }}</h2>
                <h2 class="text-lg font-bold my-2">Company Email: {{ $job->company->email }}</h2>
                <h2 class="text-lg font-bold my-2">Company Address: {{ $job->company->address }}</h2>
            </div>
            <div class="flex flex-row">
                <!-- Modal toggle -->
                <button
                    class="bg-green-600 px-4 py-2 my-2 mx-3 text-white text-center rounded-xl hover:bg-green-500 hover:-translate-y-1 hover:scale-110 transition-all"
                    type="button" data-modal-toggle="apply-modal">
                    Apply Job
                </button>

                @if (Auth::user())
                    @if ($contain)
                        <form action="/job/save/{{ $job->id }}/delete" method="post">
                            @csrf
                            <button
                                class="bg-blue-600 px-4 py-2 my-2 mx-3 text-white text-center rounded-xl hover:bg-blue-500 hover:-translate-y-1 hover:scale-110 transition-all"
                                type="submit">
                                Delete Job From Saved
                            </button>
                        </form>
                    @else
                        <form action="/job/save/{{ $job->id }}" method="post">
                            @csrf
                            <button
                                class="bg-blue-600 px-4 py-2 my-2 mx-3 text-white text-center rounded-xl hover:bg-blue-500 hover:-translate-y-1 hover:scale-110 transition-all"
                                type="submit">
                                Save Job Vacancy
                            </button>
                        </form>
                    @endif
                @else
                    <a href="/login">
                        <button
                            class="bg-blue-600 px-4 py-2 my-2 mx-3 text-white text-center rounded-xl hover:bg-blue-500 hover:-translate-y-1 hover:scale-110 transition-all">
                            Login to Save Job
                        </button>
                    </a>
                @endif

                <!-- Main modal -->
                <div id="apply-modal" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                    <div class="relative w-full h-full max-w-md md:h-auto">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow">
                            <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                data-modal-toggle="apply-modal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900">Apply to {{ $job->name }}</h3>
                                <form class="space-y-6" action="/job/apply/{{ $job->id }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div>
                                        <label for="cover_letter"
                                            class="block mb-2 text-sm font-medium text-gray-900">Cover
                                            Letter</label>
                                        <textarea name="cover_letter" id="cover_letter" cols="30" rows="10" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>
                                    </div>
                                    <div>
                                        <label class="block mb-2 text-sm font-medium text-gray-900" for="resume">Upload
                                            file</label>
                                        <input
                                            class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer focus:outline-none"
                                            aria-describedby="resume_help" id="resume" type="file" name="resume"
                                            required accept="application/pdf">
                                    </div>
                                    <button type="submit"
                                        class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Apply
                                        Job</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
