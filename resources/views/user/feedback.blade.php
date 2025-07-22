<x-app-layout>
    <div class="flex min-h-screen bg-white">
        {{-- Sidebar --}}
        @include('components.user-sidebar')

        {{-- Main content --}}
        <div class="flex-1 flex items-center justify-center p-8">
            <div class="w-full max-w-lg bg-gray-100 dark:bg-gray-800 rounded-xl shadow p-6">
                <h1 class="text-2xl font-bold mb-4 text-center text-gray-800 dark:text-gray-100">Give Feedback</h1>

                {{-- Feedback form and feedback list --}}
                <div x-data="{ showModal: false }">
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
                        class="mb-6"
                    >
                        @csrf
                        <textarea 
                            x-ref="textarea"
                            name="content" 
                            rows="3" 
                            placeholder="Share your feedback..." 
                            class="w-full border border-gray-300 dark:border-gray-700 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-500 transition"
                        ></textarea>
                        <button 
                            type="submit" 
                            class="mt-3 w-full bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
                            Submit Feedback
                        </button>
                    </form>

                    {{-- Confirmation Modal --}}
                    <div 
                        x-show="showModal" 
                        x-transition 
                        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
                    >
                        <div class="bg-white rounded-lg shadow p-6 max-w-sm w-full text-center">
                            <h2 class="text-xl font-semibold mb-2">Confirm Submission</h2>
                            <p>Are you sure you want to submit this feedback?</p>
                            <div class="mt-4 flex justify-center gap-4">
                                <button 
                                    @click="showModal = false" 
                                    class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 transition">
                                    Cancel
                                </button>
                                <button 
                                    @click="
                                        showModal = false;
                                        $refs.feedbackForm.submit();
                                    " 
                                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                                    Okay
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Show latest feedback --}}
                    <div class="mt-6">
                        <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Your Latest Feedback</h2>
                        <ul class="divide-y divide-gray-200 dark:divide-gray-600">
                            @forelse($myFeedback as $fb)
                                <li class="py-3">
                                    <p class="text-gray-800 dark:text-gray-100">{{ $fb->content }}</p>
                                    <div class="text-xs text-gray-500 mt-1">Status: {{ ucfirst($fb->status) }}</div>
                                </li>
                            @empty
                                <li class="py-3 text-gray-500 dark:text-gray-400">You haven't submitted any feedback yet.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
