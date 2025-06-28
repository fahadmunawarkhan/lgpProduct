<?php

namespace App\Livewire\Website;

use App\Models\Orders;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SingleProductCheckout extends Component
{
    #[Layout('components.layouts.website')]

    public $full_name, $email, $phone, $address;
    public $cartItems = [];
    public $totalAmount = 0;
    public $product;
    public $date;
    public $note;
    public $qty = 1;
    public $paymenttype = '';
    public $login = true;
    public $register = false;


    public function Login()
    {
        $this->login = true;
        $this->register = false;
    }

    public function Register()
    {
        $this->login = false;
        $this->register = true;
    }


    public function mount($id, $quantity)
    {
        $this->product = Product::with('productcategory')->find($id);
        $this->qty = $quantity;
    }

    public function placeOrder()
    {
        $this->validate([
            'full_name'    => 'required|string|max:255',
            'email'        => 'required|email',
            'phone'        => 'required',
            'address'      => 'required|string|max:500',
            'date'         => 'required|date',
            'paymenttype'  => 'required|in:online,cod',
        ]);

        $order = new Orders();

        // Get user by name (ensure this is safe)
        $user = User::where('name', $this->full_name)->firstOrFail();
        $order->user_id = (string) $user->id; // since user_id is VARCHAR

        $order->delivery_address = $this->address;
        $order->delivery_date = $this->date;
        $order->payment_method = $this->paymenttype;
        $order->product_id = $this->product->id;

        // Ensure correct values
        $order->price = number_format($this->product->price); // price is varchar
        $order->quantity = number_format($this->qty); // quantity is varchar

        $order->total_amount = number_format($this->product->price * $this->qty, 2); // total_amount is decimal(10,2)

        $order->notes = $this->note ?? null;
        $order->payment_status = 'unpaid'; // Default from schema
        $order->status = 'pending';
        $order->orderid = 'ORD-' . now()->format('YmdHis') . '-' . rand(100, 999);

        $order->save();


        session()->flash('success', 'Your order has been placed!');

        // Optionally clear form fields
        $this->reset(['full_name', 'email', 'phone', 'address', 'date', 'paymenttype', 'note']);
    }


    public function render()
    {
        if (Auth::check()) {
            $user = User::where('id', Auth::user()->id)->first();
            $this->full_name = $user->name;
            $this->email = $user->email;
        }

        return view('livewire.website.single-product-checkout');
    }
}
