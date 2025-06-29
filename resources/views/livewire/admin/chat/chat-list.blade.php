<div class="row clearfix">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .chat-app {
            height: 87vh;
            display: flex;
            flex-direction: row;
            border: 1px solid #ccc;
        }

        .people-list {
            width: 25%;
            border-right: 1px solid #ccc;
            overflow-y: auto;
        }

        .chat {
            width: 75%;
            display: flex;
            flex-direction: column;
        }

        .chat-header {
            padding: 15px;
            border-bottom: 1px solid #ccc;
            background-color: #f7f7f7;
        }

        .chat-history {
            flex: 1;
            overflow-y: auto;
            padding: 15px;
            background: #f1f1f1;
        }

        .chat-message {
            padding: 15px;
            border-top: 1px solid #ccc;
            background-color: #fff;
        }
    </style>

    <div class="col-lg-12 mt-2">
        <div class="card chat-app">
            <!-- User List -->
            <div class="people-list">
                <div class="input-group p-2">
                    <input type="text" class="form-control" placeholder="Search..." disabled>
                </div>
                <ul class="list-unstyled chat-list mt-2 mb-0">
                    @foreach ($users as $user)
                        <li class="clearfix {{ $receiver_id === $user->id ? 'active' : '' }}"
                            wire:click="selectReceiver({{ $user->id }})"
                            style="cursor: pointer;">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}" alt="avatar" />
                            <div class="about">
                                <div class="name">{{ $user->name }}</div>
                                <div class="status"> <i class="fa fa-circle online"></i> online </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Chat Panel -->
            <div class="chat">
                <div class="chat-header clearfix">
                    @if ($receiver)
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($receiver->name) }}" alt="avatar">
                                <div class="chat-about">
                                    <h6 class="m-b-0">{{ $receiver->name }}</h6>
                                    <small>Last seen: recently</small>
                                </div>
                            </div>
                        </div>
                    @else
                        <div>Select a user to start chat</div>
                    @endif
                </div>

                <div class="chat-history">
                    <ul class="m-b-0">
                        @foreach ($messages as $msg)
                            @php
                                $isMe = $msg->sender_id === auth()->id();
                            @endphp
                            <li class="clearfix">
                                <div class="message-data {{ $isMe ? 'text-right' : '' }}">
                                    <span class="message-data-time">{{ $msg->created_at->format('h:i A') }}</span>
                                </div>
                                <div class="message {{ $isMe ? 'my-message' : 'other-message float-right' }}">
                                    {{ $msg->message }}
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                @if ($receiver)
                    <div class="chat-message clearfix">
                        <form wire:submit.prevent="sendMessage">
                            <div class="input-group mb-0">
                                <input type="text" wire:model="messageText" class="form-control"
                                       placeholder="Enter text here...">
                                <button class="btn btn-primary" type="submit">
                                    Send
                                </button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
