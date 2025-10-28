{{-- resources/views/welcome.blade.php --}}
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
                            ['url'=>url('https://www.tesda.gov.ph/AboutL/TESDA/1280'),'label'=>'Road Map'],
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
                        ['url'=>'https://www.tesda.gov.ph/Rwac/Rwac2017','label'=>'Registry of Certified Workers'],
                        ['url'=>'https://www.tesda.gov.ph/AssessmentCenters/','label'=>'Assessment Centers'],
                        ['url'=>'https://www.tesda.gov.ph/TVI','label'=>'TVI with Registered Programs'],
                        ['url'=>'https://www.tesda.gov.ph/About/TESDA/27876','label'=>'Institutions Issued with Cease and Desist Order'],
                        ['url'=>'https://www.tesda.gov.ph/CA','label'=>'Registry of Accredited Assessors'],
                        ['url'=>'https://www.tesda.gov.ph/NTTC','label'=>'Registry of Trainers with N'],
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
<!-- Static Hero Section -->
<section class="relative bg-blue-900 text-white text-center overflow-hidden" style="min-height:360px;">

    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 overflow-hidden">
        <img src="{{ asset('images/tesda-hero-bg.jpg') }}" alt="TESDA Hero Background"
             class="w-full h-full object-cover">
        <!-- Semi-transparent overlay -->
        <div class="absolute inset-0 bg-black/40"></div>
        <!-- Optional gradient overlay for style -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-800 via-transparent to-blue-700 opacity-30 mix-blend-multiply"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 flex flex-col md:flex-row items-center justify-center gap-8 py-10 max-w-6xl mx-auto">
        <div class="md:text-left text-center">
            <h1 class="text-4xl font-bold">Welcome to TESDA Occidental Mindoro</h1>
            <p class="mt-4 text-lg max-w-xl mx-auto md:mx-0">
                Empowering lives through quality technical education and training programs.
            </p>

            <a href="javascript:void(0);"
               onclick="document.getElementById('modal-register').classList.remove('hidden');"
               class="mt-6 inline-block bg-green-500 hover:bg-green-600 px-6 py-3 rounded text-white font-semibold transform transition hover:-translate-y-1 shadow-md">
                Get Started
            </a>
        </div>

        <div class="mt-8 md:mt-0 md:ml-8 flex-shrink-0">
            <img src="{{ asset('images/white logo.png') }}" alt="TESDA Logo"
                 class="w-80 h-80 object-contain mx-auto md:mx-0 float-slow">
        </div>
    </div>

    <style>
        /* subtle floating effect for logo */
        @keyframes float-slow {
            0% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
            100% { transform: translateY(0); }
        }
        .float-slow { animation: float-slow 4s ease-in-out infinite; }
    </style>
</section>


    <style>
        /* subtle floating effect for logo */
        @keyframes float-slow {
            0% { transform: translateY(0); }
            50% { transform: translateY(-6px); }
            100% { transform: translateY(0); }
        }
        .float-slow { animation: float-slow 4s ease-in-out infinite; }
    </style>
</section>

<!-- START LANDING PAGE BANNER + MAP WIDGET -->
<section class="py-10 max-w-6xl mx-auto relative overflow-hidden rounded-lg shadow">

    <!-- Carousel Container -->
    <div x-data="bannerCarousel()" class="relative w-full h-80 sm:h-96">
        
        <!-- Carousel Images -->
        @forelse($banners as $index => $banner)
            <img 
                x-show="current === {{ $index }}" 
                x-transition:enter="transition ease-out duration-700" 
                x-transition:enter-start="opacity-0 scale-95" 
                x-transition:enter-end="opacity-100 scale-100" 
                x-transition:leave="transition ease-in duration-500" 
                x-transition:leave-start="opacity-100 scale-100" 
                x-transition:leave-end="opacity-0 scale-95" 
                src="{{ asset('storage/' . $banner->image_path) }}" 
                alt="Banner {{ $index + 1 }}" 
                class="absolute inset-0 w-full h-full object-cover rounded-lg"
            >
        @empty
            <img 
                x-show="current === 0"
                x-transition:enter="transition ease-out duration-700" 
                x-transition:enter-start="opacity-0 scale-95" 
                x-transition:enter-end="opacity-100 scale-100" 
                x-transition:leave="transition ease-in duration-500" 
                x-transition:leave-start="opacity-100 scale-100" 
                x-transition:leave-end="opacity-0 scale-95" 
                src="{{ asset('images/tesda-8-agenda-.png') }}" 
                alt="Default Banner" 
                class="absolute inset-0 w-full h-full object-cover rounded-lg"
            >
        @endforelse

        <!-- Previous / Next Buttons -->
        <button @click="prev()" 
                class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-2 rounded-full hover:bg-gray-700 z-10">
            ‹
        </button>
        <button @click="next()" 
                class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white px-3 py-2 rounded-full hover:bg-gray-700 z-10">
            ›
        </button>

        <!-- Indicators -->
        <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2 z-10">
            @foreach($banners as $index => $banner)
                <span 
                    @click="goTo({{ $index }})"
                    :class="current === {{ $index }} ? 'bg-blue-600' : 'bg-gray-300'"
                    class="w-3 h-3 rounded-full cursor-pointer transition"
                ></span>
            @endforeach
            @if($banners->count() === 0)
                <span class="w-3 h-3 rounded-full bg-blue-600"></span>
            @endif
        </div>
    </div>
</section>

<!-- Floating Map Widget -->
<div x-data="{ open: false }" class="fixed right-6 bottom-6 flex flex-col items-end z-50">
    
    <!-- Map Container -->
    <div x-show="open" x-transition class="mb-2 w-72 sm:w-80 bg-white rounded-lg shadow-lg overflow-hidden">
        <iframe 
            class="w-full h-48 sm:h-60" 
            src="https://www.google.com/maps?q=F2CJ%2B4G4%2C%20Rizal%2C%20Occidental%20Mindoro%2C%20Philippines&z=17&output=embed" 
            loading="lazy" 
            title="Location: F2CJ+4G4, Brgy. Rizal, Occidental Mindoro">
        </iframe>
    </div>

    <!-- Buttons -->
    <div class="flex items-center gap-2">
        <button @click="open = !open" aria-label="Toggle Map"
            class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-full shadow-lg flex items-center gap-2">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5A2.5 2.5 0 1112 6.5a2.5 2.5 0 010 5z"/>
            </svg>
            <span class="hidden sm:inline text-sm font-medium">F2CJ+4G4, Rizal</span>
        </button>
    </div>
</div>

<!-- Alpine JS Script -->
<script>
function bannerCarousel() {
    return {
        current: 0,
        total: {{ $banners->count() > 0 ? $banners->count() : 1 }},
        init() {
            this.start();
        },
        start() {
            setInterval(() => {
                this.next();
            }, 5000);
        },
        next() {
            this.current = (this.current + 1) % this.total;
        },
        prev() {
            this.current = (this.current - 1 + this.total) % this.total;
        },
        goTo(index) {
            this.current = index;
        }
    }
}
</script>


<!-- Programs & Services -->
<section class="py-12">
    <h2 class="text-3xl md:text-4xl font-extrabold text-center mb-8 text-blue-900 tracking-tight leading-tight">
        <span class="bg-gradient-to-r from-blue-600 via-green-500 to-yellow-400 bg-clip-text text-transparent">
            Programs &amp; Services
        </span>
    </h2>
    <div class="grid md:grid-cols-3 gap-6 max-w-6xl mx-auto">
        @foreach ([['title'=>'TVET Programs','desc'=>'Short-term courses focused on technical skills training.','icon'=>'wrench','bg'=>'bg-blue-100','color'=>'text-blue-600'],
        ['title'=>'Scholarships','desc'=>'Government-funded education support for eligible individuals.','icon'=>'academic-cap','bg'=>'bg-green-100','color'=>'text-green-600'],
        ['title'=>'Assessment & Certification','desc'=>'Evaluate your skills and gain national certification from TESDA.','icon'=>'badge-check','bg'=>'bg-yellow-100','color'=>'text-yellow-600']] as $i => $item)
        <div class="bg-white shadow rounded p-6 flex flex-col items-center animate-fade-in-up transition-all duration-700 {{ $i==1?'delay-150':($i==2?'delay-300':'') }} hover:scale-105 hover:shadow-lg group">
            <div class="{{ $item['bg'] }} rounded-full p-4 mb-4 animate-bounce-slow group-hover:animate-bounce-more">
                @if($item['icon']=='wrench')
                <svg class="h-10 w-10 {{ $item['color'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 11-3.536 3.536L4 19.5V21h1.5l9.196-9.196a2.5 2.5 0 013.536-3.536z" />
                </svg>
                @elseif($item['icon']=='academic-cap')
                <svg class="h-10 w-10 {{ $item['color'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m0 0H6m6 0h6" />
                </svg>
                @else
                <svg class="h-10 w-10 {{ $item['color'] }}" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2l4-4m5 2a9 9 0 11-18 0a9 9 0 0118 0z" />
                </svg>
                @endif
            </div>
            <h3 class="font-semibold text-lg mb-1">{{ $item['title'] }}</h3>
            <p class="text-center">{{ $item['desc'] }}</p>
        </div>
        @endforeach
    </div>
    <style>
        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(40px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.8s both;
        }

        .animate-fade-in-up.delay-150 {
            animation-delay: .15s;
        }

        .animate-fade-in-up.delay-300 {
            animation-delay: .3s;
        }

        @keyframes bounce-slow {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        .animate-bounce-slow {
            animation: bounce-slow 2.2s infinite;
        }

        @keyframes bounce-more {

            0%,
            100% {
                transform: translateY(0);
            }

            30% {
                transform: translateY(-18px);
            }

            50% {
                transform: translateY(-8px);
            }

            70% {
                transform: translateY(-18px);
            }
        }

        .animate-bounce-more {
            animation: bounce-more 0.7s;
        }
    </style>
</section>
 
 <!-- Announcements Section -->
<section class="py-12 bg-gray-50">
    <h2 class="text-3xl md:text-4xl font-extrabold text-center mb-8 text-blue-900 tracking-tight leading-tight">
        <span class="bg-gradient-to-r from-blue-600 via-green-500 to-yellow-400 bg-clip-text text-transparent">
            Announcements
        </span>
    </h2>

    <div class="grid md:grid-cols-4 gap-6 max-w-6xl mx-auto">

        <!-- Announcement Cards (dynamic from admin) -->
        @forelse($announcements as $index => $a)
        <div class="bg-white shadow rounded p-6 flex flex-col items-center animate-fade-in-up transition-all duration-700
                    {{ $index==0?'delay-150':($index==1?'delay-300':($index==2?'delay-450':($index==3?'delay-600':''))) }}
                    hover:scale-105 hover:shadow-lg group">
            
            @if($a->image)
            <img src="{{ asset('storage/' . $a->image) }}" 
                 alt="Announcement Image" 
                 class="w-full h-40 object-cover rounded mb-4">
            @else
            <div class="bg-blue-50 rounded-full p-4 mb-4 animate-bounce-slow group-hover:animate-bounce-more">
                <svg class="h-10 w-10 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M13 16h-1v-4h-1m4 0h-1v4h-1m-2 4h.01M12 2a10 10 0 100 20 10 10 0 000-20z"/>
                </svg>
            </div>
            @endif

            <h3 class="font-semibold text-lg mb-1 text-center">{{ $a->title }}</h3>
            <p class="text-center text-gray-600">{{ \Illuminate\Support\Str::limit($a->content, 80) }}</p>
        </div>
        @empty
        <div class="col-span-4 text-center text-gray-500 py-6">
            No announcements available at the moment.
        </div>
        @endforelse

    </div>

    <style>
        @keyframes fade-in-up { 0% { opacity: 0; transform: translateY(40px); } 100% { opacity: 1; transform: translateY(0); } }
        .animate-fade-in-up { animation: fade-in-up 0.8s both; }
        .animate-fade-in-up.delay-150 { animation-delay: .15s; }
        .animate-fade-in-up.delay-300 { animation-delay: .3s; }
        .animate-fade-in-up.delay-450 { animation-delay: .45s; }
        .animate-fade-in-up.delay-600 { animation-delay: .6s; }

        @keyframes bounce-slow { 0%,100%{transform:translateY(0);}50%{transform:translateY(-8px);} }
        .animate-bounce-slow { animation: bounce-slow 2.2s infinite; }

        @keyframes bounce-more { 0%,100%{transform:translateY(0);}30%,70%{transform:translateY(-18px);}50%{transform:translateY(-8px);} }
        .animate-bounce-more { animation: bounce-more 0.7s; }
    </style>
</section>




 
<!-- Latest news -->
<!-- Activities Calendar Section -->
<section class="py-12">
    <h2 class="text-3xl md:text-4xl font-extrabold text-center mb-8 text-blue-900 tracking-tight leading-tight">
        <span class="bg-gradient-to-r from-blue-600 via-green-500 to-yellow-400 bg-clip-text text-transparent">
            Activities Calendar 
        </span>
    </h2>

    <div x-data="calendarComponent()" class="max-w-6xl mx-auto">
        <!-- Calendar container -->
        <div id="activitiesCalendar"></div>

        <!-- Modal for showing activities per day -->
        <div x-show="showModal" 
             class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
             x-transition
             style="display: none;">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 relative">
                <button @click="showModal = false" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">✖</button>
                <h3 class="text-xl font-bold mb-4" x-text="modalDate"></h3>

                <template x-if="modalActivities.length > 0">
                    <ul class="space-y-2">
                        <template x-for="act in modalActivities" :key="act.id">
                            <li class="p-2 border rounded bg-gray-50">
                                <p class="font-semibold" x-text="act.title"></p>
                                <p class="text-gray-600 text-sm" x-text="act.description"></p>
                            </li>
                        </template>
                    </ul>
                </template>

                <template x-if="modalActivities.length === 0">
                    <p class="text-gray-500">No activities for this day.</p>
                </template>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">

    <script>
        function calendarComponent() {
            return {
                showModal: false,
                modalActivities: [],
                modalDate: '',
                calendar: null,
                // Pass activities safely
                activities: {!! $activities->map(function($a) {
                    return [
                        'id' => $a->id,
                        'title' => $a->title,
                        'description' => $a->description ?? '',
                        'start' => $a->date->format('Y-m-d'),
                    ];
                })->toJson() !!},
                init() {
                    let calendarEl = document.getElementById('activitiesCalendar');
                    this.calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        events: this.activities,
                        height: 'auto',
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,listMonth'
                        },
                        eventClick: (info) => {
                            this.modalDate = info.event.startStr;
                            this.modalActivities = this.activities.filter(act => act.start === info.event.startStr);
                            this.showModal = true;
                        }
                    });
                    this.calendar.render();
                }
            }
        }
    </script>
</section>
<!-- News & Updates Section -->
<section class="py-12 bg-gray-50">
    <h2 class="text-3xl md:text-4xl font-extrabold text-center mb-8 text-blue-900 tracking-tight leading-tight">
        <span class="bg-gradient-to-r from-blue-600 via-green-500 to-yellow-400 bg-clip-text text-transparent">
            News & Updates
        </span>
    </h2>

    <div class="grid md:grid-cols-3 gap-6 max-w-6xl mx-auto px-4">
        @forelse($news as $n)
        <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg transition-transform transform hover:scale-105">
            
            {{-- ✅ Image with Fallback --}}
            @php
                $imagePath = $n->image && file_exists(public_path('storage/news/' . $n->image))
                             ? asset('storage/news/' . $n->image)
                             : asset('images/news-placeholder.png');
            @endphp
            <img src="{{ $imagePath }}" 
                 alt="{{ $n->title }}" 
                 class="w-full h-48 object-cover">

            <div class="p-4">
                <h3 class="font-semibold text-lg mb-2 text-gray-800">{{ $n->title }}</h3>
                <p class="text-gray-600 text-sm mb-3">{{ \Illuminate\Support\Str::limit($n->description, 100) }}</p>
                <p class="text-gray-400 text-xs mb-3">{{ $n->created_at->format('M d, Y') }}</p>

                {{-- ✅ Fixed route name --}}
                <a href="{{ route('news.frontend.show', $n->id) }}" 
                   class="text-blue-600 hover:text-blue-800 text-sm font-medium">Read More →</a>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center text-gray-500 py-6">
            No news available at the moment.
        </div>
        @endforelse
    </div>

    {{-- ✅ Fixed See More Button route --}}
    <div class="text-center mt-10">
        <a href="{{ route('news.frontend.index') }}" 
           class="inline-block px-6 py-2 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition">
           See More News
        </a>
    </div>
</section>


<!-- Feedback -->
<section class="bg-blue-50 py-12 text-center">
    <h2 class="text-xl font-semibold mb-4">We value your feedback</h2>
    <p class="mb-6">Help us improve by sharing your experience with our services.</p>
    <a href="https://docs.google.com/forms/d/e/1FAIpQLSfOy07Te7L8qjEDfF8Ff637WEd5DpAghIUr9TvX-KJZvk5wVQ/viewform" target="_blank"
   class="bg-blue-600 hover:bg-blue-700 px-6 py-2 text-white rounded">
   Give Feedback
</a>

    <div class="flex justify-center items-center gap-8 mt-8">
        @foreach(['logo1','logo2','logo4','logo3'] as $logo)
        <img src="{{ asset("images/{$logo}.png") }}" alt="{{ ucfirst($logo) }}" class="h-12 w-auto">
        @endforeach
    </div>
</section>
<!-- History Modal -->
<div id="modal-history" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6 text-center">
        <img src="{{ asset('images/tesda-logo.png') }}" alt="TESDA Logo" class="mx-auto mb-4 w-24 h-24 object-contain rounded">
        <h2 class="text-xl font-bold mb-2 text-gray-800">History</h2>
        <p class="text-gray-600 mb-6">
            TESDA Occidental Mindoro was founded to uplift communities by providing technical-vocational education and transformative skills training.
        </p>
        <button onclick="closeModal('modal-history')"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded font-medium transition">
            Okay
        </button>
    </div>
</div>
<!-- ✅ Modal: Login Required -->
<div id="modal-login-required" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6 text-center">
        <img src="{{ asset('images/tesda-logo.png') }}" alt="TESDA Logo" class="mx-auto mb-4 w-20 h-20 object-contain rounded">
        <h2 class="text-xl font-bold mb-2 text-gray-800">Login Required</h2>
        <p class="text-gray-600 mb-6">
            You need to log in or register first to access Program & Services.
        </p>
        <button onclick="document.getElementById('modal-login-required').classList.add('hidden');"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded font-medium transition">
            Okay
        </button>

    </div>
</div>

<!-- JS function to close modal if needed -->
<script>
    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>
<!-- Mission Modal -->
<div id="modal-mission" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6 text-center">
        <img src="{{ asset('images/tesda-logo.png') }}" alt="TESDA Logo" class="mx-auto mb-4 w-24 h-24 object-contain rounded">
        <h2 class="text-xl font-bold mb-2 text-gray-800">Mission</h2>
        <p class="text-gray-600 mb-6">
            To provide direction, policies, programs, and standards towards quality technical education and skills development.
        </p>
        <button onclick="closeModal('modal-mission')"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded font-medium transition">
            Okay
        </button>
    </div>
</div>

<!-- Vision Modal -->
<div id="modal-vision" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6 text-center">
        <img src="{{ asset('images/tesda-logo.png') }}" alt="TESDA Logo" class="mx-auto mb-4 w-24 h-24 object-contain rounded">
        <h2 class="text-xl font-bold mb-2 text-gray-800">Vision</h2>
        <p class="text-gray-600 mb-6">
            The transformational leader in the technical education and skills development of the Filipino workforce.
        </p>
        <button onclick="closeModal('modal-vision')"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded font-medium transition">
            Okay
        </button>
    </div>
</div>

<!-- Organizational Structure Modal -->
<div id="modal-structure" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-xl max-w-md w-full p-6 text-center">
        <img src="{{ asset('images/tesda-logo.png') }}" alt="TESDA Logo" class="mx-auto mb-4 w-24 h-24 object-contain rounded">
        <h2 class="text-xl font-bold mb-2 text-gray-800">Organizational Structure</h2>
        <p class="text-gray-600 mb-6">
            Learn about TESDA Occidental Mindoro’s organizational structure that supports its vision and mission.
        </p>
        <button onclick="closeModal('modal-structure')"
            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded font-medium transition">
            Okay
        </button>
    </div>
</div>

<!-- JS: Functions to close modals -->
<script>
    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>

<!-- Put these anywhere you want to trigger the modals -->
<a href="#" onclick="document.getElementById('modal-history').classList.remove('hidden'); return false;"
    class="text-blue-600 underline">Open History</a>

<a href="#" onclick="document.getElementById('modal-mission').classList.remove('hidden'); return false;"
    class="text-blue-600 underline">Open Mission</a>

<a href="#" onclick="document.getElementById('modal-vision').classList.remove('hidden'); return false;"
    class="text-blue-600 underline">Open Vision</a>

<a href="#" onclick="document.getElementById('modal-structure').classList.remove('hidden'); return false;"
    class="text-blue-600 underline">Open Organizational Structure</a>

<footer class="bg-gray-900 text-white py-8 px-6 text-center">
    <p>&copy; 2025 TESDA Occidental Mindoro. All rights reserved.</p>
    <p>ROMTTAC Compound, Brgy. Santo Niño, Rizal, Occidental Mindoro</p>
</footer>

<!-- Chatbot revised into modal
<div class="fixed bottom-6 right-6 z-50">
    <button id="chatbot-toggle" class="bg-green-600 hover:bg-green-700 text-white px-4 py-3 rounded-full shadow-lg animate-bounce flex items-center gap-2">
        💬 Live Chat TESDA
    </button>
    <div id="chatbot-box" class="hidden bg-white rounded-lg shadow-lg w-80 max-w-full p-4 mt-2">
        <div class="flex justify-between items-center mb-2">
            <span class="font-semibold text-gray-800">TESDA Live Chat</span>
            <button id="chatbot-close" class="text-gray-500 hover:text-gray-700 text-xl">&times;</button>
        </div>
        <div id="chatbot-messages" class="h-48 overflow-y-auto mb-2 text-sm bg-gray-50 p-2 rounded space-y-1"></div>
        <form id="chatbot-form" class="flex gap-2">
            <input id="chatbot-input" type="text" class="flex-1 border rounded px-2 py-1" placeholder="Type your question..." autocomplete="off" />
            <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded">Send</button>
        </form>
    </div> 
</div> -->
<!-- Modal: Feedback requires registration -->
<div id="modal-feedback-required" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center overflow-y-auto">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 relative text-gray-800">
        <button onclick="document.getElementById('modal-feedback-required').classList.add('hidden');"
                class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-xl">&times;</button>

        <div class="text-center mb-4">
            <h2 class="text-xl font-semibold mb-2">Feedback requires registration</h2>
            <p class="text-gray-600 text-sm">
                To submit feedback, you need to register first. Registration allows us to respond properly to your message, keeps our platform secure, and ensures accountability.  
                By registering, you can also track your feedback status, update your profile, and get personalized support.  
                Your feedback is important to us, and having an account makes the process smooth, transparent, and secure.  
                Please take a moment to register before submitting your feedback.
            </p>
        </div>

        <div class="text-center mt-6">
            <a href="javascript:void(0);"
               onclick="document.getElementById('modal-feedback-required').classList.add('hidden'); document.getElementById('modal-register').classList.remove('hidden');"
               class="inline-block bg-blue-600 hover:bg-blue-700 px-6 py-2 rounded text-white font-semibold transition">
                OK, Register Now
            </a>
        </div>
    </div>
</div>
<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>


<script>
    const toggle = document.getElementById('chatbot-toggle');
    const close = document.getElementById('chatbot-close');
    const box = document.getElementById('chatbot-box');
    const form = document.getElementById('chatbot-form');
    const input = document.getElementById('chatbot-input');
    const messages = document.getElementById('chatbot-messages');
    toggle.addEventListener('click', () => box.classList.toggle('hidden'));
    close.addEventListener('click', () => box.classList.add('hidden'));
    form.addEventListener('submit', e => {
        e.preventDefault();
        const text = input.value.trim();
        if (!text) return;
        messages.innerHTML += `<div class="bg-green-100 text-green-800 px-3 py-1 rounded mb-1">${text}</div>`;
        input.value = '';
        messages.scrollTop = messages.scrollHeight;
        setTimeout(() => {
            messages.innerHTML += `<div class="bg-gray-100 text-gray-800 px-3 py-1 rounded mb-1">Thank you! We'll get back to you soon.</div>`;
            messages.scrollTop = messages.scrollHeight;
        }, 500);
    });
</script>
@extends('layouts.app')