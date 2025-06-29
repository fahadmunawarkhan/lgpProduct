<style>
    .chat-container {
        display: flex;
        height: 90vh;
        font-family: Arial, sans-serif;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
    }

    .chat-sidebar {
        width: 30%;
        background-color: #f8f9fa;
        border-right: 1px solid #ddd;
        overflow-y: auto;
    }

    .chat-sidebar h3 {
        padding: 15px;
        margin: 0;
        background: #343a40;
        color: #fff;
    }

    .user-list-item {
        padding: 12px 15px;
        cursor: pointer;
        border-bottom: 1px solid #eee;
        transition: background 0.2s;
    }

    .user-list-item:hover,
    .user-list-item.active {
        background-color: #e2e6ea;
    }

    .chat-main {
        flex: 1;
        display: flex;
        flex-direction: column;
        background-color: #fff;
    }

    .chat-header {
        padding: 15px;
        border-bottom: 1px solid #ddd;
        background-color: #f1f3f5;
    }

    .chat-messages {
        flex: 1;
        padding: 15px;
        overflow-y: auto;
        background-color: #fdfdfd;
    }

    .message {
        margin-bottom: 12px;
        max-width: 60%;
        padding: 10px 15px;
        border-radius: 20px;
        position: relative;
        word-wrap: break-word;
    }

    .message.sent {
        background-color: #007bff;
        color: white;
        margin-left: auto;
        border-bottom-right-radius: 0;
    }

    .message.received {
        background-color: #f1f0f0;
        color: black;
        margin-right: auto;
        border-bottom-left-radius: 0;
    }

    .chat-input {
        padding: 10px;
        border-top: 1px solid #ddd;
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
    }

    .chat-input input {
        flex: 1;
        padding: 10px 15px;
        border-radius: 20px;
        border: 1px solid #ccc;
        outline: none;
    }

    .chat-input button {
        margin-left: 10px;
        padding: 10px 20px;
        border: none;
        border-radius: 20px;
        background-color: #007bff;
        color: white;
        cursor: pointer;
    }

    .chat-input button:hover {
        background-color: #0056b3;
    }
</style>

<div class="chat-container">

    <!-- Sidebar -->
    <div class="chat-sidebar">
        <h3>Chats</h3>
        @foreach ($users as $user)
            <div wire:click="selectUser({{ $user->id }})"
                 class="user-list-item {{ $selectedUserId === $user->id ? 'active' : '' }}">
                {{ $user->name }}
            </div>
        @endforeach
    </div>

    <!-- Main Chat -->
    <div class="chat-main">
        <div class="chat-header">
            @if ($selectedUserId)
                <strong>Chat with {{ $users[$selectedUserId]->name ?? 'User' }}</strong>
            @else
                <strong>Select a user to start chatting</strong>
            @endif
        </div>

        <div class="chat-messages">
            @if ($selectedUserId)
                @forelse ($messages as $message)
                    <div class="message {{ $message->sender_id === auth()->id() ? 'sent' : 'received' }}">
                        {{ $message->message }}
                        <div style="font-size: 10px; text-align: right; margin-top: 5px;">
                            {{ $message->created_at->format('H:i') }}
                        </div>
                    </div>
                @empty
                    <p>No messages yet.</p>
                @endforelse
            @else
                <p>Please select a conversation.</p>
            @endif
        </div>

        @if ($selectedUserId)
            <div class="chat-input">
                <input type="text" placeholder="Type your message..." disabled>
                <button disabled>Send</button>
            </div>
        @endif
    </div>
</div>
