<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Edit Announcement</h1>

    <form method="POST" action="{{ route('announcements.update', $announcement) }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-1">Title</label>
            <input name="title" value="{{ $announcement->title }}" class="w-full border px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Content</label>
            <textarea name="content" class="w-full border px-3 py-2" required>{{ $announcement->content }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</x-app-layout>
