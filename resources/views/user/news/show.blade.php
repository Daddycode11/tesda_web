@extends('layouts.app')

@section('content')
<section class="py-16 bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4">

        {{-- 🔙 Back link --}}
        <a href="{{ route('news.frontend.index') }}" 
           class="text-blue-600 hover:text-blue-800 font-medium mb-6 inline-flex items-center transition">
            <svg xmlns="http://www.w3.org/2000/svg" 
                 fill="none" viewBox="0 0 24 24" 
                 stroke-width="1.5" stroke="currentColor" 
                 class="w-5 h-5 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            Back to News
        </a>

        @php
            $imagePath = $news->image && file_exists(public_path('storage/news/' . $news->image))
                         ? asset('storage/news/' . $news->image)
                         : asset('images/news-placeholder.png');
        @endphp

        {{-- 📰 News Card --}}
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <img src="{{ $imagePath }}" 
                 alt="{{ $news->title }}" 
                 class="w-full h-72 object-cover">

            <div class="p-6">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $news->title }}</h1>
                <p class="text-gray-400 text-sm mb-6">
                    {{ $news->created_at->format('F d, Y') }}
                </p>

                <div class="prose max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e($news->description)) !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
