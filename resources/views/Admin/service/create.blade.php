<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Add Service</h1>

    <form method="POST" action="{{ route('services.store') }}">
        @csrf
        <div class="mb-4">
            <label class="block mb-1">Title</label>
            <input type="text" name="title" class="w-full border px-3 py-2" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1">Description</label>
            <textarea name="description" class="w-full border px-3 py-2"></textarea>
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</x-app-layout>
