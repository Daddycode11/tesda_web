<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Enrollments</h1>

    @if(session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
    @endif

    {{-- Search form --}}
    <form method="GET" action="{{ route('enrollments.index') }}" class="mb-4 flex">
        <input 
            type="text" 
            name="search" 
            placeholder="Search by user, schedule, or status" 
            value="{{ request('search') }}" 
            class="border px-3 py-1 rounded mr-2 w-full md:w-1/3"
        >
        <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Search</button>
    </form>

    {{-- Export buttons --}}
    <div class="mb-4">
        <a href="{{ route('enrollments.export') }}" class="bg-green-500 text-white px-3 py-1 rounded mr-2 inline-block">Export to Excel</a>
        <a href="{{ route('enrollments.exportPdf') }}" class="bg-red-500 text-white px-3 py-1 rounded inline-block">Export to PDF</a>
    </div>

    <table class="min-w-full border">
        <thead>
            <tr>
                <th class="border px-4 py-2">User</th>
                <th class="border px-4 py-2">Schedule</th>
                <th class="border px-4 py-2">Status</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($enrollments as $enroll)
                <tr>
                    <td class="border px-4 py-2">{{ $enroll->user->name }}</td>
                    <td class="border px-4 py-2">{{ $enroll->schedule->title }} ({{ $enroll->schedule->date }})</td>
                    <td class="border px-4 py-2">{{ ucfirst($enroll->status) }}</td>
                    <td class="border px-4 py-2">
                        @if($enroll->status == 'pending')
                            <form action="{{ route('enrollments.approve', $enroll) }}" method="POST" class="inline">
                                @csrf
                                <button class="text-green-600 hover:underline">Approve</button>
                            </form>
                            <form action="{{ route('enrollments.reject', $enroll) }}" method="POST" class="inline">
                                @csrf
                                <button class="text-yellow-600 hover:underline">Reject</button>
                            </form>
                        @endif
                        <form action="{{ route('enrollments.destroy', $enroll) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this?')" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="border px-4 py-2 text-center">No enrollments found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $enrollments->appends(['search' => request('search')])->links() }}
    </div>
</x-app-layout>
