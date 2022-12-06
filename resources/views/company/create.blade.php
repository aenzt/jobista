@extends('layouts.dashlayout')

@section('content')
    <div class="m-10">
        <form action="/company/create" method="POST">
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Job Title</label>
                <input type="text" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="Job Title" required>
            </div>
            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Job Description</label>
                <input type="text" name="description"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required placeholder="Job Description">
            </div>
            <div class="mb-6">
                <label for="location" class="block mb-2 text-sm font-medium text-gray-900">Location</label>
                <input type="text" name="location"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required placeholder="Malang">
            </div>
            <div class="mb-6">
                <label for="salary" class="block mb-2 text-sm font-medium text-gray-900">Salary</label>
                <input type="text" name="salary"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required placeholder="Rp 2.500.000/mo">
            </div>
            <div class="mb-6">
                <label for="working_hours" class="block mb-2 text-sm font-medium text-gray-900">Working Hours</label>
                <input type="text" name="working_hours"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required placeholder="9am - 5pm">
            </div>
            @if ($errors->any())
                {!! implode('', $errors->all('<div class=text-red-600>:message</div>')) !!}
            @endif
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2 text-center">Create
                Job</button>
        </form>
    </div>
@endsection
