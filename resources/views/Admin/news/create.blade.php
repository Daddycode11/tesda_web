@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Add News</h1>

    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div>
            <label class="block font-semibold">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded px-3 py-2">
            @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-semibold">Content</label>
            <textarea name="content" rows="5" class="w-full border rounded px-3 py-2">{{ old('content') }}</textarea>
            @error('content') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-semibold">Image (optional)</label>
            <input type="file" name="image" class="w-full border rounded px-3 py-2">
            @error('image') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    </form>
</div>
@endsection
