@extends('layouts.app')

@section('title', $news->title . ' - News & Updates')

@section('content')
<section class="max-w-5xl mx-auto px-6 py-12 text-gray-800">
    
    {{-- 🔙 Back to News --}}
    <a href="{{ route('welcome') }}#news" 
       class="inline-flex items-center text-blue-700 hover:text-blue-900 font-medium mb-6 transition">
        ← Back to News & Updates
    </a>

    {{-- 📰 News Header --}}
    <h1 class="text-4xl font-bold text-blue-800 mb-2">{{ $news->title }}</h1>
    <p class="text-gray-500 text-sm mb-6">
        🗓 Published on {{ $news->created_at->format('F d, Y') }}
    </p>

    {{-- 🖼️ News Image --}}
    @if($news->image)
        <div class="mb-8">
            <img src="{{ asset('storage/news/' . $news->image) }}" 
                 alt="{{ $news->title }}" 
                 class="w-full h-96 object-cover rounded-lg shadow-md">
        </div>
    @endif

    {{-- 📝 News Content --}}
    <article class="prose prose-blue max-w-none text-gray-700 leading-relaxed">
        {!! nl2br(e($news->description)) !!}
    </article>

    {{-- ✨ Divider --}}
    <hr class="my-12 border-gray-200">

    {{-- 📢 More News Section --}}
    <div>
        <h2 class="text-2xl font-semibold text-blue-800 mb-6">More News & Updates</h2>

        <div class="grid md:grid-cols-3 gap-6">
            @forelse($recentNews as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition">
                    @if($item->image)
                        <img src="{{ asset('storage/news/' . $item->image) }}" 
                             alt="News Image"
                             class="w-full h-40 object-cover">
                    @endif
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-blue-700 mb-2">
                            {{ Str::limit($item->title, 50) }}
                        </h3>
                        <p class="text-gray-600 text-sm mb-3">
                            {{ Str::limit($item->description, 90) }}
                        </p>
                        <a href="{{ route('news.show', $item->id) }}" 
                           class="text-blue-600 hover:underline font-medium text-sm">
                            Read More →
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 italic col-span-3">No other news available.</p>
            @endforelse
        </div>
    </div>

</section>
@endsection
