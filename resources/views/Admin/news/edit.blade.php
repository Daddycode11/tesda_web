@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Edit News</h1>

    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Title</label>
            <input type="text" name="title" value="{{ old('title', $news->title) }}" class="w-full border rounded px-3 py-2">
            @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-semibold">Content</label>
            <textarea name="content" rows="5" class="w-full border rounded px-3 py-2">{{ old('content', $news->content) }}</textarea>
            @error('content') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-semibold">Current Image</label>
            @if($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" class="w-32 h-32 object-cover mb-2 rounded">
            @else
                <p class="text-gray-500 italic">No image uploaded.</p>
            @endif

            <label class="block font-semibold mt-2">Change Image (optional)</label>
            <input type="file" name="image" class="w-full border rounded px-3 py-2">
        </div>

        <button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Update</button>
    </form>
</div>
@endsection
