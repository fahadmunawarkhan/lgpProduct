<?php

namespace App\Livewire\Website\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;

class UserForgertPassword extends Component
{
    #[Layout('components.layouts.websiteAuth')]

    public function render()
    {
        return view('livewire.website.auth.user-forgert-password');
    }
}
