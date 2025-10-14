{{-- resources/views/admin/transparency/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Transparency')

@section('content')
<div class="flex flex-wrap">
    {{-- ✅ Sidebar --}}
    @include('components.admin-sidebar')

    {{-- ✅ Main Content --}}
@section('title', 'Edit Transparency Record')

@section('content')
<div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-6">Edit Transparency Record</h1>

    <form action="{{ route('admin.transparency.update', $transparency->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-medium">Title</label>
            <input type="text" name="title" id="title" value="{{ $transparency->title }}" class="w-full border-gray-300 rounded-lg p-2" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-medium">Description</label>
            <textarea name="description" id="description" rows="4" class="w-full border-gray-300 rounded-lg p-2">{{ $transparency->description }}</textarea>
        </div>

        <div class="mb-6">
            <label for="file" class="block text-gray-700 font-medium">Replace File (optional)</label>
            <input type="file" name="file" id="file" class="w-full border-gray-300 rounded-lg p-2">
            @if ($transparency->file_path)
                <p class="mt-2 text-sm text-gray-600">Current file: 
                    <a href="{{ asset('storage/' . $transparency->file_path) }}" target="_blank" class="text-blue-600 underline">View</a>
                </p>
            @endif
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('admin.transparency.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Cancel</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
        </div>
    </form>
</div>
@endsection
