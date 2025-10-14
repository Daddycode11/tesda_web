{{-- resources/views/admin/transparency/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Transparency Records')

@section('content')
<div class="flex flex-wrap">
    {{-- ✅ Sidebar --}}
    @include('components.admin-sidebar')

    {{-- ✅ Main Content --}}
    <div class="flex-1 p-6">
        <div class="max-w-6xl mx-auto">
            {{-- Header --}}
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Transparency Records</h1>
                <a href="{{ route('admin.transparency.create') }}" 
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                   ➕ Add New
                </a>
            </div>

            {{-- Records Table --}}
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-6 py-3 text-left">Title</th>
                            <th class="px-6 py-3 text-left">Description</th>
                            <th class="px-6 py-3 text-left">File</th>
                            <th class="px-6 py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse ($transparencies as $transparency)
                        <tr>
                            <td class="px-6 py-3">{{ $transparency->title }}</td>
                            <td class="px-6 py-3">{{ Str::limit($transparency->description, 80) }}</td>
                            <td class="px-6 py-3">
                                @if ($transparency->file)
                                    <a href="{{ asset('storage/' . $transparency->file) }}" target="_blank" class="text-blue-600 underline">
                                        View File
                                    </a>
                                @else
                                    <span class="text-gray-500 italic">No file</span>
                                @endif
                            </td>
                            <td class="px-6 py-3 text-center space-x-2">
                                <a href="{{ route('admin.transparency.edit', $transparency->id) }}" class="text-yellow-500 hover:text-yellow-600">✏️ Edit</a>
                                <form action="{{ route('admin.transparency.destroy', $transparency->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600">🗑 Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-gray-500 italic py-4">No transparency records available yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
