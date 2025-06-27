<?php

namespace App\Livewire\Website\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;

class RegisterPage extends Component
{
    #[Layout('components.layouts.website')]

    public function render()
    {
        return view('livewire.website.auth.register-page');
    }
}
