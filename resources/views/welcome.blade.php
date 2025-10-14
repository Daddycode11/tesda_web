{{-- resources/views/welcome.blade.php --}}
<!-- START NAV -->
<nav x-data="{ open: false, loginModal: false, registerModal: false }" class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

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
            <div class="hidden sm:flex sm:items-center sm:space-x-6 flex-1 justify-center">
                <a href="{{ url('/') }}" class="inline-flex items-center text-gray-700 dark:text-gray-300 hover:text-blue-600 transition font-semibold">
                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 12l2-2m0 0l7-7 7 7m-9 2v7a2 2 0 002 2h4a2 2 0 002-2v-7m-6 0h6" />
                    </svg>
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
                            ['url'=>url('/competency-standards-development'),'label'=>'Competency Standards Development'],
                            ['url'=>url('/competency-assessment-certification'),'label'=>'Competency Assessment and Certification'],
                            ['url'=>url('/program-registration-accreditation'),'label'=>'Program Registration and Accreditation'],
                            ['url'=>url('/directory-schools'),'label'=>'Directory of Schools with Registered Programs'],
                            ['url'=>url('/directory-trainers'),'label'=>'Directory of Accredited TVET Trainers'],
                            ['url'=>url('/training-regulations'),'label'=>'Training Regulations'],
                            ['url'=>url('/competency-standards'),'label'=>'Competency Standards'],
                        ],
                        'Transparency' => [
                            ['url'=>url('/transparency-seal'),'label'=>'Transparency Seal'],
                            ['url'=>url('/citizens-charter'),'label'=>'Citizen’s Charter'],
                            ['url'=>url('/freedom-of-information'),'label'=>'Freedom of Information'],
                            ['url'=>url('/philippine-qualifications-framework'),'label'=>'Philippine Qualifications Framework'],
                            ['url'=>url('/bagong-pilipinas'),'label'=>'Bagong Pilipinas'],
                        ],
                        'Resources' => [
                            ['url'=>url('/tesda-circulars'),'label'=>'TESDA Circulars (Memo, Resolutions, Advisories, Orders)'],
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
                @endphp

                @foreach($dropdowns as $title => $links)
                <div class="relative inline-block text-left group">
                    <button type="button" onclick="document.getElementById('{{ Str::slug($title) }}-menu').classList.toggle('hidden');"
                        class="inline-flex items-center text-gray-700 dark:text-gray-300 hover:text-blue-600 transition font-semibold focus:outline-none">
                        {{ $title }}
                        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div id="{{ Str::slug($title) }}-menu"
                        class="absolute left-0 mt-2 w-80 rounded-md shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 hidden z-50">
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

                <!-- Verification / Feedback -->
@guest
<div x-data="{ verificationOpen: false }" class="relative inline-block text-left">
    <button @click="verificationOpen = !verificationOpen"
        class="inline-flex items-center text-gray-700 dark:text-gray-300 hover:text-blue-600 transition font-semibold focus:outline-none">
        Verification
        <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                clip-rule="evenodd" />
        </svg>
    </button>
    <div x-show="verificationOpen" x-transition.opacity
         @click.away="verificationOpen = false"
         class="absolute left-0 mt-2 w-72 rounded-md shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 z-50">
        <div class="py-1">
            @php
                $verification_links = [
                    ['url'=>'https://www.example.gov/registry-certified-workers','label'=>'Registry of Certified Workers'],
                    ['url'=>'https://www.example.gov/assessment-centers','label'=>'Assessment Centers'],
                    ['url'=>'https://www.example.gov/tvi-registered-programs','label'=>'TVI with Registered Programs'],
                    ['url'=>'https://www.example.gov/institutions-cease-desist','label'=>'Institutions Issued with Cease and Desist Order'],
                    ['url'=>'https://www.example.gov/registry-accredited-assessors','label'=>'Registry of Accredited Assessors'],
                    ['url'=>'https://www.example.gov/registry-trainers-n','label'=>'Registry of Trainers with N'],
                ];
            @endphp
            @foreach($verification_links as $link)
            <a href="{{ $link['url'] }}" target="_blank"
               class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
               {{ $link['label'] }}
            </a>
            @endforeach
        </div>
    </div>
</div>
@endguest


            <!-- Desktop Auth Buttons -->
            <div class="hidden sm:flex sm:items-center sm:space-x-2">
                <button @click="loginModal = true" class="text-sm font-medium text-blue-600 hover:text-blue-800 px-4 py-2 rounded-md transition">
                    Login
                </button>
                <button @click="registerModal = true" class="text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md transition">
                    Register
                </button>
            </div>

            <!-- Mobile menu button -->
            <div class="sm:hidden flex items-center">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-blue-600 focus:outline-none transition">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden px-2 pt-2 pb-3 space-y-1">
        <a href="{{ url('/') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Home</a>

        @foreach($dropdowns as $title => $links)
        <div x-data="{ openMobile: false }" class="block">
            <button @click="openMobile = !openMobile" class="w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 flex justify-between items-center">
                {{ $title }}
                <svg :class="{ 'transform rotate-180': openMobile }" class="h-4 w-4 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
                </svg>
            </button>
            <div x-show="openMobile" class="pl-4 mt-1 space-y-1">
                @foreach($links as $link)
                <a href="{{ $link['url'] }}" target="{{ $link['target'] ?? '_self' }}"
                    class="block px-3 py-2 rounded-md text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">
                    {{ $link['label'] }}
                </a>
                @endforeach
            </div>
        </div>
        @endforeach

        @auth
        <a href="{{ route('user.dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Give Feedback</a>
        @else
        <button @click="loginModal = true" class="w-full text-left px-3 py-2 rounded-md text-base font-medium text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Login</button>
        <button @click="registerModal = true" class="w-full text-left px-3 py-2 rounded-md text-base font-medium text-white bg-blue-600 hover:bg-blue-700">Register</button>
        @endauth
    </div>

    <!-- Login Modal -->
    <div x-show="loginModal" x-transition.opacity x-cloak
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div @click.away="loginModal = false" class="bg-white dark:bg-gray-800 rounded-lg w-96 p-6 shadow-lg transition-transform">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Login</h2>
                <button @click="loginModal = false" class="text-gray-500 hover:text-gray-800 dark:hover:text-gray-200">&times;</button>
            </div>
            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-gray-700 dark:text-gray-200">Email</label>
                    <input type="email" name="email" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:text-gray-200">
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-200">Password</label>
                    <input type="password" name="password" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:text-gray-200">
                </div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-md transition">Login</button>
            </form>
        </div>
    </div>

    <!-- Register Modal -->
    <div x-show="registerModal" x-transition.opacity x-cloak
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
        <div @click.away="registerModal = false" class="bg-white dark:bg-gray-800 rounded-lg w-96 p-6 shadow-lg transition-transform">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Register</h2>
                <button @click="registerModal = false" class="text-gray-500 hover:text-gray-800 dark:hover:text-gray-200">&times;</button>
            </div>
            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-gray-700 dark:text-gray-200">Name</label>
                    <input type="text" name="name" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:text-gray-200">
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-200">Email</label>
                    <input type="email" name="email" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:text-gray-200">
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-200">Password</label>
                    <input type="password" name="password" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:text-gray-200">
                </div>
                <div>
                    <label class="block text-gray-700 dark:text-gray-200">Confirm Password</label>
                    <input type="password" name="password_confirmation" required class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:text-gray-200">
                </div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-md transition">Register</button>
            </form>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="relative bg-blue-900 text-white text-center py-10 overflow-hidden">
    <div class="absolute inset-0">
        <img src="{{ asset('images/tesda-hero-bg.jpg') }}" alt="TESDA Background" class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-blue-600 opacity-40"></div>
    </div>
    <div class="relative z-10 flex flex-col md:flex-row items-center justify-center gap-8">
        <div class="md:text-left text-center">
            <h1 class="text-4xl font-bold animate-hero-fade-in">Welcome to TESDA Occidental Mindoro</h1>
            <p class="mt-4 text-lg animate-hero-slide-up">Empowering lives through quality technical education and training programs.</p><a href="javascript:void(0);" 
   onclick="document.getElementById('modal-register').classList.remove('hidden');" 
   class="mt-6 inline-block bg-green-500 hover:bg-green-600 px-6 py-3 rounded text-white font-semibold animate-hero-fade-in delay-200">
    Get Started
</a>
</div>
        <div class="mt-8 md:mt-0 md:ml-8 flex-shrink-0">
            <img src="{{ asset('images/white logo.png') }}" alt="TESDA Logo" class="w-80 h-80 object-contain mx-auto md:mx-0 animate-hero-zoom-in">
        </div>
    </div>
    <style>
        @keyframes hero-fade-in {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes hero-slide-up {
            0% {
                opacity: 0;
                transform: translateY(40px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes hero-zoom-in {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-hero-fade-in {
            animation: hero-fade-in 1s both;
        }

        .animate-hero-fade-in.delay-200 {
            animation-delay: .2s;
        }

        .animate-hero-slide-up {
            animation: hero-slide-up 1s both;
        }

        .animate-hero-zoom-in {
            animation: hero-zoom-in 1.2s both;
        }
    </style>
</section>

<!-- About image -->
<section class="py-10 max-w-6xl mx-auto bg-white rounded-lg flex justify-center items-center shadow">
    <img src="{{ asset('images/tesda-8-agenda-.png') }}" alt="TESDA 8 Agenda" class="w-full h-auto object-contain mx-auto" style="max-width:100%; max-height:420px;">
</section>

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

<!-- Transparency -->
<section class="px-6 py-12 max-w-6xl mx-auto text-gray-800">
    <h2 class="text-2xl font-bold mb-4">Transparency</h2>
    <p>Access TESDA's public documents including Citizen's Charter, FOI, and other reports.</p>
    <a href="#" class="text-blue-600 underline mt-2 inline-block">Visit Transparency Page</a>
</section>

<!-- Feedback -->
<section class="bg-blue-50 py-12 text-center">
    <h2 class="text-xl font-semibold mb-4">We value your feedback</h2>
    <p class="mb-6">Help us improve by sharing your experience with our services.</p>
    <a href="#" class="bg-blue-600 hover:bg-blue-700 px-6 py-2 text-white rounded">Give Feedback</a>
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

<!-- Footer -- revised -->
<!-- <footer class="bg-gray-900 text-white py-8 px-6 text-center">
    <p>&copy; 2025 TESDA Occidental Mindoro. All rights reserved.</p>
    <p>ROMTTAC Compound, Brgy. Santo Niño, Rizal, Occidental Mindoro</p>
</footer> -->

<!-- Chatbot revised into modal -->
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
</div>
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