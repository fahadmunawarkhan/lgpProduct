<?php

namespace App\Livewire\Website;

use App\Models\Product;
use App\Models\ProductCategory;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Shop extends Component
{
    use WithPagination;

    #[Layout('components.layouts.website')]

    public $cart = [];
    public $quantity = 1;

    public $search = '';
    public $selectedCategories = [];
    public $priceMin = 0;
    public $priceMax = 100000;

    protected $listeners = ['addToCart' => 'add'];

    public function updating($field)
    {
        if (in_array($field, ['search', 'selectedCategories', 'priceMin', 'priceMax'])) {
            $this->resetPage();
        }
    }

    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }

    public function buyNow($productId)
    {
        $qty = $this->quantity ?? 1;

        return redirect()->route('single.Product.checkout', [
            'id' => $productId,
            'quantity' => $qty,
        ]);
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
        session()->flash('success', 'Item Cart Added');
    }

    public function render()
    {
        $query = Product::query();

        if (!empty($this->search)) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        if (!empty($this->selectedCategories)) {
            $query->whereIn('category_id', $this->selectedCategories);
        }

        $query->whereBetween('price', [$this->priceMin, $this->priceMax]);

        $products = $query->paginate(20);
        $productsCategory = ProductCategory::all();

        return view('livewire.website.shop', [
            'products' => $products,
            'productsCategory' => $productsCategory
        ]);
    }
}