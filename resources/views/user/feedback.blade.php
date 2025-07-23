@extends('layouts.app')

<div class="flex min-h-screen bg-white">
    {{-- Sidebar --}}
    @include('components.user-sidebar')

    {{-- Main content --}}
    <div class="flex-1 flex items-center justify-center p-8">
        <div class="w-full max-w-lg bg-gray-100 dark:bg-gray-800 rounded-xl shadow p-6">
            <h1 class="text-2xl font-bold mb-4 text-center text-gray-800 dark:text-gray-100">Give Feedback</h1>
<div x-data="{ showModal: false, rating: 0 }">
    <form 
        x-ref="feedbackForm"
        method="POST" 
        action="{{ route('feedback.store') }}"
        @submit.prevent="
            if ($refs.textarea.value.trim() === '') {
                alert('Please enter your feedback before submitting.');
            } else if (rating === 0) {
                alert('Please select a rating.');
            } else {
                showModal = true;
            }
        "
        class="mb-6"
    >
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200 mb-2">Your Rating:</label>
            <div class="flex space-x-1">
                <template x-for="star in 5" :key="star">
                    <svg 
                        @click="rating = star"
                        :class="rating >= star ? 'text-yellow-400' : 'text-gray-300'"
                        class="w-8 h-8 cursor-pointer transition"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.922-.755 1.688-1.54 1.118l-3.38-2.455a1 1 0 00-1.175 0l-3.38 2.455c-.784.57-1.838-.196-1.54-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.05 9.394c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.967z"/>
                    </svg>
                </template>
            </div>
            <input type="hidden" name="rating" :value="rating">
        </div>
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
            </div>

            {{-- Info note --}}
            <div class="mt-4 text-sm text-gray-500 dark:text-gray-400 text-center">
                <span class="inline-flex items-center">
                    <svg class="w-4 h-4 mr-1 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M13 16h-1v-4h-1m1-4h.01M12 20c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z"/>
                    </svg>
                    Your feedback will be visible to the admin for review.
                </span>
            </div>

            {{-- Latest feedback --}}
            <div class="mt-6">
    <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Your Latest Feedback</h2>
    <ul class="divide-y divide-gray-200 dark:divide-gray-600">
        @forelse($myFeedback as $fb)
            <li class="py-3">
                <p class="text-gray-800 dark:text-gray-100">
                    {{ $fb->comment ?? $fb->content }}
                </p>
                {{-- show feedback type --}}
                <div class="text-xs text-gray-500 mt-1">
                    Type: 
                    @if($fb->service_id)
                        Service Feedback — {{ $fb->service->title ?? 'N/A' }}
                    @else
                        General Feedback
                    @endif
                </div>
                <div class="text-xs text-gray-500 mt-1">
                    Status: {{ ucfirst($fb->status) }}
                </div>
            </li>
        @empty
            <li class="py-3 text-gray-500 dark:text-gray-400">You haven't submitted any feedback yet.</li>
        @endforelse
    </ul>
            </div>
        </div>
    </div>
</div>

<script src="//unpkg.com/alpinejs" defer></script>
