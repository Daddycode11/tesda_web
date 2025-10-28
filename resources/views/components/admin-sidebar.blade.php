<!-- Add Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

<!-- Sidebar -->
<div class="flex flex-col w-64 bg-white text-black min-h-screen shadow-md" style="font-family: 'Poppins', 'Roboto', sans-serif;">
    
    <!-- TESDA Logo + Title -->
    <div class="flex flex-col items-center justify-center p-6 border-b border-gray-200">
        <img src="{{ asset('images/Tesda-Logo.png') }}" alt="TESDA Logo" class="w-16 h-16 mb-3">
        <h1 class="text-lg font-semibold tracking-wide">TESDA Admin Panel</h1>
    </div>
<!-- Navigation -->
<nav class="flex-1 mt-3 text-sm">

    <!-- Dashboard -->
<a href="{{ route('admin.dashboard') }}" 
   class="flex items-center px-5 py-3 hover:bg-gray-100 transition-all duration-200 rounded-r-full
   {{ request()->routeIs('admin.dashboard') ? 'bg-gray-200 border-l-4 border-blue-600 font-medium' : '' }}">
    <span class="mr-3 text-lg">📊</span> Dashboard
</a>


    <!-- About Dropdown -->
    <div x-data="{ open: {{ request()->is('admin/about*') ? 'true' : 'false' }} }" class="mt-1">
        <button @click="open = !open" 
            class="w-full flex items-center px-5 py-3 hover:bg-gray-100 transition-all duration-200 rounded-r-full justify-between
            {{ request()->is('admin/about*') ? 'bg-gray-200 border-l-4 border-blue-600 font-medium' : '' }}">
            <span class="flex items-center">
                <span class="mr-3 text-lg">ℹ️</span> About
            </span>
            <svg :class="{'rotate-90': open}" class="w-4 h-4 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>

        <!-- Dropdown items -->
        <div x-show="open" x-transition class="pl-12 mt-1 space-y-1">
            <a href="{{ route('admin.banners.index') }}"
               class="block px-5 py-2 hover:bg-gray-100 transition-all duration-200 rounded-r-full
               {{ request()->routeIs('admin.banners.*') ? 'bg-gray-200 font-medium border-l-4 border-blue-600' : '' }}">
                Manage Banner
            </a>

            <a href="{{ route('admin.careers.index') }}"
               class="block px-5 py-2 hover:bg-gray-100 transition-all duration-200 rounded-r-full
               {{ request()->routeIs('admin.careers.*') ? 'bg-gray-200 font-medium border-l-4 border-blue-600' : '' }}">
                Careers
            </a>
                <!-- Calendar Activities -->
    <a href="{{ route('admin.activities.index') }}"
       class="block px-5 py-2 hover:bg-gray-100 transition-all duration-200 rounded-r-full
       {{ request()->routeIs('admin.activities.*') ? 'bg-gray-200 font-medium border-l-4 border-blue-600' : '' }}">
        Calendar Activities
    </a>
        </div>
    </div>

    <!-- Other nav items outside dropdown -->
    <a href="{{ route('services.index') }}" 
       class="flex items-center px-5 py-3 hover:bg-gray-100 transition-all duration-200 rounded-r-full {{ request()->routeIs('services.*') ? 'bg-gray-200 border-l-4 border-blue-600 font-medium' : '' }}">
        <span class="mr-3 text-lg">🛠</span> Services
    </a>

    <a href="{{ route('schedules.index') }}" 
       class="flex items-center px-5 py-3 hover:bg-gray-100 transition-all duration-200 rounded-r-full {{ request()->routeIs('schedules.*') ? 'bg-gray-200 border-l-4 border-blue-600 font-medium' : '' }}">
        <span class="mr-3 text-lg">📅</span> Schedules
    </a>

    <a href="{{ route('announcements.index') }}" 
       class="flex items-center px-5 py-3 hover:bg-gray-100 transition-all duration-200 rounded-r-full {{ request()->routeIs('announcements.*') ? 'bg-gray-200 border-l-4 border-blue-600 font-medium' : '' }}">
        <span class="mr-3 text-lg">📢</span> Announcements
    </a>

    <a href="{{ route('enrollments.index') }}" 
       class="flex items-center px-5 py-3 hover:bg-gray-100 transition-all duration-200 rounded-r-full {{ request()->routeIs('enrollments.*') ? 'bg-gray-200 border-l-4 border-blue-600 font-medium' : '' }}">
        <span class="mr-3 text-lg">📝</span> Enrollments
    </a>

    <a href="{{ route('feedback.index') }}" 
       class="flex items-center px-5 py-3 hover:bg-gray-100 transition-all duration-200 rounded-r-full {{ request()->routeIs('feedback.*') ? 'bg-gray-200 border-l-4 border-blue-600 font-medium' : '' }}">
        <span class="mr-3 text-lg">💬</span> Feedback
    </a>

    <a href="{{ route('admin.transparency.index') }}" 
       class="flex items-center px-5 py-3 hover:bg-gray-100 transition-all duration-200 rounded-r-full {{ request()->routeIs('admin.transparency.*') ? 'bg-gray-200 border-l-4 border-blue-600 font-medium' : '' }}">
        <span class="mr-3 text-lg">📄</span> Transparency
    </a>

    <a href="{{ route('programs.index') }}" 
       class="flex items-center px-5 py-3 hover:bg-gray-100 transition-all duration-200 rounded-r-full {{ request()->routeIs('programs.*') ? 'bg-gray-200 border-l-4 border-blue-600 font-medium' : '' }}">
        <span class="mr-3 text-lg">🎯</span> Programs & Services
    </a>

    <a href="{{ route('admin.news.index') }}" 
       class="flex items-center px-5 py-3 hover:bg-gray-100 transition-all duration-200 rounded-r-full {{ request()->routeIs('admin.news.*') ? 'bg-gray-200 border-l-4 border-blue-600 font-medium' : '' }}">
        <span class="mr-3 text-lg">📰</span> News & Updates
    </a>

    <a href="{{ route('admin.messages.index') }}" 
       class="flex items-center px-5 py-3 hover:bg-gray-100 transition-all duration-200 rounded-r-full {{ request()->routeIs('admin.messages.*') ? 'bg-gray-200 border-l-4 border-blue-600 font-medium' : '' }}">
        <span class="mr-3 text-lg">💌</span> Messages Inbox
    </a>

</nav>

    <!-- Logout -->
    <form id="logoutForm" method="POST" action="{{ route('logout') }}" class="mt-6 border-t border-gray-200 pt-3">
        @csrf
        <button type="button" id="logoutBtn"
            class="w-full text-left flex items-center px-5 py-3 hover:bg-gray-100 transition-all duration-200 rounded-r-full">
            <span class="mr-3 text-lg">🔒</span> Logout
        </button>
    </form>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const logoutBtn = document.getElementById('logoutBtn');
    const logoutForm = document.getElementById('logoutForm');

    logoutBtn.addEventListener('click', (e) => {
        e.preventDefault();

        Swal.fire({
            title: 'Logout Confirmation',
            text: 'Are you sure you want to log out?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '✅ Yes, log me out',
            cancelButtonText: '❌ Cancel',
            confirmButtonColor: '#16a34a', // Green
            cancelButtonColor: '#dc2626',  // Red
            background: '#ffffff',
            color: '#111827',
        }).then((result) => {
            if (result.isConfirmed) {
                logoutForm.submit();
            }
        });
    });
});
</script>
