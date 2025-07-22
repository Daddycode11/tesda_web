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
    <div class="bg-white dark:bg-gray-800 p-4 rounded shadow">
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
</x-app-layout>
