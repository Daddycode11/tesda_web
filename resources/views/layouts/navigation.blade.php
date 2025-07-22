<div class="bg-gray-100 dark:bg-gray-900">

    <!-- Okay na sir - so sa welcom nalang ako lalagay ng nav? -->

    @if(Auth::user())
    <nav class="flex justify-between items-center bg-gray-200 dark:bg-gray-800 px-4 py-2">
        <div>
            @if(Auth::user()->role === 'admin')
            <a href="/admin" class="text-blue-600 hover:underline">Admin Dashboard</a>
            @else
            <a href="/user" class="text-green-600 hover:underline">User Dashboard</a>
            @endif
        </div>
        <div>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="text-red-600 hover:underline">Logout</button>
            </form>
        </div>
    </nav>
    
    @endif

    <!-- Page Heading -->

    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            @yield('header')
        </div>
    </header>
</div>