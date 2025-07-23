@extends('layouts.app')

<div class="flex">
    {{-- Sidebar --}}
    @include('components.user-sidebar')

    {{-- Main content --}}
    <div class="flex-1 p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">My TESDA Requests</h2>
            <button 
                onclick="document.getElementById('requestModal').classList.remove('hidden')" 
                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                + New Request
            </button>
        </div>

        @if($requests->isEmpty())
            <p class="text-gray-500">No requests yet.</p>
        @else
        <div class="overflow-x-auto bg-white shadow rounded">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-600">ID</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-600">Type</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-600">Message</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-600">Status</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-600">Submitted At</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($requests as $req)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $req->id }}</td>
                        <td class="px-4 py-2">{{ $req->request_type }}</td>
                        <td class="px-4 py-2">{{ $req->message }}</td>
                        <td class="px-4 py-2">
                            <span class="inline-block px-2 py-1 text-xs rounded 
                                {{ $req->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : ($req->status == 'approved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                                {{ ucfirst($req->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2">{{ $req->created_at->format('Y-m-d') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>

{{-- Modal backdrop (keep outside main flex) --}}
<div id="requestModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white w-full max-w-md mx-auto rounded shadow-lg p-6 relative">
        <h3 class="text-xl font-semibold mb-4 text-gray-800">New TESDA Request</h3>
        
        <!-- Close button -->
        <button onclick="document.getElementById('requestModal').classList.add('hidden')" 
                class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
            ✖
        </button>

        <form method="POST" action="{{ route('user.requests.store') }}" class="space-y-4">
            @csrf
            <div>
                <label for="request_type" class="block text-gray-700">Request Type</label>
                <select name="request_type" id="request_type" required 
                        class="mt-1 w-full border rounded px-3 py-2 focus:ring focus:ring-green-200">
                    <option value="">Select type</option>
                    <option value="Scholarship">Scholarship</option>
                    <option value="Assessment">Assessment</option>
                    <option value="Training">Training</option>
                </select>
            </div>
            <div>
                <label for="message" class="block text-gray-700">Message (optional)</label>
                <textarea name="message" id="message" rows="3" 
                          class="mt-1 w-full border rounded px-3 py-2 focus:ring focus:ring-green-200"></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
