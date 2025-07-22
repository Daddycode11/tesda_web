<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">All Feedback</h1>

    @if(session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    <table class="min-w-full border">
        <thead>
            <tr>
                <th class="border px-4 py-2">User</th>
                <th class="border px-4 py-2">Service</th>
                <th class="border px-4 py-2">Comment</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feedback as $item)
                <tr>
                    <td class="border px-4 py-2">{{ $item->user->name }}</td>
                    <td class="border px-4 py-2">{{ $item->service->title }}</td>
                    <td class="border px-4 py-2">{{ $item->comment }}</td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('feedback.destroy', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Delete this feedback?')" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
