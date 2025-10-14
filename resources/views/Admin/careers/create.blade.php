@extends('layouts.admin')

@section('title', 'Add New Career')

@section('content')
<div class="p-6 bg-gray-100 min-h-screen">
    <div class="max-w-3xl mx-auto bg-white shadow rounded-lg p-6">
        <h1 class="text-2xl font-bold text-blue-800 mb-4">Add New Career</h1>

        <form action="{{ route('admin.careers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium mb-1">Title</label>
                <input type="text" name="title" class="w-full border p-2 rounded" value="{{ old('title') }}">
                @error('title') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Description</label>
                <textarea name="description" rows="4" class="w-full border p-2 rounded">{{ old('description') }}</textarea>
                @error('description') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-medium mb-1">Image (optional)</label>
                <input type="file" name="image" accept="image/*" onchange="previewImage(event)">
                <img id="imagePreview" class="mt-3 rounded shadow max-h-48 hidden" />
                @error('image') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end gap-3 mt-4">
                <a href="{{ route('admin.careers.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Cancel</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Save</button>
            </div>
        </form>
    </div>
</div>

<script>
function previewImage(event) {
    const imagePreview = document.getElementById('imagePreview');
    imagePreview.src = URL.createObjectURL(event.target.files[0]);
    imagePreview.classList.remove('hidden');
}
</script>
@endsection
