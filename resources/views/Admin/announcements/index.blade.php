<x-app-layout>
    <div class="flex min-h-screen bg-gray-50">
        {{-- Sidebar --}}
        @include('components.admin-sidebar')

        {{-- Main content --}}
        <div class="flex-1 p-8">
            <div class="bg-white shadow-lg rounded-xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">📢 Announcements</h1>
                    <a href="{{ route('announcements.create') }}" 
                       class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                        + Add Announcement
                    </a>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border rounded-lg overflow-hidden">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Title</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Content</th>
                                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($announcements as $a)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 text-gray-800">{{ $a->title }}</td>
                                    <td class="px-6 py-4 text-gray-600">{{ \Illuminate\Support\Str::limit($a->content, 50) }}</td>
                                    <td class="px-6 py-4 space-x-2">
                                        <a href="{{ route('announcements.edit', $a) }}" 
                                           class="text-blue-600 hover:underline">Edit</a>
                                        <form action="{{ route('announcements.destroy', $a) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Delete this?')" 
                                                    class="text-red-600 hover:underline">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if($announcements->isEmpty())
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center text-gray-500">No announcements available.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
