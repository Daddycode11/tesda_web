@extends('layouts.app')

       <div class="flex">
        @include('components.user-sidebar')
        <div class="flex-1 p-8">

        {{-- Main content --}}
        <div class="flex-1 p-8">
            <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Welcome, {{ Auth::user()->name }}</h1>
            {{-- Top cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div class="bg-blue-500 text-white p-6 rounded-xl shadow hover:shadow-lg transition transform hover:-translate-y-1 flex items-center space-x-4 animate-fade-in">
                    <div>
                        <h2 class="text-lg mb-1 flex items-center gap-2">
                            <span class="text-2xl"><i class="fas fa-cogs"></i></span>
                            Total Available Services
                        </h2>
                        <p class="text-3xl font-bold">{{ $totalServices }}</p>
                    </div>
                </div>
                <div class="bg-green-500 text-white p-6 rounded-xl shadow hover:shadow-lg transition transform hover:-translate-y-1 flex items-center space-x-4 animate-fade-in delay-100">
                    <div>
                        <h2 class="text-lg mb-1 flex items-center gap-2">
                            <span class="text-2xl"><i class="fas fa-user-graduate"></i></span>
                            My Enrollments
                        </h2>
                        <p class="text-3xl font-bold">{{ $myEnrollmentsCount }}</p>
                    </div>
                </div>
                <div class="bg-yellow-500 text-white p-6 rounded-xl shadow hover:shadow-lg transition transform hover:-translate-y-1 flex items-center space-x-4 animate-fade-in delay-200">
                    <div>
                        <h2 class="text-lg mb-1 flex items-center gap-2">
                            <span class="text-2xl"><i class="fas fa-check-circle"></i></span>
                            Approved Enrollments
                        </h2>
                        <p class="text-3xl font-bold">{{ $approvedEnrollmentsCount }}</p>
                    </div>
                </div>
            </div>
            {{-- Feedback and Announcements Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                {{-- Feedback Card --}}
                <div class="bg-purple-500 text-white p-6 rounded-xl shadow hover:shadow-lg transition transform hover:-translate-y-1 flex items-center space-x-4 animate-fade-in delay-300">
                    <div>
                        <h2 class="text-lg mb-1 flex items-center gap-2">
                            <span class="text-2xl"><i class="fas fa-comments"></i></span>
                            Feedback
                        </h2>
                        <p class="text-3xl font-bold">{{ $feedbackCount ?? 0 }}</p>
                        <div class="mt-2 text-sm">Total feedbacks submitted</div>
                    </div>
                </div>
                {{-- Announcements Card --}}
                <div class="bg-pink-500 text-white p-6 rounded-xl shadow hover:shadow-lg transition transform hover:-translate-y-1 flex items-center space-x-4 animate-fade-in delay-400">
                    <div>
                        <h2 class="text-lg mb-1 flex items-center gap-2">
                            <span class="text-2xl"><i class="fas fa-bullhorn"></i></span>
                            Announcements
                        </h2>
                        <p class="text-3xl font-bold">{{ $announcements->count() }}</p>
                        <div class="mt-2 text-sm">Latest updates and news</div>
                    </div>
                </div>
            </div>

            <style>
                @keyframes fade-in {
                    from { opacity: 0; transform: translateY(20px);}
                    to { opacity: 1; transform: translateY(0);}
                }
                .animate-fade-in {
                    animation: fade-in 0.7s ease;
                }
                .delay-100 { animation-delay: 0.1s; }
                .delay-200 { animation-delay: 0.2s; }
                .delay-300 { animation-delay: 0.3s; }
                .delay-400 { animation-delay: 0.4s; }
            </style>
            {{-- Make sure Font Awesome is loaded in your layout --}}

            {{-- My Enrollments --}}
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow mb-8">
                <h2 class="text-xl font-semibold mb-4 border-b pb-2">📄 My Applications / Enrollments</h2>
                <ul class="space-y-3">
                    @forelse($myEnrollments as $enroll)
                        <li class="p-3 bg-gray-50 dark:bg-gray-700 rounded shadow-sm">
                            <div class="font-semibold text-blue-600">{{ $enroll->schedule->title }}</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">{{ $enroll->schedule->date }}</div>
                            <div class="mt-1 text-sm">Status: <span class="font-semibold">{{ ucfirst($enroll->status) }}</span></div>
                        </li>
                    @empty
                        <li class="text-gray-500">You have not applied yet.</li>
                    @endforelse
                </ul>
            </div>

            {{-- Latest Announcements --}}
            
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6">
            <h2 class="text-xl font-semibold mb-4 border-b pb-2 flex items-center">📢 Latest Announcements
    @if($announcements->count() > 0)
        <span class="ml-2 inline-flex items-center justify-center px-2 py-0.5 text-xs font-bold text-white bg-red-600 rounded-full">
            {{ $announcements->count() }}
        </span>
    @endif
            </h2>
                <ul class="space-y-3">
                    @forelse($announcements as $announcement)
                        <li class="p-3 bg-gray-50 dark:bg-gray-700 rounded shadow-sm">
                            <div class="font-semibold text-blue-600">{{ $announcement->title }}</div>
                            <div class="text-sm text-gray-600 dark:text-gray-400">{{ $announcement->content }}</div>
                            <div class="text-xs text-gray-500 mt-1">{{ $announcement->created_at->format('F d, Y • h:i A') }}</div>
                        </li>
                    @empty
                        <li class="text-gray-500">No announcements available.</li>
                    @endforelse
                </ul>
            </div>
        </div>
        
    </div>
