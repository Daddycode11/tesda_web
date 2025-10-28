@extends('layouts.admin')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h1 class="text-3xl font-bold mb-4">{{ $news->title }}</h1>

    @if($news->image)
        <img src="{{ asset('storage/' . $news->image) }}" class="w-full h-64 object-cover rounded mb-6">
    @endif

    <p class="text-gray-800 leading-relaxed">{{ $news->content }}</p>

    <p class="text-sm text-gray-500 mt-4">Published on {{ $news->created_at->format('F d, Y') }}</p>

    <a href="{{ route('admin.news.index') }}" class="inline-block mt-6 bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">← Back</a>
</div>
@endsection
