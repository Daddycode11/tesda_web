<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-blue-500 text-white p-4 rounded shadow">
            <h2 class="text-lg">Total Services</h2>
            <p class="text-2xl font-bold">{{ $totalServices }}</p>
        </div>
        <div class="bg-green-500 text-white p-4 rounded shadow">
            <h2 class="text-lg">Total Feedback</h2>
            <p class="text-2xl font-bold">{{ $totalFeedback }}</p>
        </div>
        <div class="bg-purple-500 text-white p-4 rounded shadow">
            <h2 class="text-lg">Total Schedules</h2>
            <p class="text-2xl font-bold">{{ $totalSchedules }}</p>
        </div>
        <div class="bg-yellow-500 text-white p-4 rounded shadow">
            <h2 class="text-lg">Total Enrollments</h2>
            <p class="text-2xl font-bold">{{ $totalEnrollments }}</p>
        </div>
    </div>
</x-app-layout>
