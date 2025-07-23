@extends('layouts.app')

<div class="flex min-h-screen">
    {{-- Sidebar --}}
    @include('components.admin-sidebar')

    {{-- Main content --}}
    <div class="flex-1 p-6">
        <h1 class="text-2xl font-bold mb-4">All Feedback</h1>

        @if(session('success'))
            <div class="text-green-600 mb-4">{{ session('success') }}</div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2 text-left">User</th>
                        <th class="border px-4 py-2 text-left">Type</th>
                        <th class="border px-4 py-2 text-left">Service</th>
                        <th class="border px-4 py-2 text-left">Comment</th>
                        <th class="border px-4 py-2 text-left">Status</th>
                        <th class="border px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
  <tbody>
    @forelse($feedback as $item)
        <tr>
            <td class="border px-4 py-2">{{ $item->user->name ?? 'N/A' }}</td>
            <td class="border px-4 py-2">{{ $item->type }}</td>
            <td class="border px-4 py-2">{{ $item->service->title ?? '-' }}</td>
            <td class="border px-4 py-2">{{ $item->text }}</td>
            <td class="border px-4 py-2 capitalize">{{ $item->status }}</td>
            <td class="border px-4 py-2 space-x-2">
                @if($item->status != 'view')
                    <form action="{{ route('feedback.approve', $item) }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-green-600 hover:underline">Approve</button>
                    </form>
                @endif
                <form action="{{ route('feedback.destroy', $item) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this feedback?')" class="text-red-600 hover:underline">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" class="text-center text-gray-500 px-4 py-2">No feedback available.</td>
        </tr>
    @endforelse
</tbody>

            </table>
        </div>
    </div>
</div>
