<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Welcome, {{ Auth::user()->name }}</h1>

    {{-- Top cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
        <div class="bg-blue-500 text-white p-4 rounded shadow">
            <h2 class="text-lg">Total Available Services</h2>
            <p class="text-2xl font-bold">{{ $totalServices }}</p>
        </div>
        <div class="bg-green-500 text-white p-4 rounded shadow">
            <h2 class="text-lg">My Enrollments</h2>
            <p class="text-2xl font-bold">{{ $myEnrollmentsCount }}</p>
        </div>
        <div class="bg-yellow-500 text-white p-4 rounded shadow">
            <h2 class="text-lg">Approved Enrollments</h2>
            <p class="text-2xl font-bold">{{ $approvedEnrollmentsCount }}</p>
        </div>
    </div>

    {{-- Latest TESDA Services --}}
    <div class="bg-white dark:bg-gray-800 p-4 rounded shadow mb-6">
        <h2 class="text-lg font-semibold mb-2">Available TESDA Services</h2>
        <ul>
            @forelse($services as $service)
                <li class="border-b py-2 flex justify-between items-center">
                    <span>{{ $service->title }}</span>
                    <a href="{{ route('services.show', $service) }}" class="text-blue-600 hover:underline">View Details</a>
                </li>
            @empty
                <li>No services available at the moment.</li>
            @endforelse
        </ul>
    </div>

    {{-- My Enrollments --}}
    <div class="bg-white dark:bg-gray-800 p-4 rounded shadow mb-6">
        <h2 class="text-lg font-semibold mb-2">My Applications / Enrollments</h2>
        <ul>
            @forelse($myEnrollments as $enroll)
                <li class="border-b py-2">
                    <div>
                        <strong>{{ $enroll->schedule->title }}</strong> ({{ $enroll->schedule->date }})
                    </div>
                    <div>Status: <span class="font-semibold">{{ ucfirst($enroll->status) }}</span></div>
                </li>
            @empty
                <li>You have not applied yet.</li>
            @endforelse
        </ul>
    </div>


 <div x-data="{ showModal: false }">
    {{-- Feedback form --}}
    <form 
        x-ref="feedbackForm"
        method="POST" 
        action="{{ route('feedback.store') }}"
        @submit.prevent="
            if ($refs.textarea.value.trim() === '') {
                alert('Please enter your feedback before submitting.');
            } else {
                showModal = true;
            }
        "
        class="mb-4"
    >
        @csrf
        <textarea 
            x-ref="textarea"
            name="content" 
            rows="3" 
            placeholder="Share your feedback..." 
            class="w-full border rounded p-2 mb-2"
        ></textarea>
        <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
            Submit Feedback
        </button>
    </form>

    {{-- Confirmation Modal --}}
    <div 
        x-show="showModal" 
        x-transition 
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
    >
        <div class="bg-white rounded shadow p-6 max-w-sm text-center">
            <h2 class="text-xl font-semibold mb-2">Confirm Submission</h2>
            <p>Are you sure you want to submit this feedback?</p>
            <div class="mt-4 flex justify-center gap-4">
                <button 
                    @click="showModal = false" 
                    class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500"
                >
                    Cancel
                </button>
                <button 
                    @click="
                        showModal = false;
                        $refs.feedbackForm.submit();
                    " 
                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"
                >
                    Okay
                </button>
            </div>
        </div>
    </div>

        {{-- Show latest feedback --}}
        <ul>
            @forelse($myFeedback as $fb)
                <li class="border-b py-2">
                    {{ $fb->content }}
                    <div class="text-xs text-gray-500">Status: {{ ucfirst($fb->status) }}</div>
                </li>
            @empty
                <li>You haven't submitted any feedback yet.</li>
            @endforelse
        </ul>
    </div>
</x-app-layout>
