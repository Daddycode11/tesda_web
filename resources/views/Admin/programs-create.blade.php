@extends('layouts.app')

@section('title', 'Add New Program / Service')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-12 text-gray-800">
    <h1 class="text-3xl font-bold text-blue-800 mb-6">Add New Program / Service</h1>

    <form action="{{ route('programs.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf

        <div>
            <label class="block mb-1 font-medium">Program / Service Name</label>
            <input type="text" name="name" value="{{ old('name') }}" 
                   class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block mb-1 font-medium">Description</label>
            <textarea name="description" rows="4" 
                      class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">{{ old('description') }}</textarea>
            @error('description') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <button type="submit" 
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                ➕ Add Program / Service
            </button>
        </div>
    </form>
</div>
@endsection
