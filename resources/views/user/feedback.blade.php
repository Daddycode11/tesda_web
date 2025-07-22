<x-app-layout>
    <h1 class="text-xl font-bold mb-4">Give Feedback</h1>

    <form method="POST" action="{{ route('feedback.store') }}" class="max-w-xl bg-white p-4 rounded shadow">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Your Feedback</label>
            <textarea name="content" rows="4" class="w-full border rounded px-3 py-2" required></textarea>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Submit Feedback</button>
    </form>
</x-app-layout>
