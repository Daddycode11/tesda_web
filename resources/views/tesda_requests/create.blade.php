@extends('layouts.app')


<div class="flex">
    {{-- Sidebar --}}
    @include('components.user-sidebar')

<div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Submit New TESDA Request</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('user.requests.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block font-medium mb-1">Request Type</label>
            <select name="request_type" required class="w-full border-gray-300 rounded">
                <option value="">-- Select --</option>
                <option value="Training Certificate">Training Certificate</option>
                <option value="Scholarship Application">Scholarship Application</option>
                <option value="Assessment Scheduling">Assessment Scheduling</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Message</label>
            <textarea name="message" rows="4" class="w-full border-gray-300 rounded" required>{{ old('message') }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Submit Request
        </button>
    </form>
</div>
