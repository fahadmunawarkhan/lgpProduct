<?php

namespace App\Livewire\Website;

use App\Models\Orders;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Checkout extends Component
{
    public $cart = [];

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
    public $total = 0;
    public $totalqty = 0;
    #[Layout('components.layouts.website')]

    public function mount()
    {
        $this->cart = session()->get('cart', []);
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



        foreach ($this->cart as $item) {
            $order = new Orders();

            $subtotal = $item['price'] * $item['quantity'];
            $this->total += $subtotal;
            $this->totalqty = $item['quantity'];


            $user = User::where('name', $this->full_name)->firstOrFail();
            $product = Product::where('name', $item['name'])->firstOrFail();

            $order->user_id = (string) $user->id;

            $order->delivery_address = $this->address;
            $order->delivery_date = $this->date;
            $order->payment_method = $this->paymenttype;


            $order->price = number_format($this->total);
            $order->quantity = number_format($this->totalqty);

            $order->total_amount = number_format($this->total * $this->totalqty, 2);

            $order->notes = $this->note ?? null;
            $order->payment_status = 'unpaid';
            $order->status = 'pending';
            $order->product_id = $product['id'];
            $order->orderid = 'ORD-' . now()->format('YmdHis') . '-' . rand(100, 999);

            $order->save();
        }


        session()->flash('success', 'Your order has been placed!');
        session()->forget('cart');
        $this->cart = [];
        $this->reset(['full_name', 'email', 'phone', 'address', 'date', 'paymenttype', 'note']);
    }

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


    public function render()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $this->full_name = $user->name;
        $this->email = $user->email;
        return view('livewire.website.checkout');
    }
}
