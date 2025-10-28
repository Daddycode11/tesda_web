@extends('layouts.app')

<div class="flex min-h-screen">

    {{-- Sidebar --}}
    <div class="w-64 flex-shrink-0" style="position: sticky; top: 0; height: 100vh;">
        @include('components.admin-sidebar')
    </div>

    {{-- Main content --}}
    <div class="flex-1 overflow-auto" style="height: 100vh;">

        {{-- Admin Header --}}
        <div class="flex items-center justify-between bg-white shadow px-8 py-4 sticky top-0 z-20" style="font-family: 'Poppins', 'Roboto', sans-serif;">
            <!-- Page Title -->
            <h1 class="text-2xl font-semibold text-gray-800">Admin Dashboard</h1>

            <!-- Right Side: Search + Notifications + Profile -->
            <div class="flex items-center space-x-4">
       

            <!-- Notifications -->
            <button class="relative p-2 rounded-full hover:bg-gray-100 transition">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14V11a6 6 0 10-12 0v3c0 .538-.214 1.055-.595 1.595L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
                <span class="absolute -top-1 -right-1 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                3
                </span>
            </button>

            <!-- User Profile Dropdown -->
            <div class="relative" id="profileDropdownRoot">
                <button id="profileDropdownBtn" aria-haspopup="true" aria-expanded="false" class="flex items-center space-x-2 cursor-pointer focus:outline-none rounded-md hover:bg-gray-100 p-1">
                <img src="{{ asset('images/Tesda-Logo.png') }}" alt="Admin" class="w-9 h-9 rounded-full border border-gray-300">
                <span class="text-gray-800 font-medium">Admin</span>
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
                </button>

                <div id="profileDropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-30">
                <a href="{{ route('admin.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">View Profile</a>
                <a href="{{ route('admin.settings') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                <div class="border-t border-gray-100"></div>
                <form id="logoutForm" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Logout</button>
                </form>
                </div>
            </div>
            </div>
        </div>

        <script>
            (function() {
            var btn = document.getElementById('profileDropdownBtn');
            var menu = document.getElementById('profileDropdownMenu');
            var root = document.getElementById('profileDropdownRoot');

            if (!btn || !menu) return;

            function toggleMenu(force) {
                var isHidden = menu.classList.contains('hidden');
                var show = (typeof force === 'boolean') ? force : isHidden;
                if (show) {
                menu.classList.remove('hidden');
                btn.setAttribute('aria-expanded', 'true');
                } else {
                menu.classList.add('hidden');
                btn.setAttribute('aria-expanded', 'false');
                }
            }

            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                toggleMenu();
            });

            // Close when clicking outside
            document.addEventListener('click', function(e) {
                if (!root.contains(e.target)) toggleMenu(false);
            });

            // Close on ESC
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') toggleMenu(false);
            });
            })();
        </script>

        {{-- Stats cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-blue-500 text-white p-6 rounded-lg shadow text-center">
                <div class="flex flex-col items-center">
                    <h2 class="text-lg">Total Services</h2>
                    <p class="text-3xl font-bold">{{ $totalServices ?? 0 }}</p>
                </div>
            </div>
            <div class="bg-green-500 text-white p-6 rounded-lg shadow text-center">
                <div class="flex flex-col items-center">
                    <h2 class="text-lg">Total Feedback Submitted</h2>
                    <p class="text-3xl font-bold">{{ $totalFeedback ?? 0 }}</p>
                </div>
            </div>
            <div class="bg-purple-500 text-white p-6 rounded-lg shadow text-center">
                <div class="flex flex-col items-center">
                    <h2 class="text-lg">Total Schedules</h2>
                    <p class="text-3xl font-bold">{{ $totalSchedules ?? 0 }}</p>
                </div>
            </div>
            <div class="bg-yellow-500 text-white p-6 rounded-lg shadow text-center">
                <div class="flex flex-col items-center">
                    <h2 class="text-lg">Total Request</h2>
                    <p class="text-3xl font-bold">{{ $totalrequest ?? 0 }}</p>
                </div>
            </div>
        </div>

        {{-- Charts and Requests panels --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Keep all your chart divs and canvas elements --}}
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

            {{-- Requests panel --}}
            <div class="bg-white p-4 rounded-xl shadow flex flex-col">
                <h2 class="text-lg font-semibold text-center mb-4 text-gray-800 flex items-center justify-center">
                    New Requests
                    @if($newRequests->count() > 0)
                        <span class="ml-2 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">
                            {{ $newRequests->count() }}
                        </span>
                    @endif
                </h2>

                <div class="flex-1 space-y-3 overflow-y-auto">
                    @forelse($newRequests as $req)
                        <div class="bg-gray-50 p-3 rounded flex items-center justify-between hover:bg-gray-100">
                            <div class="text-sm">
                                <div class="font-medium text-blue-600">
                                    New {{ $req->request_type }} request
                                </div>
                                <div class="text-xs text-gray-500">
                                    From: {{ $req->name }}
                                </div>
                            </div>
                            <form action="{{ route('admin.tesda_requests.updateStatus', $req->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="status" value="Approved">
                                <button type="submit" class="bg-green-500 text-white p-2 rounded hover:bg-green-600 transition" title="Approve">
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 3a1 1 0 011 1v5h5a1 1 0 010 2h-5v5a1 1 0 01-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center">No new requests.</p>
                    @endforelse
                </div>
            </div>
        </div>

<div class="bg-white p-4 rounded-xl shadow flex flex-col">
    <h2 class="text-lg font-semibold text-center mb-4 text-gray-800 flex items-center justify-center">
        Approved Requests
    </h2>

    <div class="flex-1 space-y-3 overflow-y-auto">
        @forelse($approvedRequests as $req)
            <div class="bg-gray-50 p-3 rounded flex items-start justify-between hover:bg-gray-100">
                <div class="text-sm">
                    <div class="font-medium text-green-600">
                        Approved {{ $req->request_type }} request
                    </div>
                    <div class="text-xs text-gray-500">
                        From: {{ $req->name }}
                    </div>
                </div>
                {{-- Optional actions like view or delete can go here --}}
            </div>
        @empty
            <p class="text-gray-500 text-center">No approved requests yet.</p>
        @endforelse
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

