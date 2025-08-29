@extends('layouts.app')

@section('content')
<div class="flex min-h-screen">
    {{-- Sidebar --}}
    @include('components.admin-sidebar')

    {{-- Main Content --}}
    <div class="flex-1 p-6">
        <div class="container mx-auto">
            <h3 class="text-xl font-semibold mb-4">Conversations</h3>
            <ul class="space-y-2">
                @foreach ($users as $user)
                    <li>
                        <a href="{{ route('admin.messages.reply', $user->id) }}" 
                           class="block px-4 py-2 rounded hover:bg-gray-200">
                            {{ $user->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
