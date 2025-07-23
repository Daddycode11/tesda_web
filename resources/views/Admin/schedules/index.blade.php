@extends('layouts.app')

<div class="flex min-h-screen">
    {{-- Sidebar --}}
    @include('components.admin-sidebar')

    {{-- Main content --}}
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">Schedules</h1>

        <a href="{{ route('schedules.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
            Add Schedule
        </a>

        @if(session('success'))
            <div class="text-green-600 mb-4">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">Title</th>
                        <th class="border px-4 py-2">Date</th>
                        <th class="border px-4 py-2">Time</th>
                        <th class="border px-4 py-2">Location</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedules as $s)
                        <tr>
                            <td class="border px-4 py-2">{{ $s->title }}</td>
                            <td class="border px-4 py-2">{{ $s->date }}</td>
                            <td class="border px-4 py-2">{{ $s->time }}</td>
                            <td class="border px-4 py-2">{{ $s->location }}</td>
                            <td class="border px-4 py-2 space-x-2">
                                <a href="{{ route('schedules.edit', $s) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('schedules.destroy', $s) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Delete this?')" class="text-red-600 hover:underline">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

