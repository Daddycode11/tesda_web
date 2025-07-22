<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Edit Service</h1>

    <form method="POST" action="{{ route('services.update', $service) }}">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-1">Title</label>
            <input type="text" name="title" value="{{ $service->title }}" class="w-full border px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Description</label>
            <textarea name="description" class="w-full border px-3 py-2">{{ $service->description }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</x-app-layout>
