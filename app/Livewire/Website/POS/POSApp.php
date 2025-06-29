<?php

namespace App\Livewire\Website\POS;

use App\Models\Orders;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

class POSApp extends Component
{
    public $productCategory;
    public $products;
    public $currentTime;
    public $cart = [];
    public $customers;
    public $selectedCustomerId;
    public $selectedCategory = null;
    public $showCustomerModal = true; // default true


    public $customerForm = [
        'name' => '',
        'email' => '',
        'phone_number' => '',
        'cnic' => '',
        'address_line_1' => '',
        'address_line_2' => '',
        'city' => '',
        'postal_code' => '',
        'role' => 'customer',
        'is_active' => true,
        'password' => '',
        'profile' => null, // optional image
    ];




    #[Layout('components.layouts.posLayout')]
    public function mount()
    {
        $this->productCategory = ProductCategory::all();
        $this->selectedCategory = $this->productCategory->first()->id ?? null;
        $this->products = Product::where('product_category', $this->selectedCategory)->get();
        $this->customers = User::all();
        $this->selectedCustomerId = null;
        $this->currentTime = Carbon::now()->setTimezone('Asia/Karachi')->format('h:i A');
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        $this->products = Product::where('product_category', $categoryId)->get();
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);
        if (!$product) return;

        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity']++;
        } else {
            $this->cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }
    }

    public function increaseQuantity($productId)
    {
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity']++;
        }
    }

    public function decreaseQuantity($productId)
    {
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['quantity']--;
            if ($this->cart[$productId]['quantity'] <= 0) {
                unset($this->cart[$productId]);
            }
        }
    }

    public function getSelectedCustomer()
    {
        return User::find();
    }

    public function getTotal()
    {
        return collect($this->cart)->reduce(fn($carry, $item) => $carry + ($item['price'] * $item['quantity']), 0);
    }

    public function confirmOrder()
    {
        $customer = $this->getSelectedCustomer();

        $sale = DB::transaction(function () use ($customer) {
            $sale = Orders::create([
                'customer_id' => $customer->id,
                'total_amount' => $this->getTotal(),
                'created_at' => now(),
            ]);

            foreach ($this->cart as $item) {
                Orders::create([
                    'sale_id' => $sale->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'subtotal' => $item['price'] * $item['quantity'],
                ]);
            }

            return $sale;
        });

        session()->flash('success', 'Order placed for ' . $customer->name);
        $this->cart = [];

        return redirect()->route('user.pos.invoice', ['sale_id' => $sale->id]);
    }


    public function createCustomer()
    {
        $validated = $this->validate([
            'customerForm.name' => 'required|string|max:255',
            'customerForm.email' => 'nullable|email',
            'customerForm.phone_number' => 'nullable|string|max:20',
            'customerForm.cnic' => 'nullable|string|max:20',
            'customerForm.address_line_1' => 'nullable|string',
            'customerForm.address_line_2' => 'nullable|string',
            'customerForm.city' => 'nullable|string',
            'customerForm.postal_code' => 'nullable|string',
            'customerForm.role' => 'required|string',
            'customerForm.password' => 'required|string|min:6',
            'customerForm.is_active' => 'boolean',
        ]);

        User::create([
            'name' => $validated['customerForm']['name'],
            'email' => $validated['customerForm']['email'],
            'phone' => $validated['customerForm']['phone_number'],
            'cnic' => $validated['customerForm']['cnic'],
            'address_line_1' => $validated['customerForm']['address_line_1'],
            'address_line_2' => $validated['customerForm']['address_line_2'],
            'city' => $validated['customerForm']['city'],
            'postal_code' => $validated['customerForm']['postal_code'],
            'role' => $validated['customerForm']['role'],
            'password' => bcrypt($validated['customerForm']['password']),
            'is_active' => $validated['customerForm']['is_active'],
        ]);

        $this->customers = User::all();
        $this->showCustomerModal = false; // This will trigger Alpine to close
        $this->reset('customerForm');
    }



    public function render()
    {
        return view('livewire.website.p-o-s.p-o-s-app');
    }
}
