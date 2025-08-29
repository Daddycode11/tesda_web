@extends('layouts.app')

    <div class="flex min-h-screen bg-white">
        {{-- Sidebar --}}
        @include('components.user-sidebar')

        {{-- Main content --}}
<style>
    .chat-container {
        max-width: 700px;
        margin: 20px auto;
        background: #f5f5f5;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        height: 80vh;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .chat-messages {
        flex: 1;
        padding: 15px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
    }

    .message {
        max-width: 60%;
        padding: 10px 15px;
        margin-bottom: 10px;
        border-radius: 18px;
        line-height: 1.4;
        font-size: 14px;
        word-wrap: break-word;
    }

    .sent {
        align-self: flex-end;
        background: #0084ff;
        color: white;
        border-bottom-right-radius: 5px;
    }

    .received {
        align-self: flex-start;
        background: #e4e6eb;
        color: #050505;
        border-bottom-left-radius: 5px;
    }

    .chat-input {
        display: flex;
        padding: 10px;
        background: #fff;
        border-top: 1px solid #ddd;
    }

    .chat-input textarea {
        flex: 1;
        resize: none;
        border-radius: 20px;
        border: 1px solid #ddd;
        padding: 10px;
        font-size: 14px;
        outline: none;
    }

    .chat-input button {
        margin-left: 10px;
        padding: 0 20px;
        border: none;
        border-radius: 20px;
        background: #0084ff;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
    }

    .chat-input button:hover {
        background: #006bbf;
    }
</style>

<div class="chat-container">
    {{-- Messages List --}}
    <div class="chat-messages" id="chatMessages">
        @foreach($messages as $msg)
            <div class="message {{ $msg->from_user_id == Auth::id() ? 'sent' : 'received' }}">
                {{ $msg->message }}
                <div style="font-size: 10px; margin-top: 3px; opacity: 0.6;">
                    {{ $msg->created_at->format('H:i') }}
                </div>
            </div>
        @endforeach
    </div>

    {{-- Message Input --}}
<form id="chatForm" class="chat-input" method="POST" action="{{ route('chat.send') }}">
    @csrf
    <input type="hidden" name="to_user_id" value="2"> {{-- Example: replace with dynamic recipient --}}
    <textarea name="message" rows="1" placeholder="Type a message..." required></textarea>
    <button type="submit">Send</button>
</form>
</div>

{{-- jQuery (needed for simplicity) --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function scrollToBottom() {
        let chatMessages = document.getElementById('chatMessages');
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // Scroll on page load
    window.onload = scrollToBottom;

    // Send message with AJAX
    $('#chatForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('chat.send') }}",
            type: "POST",
            data: $(this).serialize(),
            success: function() {
                $('textarea[name="message"]').val('');
                loadMessages();
            }
        });
    });

    // Load messages via AJAX
    function loadMessages() {
        $.ajax({
            url: "{{ route('messages.index') }}",
            type: "GET",
            success: function(data) {
                // Replace chat content with new messages only
                let html = $(data).find('#chatMessages').html();
                $('#chatMessages').html(html);
                scrollToBottom();
            }
        });
    }

    // Refresh chat every 3 seconds
    setInterval(loadMessages, 3000);
</script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    Echo.private('chat.{{ auth()->id() }}')
        .listen('.MessageSent', (e) => {
            let message = e.message;
            let chatBox = document.getElementById("chat-box");

            let msgDiv = document.createElement("div");
            msgDiv.className = "message received";
            msgDiv.innerHTML = `<p>${message.sender.name}: ${message.message}</p>`;
            chatBox.appendChild(msgDiv);

            chatBox.scrollTop = chatBox.scrollHeight; // auto scroll
        });
</script>
