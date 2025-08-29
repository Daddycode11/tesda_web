@extends('layouts.app')

@section('content')
<div class="flex min-h-screen">
    {{-- Sidebar --}}
    @include('components.admin-sidebar')

    {{-- Main Content --}}
    <div class="flex-1 p-6">
        <div class="chat-box bg-white shadow rounded-lg p-4 h-full flex flex-col">
            <h3 class="text-xl font-semibold mb-4">Chat with {{ $user->name }}</h3>

            {{-- Messages --}}
            <div class="messages flex-1 overflow-y-auto mb-4 space-y-2">
                @foreach ($messages as $message)
                    <div class="{{ $message->from_user_id === auth()->id() ? 'text-right' : 'text-left' }}">
                        <div class="inline-block px-3 py-2 rounded-lg 
                            {{ $message->from_user_id === auth()->id() ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-800' }}">
                            <strong>{{ $message->sender->name }}:</strong>
                            {{ $message->message }}
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Send Message --}}
            <form action="{{ route('admin.messages.send', $user->id) }}" method="POST" class="flex gap-2">
                @csrf
                <textarea name="message" placeholder="Type your message..." required
                    class="flex-1 border rounded-lg p-2 resize-none"></textarea>
                <button type="submit" 
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Send
                </button>
            </form>
        </div>
    </div>
</div>
