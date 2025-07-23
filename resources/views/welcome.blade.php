{{-- resources/views/welcome.blade.php --}}

@extends('layouts.app')
    <!-- START NAV -->
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo + Name -->
                <div class="shrink-0 flex items-center space-x-3">
                    <a href="{{ url('/') }}" class="flex items-center space-x-2">
                        <img src="{{ asset('images/Tesda-Logo.png') }}" class="h-12 w-auto" alt="TESDA Logo">
                        <span class="flex flex-col">
                            <span class="text-lg font-semibold text-gray-800 dark:text-gray-200">TESDA</span>
                            <span class="text-sm font-semibold text-gray-800 dark:text-gray-200">Occidental Mindoro</span>
                        </span>
                    </a>
                </div>
            </div>
            <!-- Main Nav -->
            <div class="hidden sm:flex sm:items-center sm:justify-center flex-1">
                <nav class="space-x-8 text-base font-semibold text-gray-700 dark:text-gray-300">
                    <a href="{{ url('/') }}" class="inline-flex items-center hover:text-blue-600 transition">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7m-9 2v7a2 2 0 002 2h4a2 2 0 002-2v-7m-6 0h6" />
                        </svg>
                        Home
                    </a>
                    <div class="relative inline-block text-left group">
                        <button type="button" class="inline-flex items-center hover:text-blue-600 transition focus:outline-none" onclick="document.getElementById('about-menu').classList.toggle('hidden');">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8s-9-3.582-9-8 4.03-8 9-8 9 3.582 9 8z" />
                            </svg>
                            About Us
                            <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="about-menu" class="absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 hidden z-50">
                            <div class="py-1">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">History</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Mission and Vision</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Organizational Structure</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Careers</a>
                            </div>
                        </div>
                    </div>
                    <div class="relative inline-block text-left group">
                        <button type="button" class="inline-flex items-center hover:text-blue-600 transition focus:outline-none" onclick="document.getElementById('programs-menu').classList.toggle('hidden');">
                            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 17v-2a2 2 0 012-2h2a2 2 0 012 2v2m-6 0a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2m-6 0h6" />
                            </svg>
                            Program & Services
                            <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="programs-menu" class="absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 hidden z-50">
                            <div class="py-1">
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Scholarship Programs</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Skills Development Programs</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Certification Services</a>
                                <a href="#" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Policy Guidance</a>
                            </div>
                        </div>
                    </div>
@auth
    <a href="{{ route('user.dashboard') }}" 
       class="inline-flex items-center hover:text-blue-600 transition">
        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M17 8h2a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2v-8a2 2 0 012-2h2m10-4H7a2 2 0 00-2 2v2a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2z" />
        </svg>
        Give Feedback
    </a>
@else
    <a href="{{ route('register') }}" 
       class="inline-flex items-center hover:text-blue-600 transition">
        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M17 8h2a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2v-8a2 2 0 012-2h2m10-4H7a2 2 0 00-2 2v2a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2z" />
        </svg>
        Feedback
    </a>
@endauth
                    <a href="" class="inline-flex items-center hover:text-blue-600 transition">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 10a9 9 0 11-18 0 9 9 0 0118 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12h.01M12 12h.01M9 12h.01" />
                        </svg>
                        Contacts
                    </a>
                </nav>
                </div>
            <!-- Auth Links -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <div class="space-x-4">
                        <a href="{{ route('login') }}" class="text-sm font-medium text-blue-600 hover:underline">Login</a>
                        <a href="{{ route('register') }}" class="text-sm font-medium text-white bg-blue-600 px-4 py-2 rounded hover:bg-blue-700 transition">Register</a>
                    </div>
           
            </div>
            <!-- Mobile button -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-blue-600 focus:outline-none transition">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
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
                <p class="mt-4 text-lg animate-hero-slide-up">Empowering lives through quality technical education and training programs.</p>
                <a href="{{ route('register') }}" class="mt-6 inline-block bg-green-500 hover:bg-green-600 px-6 py-3 rounded text-white font-semibold animate-hero-fade-in delay-200">Get Started</a>
            </div>
            <div class="mt-8 md:mt-0 md:ml-8 flex-shrink-0">
                <img src="{{ asset('images/white logo.png') }}" alt="TESDA Logo" class="w-80 h-80 object-contain mx-auto md:mx-0 animate-hero-zoom-in">
            </div>
        </div>
        <style>
            @keyframes hero-fade-in {0%{opacity:0;}100%{opacity:1;}}
            @keyframes hero-slide-up {0%{opacity:0;transform:translateY(40px);}100%{opacity:1;transform:translateY(0);}}
            @keyframes hero-zoom-in {0%{opacity:0;transform:scale(0.8);}100%{opacity:1;transform:scale(1);}}
            .animate-hero-fade-in {animation: hero-fade-in 1s both;}
            .animate-hero-fade-in.delay-200 {animation-delay:.2s;}
            .animate-hero-slide-up {animation: hero-slide-up 1s both;}
            .animate-hero-zoom-in {animation: hero-zoom-in 1.2s both;}
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
            @keyframes fade-in-up {0%{opacity:0;transform:translateY(40px);}100%{opacity:1;transform:translateY(0);}}
            .animate-fade-in-up {animation: fade-in-up 0.8s both;}
            .animate-fade-in-up.delay-150 {animation-delay:.15s;}
            .animate-fade-in-up.delay-300 {animation-delay:.3s;}
            @keyframes bounce-slow {0%,100%{transform:translateY(0);}50%{transform:translateY(-8px);}}
            .animate-bounce-slow {animation: bounce-slow 2.2s infinite;}
            @keyframes bounce-more {0%,100%{transform:translateY(0);}30%{transform:translateY(-18px);}50%{transform:translateY(-8px);}70%{transform:translateY(-18px);}}
            .animate-bounce-more {animation: bounce-more 0.7s;}
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

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-8 px-6 text-center">
        <p>&copy; 2025 TESDA Occidental Mindoro. All rights reserved.</p>
        <p>ROMTTAC Compound, Brgy. Santo Niño, Rizal, Occidental Mindoro</p>
    </footer>

    <!-- Chatbot -->
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
                <input id="chatbot-input" type="text" class="flex-1 border rounded px-2 py-1" placeholder="Type your question..." autocomplete="off"/>
                <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded">Send</button>
            </form>
        </div>
    </div>
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
            input.value = ''; messages.scrollTop = messages.scrollHeight;
            setTimeout(() => {
                messages.innerHTML += `<div class="bg-gray-100 text-gray-800 px-3 py-1 rounded mb-1">Thank you! We'll get back to you soon.</div>`;
                messages.scrollTop = messages.scrollHeight;
            }, 500);
        });
    </script>
@extends('layouts.app')