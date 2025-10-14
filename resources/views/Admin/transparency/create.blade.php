{{-- resources/views/admin/transparency/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Add Transparency Record')

@section('content')
<div class="flex flex-wrap">
    {{-- ✅ Sidebar --}}
    @include('components.admin-sidebar')

    {{-- ✅ Main Content --}}
    <div class="flex-1 max-w-4xl mx-auto mt-12">
        <h1 class="text-2xl font-bold mb-6">Add Transparency Record</h1>

        {{-- ✅ Success Message --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.transparency.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6 space-y-4">
            @csrf

            {{-- Title --}}
            <div>
                <label for="title" class="block text-gray-700 font-medium mb-1">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-gray-700 font-medium mb-1">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- File --}}
            <div>
                <label for="file" class="block text-gray-700 font-medium mb-1">Attach File (PDF, DOC, DOCX, PNG, JPG, JPEG)</label>
                <input type="file" name="file" id="file"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('file')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Actions --}}
            <div class="flex justify-end space-x-2">
                <a href="{{ route('admin.transparency.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
            </div>
        </form>
    </div>
</div>

