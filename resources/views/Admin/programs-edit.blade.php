@extends('layouts.app')

@section('title', 'Edit Program / Service')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-12 text-gray-800">
    <h1 class="text-3xl font-bold text-blue-800 mb-6">Edit Program / Service</h1>

    <form action="{{ route('programs.update', $program) }}" method="POST" enctype="multipart/form-data" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-medium">Program / Service Name</label>
            <input type="text" name="name" value="{{ old('name', $program->name) }}" 
                   class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1 font-medium">Description</label>
            <textarea name="description" rows="4" 
                      class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">{{ old('description', $program->description) }}</textarea>
            @error('description') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1 font-medium">Upload Image</label>
            @if($program->image)
                <img src="{{ asset('storage/programs/'.$program->image) }}" alt="Program Image" class="mb-2 w-32 h-32 object-cover rounded">
            @endif
            <input type="file" name="image" accept="image/*" 
                   class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            @error('image') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('programs.index') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition">Cancel</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Update Program / Service</button>
        </div>
    </form>
</div>
@endsection
