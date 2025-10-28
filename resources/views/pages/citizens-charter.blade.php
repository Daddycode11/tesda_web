@extends('layouts.app') {{-- or your master layout --}}
<!-- START NAV -->
<nav x-data="{ open: false }"
     x-init="
        if (!Alpine.store('modals')) { 
            Alpine.store('modals', { loginModal: false, registerModal: false }) 
        }
     "
     class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ url('/') }}" class="flex items-center space-x-2">
                    <img src="{{ asset('images/Tesda-Logo.png') }}" class="h-12 w-auto" alt="TESDA Logo">
                    <span class="flex flex-col">
                        <span class="text-lg font-semibold text-gray-800 dark:text-gray-200">TESDA</span>
                        <span class="text-sm font-semibold text-gray-800 dark:text-gray-200">Occidental Mindoro</span>
                    </span>
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden sm:flex sm:items-center sm:space-x-6 flex-1 justify-center relative">
                
                <!-- Home -->
                <a href="{{ url('/') }}" class="inline-flex items-center text-gray-700 dark:text-gray-300 hover:text-blue-600 transition font-semibold">
                    Home
                </a>

                @php
                    $dropdowns = [
                        'About Us' => [
                            ['url'=>url('/history'),'label'=>'History'],
                            ['url'=>url('/mission-vision'),'label'=>'Mission, Vision, Value & Quality Statement'],
                            ['url'=>url('/core-business'),'label'=>'Core Business'],
                            ['url'=>url('/road-map'),'label'=>'Road Map'],
                            ['url'=>url('/calendar-events'),'label'=>'Activities & Events'],
                            ['url'=>url('/structure'),'label'=>'Organizational Structure (Provincial Office Staffs)'],
                            ['url'=>url('/careers'),'label'=>'Careers'],
                            ['url'=>url('/pds-corner'),'label'=>'PD\'s Corner'],
                        ],
                        'Programs & Services' => [
                            ['url'=>route('programs-services'),'label'=>'TVET Programs'],
                            ['url'=>route('competency-standards'),'label'=>'Competency Standards Development'],
                            ['url'=>url('/competency-assessment-certification'),'label'=>'Competency Assessment and Certification'],
                            ['url'=>url('/program-registration-accreditation'),'label'=>'Program Registration and Accreditation'],
                            ['url'=>url('/directory-schools'),'label'=>'Directory of Schools with Registered Programs'],
                            ['url'=>url('/directory-trainers'),'label'=>'Directory of Accredited TVET Trainers'],
                            ['url'=>url('/training-regulations'),'label'=>'Training Regulations'],
                            ['url'=>url('/competency-standards'),'label'=>'Competency Standards'],
                        ],
                        'Transparency' => [
                            ['url'=>route('transparency-seal'),'label'=>'Transparency Seal'],
                            ['url'=>route('citizens-charter'),'label'=>'Citizen’s Charter'],
                            ['url'=>url('/freedom-of-information'),'label'=>'Freedom of Information'],
                            ['url'=>'https://pqf.gov.ph/','label'=>'Philippine Qualifications Framework'],
                            ['url'=>url('/bagong-pilipinas'),'label'=>'Bagong Pilipinas'],
                        ],
                        'Resources' => [
                            ['url'=>'https://www.tesda.gov.ph/About/TESDA/21992','label'=>'TESDA Circulars (Memo, Resolutions, Advisories, Orders)'],
                            ['url'=>url('/downloadable-files'),'label'=>'Downloadable Files (Forms and other files available for downloading)'],
                        ],
                        'Contacts' => [
                            ['url'=>url('/contacts/central-office'),'label'=>'Central Office'],
                            ['url'=>url('/contacts/regional-office'),'label'=>'Regional Office'],
                            ['url'=>url('/contacts/occidental-mindoro-tti'),'label'=>'Occidental Mindoro TESDA Training Institute'],
                            ['url'=>url('/contacts/ttis'),'label'=>'TTIs'],
                            ['url'=>url('/contacts/tvis'),'label'=>'TVIs'],
                            ['url'=>url('/contacts/board-members'),'label'=>'Board Members'],
                        ],
                    ];

                    $verification_links = [
                        ['url'=>'https://www.example.gov/registry-certified-workers','label'=>'Registry of Certified Workers'],
                        ['url'=>'https://www.example.gov/assessment-centers','label'=>'Assessment Centers'],
                        ['url'=>'https://www.example.gov/tvi-registered-programs','label'=>'TVI with Registered Programs'],
                        ['url'=>'https://www.example.gov/institutions-cease-desist','label'=>'Institutions Issued with Cease and Desist Order'],
                        ['url'=>'https://www.example.gov/registry-accredited-assessors','label'=>'Registry of Accredited Assessors'],
                        ['url'=>'https://www.example.gov/registry-trainers-n','label'=>'Registry of Trainers with N'],
                    ];
                @endphp

                <!-- Regular Dropdowns -->
                @foreach($dropdowns as $title => $links)
                    <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                        <button type="button" @click.prevent="open = !open"
                                class="inline-flex items-center text-gray-700 dark:text-gray-300 hover:text-blue-600 transition font-semibold">
                            {{ $title }}
                            <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                                      clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="open" x-cloak x-transition.opacity x-transition.origin.top
                             class="absolute left-0 mt-2 w-80 rounded-md shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 z-50">
                            <div class="py-1">
                                @foreach($links as $link)
                                    <a href="{{ $link['url'] }}" target="{{ $link['target'] ?? '_self' }}"
                                       class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                        {{ $link['label'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Verification Dropdown -->
                <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                    <button @click.prevent="open = !open"
                            class="inline-flex items-center text-gray-700 dark:text-gray-300 hover:text-blue-600 transition font-semibold">
                        Verification
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                                  clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div x-show="open" x-cloak x-transition.opacity x-transition.origin.top
                         class="absolute left-0 mt-2 w-72 rounded-md shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 z-50">
                        <div class="py-1">
                            @foreach($verification_links as $link)
                                <a href="{{ $link['url'] }}" target="_blank"
                                   class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    {{ $link['label'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

            <!-- Auth Buttons -->
            <div class="hidden sm:flex sm:items-center sm:space-x-2">
                <button @click.prevent="Alpine.store('modals').loginModal = true"
                        class="text-sm font-medium text-blue-600 hover:text-blue-800 px-4 py-2 rounded-md transition">
                    Login
                </button>
                <button @click.prevent="Alpine.store('modals').registerModal = true"
                        class="text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md transition">
                    Register
                </button>
            </div>

            <!-- Mobile Menu Button -->
            <div class="sm:hidden flex items-center">
                <button @click="open = !open"
                        aria-label="Toggle mobile menu"
                        :aria-expanded="open ? 'true' : 'false'"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-blue-600 focus:outline-none transition">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                              stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Menu Items -->
    <div x-show="open" x-cloak class="sm:hidden bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ url('/') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">Home</a>

            @foreach($dropdowns as $title => $links)
                <div x-data="{ openMobile: false }" class="relative">
                    <button @click="openMobile = !openMobile" class="w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                        {{ $title }}
                    </button>
                    <div x-show="openMobile" x-cloak class="pl-4">
                        @foreach($links as $link)
                            <a href="{{ $link['url'] }}" class="block px-3 py-1 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">{{ $link['label'] }}</a>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <!-- Mobile Verification -->
            <div x-data="{ openMobile: false }" class="relative">
                <button @click="openMobile = !openMobile" class="w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                    Verification
                </button>
                <div x-show="openMobile" x-cloak class="pl-4">
                    @foreach($verification_links as $link)
                        <a href="{{ $link['url'] }}" target="_blank" class="block px-3 py-1 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">{{ $link['label'] }}</a>
                    @endforeach
                </div>
            </div>

        </div>
    </div>

    <!-- Login Modal -->
    <div x-show="$store.modals.loginModal" x-transition.opacity x-cloak
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div @click.away="$store.modals.loginModal = false"
             class="bg-white dark:bg-gray-800 rounded-lg w-96 p-6 shadow-lg transition-transform">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Login</h2>
                <button @click="$store.modals.loginModal = false"
                        class="text-gray-500 hover:text-gray-800 dark:hover:text-gray-200">&times;</button>
            </div>

            <form id="loginForm" action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-gray-700 dark:text-gray-200">Email</label>
                    <input type="email" name="email" required
                           class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:text-gray-200">
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-200">Password</label>
                    <input type="password" name="password" required
                           class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:text-gray-200">
                </div>
                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-md transition">
                    Login
                </button>
            </form>
        </div>
    </div>
    <!-- Register Modal -->
<div x-show="$store.modals.registerModal" x-transition.opacity x-cloak
     class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40">
    <div @click.away="$store.modals.registerModal = false"
         class="bg-white dark:bg-gray-800 rounded-2xl w-96 p-6 shadow-xl transition-transform">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Create Account</h2>
            <button @click="$store.modals.registerModal = false"
                    class="text-gray-500 hover:text-gray-800 dark:hover:text-gray-200 text-xl font-bold">&times;</button>
        </div>

        <div class="space-y-3 mb-4">
            <a href="{{ url('/auth/google/redirect') }}"
               class="flex items-center justify-center gap-2 bg-white border border-gray-300 rounded-lg py-2 text-gray-700 hover:bg-gray-100 transition">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5" alt="Google">
                Sign up with Google
            </a>

            <div class="my-3 flex items-center justify-center">
                <hr class="w-1/4 border-gray-300">
                <span class="px-2 text-gray-500 text-sm">or</span>
                <hr class="w-1/4 border-gray-300">
            </div>

            <form id="registerForm" action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf
                <div class="relative">
                    <input type="text" name="name" id="name" required
                           class="peer w-full border rounded-lg px-3 pt-5 pb-2 text-gray-900 dark:text-gray-100 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder=" ">
                    <label for="name"
                           class="absolute text-gray-500 dark:text-gray-300 text-sm left-3 top-2 transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-1 peer-focus:text-sm peer-focus:text-blue-500">
                        Full Name
                    </label>
                </div>

                <div class="relative">
                    <input type="email" name="email" id="email" required
                           class="peer w-full border rounded-lg px-3 pt-5 pb-2 text-gray-900 dark:text-gray-100 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder=" ">
                    <label for="email"
                           class="absolute text-gray-500 dark:text-gray-300 text-sm left-3 top-2 transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-1 peer-focus:text-sm peer-focus:text-blue-500">
                        Email Address
                    </label>
                </div>

                <!-- Gender and Age Fields -->
                <div class="grid grid-cols-2 gap-4">
                    <div class="relative">
                        <select name="gender" id="gender" required
                                class="peer w-full border rounded-lg px-3 pt-2 pb-2 text-gray-900 dark:text-gray-100 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            <option value="" disabled selected>Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        <label for="gender"
                               class="absolute text-gray-500 dark:text-gray-300 text-sm left-3 top-1.5 transition-all peer-focus:top-1 peer-focus:text-sm peer-focus:text-blue-500">
                            Gender
                        </label>
                    </div>

                    <div class="relative">
                        <input type="number" name="age" id="age" min="1" max="120" required
                               class="peer w-full border rounded-lg px-3 pt-5 pb-2 text-gray-900 dark:text-gray-100 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                               placeholder=" ">
                        <label for="age"
                               class="absolute text-gray-500 dark:text-gray-300 text-sm left-3 top-2 transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-1 peer-focus:text-sm peer-focus:text-blue-500">
                            Age
                        </label>
                    </div>
                </div>

                <div class="relative">
                    <input type="password" name="password" id="password" required
                           class="peer w-full border rounded-lg px-3 pt-5 pb-2 text-gray-900 dark:text-gray-100 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder=" ">
                    <label for="password"
                           class="absolute text-gray-500 dark:text-gray-300 text-sm left-3 top-2 transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-1 peer-focus:text-sm peer-focus:text-blue-500">
                        Password
                    </label>
                </div>

                <div class="relative">
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                           class="peer w-full border rounded-lg px-3 pt-5 pb-2 text-gray-900 dark:text-gray-100 dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder=" ">
                    <label for="password_confirmation"
                           class="absolute text-gray-500 dark:text-gray-300 text-sm left-3 top-2 transition-all peer-placeholder-shown:top-3 peer-placeholder-shown:text-gray-400 peer-placeholder-shown:text-base peer-focus:top-1 peer-focus:text-sm peer-focus:text-blue-500">
                        Confirm Password
                    </label>
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-medium transition">
                    Register
                </button>
            </form>
        </div>
    </div>
</div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Social SweetAlert -->
<script>
@if (session('social_success'))
    Swal.fire({
        icon: 'success',
        title: '🎉 Welcome {{ session('social_success.name') }}!',
        text: 'You have successfully logged in using {{ session('social_success.provider') }}.',
        confirmButtonColor: '#3b82f6',
        background: document.documentElement.classList.contains('dark') ? '#1f2937' : '#fff',
        color: document.documentElement.classList.contains('dark') ? '#f9fafb' : '#111827',
    });
@endif

@if (session('error'))
    Swal.fire({
        icon: 'error',
        title: 'Login Failed',
        text: '{{ session('error') }}',
        confirmButtonColor: '#ef4444',
    });
@endif
</script>

<!-- Script Register -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
  const registerForm = document.getElementById('registerForm');

  registerForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(registerForm);

    try {
      const response = await fetch(registerForm.action, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
          'Accept': 'application/json',
        },
        body: formData
      });

      const data = await response.json();

      if (data.success) {
        // ✅ Registration success
        Swal.fire({
          title: 'Registration Successful 🎉',
          html: `<p>${data.message}</p>`,
          icon: 'success',
          confirmButtonText: 'Go to Dashboard',
          confirmButtonColor: '#2563eb', // Tailwind blue-600
          background: '#f9fafb',
        }).then(() => {
          window.location.href = data.redirect;
        });
      } else if (data.errors) {
        // ⚠️ Laravel validation errors
        const errorMessages = Object.values(data.errors).flat().join('<br>');
        Swal.fire({
          title: 'Validation Error',
          html: errorMessages,
          icon: 'error',
          confirmButtonColor: '#dc2626', // Tailwind red-600
          background: '#fef2f2',
        });
      } else {
        // ❌ Other errors returned by controller
        Swal.fire({
          title: 'Registration Failed',
          text: data.message || 'Please check your input and try again.',
          icon: 'error',
          confirmButtonColor: '#dc2626',
          background: '#fef2f2',
        });
      }

    } catch (error) {
      // 🚨 Network or unexpected error
      Swal.fire({
        title: 'Oops!',
        text: 'Something went wrong. Please try again later.',
        icon: 'error',
        confirmButtonColor: '#dc2626',
        background: '#fef2f2',
      });
      console.error(error);
    }
  });
});
</script>


<!-- Log in Sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');

    if (loginForm) {
        loginForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(loginForm);

            try {
                const response = await fetch(loginForm.action, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    },
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: '👋 Welcome back!',
                        text: data.message,
                        confirmButtonColor: '#3b82f6',
                        background: document.documentElement.classList.contains('dark') ? '#1f2937' : '#fff',
                        color: document.documentElement.classList.contains('dark') ? '#f9fafb' : '#111827',
                        allowOutsideClick: false,
                    }).then(() => {
                        window.location.href = data.redirect;
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Login Failed',
                        text: data.message || 'Invalid email or password.',
                        confirmButtonColor: '#ef4444'
                    });
                }
            } catch (error) {
                console.error('Login error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Server Error',
                    text: 'Please try again later.',
                    confirmButtonColor: '#ef4444'
                });
            }
        });
    }
});
</script>
</nav>
@section('title', 'Citizen’s Charter')

@section('content')
<!-- Hero Section -->
<div class="relative w-full h-64 sm:h-80 lg:h-96">
    <img src="{{ asset('images/citizens-charter-hero.png') }}" alt="Citizen's Charter Hero" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white text-center">Citizen’s Charter</h1>
    </div>
</div>

<!-- Page Content -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <p class="text-gray-700 dark:text-gray-300 mb-4">
        The Citizen’s Charter outlines TESDA’s services, standards, and procedures to ensure transparency and accountability for all clients.
    </p>

    {{-- Example sections --}}
    <ul class="list-disc list-inside text-gray-700 dark:text-black-300 space-y-2 mb-6">
        <li>Agency mandate and functions</li>
        <li>List of services offered</li>
        <li>Step-by-step procedure for each service</li>
        <li>Processing times and fees</li>
        <li>Contact information for inquiries or complaints</li>
    </ul>

  

    <!-- Downloadable PDFs -->
    <div class="mt-10">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-black-200 mb-4">Downloadable Documents</h2>
        <ul class="space-y-2">
            <li>
                <a href="https://www.tesda.gov.ph/Uploads/File/GOOD%20GOVERNANCE/2025/TESDA%20Citizens%20Charter%20CY%202025%20(First%20Edition).pdf" 
                   target="_blank" 
                   class="text-blue-600 hover:underline flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M4 2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V8l-6-6H4zM5 4h7v5h5v9H5V4z"/></svg>
                    TESDA Citizen’s Charter CY 2025 (First Edition)
                </a>
            </li>
            <li>
                <a href="https://www.tesda.gov.ph/Uploads/File/GOOD%20GOVERNANCE/2025/Certificate%20of%20Compliance%20CY%202025.pdf" 
                   target="_blank" 
                   class="text-blue-600 hover:underline flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M4 2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V8l-6-6H4zM5 4h7v5h5v9H5V4z"/></svg>
                    Certificate of Compliance CY 2025
                </a>
            </li>
        </ul>
    </div>
</div>
