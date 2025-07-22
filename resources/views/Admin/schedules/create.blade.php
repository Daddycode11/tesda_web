<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Add Schedule</h1>

    <form method="POST" action="{{ route('schedules.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Title</label>
            <input name="title" class="w-full border px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Date</label>
            <input type="date" name="date" class="w-full border px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Time</label>
            <input type="time" name="time" class="w-full border px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Location</label>
            <input name="location" class="w-full border px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Description</label>
            <textarea name="description" class="w-full border px-3 py-2"></textarea>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</x-app-layout>
