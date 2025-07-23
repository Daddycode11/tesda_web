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
    </nav>
    <form method="POST" action="{{ route('logout') }}" class="mt-4 border-t border-gray-700">
        @csrf
        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-700">
            🔒 Logout
        </button>
    </form>
</div>
