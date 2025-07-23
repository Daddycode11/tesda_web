<div class="flex flex-col w-64 bg-gray-800 text-white min-h-screen">
    {{-- ✅ Profile section --}}
    <div class="flex flex-col items-center p-4 border-b border-gray-700">
        <div class="w-16 h-16 bg-gray-600 rounded-full flex items-center justify-center text-2xl mb-2">
            👤
        </div>
        <div class="text-center">
            <div class="font-semibold">{{ Auth::user()->name ?? 'User Name' }}</div>
            <div class="text-xs text-gray-400">{{ Auth::user()->email ?? 'email@example.com' }}</div>
        </div>
    </div>

    <nav class="flex-1 space-y-1 p-2">
        <a href="{{ route('user.dashboard') }}" 
           class="flex items-center px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('user.dashboard') ? 'bg-gray-900' : '' }}">
            <span class="mr-2">🏠</span> 
            <span>Dashboard</span>
        </a>

        <a href="{{ route('list.services') }}" 
           class="block px-4 py-2 hover:bg-gray-700 {{ request()->routeIs('list.services') ? 'bg-gray-900' : '' }}">
            🛠 List of Services
        </a>

        <a href="{{ route('enrollments.index') }}" 
           class="flex items-center px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('enrollments.*') ? 'bg-gray-900' : '' }}">
            <span class="mr-2">📝</span>
            <span>My Enrollments</span>
        </a>

        <a href="{{ route('user.feedback') }}" 
           class="flex items-center px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('user.feedback') ? 'bg-gray-900' : '' }}">
            <span class="mr-2">💬</span>
            <span>My Feedback</span>
        </a>
    {{-- ✅ New: My TESDA Requests --}}
    <a href="{{ route('user.requests.index') }}" 
       class="flex items-center px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('user.requests.index') ? 'bg-gray-900' : '' }}">
        <span class="mr-2">📋</span>
        <span>My Requests</span>
    </a>
    
{{-- ✅ New: Messages nav item (no real route yet) --}}
<a href="#"
   class="flex items-center px-4 py-2 rounded hover:bg-gray-700">
    <span class="mr-2">📩</span>
    <span>Messages</span>
</a>

    </nav>

    <form method="POST" action="{{ route('logout') }}" class="mt-4 border-t border-gray-700">
        @csrf
        <button type="submit" class="w-full flex items-center text-left px-4 py-2 hover:bg-gray-700 rounded">
            <span class="mr-2">🔒</span>
            <span>Logout</span>
        </button>
    </form>
</div>
