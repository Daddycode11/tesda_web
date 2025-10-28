@extends('layouts.app')

@section('content')
<div x-data="{ showModal: false }" class="flex min-h-screen bg-gray-50">
    {{-- Sidebar --}}
    @include('components.admin-sidebar')

    {{-- Main content --}}
    <div class="flex-1 p-8">
        <div class="bg-white shadow-lg rounded-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-bold text-gray-800">📅 Activities</h1>
                <button @click="showModal = true" 
                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                    + Add Activity
                </button>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border rounded-lg overflow-hidden">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Title</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Date</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Description</th>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($activities as $a)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-gray-800">{{ $a->title }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ \Carbon\Carbon::parse($a->date)->format('M d, Y') }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ \Illuminate\Support\Str::limit($a->description, 50) }}</td>
                                <td class="px-6 py-4 space-x-2">
                                    <a href="{{ route('admin.activities.edit', $a) }}" class="text-blue-600 hover:underline">Edit</a>
                                    <form action="{{ route('admin.activities.destroy', $a) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Delete this?')" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-gray-500">No activities yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div x-show="showModal" 
         class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
         x-transition
         style="display: none;">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">

            <!-- Close button -->
            <button @click="showModal = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                ✖
            </button>

            <h1 class="text-2xl font-bold mb-4">Add Activity</h1>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                    <ul class="text-sm">
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.activities.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block font-medium">Title:</label>
                    <input type="text" name="title" class="w-full border rounded px-2 py-1" value="{{ old('title') }}" required>
                </div>
                <div>
                    <label class="block font-medium">Date:</label>
                    <input type="date" name="date" class="w-full border rounded px-2 py-1" value="{{ old('date') }}" required>
                </div>
                <div>
                    <label class="block font-medium">Description:</label>
                    <textarea name="description" class="w-full border rounded px-2 py-1" rows="4">{{ old('description') }}</textarea>
                </div>
                <div class="flex justify-end">
                    <button type="button" @click="showModal = false" class="mr-2 px-4 py-2 rounded border">Cancel</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Activity</button>
                </div>
            </form>

        </div>
    </div>

</div>

<script src="//unpkg.com/alpinejs" defer></script>
