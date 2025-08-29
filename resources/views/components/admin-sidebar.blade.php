<div class="flex flex-col w-64 bg-gray-800 text-white min-h-screen">
    <div class="p-4 font-bold text-xl border-b border-gray-700">
        Admin Panel
    </div>

    <nav class="flex-1">
        <a href="{{ route('admin.dashboard') }}" 
           class="block px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-900' : '' }}">
            📊 Dashboard
        </a>

        <a href="{{ route('services.index') }}" 
           class="block px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('services.*') ? 'bg-gray-900' : '' }}">
            🛠 Services
        </a>

        <a href="{{ route('schedules.index') }}" 
           class="block px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('schedules.*') ? 'bg-gray-900' : '' }}">
            📅 Schedules
        </a>

        <a href="{{ route('announcements.index') }}" 
           class="block px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('announcements.*') ? 'bg-gray-900' : '' }}">
            📢 Announcements
        </a>

        <a href="{{ route('enrollments.index') }}" 
           class="block px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('enrollments.*') ? 'bg-gray-900' : '' }}">
            📝 Enrollments
        </a>

        <a href="{{ route('feedback.index') }}" 
           class="block px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('feedback.*') ? 'bg-gray-900' : '' }}">
            💬 Feedback
        </a>

    <!-- ✅ Admin Messages link -->
<a href="{{ route('admin.messages.index') }}" 
   class="block px-4 py-2 hover:bg-gray-700 flex items-center {{ request()->routeIs('admin.messages.*') ? 'bg-gray-900' : '' }}">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
        <path d="M18 10c0 3.866-3.582 7-8 7a8.82 8.82 0 01-3.74-.82L2 17l1.54-3.08A7.963 7.963 0 012 10c0-3.866 
                 3.582-7 8-7s8 3.134 8 7z" />
    </svg>
    Messages inbox
</a>

    <form method="POST" action="{{ route('logout') }}" class="mt-4 border-t border-gray-700">
        @csrf
        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-700">
            🔒 Logout
        </button>
    </form>
</div>
