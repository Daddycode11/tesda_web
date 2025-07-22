<x-app-layout>
    <div class="flex">
        {{-- Sidebar --}}
        @include('components.user-sidebar')

        {{-- Main content --}}
        <div class="flex-1 p-8">
            <h1 class="text-2xl font-bold mb-4 text-center">Welcome, {{ Auth::user()->name }}</h1>

            {{-- Top cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
                <div class="bg-blue-500 text-white p-4 rounded shadow text-center">
                    <h2 class="text-lg">Total Available Services</h2>
                    <p class="text-2xl font-bold">{{ $totalServices }}</p>
                </div>
                <div class="bg-green-500 text-white p-4 rounded shadow text-center">
                    <h2 class="text-lg">My Enrollments</h2>
                    <p class="text-2xl font-bold">{{ $myEnrollmentsCount }}</p>
                </div>
                <div class="bg-yellow-500 text-white p-4 rounded shadow text-center">
                    <h2 class="text-lg">Approved Enrollments</h2>
                    <p class="text-2xl font-bold">{{ $approvedEnrollmentsCount }}</p>
                </div>
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
<div class="bg-white shadow-lg rounded-xl p-6 mb-6">
    <h2 class="text-2xl font-bold mb-4 text-gray-800 border-b pb-2">📢</span> Latest Announcements</h2>
    <ul class="divide-y divide-gray-200">
         @forelse($announcements as $announcement)
            <li class="border-b py-2">
                <strong>{{ $announcement->title }}</strong>
                <div class="text-sm text-gray-600">{{ $announcement->content }}</div>
                <div class="text-xs text-gray-500">
                    {{ $announcement->created_at->format('F d, Y • h:i A') }}
                </div>
            </li>
        @empty
            <li>No announcements available.</li>
        @endforelse
    </ul>
</div>

        </div>
    </div>
</x-app-layout>
