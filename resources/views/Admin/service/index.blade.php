<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">TESDA Services</h1>

    <a href="{{ route('services.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Service</a>

    @if(session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    <table class="min-w-full border">
        <thead>
            <tr>
                <th class="border px-4 py-2">Title</th>
                <th class="border px-4 py-2">Description</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
                <tr>
                    <td class="border px-4 py-2">{{ $service->title }}</td>
                    <td class="border px-4 py-2">{{ $service->description }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('services.edit', $service) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('services.destroy', $service) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this service?')" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
