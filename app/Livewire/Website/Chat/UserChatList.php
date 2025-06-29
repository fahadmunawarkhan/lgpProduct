<?php

namespace App\Livewire\Website\Chat;

use App\Models\Chats as Chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

class UserChatList extends Component
{
    public $selectedUserId = null;

    #[Layout('components.layouts.websiteDashboard')]


    public function selectUser($userId)
    {
        $this->selectedUserId = $userId;
        dd($userId);
    }
    public function render()
    {
        $authUserId = Auth::id();

        // Fetch all chats involving the authenticated user
        $chats = Chat::where('sender_id', $authUserId)
            ->orWhere('receiver_id', $authUserId)
            ->orderBy('created_at', 'desc')
            ->get();

        // Group by the other user
        $conversations = $chats->groupBy(function ($chat) use ($authUserId) {
            return $chat->sender_id === $authUserId ? $chat->receiver_id : $chat->sender_id;
        });

        $userIds = $conversations->keys();
        $users = User::whereIn('id', $userIds)->get()->keyBy('id');

        // Get messages with selected user
        $messages = [];
        if ($this->selectedUserId) {
            $messages = Chat::where(function ($query) use ($authUserId) {
                $query->where('sender_id', $authUserId)
                    ->orWhere('receiver_id', $authUserId);
            })->where(function ($query) {
                $query->where('sender_id', $this->selectedUserId)
                    ->orWhere('receiver_id', $this->selectedUserId);
            })
                ->orderBy('created_at')
                ->get();
        }

        return view('livewire.website.chat.user-chat-list', [
            'users' => $users,
            'messages' => $messages,
        ]);
    }
}
