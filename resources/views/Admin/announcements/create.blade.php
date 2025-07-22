<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Create Announcement</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
            <ul class="text-sm">
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('announcements.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block font-medium">Title:</label>
            <input type="text" name="title" class="w-full border rounded px-2 py-1" value="{{ old('title') }}" required>
        </div>
        <div>
            <label class="block font-medium">Content:</label>
            <textarea name="content" class="w-full border rounded px-2 py-1" rows="5" required>{{ old('content') }}</textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Publish</button>
    </form>
</x-app-layout>
