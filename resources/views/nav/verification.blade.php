@extends('layouts.app')

@section('title', 'Verification')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-12 text-gray-800">
    <h1 class="text-3xl font-bold text-blue-800 mb-6">Verification Page</h1>
    <p class="text-gray-700 mb-4">
        This is the verification page. You can provide information, confirm actions, or view verification details here.
    </p>

    <!-- Example verification link styled like dropdown items -->
    <div class="mt-6">
        <a href="{{ route('verification.show') }}"
            class="flex items-center px-4 py-2 text-gray-700 hover:text-blue-600 hover:bg-gray-100 transition rounded-md">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12l2 2 4-4m2 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            View Verification Details
        </a>
    </div>
</div>
@endsection
