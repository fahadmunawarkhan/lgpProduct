<?php

namespace App\Livewire\Website;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SingleProductCheckout extends Component
{
    #[Layout('components.layouts.website')]

    public $full_name, $email, $phone, $address;
    public $cartItems = [];
    public $totalAmount = 0;
    public $product;
    public $qty = 1;

    public function mount($id, $quantity)
    {
        $this->product = Product::with('productcategory')->find($id);
        $this->qty = $quantity;
    }

    public function placeOrder()
    {
        $this->validate([
            'full_name' => 'required|string|max:255',
            'email'     => 'required|email',
            'phone'     => 'required',
            'address'   => 'required|string|max:500',
        ]);

        // Logic for placing the order (save to DB, send email, etc.)

        session()->flash('success', 'Your order has been placed!');
        return redirect()->route('home'); // or to a thank you page
    }

    public function render()
    {
        return view('livewire.website.single-product-checkout');
    }
}
