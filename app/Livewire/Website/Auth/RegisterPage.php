<?php

namespace App\Livewire\Website\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class RegisterPage extends Component
{
    #[Layout('components.layouts.websiteAuth')]

    public $form = [
        'name' => '',
        'email' => '',
        'password' => '',
        'phone_number' => '',
        'cnic' => '',
        'address_line_1' => '',
        'address_line_2' => '',
        'city' => '',
        'province' => '',
        'postal_code' => '',
        'connection_type' => 'domestic',
        'profile' => '',
    ];

    public function register()
    {
        $this->validate([
            'form.name' => 'required|string|max:255',
            'form.email' => 'required|email|unique:users,email',
            'form.password' => 'required|min:6',
            'form.phone_number' => 'nullable|string',
            'form.cnic' => 'nullable|string',
            'form.connection_type' => 'required|in:domestic,commercial',
        ]);

        $user = User::create([
            'name' => $this->form['name'],
            'email' => $this->form['email'],
            'password' => Hash::make($this->form['password']),
            'phone_number' => $this->form['phone_number'],
            'cnic' => $this->form['cnic'],
            'address_line_1' => $this->form['address_line_1'],
            'address_line_2' => $this->form['address_line_2'],
            'city' => $this->form['city'],
            'province' => $this->form['province'],
            'postal_code' => $this->form['postal_code'],
            'role' => 'customer',
            'connection_type' => $this->form['connection_type'],
            'profile' => $this->form['profile'],
            'is_active' => true,
        ]);

        Auth::login($user);
        $this->reset();
        session()->flash('success', 'Registration successful!');
        // return redirect()->route('user.dashboard');
    }

    public function render()
    {
        return view('livewire.website.auth.register-page');
    }
}
