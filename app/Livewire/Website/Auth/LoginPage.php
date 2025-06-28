<?php

namespace App\Livewire\Website\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;

class LoginPage extends Component
{
    #[Layout('components.layouts.websiteAuth')]

    public string $email = '';
public string $password = '';

public function login()
{
    $this->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    if (auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
        session()->flash('message', 'Login successful!');
    }

    session()->flash('error', 'Invalid credentials.');
}

    public function render()
    {
        return view('livewire.website.auth.login-page');
    }
}