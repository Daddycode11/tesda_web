<x-app-layout>
    <div class="flex min-h-screen bg-white">
        {{-- Sidebar --}}
        @include('components.user-sidebar')

        {{-- Main content --}}
        <div class="flex-1 p-8">
            <div class="bg-gray-100 dark:bg-gray-800 rounded-xl shadow p-6">
                <h1 class="text-3xl font-extrabold text-center text-gray-800 dark:text-gray-100 mb-6">
                    Welcome, {{ Auth::user()->name }}
                </h1>

                {{-- Latest TESDA Services --}}
                <div class="bg-white dark:bg-gray-700 rounded-lg p-6 shadow-inner">
                    <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-200 mb-4 border-b pb-2">
                        Available TESDA Services
                    </h2>
                    <ul class="divide-y divide-gray-200 dark:divide-gray-600">
                        @forelse($services as $service)
                            <li class="flex justify-between items-center py-3 group">
                                <span class="text-gray-800 dark:text-gray-100 group-hover:text-blue-600 transition">
                                    {{ $service->title }}
                                </span>
                                <a href="{{ route('services.show', $service) }}" 
                                   class="text-blue-600 dark:text-blue-400 hover:underline font-medium transition">
                                    View Details →
                                </a>
                            </li>
                        @empty
                            <li class="py-3 text-gray-500 dark:text-gray-400">No services available at the moment.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
