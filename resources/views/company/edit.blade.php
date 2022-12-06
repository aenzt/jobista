@extends('layouts.dashlayout')

@section('content')
    <div class="m-10">
        <form action="/company/edit/{{ $job->id }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Job Title</label>
                <input type="text" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="Job Title" value="{{ $job->name }}" required>
            </div>
            <div class="mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Job Description</label>
                <textarea name="description" id="description" cols="200" rows="10"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">{{ $job->description }}</textarea>
            </div>
            <div class="mb-6">
                <label for="location" class="block mb-2 text-sm font-medium text-gray-900">Location</label>
                <input type="text" name="location"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required placeholder="Malang" value="{{ $job->location }}">
            </div>
            <div class="mb-6">
                <label for="salary" class="block mb-2 text-sm font-medium text-gray-900">Salary</label>
                <input type="text" name="salary"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required placeholder="Rp 2.500.000/mo" value="{{ $job->salary }}">
            </div>
            <div class="mb-6">
                <label for="working_hours" class="block mb-2 text-sm font-medium text-gray-900">Working Hours</label>
                <input type="text" name="working_hours"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required placeholder="9am - 5pm" value="{{ $job->working_hours }}">
            </div>
            @if ($errors->any())
                {!! implode('', $errors->all('<div class=text-red-600>:message</div>')) !!}
            @endif
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2 text-center">Update
                Job</button>
        </form>
    </div>
@endsection
