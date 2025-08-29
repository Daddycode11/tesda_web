@extends('layouts.admin')

<div x-data="{ showModal: false }" class="flex min-h-screen bg-gray-50">
    {{-- Sidebar --}}
    @include('components.admin-sidebar')

    {{-- Main content --}}
@section('content')
<div class="container">
    <h2>Chat with {{ $user->name }}</h2>

    {{-- Conversation messages --}}
    <div class="border p-3 mb-3" style="height:300px; overflow-y:auto;">
        @forelse($messages as $message)
            <div class="mb-2 {{ $message->sender_id == auth()->id() ? 'text-right' : 'text-left' }}">
                <strong>{{ $message->sender->name }}</strong>: 
                <span>{{ $message->content }}</span>
                <small class="text-muted d-block">{{ $message->created_at->diffForHumans() }}</small>
            </div>
        @empty
            <p class="text-muted">No messages yet.</p>
        @endforelse
    </div>

    {{-- Admin reply --}}
    <form method="POST" action="{{ route('admin.chat.send', $user->id) }}">
        @csrf
        <div class="input-group">
            <input type="text" name="content" class="form-control" placeholder="Type a reply..." required>
            <button type="submit" class="btn btn-success">Reply</button>
        </div>
    </form>
</div>
<style>
.chat-container { max-width: 600px; margin: auto; }
.messages-box { height: 400px; overflow-y: auto; border: 1px solid #ddd; padding: 10px; background: #f9f9f9; }
.message { margin: 8px 0; padding: 10px; border-radius: 10px; max-width: 70%; }
.sent { background: #007bff; color: white; margin-left: auto; text-align: right; }
.received { background: #e5e5ea; color: black; margin-right: auto; text-align: left; }
</style>
