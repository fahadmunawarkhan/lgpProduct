<?php

namespace App\Livewire\Website;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Shop extends Component
{
    #[Layout('components.layouts.website')]

    public $cart = [];

    protected $listeners = ['addToCart' => 'add'];

    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }

    public function add($productId)
    {
        $product = Product::findOrFail($productId);
        $cart = $this->cart;

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1
            ];
        }

        $this->cart = $cart;
        session()->put('cart', $cart);
        // $this->dispatchBrowserEvent('cart-updated');
    }

    public function render()
    {
        $products = Product::paginate(20);
        return view('livewire.website.shop', [
            'products' => $products
        ]);
    }
}
