<a href="{{ route('user.schedules') }}">

<nav class="bg-white dark:bg-gray-800 shadow mb-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
        <div class="flex items-center space-x-4">
            <a href="{{ route('user.dashboard') }}" class="text-xl font-bold text-blue-600">TESDA Portal</a>
            <a href="{{ route('user.schedules') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600">Schedules</a>
            <a href="{{ route('user.announcements') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600">Announcements</a>
        </div>
        <div class="flex items-center space-x-4">
            <span class="text-gray-700 dark:text-gray-300">{{ Auth::user()->name }}</span>
            <a href="{{ route('profile.edit') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600">Profile</a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-gray-700 dark:text-gray-300 hover:text-red-600">Logout</button>
            </form>
        </div>
    </div>
</nav>
