
@extends('layouts.app')
<!-- START NAV -->
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
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
        <!-- Home -->
        <a href="{{ url('/') }}" class="inline-flex items-center hover:text-blue-600 transition">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 12l2-2m0 0l7-7 7 7m-9 2v7a2 2 0 002 2h4a2 2 0 002-2v-7m-6 0h6" />
            </svg>
            Home
        </a>

        <!-- About Us -->
        <div class="relative inline-block text-left group">
            <button type="button"
                class="inline-flex items-center hover:text-blue-600 transition focus:outline-none"
                onclick="document.getElementById('about-menu').classList.toggle('hidden');">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8s-9-3.582-9-8 4.03-8 9-8 9 3.582 9 8z" />
                </svg>
                About Us
                <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                        clip-rule="evenodd" />
                </svg>
            </button>
            <div id="about-menu"
                class="absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 hidden z-50">
                <div class="py-1">
                    <a href="{{ url('/history') }}"
                        class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">History</a>
                    <a href="{{ url('/mission-vision') }}"
                        class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Mission
                        and Vision</a>
                    <a href="{{ url('/structure') }}"
                        class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Organizational
                        Structure</a>
                    <a href="{{ url('/careers') }}"
                        class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Careers</a>
                </div>
            </div>
        </div>

        <!-- Programs & Services -->
        <div class="relative inline-block text-left group">
            <button type="button"
                class="inline-flex items-center hover:text-blue-600 transition focus:outline-none"
                onclick="document.getElementById('programs-menu').classList.toggle('hidden');">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 17v-2a2 2 0 012-2h2a2 2 0 012 2v2m-6 0a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2m-6 0h6" />
                </svg>
                Program & Services
                <svg class="w-4 h-4 ml-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z"
                        clip-rule="evenodd" />
                </svg>
            </button>
            <div id="programs-menu"
                class="absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white dark:bg-gray-800 ring-1 ring-black ring-opacity-5 hidden z-50">
                <div class="py-1">
                    <a href="{{ url('/programs-services') }}"
                        class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">Program
                        & Services</a>
                </div>
            </div>
        </div>
  <!-- Transparency -->
        <a href="{{ url('/transparency') }}" class="inline-flex items-center hover:text-blue-600 transition">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 4a1 1 0 011-1h4l1 2h10a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V4z" />
            </svg>
            Transparency
        </a>
        <!-- Feedback -->
        @auth
        <a href="{{ route('user.dashboard') }}" class="inline-flex items-center hover:text-blue-600 transition">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17 8h2a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2v-8a2 2 0 012-2h2m10-4H7a2 2 0 00-2 2v2a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2z" />
            </svg>
            Give Feedback
        </a>
        @else
        <a href="{{ url('/feedback') }}" class="inline-flex items-center hover:text-blue-600 transition">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17 8h2a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2v-8a2 2 0 012-2h2m10-4H7a2 2 0 00-2 2v2a2 2 0 002 2h10a2 2 0 002-2V6a2 2 0 00-2-2z" />
            </svg>
            Feedback
        </a>
        @endauth

        <!-- Contacts -->
        <a href="{{ url('/contacts') }}" class="inline-flex items-center hover:text-blue-600 transition">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 10a9 9 0 11-18 0 9 9 0 0118 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12h.01M12 12h.01M9 12h.01" />
            </svg>
            Contacts
        </a>
    </nav>
</div>

            <!-- Auth Links -->

            <a href="javascript:void(0);"
                onclick="document.getElementById('modal-login').classList.remove('hidden');"
                class="inline-flex items-center justify-center text-sm font-medium text-blue-600 hover:text-blue-800 px-4 py-2 rounded-md transition">
                Login
            </a>

            <a href="javascript:void(0);"
                onclick="document.getElementById('modal-register').classList.remove('hidden');"
                class="ml-2 inline py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 px-4 rounded-md transition">
                Register
            </a>


            <!-- Login Modal -->
            <div id="modal-login" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center overflow-y-auto">
                <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 relative">
                    <!-- Close button -->
                    <button onclick="document.getElementById('modal-login').classList.add('hidden');"
                        class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-xl">&times;</button>
                    <!-- Logo & Title -->
                    <div class="text-center mb-4">
                        <a href="{{ url('/') }}" class="inline-flex items-center space-x-3">
                            <img src="{{ asset('images/Tesda-Logo.png') }}" alt="TESDA Logo" class="h-12">
                            <span class="text-2xl font-bold text-gray-800">TESDA Occidental Mindoro</span>
                        </a>
                        <p class="mt-2 text-sm text-gray-600">Login to access your account</p>
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" name="remember"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                <span class="ml-2 text-sm text-gray-600">Remember me</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                Forgot your password?
                            </a>
                            @endif
                            <x-primary-button>
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Register Modal -->
            <div id="modal-register" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center overflow-y-auto">
                <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 relative">
                    <!-- Close button -->
                    <button onclick="document.getElementById('modal-register').classList.add('hidden');"
                        class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-xl">&times;</button>

                    <!-- Logo & Title -->
                    <div class="text-center mb-4">
                        <a href="{{ url('/') }}" class="inline-flex items-center space-x-3">
                            <img src="{{ asset('images/Tesda-Logo.png') }}" alt="TESDA Logo" class="h-12">
                            <span class="text-2xl font-bold text-gray-800">TESDA Occidental Mindoro</span>
                        </a>
                        <p class="mt-2 text-sm text-gray-600">Create your TESDA platform account</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name"
                                class="block mt-1 w-full bg-gray-100 border-gray-300 focus:border-indigo-500 focus:bg-white rounded-md shadow-sm"
                                type="text" name="name" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email"
                                class="block mt-1 w-full bg-gray-100 border-gray-300 focus:border-indigo-500 focus:bg-white rounded-md shadow-sm"
                                type="email" name="email" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password"
                                class="block mt-1 w-full bg-gray-100 border-gray-300 focus:border-indigo-500 focus:bg-white rounded-md shadow-sm"
                                type="password" name="password" required />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation"
                                class="block mt-1 w-full bg-gray-100 border-gray-300 focus:border-indigo-500 focus:bg-white rounded-md shadow-sm"
                                type="password" name="password_confirmation" required />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="#"
                                onclick="document.getElementById('modal-login').classList.remove('hidden'); document.getElementById('modal-register').classList.add('hidden');">
                                Already registered?
                            </a>
                            <x-primary-button>
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </form>
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
@section('content')
<section class="max-w-5xl mx-auto px-6 py-12 text-gray-800 space-y-6">
    <h1 class="text-3xl font-bold text-blue-800">Mission & Vision</h1>
    <div>
        <h2 class="text-2xl font-semibold">Vision</h2>
        <p>The transformational leader in the technical education and skills development of the Filipino workforce.</p>
    </div>
    <div>
        <h2 class="text-2xl font-semibold">Mission</h2>
        <p>TESDA sets direction, promulgates relevant standards, and implements programs geared towards a quality-assured and inclusive technical education and skills development and certification system.</p>
    </div>
    <div>
        <h2 class="text-2xl font-semibold">Values</h2>
        <ul class="list-disc ml-6">
            <li>Demonstrated competence</li>
            <li>Institutional integrity</li>
            <li>Personal commitment</li>
            <li>Culture of innovativeness</li>
            <li>Deep sense of nationalism</li>
        </ul>
    </div>
</section>
@endsection
