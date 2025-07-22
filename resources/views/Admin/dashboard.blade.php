<x-app-layout>
    <div class="flex">
        {{-- Sidebar --}}
        @include('components.admin-sidebar')

        {{-- Main content --}}
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-6 text-center">Admin Dashboard</h1>
{{-- Stats cards --}}
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-blue-500 text-white p-6 rounded-lg shadow text-center">
        <div class="flex flex-col items-center"> {{-- inner card --}}
            <h2 class="text-lg">Total Services</h2>
            <p class="text-3xl font-bold">{{ $totalServices ?? 0 }}</p>
        </div>
    </div>
    <div class="bg-green-500 text-white p-6 rounded-lg shadow text-center">
        <div class="flex flex-col items-center"> {{-- inner card --}}
            <h2 class="text-lg">Total Feedback</h2>
            <p class="text-3xl font-bold">{{ $totalFeedback ?? 0 }}</p>
        </div>
    </div>
    <div class="bg-purple-500 text-white p-6 rounded-lg shadow text-center">
        <div class="flex flex-col items-center"> {{-- inner card --}}
            <h2 class="text-lg">Total Schedules</h2>
            <p class="text-3xl font-bold">{{ $totalSchedules ?? 0 }}</p>
        </div>
    </div>
    <div class="bg-yellow-500 text-white p-6 rounded-lg shadow text-center">
        <div class="flex flex-col items-center"> {{-- inner card --}}
            <h2 class="text-lg">Total Enrollments</h2>
            <p class="text-3xl font-bold">{{ $totalEnrollments ?? 0 }}</p>
        </div>
    </div>
    </div>
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    {{-- Left side: charts in 2 columns --}}
    <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white p-4 rounded shadow">
            <canvas id="barChart"></canvas>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <canvas id="lineChart"></canvas>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <canvas id="pieChart"></canvas>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <canvas id="ganttChart"></canvas>
        </div>
    </div>

    {{-- Right side: New Requests card --}}
    <div class="bg-white p-4 rounded-xl shadow flex flex-col">
        <h2 class="text-lg font-semibold text-center mb-4 text-gray-800">New Requests</h2>

        <div class="flex-1 space-y-3 overflow-y-auto">
            <div class="bg-gray-50 p-3 rounded flex items-center justify-between hover:bg-gray-100">
                <div class="text-sm">
                    <div class="font-medium text-blue-600">New Form request</div>
                    <div class="text-xs text-gray-500">From: Jowel Paña</div>
                </div>
                <button class="bg-green-500 text-white p-2 rounded hover:bg-green-600 transition">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 3a1 1 0 011 1v5h5a1 1 0 010 2h-5v5a1 1 0 01-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"/>
                    </svg>
                </button>
            </div>

            <div class="bg-gray-50 p-3 rounded flex items-center justify-between hover:bg-gray-100">
                <div class="text-sm">
                    <div class="font-medium text-blue-600">New National Certificate request</div>
                    <div class="text-xs text-gray-500">From: Gail</div>
                </div>
                <button class="bg-green-500 text-white p-2 rounded hover:bg-green-600 transition">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 3a1 1 0 011 1v5h5a1 1 0 010 2h-5v5a1 1 0 01-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"/>
                    </svg>
                </button>
            </div>

            <div class="bg-gray-50 p-3 rounded flex items-center justify-between hover:bg-gray-100">
                <div class="text-sm">
                    <div class="font-medium text-blue-600">New Record request</div>
                    <div class="text-xs text-gray-500">From: John Doe</div>
                </div>
                <button class="bg-green-500 text-white p-2 rounded hover:bg-green-600 transition">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 3a1 1 0 011 1v5h5a1 1 0 010 2h-5v5a1 1 0 01-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
    {{-- Chart.js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Bar Chart
        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr'],
                datasets: [{
                    label: 'Visitors',
                    data: [30, 50, 40, 60],
                    backgroundColor: '#3b82f6'
                }]
            }
        });

        // Line Chart
        new Chart(document.getElementById('lineChart'), {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr'],
                datasets: [{
                    label: 'Feedback',
                    data: [100, 200, 150, 300],
                    fill: false,
                    borderColor: '#10b981',
                    tension: 0.4
                }]
            }
        });

        // Pie Chart
        new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: {
                labels: ['Service A', 'Service B', 'Service C'],
                datasets: [{
                    data: [40, 30, 30],
                    backgroundColor: ['#8b5cf6', '#f59e0b', '#ef4444']
                }]
            }
        });

        // Gantt-style: Horizontal Bar Chart
        new Chart(document.getElementById('ganttChart'), {
            type: 'bar',
            data: {
                labels: ['Schedule 1', 'Schedule 2', 'Schedule 3'],
                datasets: [{
                    label: 'Days',
                    data: [3, 5, 2],
                    backgroundColor: '#6366f1'
                }]
            },
            options: {
                indexAxis: 'y' // Horizontal bars
            }
        });
    </script>
</x-app-layout>
