<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Edit Schedule</h1>

    <form method="POST" action="{{ route('schedules.update', $schedule) }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-1">Title</label>
            <input name="title" value="{{ $schedule->title }}" class="w-full border px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Date</label>
            <input type="date" name="date" value="{{ $schedule->date }}" class="w-full border px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Time</label>
            <input type="time" name="time" value="{{ $schedule->time }}" class="w-full border px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Location</label>
            <input name="location" value="{{ $schedule->location }}" class="w-full border px-3 py-2">
        </div>
        <div class="mb-4">
            <label class="block mb-1">Description</label>
            <textarea name="description" class="w-full border px-3 py-2">{{ $schedule->description }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</x-app-layout>
