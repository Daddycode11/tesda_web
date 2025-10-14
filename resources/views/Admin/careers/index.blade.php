@extends('layouts.app')

@section('title', 'Admin - Careers')

@section('content')
<div class="flex flex-wrap">
    @include('components.admin-sidebar')

    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Careers Management</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="mb-4">
            <form action="{{ route('admin.careers.store') }}" method="POST" enctype="multipart/form-data" class="space-y-3">
                @csrf
                <input type="text" name="title" placeholder="Career Title" class="w-full border p-2 rounded" required>
                <textarea name="description" placeholder="Description" class="w-full border p-2 rounded"></textarea>
                <input type="file" name="image" accept="image/*" class="w-full border p-2 rounded">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Career</button>
            </form>
        </div>

        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-6 py-3 text-left">Title</th>
                    <th class="px-6 py-3 text-left">Description</th>
                    <th class="px-6 py-3 text-left">Image</th>
                    <th class="px-6 py-3 text-center">Actions</th>
                </tr>
            </thead>
          <tbody class="divide-y divide-gray-200">
    @forelse($careers as $career)
        <tr class="hover:bg-gray-50">
            <td class="px-6 py-3 font-semibold text-gray-800">{{ $career->title }}</td>
            <td class="px-6 py-3 text-gray-600">{{ Str::limit($career->description, 80) }}</td>
            <td class="px-6 py-3">
                @if($career->image)
                    <img src="{{ asset('storage/' . $career->image) }}" 
                         alt="{{ $career->title }}" 
                         class="w-20 h-20 object-cover rounded shadow">
                @else
                    <span class="text-gray-500 italic">No Image</span>
                @endif
            </td>
          <td class="px-6 py-3">
    <div class="flex justify-center items-center space-x-4">
        {{-- 👁️ View Button --}}
        <a href="{{ route('admin.careers.show', $career->id) }}" 
           class="text-blue-600 hover:text-blue-800 font-medium flex items-center gap-1">
            👁️ View
        </a>

        {{-- ✏️ Edit Button --}}
        <a href="{{ route('admin.careers.edit', $career->id) }}" 
           class="text-yellow-500 hover:text-yellow-600 font-medium flex items-center gap-1">
            ✏️ Edit
        </a>

        {{-- 🗑️ Delete Button --}}
        <form action="{{ route('admin.careers.destroy', $career->id) }}" method="POST" 
              onsubmit="return confirm('Are you sure you want to delete this career?');"
              class="flex items-center">
            @csrf 
            @method('DELETE')
            <button type="submit" 
                    class="text-red-600 hover:text-red-800 font-medium flex items-center gap-1">
                🗑️ Delete
            </button>
        </form>

</td>

        </tr>
    @empty
        <tr>
            <td colspan="4" class="text-center py-4 text-gray-500 italic">No careers available yet.</td>
        </tr>
    @endforelse
</tbody>

        </table>
    </div>
</div>

