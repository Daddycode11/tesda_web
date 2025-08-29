@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-4 rounded shadow">
    <h2 class="font-semibold mb-4">Chat with Admin</h2>

    <div class="h-64 overflow-y-scroll border p-2 mb-3">
        @foreach($messages as $msg)
            <div class="{{ $msg->from_user_id == auth()->id() ? 'text-right' : 'text-left' }}">
                <span class="inline-block px-2 py-1 rounded 
                    {{ $msg->from_user_id == auth()->id() ? 'bg-blue-500 text-white' : 'bg-gray-300' }}">
                    {{ $msg->message }}
                </span>
            </div>
        @endforeach
    </div>

    <form action="{{ route('chat.send') }}" method="POST" class="flex">
        @csrf
        <input type="text" name="message" class="flex-1 border rounded-l px-2 py-1" placeholder="Type your message..." required>
        <button class="bg-blue-500 text-white px-3 rounded-r">Send</button>
    </form>
</div>
@endsection
