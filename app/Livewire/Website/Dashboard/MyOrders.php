<?php

namespace App\Livewire\Website\Dashboard;

use App\Models\Orders;
use Livewire\Attributes\Layout;
use Livewire\Component;

class MyOrders extends Component
{
    #[Layout('components.layouts.websiteDashboard')]


    public function render()
    {
        $orders = Orders::where('user_id', auth()->id())->with('product')->latest()->get();

        return view('livewire.website.dashboard.my-orders', [
            'orders' => $orders
        ]);
    }
}
