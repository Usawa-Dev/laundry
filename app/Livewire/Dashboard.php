<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Services\ProductService;

class Dashboard extends Component
{

    public $productsDashboard;

    #[On('Initialised')]
    public function render(ProductService $productService)
    {

        $this->productsDashboard = $productService->productByOrder();
        return view('livewire.dashboard');
    }



    public function order(int $customerId){
        dd($customerId);
    }

    public function confirm(int $orderId) {
       $order = Order::findOrFail($orderId);
        $order->update([
            "status" => 1
        ]);

        session()->forget("customer_id");

        $this->dispatch('confirmed');
    }
}
