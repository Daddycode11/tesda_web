
<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Announcements</h1>

    <a href="{{ route('announcements.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add Announcement</a>

    @if(session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    <table class="min-w-full border">
        <thead>
            <tr>
                <th class="border px-4 py-2">Title</th>
                <th class="border px-4 py-2">Content</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($announcements as $a)
                <tr>
                    <td class="border px-4 py-2">{{ $a->title }}</td>
                    <td class="border px-4 py-2">{{ \Illuminate\Support\Str::limit($a->content, 50) }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('announcements.edit', $a) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('announcements.destroy', $a) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this?')" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
