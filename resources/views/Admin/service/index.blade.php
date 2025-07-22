<x-app-layout>
    <div class="flex flex-wrap">
        {{-- Sidebar --}}
        @include('components.admin-sidebar')

        {{-- Main Content --}}
        <div class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-4">TESDA Services</h1>

            <a href="{{ route('services.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">
                ➕ Add Service
            </a>

            @if(session('success'))
                <div class="text-green-600 mb-4">{{ session('success') }}</div>
            @endif

            @if($services->isEmpty())
                <p class="text-gray-600">No services found.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full border">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="border px-4 py-2">Title</th>
                                <th class="border px-4 py-2">Description</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                                    <td class="border px-4 py-2">{{ $service->title }}</td>
                                    <td class="border px-4 py-2">{{ $service->description }}</td>
                                    <td class="border px-4 py-2 space-x-2">
                                        <a href="{{ route('services.edit', $service) }}" class="text-blue-600 hover:underline">Edit</a>
                                        <form action="{{ route('services.destroy', $service) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Delete this service?')" class="text-red-600 hover:underline">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
