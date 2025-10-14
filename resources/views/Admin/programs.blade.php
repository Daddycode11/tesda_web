{{-- resources/views/admin/programs/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Programs & Services')

@section('content')
<div class="flex flex-wrap">
    {{-- ✅ Sidebar --}}
    @include('components.admin-sidebar')

    {{-- ✅ Main Content --}}
    <div class="flex-1 p-6">
        <div class="max-w-6xl mx-auto">
            {{-- Header --}}
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Programs & Services</h1>
            </div>

            {{-- Programs Table --}}
            <div class="overflow-x-auto mt-6">
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left">ID</th>
                            <th class="px-6 py-3 text-left">Name</th>
                            <th class="px-6 py-3 text-left">Description</th>
                            <th class="px-6 py-3 text-left">Image</th>
                            <th class="px-6 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($programs as $program)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-3">{{ $program->id }}</td>
                                <td class="px-6 py-3">{{ $program->name }}</td>
                                <td class="px-6 py-3">{{ Str::limit($program->description, 80) }}</td>
                                <td class="px-6 py-3">
                                    @if ($program->image)
                                        <img src="{{ asset('storage/programs/' . $program->image) }}" 
                                             alt="{{ $program->name }}" 
                                             class="w-24 h-24 object-cover rounded">
                                    @else
                                        <span class="text-gray-500 italic">No image</span>
                                    @endif
                                </td>
                                <td class="px-6 py-3 text-center flex justify-center gap-2">
                                    <a href="{{ route('programs.edit', $program->id) }}" 
                                       class="text-yellow-500 hover:text-yellow-600">✏️ Edit</a>

                                    <form action="{{ route('programs.destroy', $program->id) }}" method="POST" 
                                          onsubmit="return confirm('Are you sure you want to delete this program?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-600">🗑 Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-gray-500 italic py-4">
                                    No programs available yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Modal & Add Button --}}
            <div x-data="{ open: @json($errors->any() ? true : false) }" class="mt-6">
                {{-- Add New Button --}}
                <button @click="open = true"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    ➕ Add New Program / Service
                </button>

                {{-- Modal --}}
                <div x-show="open"
                     class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
                     x-cloak>
                    <div @click.away="open = false" class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-bold text-gray-800">Add New Program / Service</h2>
                            <button @click="open = false" class="text-gray-500 hover:text-gray-700">&times;</button>
                        </div>

                        <form action="{{ route('programs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
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
                                <label class="block mb-1 font-medium">Upload Image</label>
                                <input type="file" name="image" accept="image/*" 
                                       class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300"
                                       onchange="previewImage(event)">
                                <img id="image-preview" class="mt-2 w-32 h-32 object-cover hidden rounded" />
                                @error('image') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                            </div>

                            <div class="flex justify-end gap-2">
                                <button type="button" @click="open = false" 
                                        class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition">
                                    Cancel
                                </button>

                                <button type="submit" 
                                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                    ➕ Add Program / Service
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- Image preview script --}}
<script>
function previewImage(event) {
    const preview = document.getElementById('image-preview');
    preview.src = URL.createObjectURL(event.target.files[0]);
    preview.classList.remove('hidden');
}
</script>
