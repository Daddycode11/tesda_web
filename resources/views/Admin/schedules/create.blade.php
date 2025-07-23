@extends('layouts.app')


<div class="flex min-h-screen">
    {{-- Sidebar --}}
    @include('components.admin-sidebar')

    {{-- Main content --}}
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">Add Schedule</h1>

        <form method="POST" action="{{ route('schedules.store') }}" class="bg-white p-6 rounded shadow max-w-lg">
            @csrf
            <div class="mb-4">
                <label class="block mb-1 font-medium">Title</label>
                <input name="title" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Date</label>
                <input type="date" name="date" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Time</label>
                <input type="time" name="time" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Location</label>
                <input name="location" class="w-full border px-3 py-2 rounded">
            </div>
            <div class="mb-4">
                <label class="block mb-1 font-medium">Description</label>
                <textarea name="description" class="w-full border px-3 py-2 rounded"></textarea>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Save
            </button>
        </form>
    </div>
</div>

