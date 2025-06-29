<?php

namespace App\Livewire\Admin\Chat;

use App\Models\Chats;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatList extends Component
{
    public $receiver_id;
    public $receiver;
    public $messageText;
    public $messages = [];
    public $users;

    public function mount($receiver_id = null)
    {
        $this->users = User::where('id', '!=', Auth::id())->get();

        if ($receiver_id) {
            $this->receiver_id = $receiver_id;
            $this->receiver = User::find($receiver_id);
            $this->loadMessages();
        }
    }

    public function selectReceiver($id)
    {
        $this->receiver_id = $id;
        $this->receiver = User::find($id);
        $this->loadMessages();
    }

    public function loadMessages()
    {
        $this->messages = Chats::where(function ($query) {
            $query->where('sender_id', Auth::id())
                ->where('receiver_id', $this->receiver_id);
        })->orWhere(function ($query) {
            $query->where('sender_id', $this->receiver_id)
                ->where('receiver_id', Auth::id());
        })->orderBy('created_at','desc')->get();
    }

    public function sendMessage()
    {
       


        Chats::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $this->receiver_id,
            'message' => $this->messageText,
        ]);

        $this->messageText = '';
        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.admin.chat.chat-list', [
            'receiver' => $this->receiver,
            'users' => $this->users,
            'messages' => $this->messages,
        ]);
    }
}
